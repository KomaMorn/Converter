<?php

namespace App\Services;

class App 
{
    public static $dataBase;

    /**
     * Функция запуска приложения
     * @return void
     */
    public static function start()
    {
        self::db();
    }

    /**
     * Функция подключения к базе данных
     * @return void
     */
    public static function db()
    {
        $config = require_once BASE_DIR . '/config/db.php';

        self::$dataBase = mysqli_connect($config['host'], $config['username'], $config['password'], $config['db']);
    }
}