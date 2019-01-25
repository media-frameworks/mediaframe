mespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;

ini_set('memory_limit', '4G');

class ForeachElement extends Code
{

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    CONST CSV_MAX_LIMIT = 10000000;
    CONST CSV_MAX_LENGTH = 4096;

    static public function csv_to_array($fname, $delimiter = ',', $offset = 0, $limit = self::CSV_MAX_LIMIT)
    {
        $handle = @fopen($fname, "r");
        if (!$handle) {
            echo 'Error: unable to open file: ' . $fname . "\n";
            return array();
        }
        $fields = fgetcsv($handle, self::CSV_MAX_LENGTH, $delimiter);
        if (false === $fields) {
            echo 'Error: unable to read column labels in file: ' . $fname . "\n";
            return array();
        }
        while ($offset > 0) {
            fgets($handle);
            $offset--;
        }
        $rows = array();
        while (($row = fgetcsv($handle, self::CSV_MAX_LENGTH, $delimiter)) !== false) {
            $new_row = array_combine($fields, $row);
            $rows[] = $new_row;
            if (count($rows) == $limit) {
                break;
            }
        }
        fclose($handle);
        return $rows;
    }

    public function render($markup)
    {
        $dataset = null;
        if (isset($markup->dataset)) {
            $dataset = Stack::valueSubstitutions($markup->dataset);
            if (is_string($dataset)) {
                $data = Stack::getData($dataset);
                if (isset($data->file)) {
                    $file_path = $data->file;
                    if (0 === strpos($data->file, '~/')) {
                        $filesystem_root = Stack::getConstant('global:web_root');
                        $file_path = str_replace('~', $filesystem_root, $file_path);
                    }
                    $dataset_json = json_decode(file_get_contents($file_path));
                    Stack::setData($dataset, $dataset_json);
                    Stack::shareFrame();
                } else {
                    $dataset = $data;
                }
            }
        } else {
            if (isset($markup->csv_file)) {
                $dataset = self::csv_to_array(Stack::valueSubstitutions($markup->csv_file));
            }
        }
        if (null === $dataset) {
            return '';
        }
        $prefix = 'foreach';
        if (isset($markup->prefix)){
            $prefix = $markup->prefix;            
        }
        $content = array();
        $foreach_index = 0;
        $foreach_count = count($dataset);
        Stack::setConstant($prefix . '::dataset', $dataset);
        foreach ($dataset as $name => $value) {
            Stack::setConstant($prefix . '::name', $name);
            Stack::setConstant($prefix . '::value', $value);
            Stack::setConstant($prefix . '::index', $foreach_index++);
            Stack::setConstant($prefix . '::final', 0);
            if ($foreach_index == $foreach_count) {
                Stack::setConstant($prefix . '::final', 1);
            }
            Stack::setConstant($prefix . '::' . $name, $value);
            if (is_array($value) || is_object($value)) {
                foreach ($value as $n => $v) {
                    if (!is_object($v) && !is_array($v)) {
                        Stack::setConstant($prefix . '::' . $n, (string)$v);
                    } else {
                        Stack::setConstant($prefix . '::' . $n, $v);
                    }
                }
            }
            $content[] = parent::renderElements($markup);
            if (is_array($value) || is_object($value)) {
                foreach ($value as $n => $v) {
                    if (!is_object($v) && !is_array($v)) {
                        Stack::unsetConstant($prefix . '::' . $n, (string)$v);
                    }
                }
            }
        }
        return implode("", $content);
    }
}

