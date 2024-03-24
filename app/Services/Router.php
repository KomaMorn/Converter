<?php

namespace App\Services;

class Router
{   
    private static array $list = [];

    /**
     * Метод регистрирует маршрут для страницы
     * @param string $uri
     * @param string $pageName
     * @return void
     */
    public static function page(string $uri, string $pageName) : void
    {
        self::$list[] = [
            'uri' => $uri,
            'page' => $pageName
        ];
    }

    /**
     * Метод регистрирует маршрут для обработки post запроса
     * @return void
     */
    public static function post(string $uri, mixed $controller, string $method)
    {
        self::$list[] = [
            'uri' => $uri,
            'class' => $controller,
            'method' => $method,
            'post' => true
        ];
    }

    /**
     * Метод принимает запрос и открывает страницу по соответствующему маршруту
     * @return void
     */
    public static function enable() : void
    {
        $uriRequest = $_GET['q'];

        foreach(self::$list as $route) {
            if ($route['uri'] === '/' . $uriRequest) {
                if ($route['post'] === true && $_SERVER['REQUEST_METHOD'] === 'POST') {
                    $action = new $route['class'];
                    $method = $route['method'];
                    $action->$method($_POST);
                    die();
                } else {
                    require_once BASE_DIR . '/view/pages/' . $route['page'] . '.php';
                    die();
                }
            }
        }

        self::error('error404');
    }

    /**
     * Подключение страницы ошибки
     * @return void
     */
    private static function error(string $error) : void
    {
        require_once BASE_DIR . '/view/errors/' . $error . '.php';
    }
}