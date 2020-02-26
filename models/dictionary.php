<?php

class DictionaryModel extends Model {
    public function search() {

        $lemma = $_GET['id'];

        // GET wordid
        $this->query("SELECT * FROM mini_dict WHERE lemma='{$lemma}' ");
        $rows = $this->resultSet();

        //mark the user has looked up the word
        if (isset($_SESSION['is_logged_in'])) {
            $this->query("INSERT INTO history (user_id, word) VALUES (:user_id, :word) ON DUPLICATE KEY UPDATE timestamp=NOW()");
            $this->bind(':user_id', $_SESSION['user']['id']);
            $this->bind(':word', $lemma);
            $this->execute();
        }

        //GET all definitions in dict
        if (count($rows) == 0) {
            $lemma = str_replace("-", " ", $lemma);
            $this->query("SELECT * FROM mini_dict WHERE lemma='{$lemma}' ");
            $rows = $this->resultSet();
        }


        //GET all synonyms with each synset
        $out = array();
        array_push($out, $lemma);
        foreach($rows as $row) {
            $this->query("SELECT wordid FROM senses WHERE synsetid={$row['synsetid']}");
            $synonyms = $this->resultSet();
            $row['synonyms'] = array();
            foreach($synonyms as $synonym) {
                $this->query("SELECT lemma FROM words WHERE wordid={$synonym['wordid']}");
                $synonym = $this->single();
                array_push($row['synonyms'], $synonym['lemma']);
            }
            array_push($out, $row);
        }
        $rows = $out;

        return $rows;
    }
}