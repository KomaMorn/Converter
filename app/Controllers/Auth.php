<?php

namespace App\Controllers;

use App\Services\Router;
use App\Services\App;

class Auth
{
    /**
     * Метод, реализующий регистрацию пользователя
     * @param array $data
     * @return void
     */
    public function register(array $data)
    {
        if (!empty($data['username']) && !empty($data['password']) && !empty($data['confirm'])) {
            if ($data['password'] === $data['confirm']) {
                $username = $data['username'];
                $password = password_hash($data['password'], PASSWORD_DEFAULT);

                $query = "SELECT * FROM users WHERE username='$username'";
                $user = mysqli_fetch_assoc(mysqli_query(App::$dataBase, $query));

                if (empty($user)) {
                    $query = "INSERT INTO users SET username='$username', password='$password'";
			        mysqli_query(App::$dataBase, $query);
                } else {
                    echo "Логин занят";
                }
            } else {
                Router::error('error500');
            }
        }
    }

    /**
     * Метод, реализующий авторизацию пользователя
     * @param array $data
     * @return void
     */
    public function login(array $data)
    {
        if (!empty($data['username']) && !empty($data['password'])) {
            $username = $data['username'];
            $password = $data['password'];

            $query = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query(App::$dataBase, $query);
            $user = mysqli_fetch_assoc($result);

            if (!empty($user)) {
                $hash = $user['password'];

                if (password_verify($password, $hash)) {
                    echo "Вы вошли";
                }
            } else {
                echo "Неверно введен логин или пароль";
            }
        }
    }
}