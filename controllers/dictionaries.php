<?php

class Dictionaries extends Controller {
    protected function index() {
        $viewmodel = new DictionaryModel();
        $this->returnView($viewmodel->index(), true);

        //echo 'DICTIONARY/INDEX';
    }

    protected function search() {
        $viewmodel = new DictionaryModel();
        $this->returnView($viewmodel->search(), true);

        //echo 'DICTIONARY/SEARCH';
    }
}