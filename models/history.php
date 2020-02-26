<?php

class HistoryModel extends Model {
    public function index() {
        $this->query("SELECT word, timestamp FROM history WHERE user_id={$_SESSION['user']['id']}");
        $rows = $this->resultSet();

        return $rows;
    }
}