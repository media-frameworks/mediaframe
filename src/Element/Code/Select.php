<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Element;
use Mediaframe\Config;
use Mediaframe\Service\MySqlService;
use Mediaframe\Stack;

class Select extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    private function getMysqlResult($connector, $markup)
    {
        if (!isset($markup->table)) {
            return array();
        }
        $table = $markup->table;
        $fields = '*';
        if (isset($markup->fields)) {
            $fields = $markup->fields;
        }

        $sql = "SELECT " . $fields . " FROM " . $table;
        $values = array();
        if (isset($markup->where)) {
            $sql .= ' WHERE ';
            $conditions = array();
            foreach ($markup->where as $field_name => $field_value) {
                $conditions[] = $field_name . '=:' . $field_name;
                $values[$field_name] = Stack::valueSubstitutions($field_value);
            }
            $sql .= implode(' AND ', $conditions);
        }
        $db_service = new MySqlService($connector);
        $result = $db_service->runSelect($sql, $values);
        if (null != $result) {
            foreach ($result as $index => $record) {
                foreach ($record as $field => $value) {
                    Stack::setConstant('select[' . $index . ']:' . $field, $value);
                }
            }
            Stack::shareFrame();
            if (isset($markup->success)) {
                return Element::renderElements($markup->success);
            }
        } else {
            if (isset($markup->not_found)) {
                return Element::renderElements($markup->not_found);
            }
        }
        return '';
    }

    public function render($markup)
    {
        if (!isset($markup->connector)) {
            return 'select: no connector set';
        }
        /** @var MySqlService $connector */
        $connector = $markup->db_connector;
        $result = $this->getMysqlResult($connector, $markup);
        return $result . Element::renderElements($markup);
    }
}
