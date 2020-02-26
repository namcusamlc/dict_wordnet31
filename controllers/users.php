<?php

class Users extends Controller {
    protected function register() {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->register(), true);
    }

    protected function login() {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->login(), true);
    }

    protected function logout() {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user']);
        unset($_SESSION['email']);
        unset($_SESSION['id']);
        session_destroy();
        header('Location: ' . ROOT_URL);
    }

    protected function profile() {
        if (!$_SESSION['is_logged_in']) {
            header('Location: ' . ROOT_URL);
        }

        $viewmodel = new UserModel();
        $this->returnView($viewmodel->profile(), true);
    }

    protected function updatePass() {
        if (!$_SESSION['is_logged_in']) {
            header('Location: ' . ROOT_URL);
        }

        $viewmodel = new UserModel();
        $this->returnView($viewmodel->updatePass(), true);
    }
}