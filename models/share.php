<?php

class ShareModel extends Model {
    public function index() {
        //$this->query('SELECT * FROM words LIMIT 6');
        $rows = 100;
        //$rows = $this->resultSet();
        //print_r($rows);
        return $rows;
    }
}