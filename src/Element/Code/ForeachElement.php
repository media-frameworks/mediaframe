<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;

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
        if (!$dataset) {
            return 'foreach dataset not defined';
        }
        $content = '';
        $markup_str = json_encode($markup);
        $foreach_index = 0;
        foreach ($dataset as $name => $value) {
            Stack::setConstant('foreach::name', $name);
            Stack::setConstant('foreach::value', $value);
            Stack::setConstant('foreach::index', $foreach_index++);
            Stack::setConstant('foreach::' . $name, $value);
            if (is_array($value) || is_object($value)) {
                $index = 0;
                foreach ($value as $n => $v) {
                    Stack::setConstant('foreach::' . $n, (string)$v);
                    Stack::setConstant('foreach::' . $index++, $n);
                }
            }
            $content .= parent::renderElements(json_decode($markup_str));
        }
        //var_dump(Stack::$frames[Stack::$frame_index]->constants);
        return $content;
    }
}