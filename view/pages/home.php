<?php

session_start();

use App\Services\Router;

if (!$_SESSION['auth']) {
    Router::redirect('/converter.ru/register');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tools/css/bootstrap.css">
    <title>Converter</title>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Конвертация валют</h2>
        <form action="" method="post">
            <select class="form-select" aria-label="Пример выбора по умолчанию">
                <option selected>Выберете валюту, которую хотие сконвертировать</option>
                <option value="1">Рубль</option>
                <option value="2">Доллар</option>
                <option value="3">Евро</option>
            </select>
        </form>
    </div>
</body>
</html>