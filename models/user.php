<?php

class UserModel extends Model {
    public function register() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = password_hash($post['inputPassword'], PASSWORD_DEFAULT);

        if ($post['submit']) {

            $this->query('INSERT INTO users (username, password, email) VALUES(:username, :password, :email)');
            $this->bind(':username', $post['inputUsername']);
            $this->bind(':password', $password);
            $this->bind(':email', $post['inputEmail']);
            $this->execute();

            // echo "<div>Outside</div>".$this->lastInsertId();
            echo "pushing: " . $post['inputUsername'] . " " . $post['inputEmail'] . " " .$password;
            if ($this->lastInsertId()) {
                header('Location: ' . ROOT_URL . 'users/login');
            }
        }

        return;
    }

    public function login(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['submit']) {

            $this->query('SELECT * FROM users WHERE username = :username');
            $this->bind(':username', $post['inputUsername']);

            $row = $this->single();

            echo "hello" . $row['password'] . " " . $row['username'];

            if (password_verify($post['inputPassword'], $row['password'])) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user'] = array(
                    'id'        => $row['id'],
                    'username'  => $row['username'],
                    'email'     => $row['email'],
                    'password'  => $row['password']
                );
                header('Location: ' . ROOT_URL);
                //Messages::setMsg("Login successfully.", 'success');
            } else {
                Messages::setMsg('Incorrect Login', 'error');
            }
        }
        return;
    }

    public function profile() {
        $this->query("SELECT word, timestamp FROM history WHERE user_id={$_SESSION['user']['id']}");
        $rows = $this->resultSet();

        return $rows;
    }


    public function updatePass() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['submit']) {

            $password = password_hash($post['inputNewPassword'], PASSWORD_DEFAULT);
            if ($post['inputNewPassword'] != $post['ConfirmNewPassword']) {
                Messages::setMsg('New password and Confirm new password do not match.', 'error');
                return;
            }

            if (password_verify($post['inputOldPassword'], $_SESSION['user']['password'])) {
                $this->query('UPDATE users SET password=:password WHERE id=:userid');
                $this->bind(':password', $password);
                $this->bind(':userid', $_SESSION['user']['id']);
                $this->execute();
                //Messages::setMsg('Your password has been updated successfully.', 'success');
                header('Location: ' . ROOT_URL . "users/profile");
            } else {
                Messages::setMsg('Incorrect Old password.', 'error');
            }
        }
        return;

    }
}