<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element;
use Mediaframe\Element\Code;
use Mediaframe\Stack;
use Mediaframe\Config;
use Mediaframe\Service\MySqlService;

class Set extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    private function setMysqlData($connector, $markup)
    {
        if (!isset($markup->table) || !isset($markup->data)) {
            return array();
        }
        $fields = array();
        $values = array();
        foreach ($markup->data as $field_name => $value) {
            if ($value == 'CURRENT_TIMESTAMP') {
                $fields[$field_name] = 'CURRENT_TIMESTAMP';
            } else {
                $fields[$field_name] = ':' . $field_name;
                $values[$field_name] = Stack::valueSubstitutions($value);
            }
        }
        $db_service = new MySqlService($connector);
        $db_service->initTable($markup->table);
        $sql = "INSERT INTO " . $markup->table . ' (' . implode(',', array_keys($fields)) . ') VALUES (' . implode(',', array_values($fields)) . ')';
        $sql = Stack::valueSubstitutions($sql);
        $result = $db_service->runQuery($sql, $values);
        if ($result) {
            if (isset($markup->success)) {
                return Element::renderElements($markup->success);
            }
        } else{
            if (isset($markup->error)) {
                return Element::renderElements($markup->error);
            }
        }
        return '';
    }

    public function render($markup)
    {
        if (isset($markup->db_connector)) {
            switch ($markup->db_connector) {
                default:
                case "mysql":
                    return $this->setMysqlData($markup->db_connector, $markup);
            }
        } else {
            foreach ($markup as $name => $value) {
                Stack::setVar($name, $value);
            }
        }
        Stack::shareFrame();
        return '';
    }
}
