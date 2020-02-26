<?php

class History extends Controller {
    protected function index() {


        $viewmodel = new HistoryModel();
        $this->returnView($viewmodel->index(), true);
    }
}