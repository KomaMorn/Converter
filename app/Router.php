<?php

namespace App;

class Router
{   
    private static array $list = [];

    /**
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
     * @return void
     */
    public static function enable() : void
    {
        $uriRequest = $_GET['q'];

        foreach(self::$list as $route) {
            if ($route['uri'] === '/' . $uriRequest) {
                require_once BASE_DIR . '/view/pages/' . $route['page'] . '.php';
                die();
            }
        }

        self::notFoundPage();
    }

    /**
     * @return void
     */
    private static function notFoundPage() : void
    {
        require_once BASE_DIR . '/view/errors/error404.php';
    }
}