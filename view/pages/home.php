<?php

session_start();

use App\Services\Router;
use App\Models\CBclient;

if (!$_SESSION['auth']) {
    Router::redirect('/converter.ru/register');
}

$client = new CBclient();
$currencyObjects = $client->getValuteObject();

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
        <form action="./" method="post">
            <div class="mb-3">
                <input type="text" name="cash" class="form-control" id="valuteNumberOne" placeholder="Введите сумму, которую хотите сконвертировать">
            </div>
            <div class="mb-3">
            <select class="form-select" name="currencyFirst">
                <option selected>Выберете валюту, которую хотие сконвертировать</option>
                <?php
                    foreach ($currencyObjects as $currency) {
                        $currencyName = (string) $currency->Name;
                        $currencyId = (string) $currency['ID'];
                        echo "<option value=$currencyId> $currencyName </option>";
                    }
                ?>
            </select>
            </div>
            <div class="mb-3">
            <select class="form-select" name="currencySecond">
                <option selected>Выберете валюту, в которую будете конвертировать</option>
                <?php
                    foreach ($currencyObjects as $currency) {
                        $currencyName = (string) $currency->Name;
                        $currencyId = (string) $currency['ID'];
                        echo "<option value=$currencyId> $currencyName </option>";
                    }
                ?>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Конвертировать</button>
        </form>

        <?php
            $cash = (float) str_replace(',', '.', $_POST['cash']);
            $currencyIdFirst = $_POST['currencyFirst'];
            $currencyIdSecond = $_POST['currencySecond'];

            $vunitRateFirst = 0;
            $vunitRateSecond = 0;

            foreach ($currencyObjects as $currency) {
                if ($currencyIdFirst === (string) $currency['ID']) {
                    $vunitRateFirst = (float) str_replace(',', '.', (string) $currency->VunitRate);
                }

                if ($currencyIdSecond === (string) $currency['ID']) {
                    $vunitRateSecond = (float) str_replace(',', '.', (string) $currency->VunitRate);
                }
            }

            $result = ($cash * $vunitRateFirst) / $vunitRateSecond;
            
            echo "<h3 class=\"mt-4\"> $result </h3>";
        ?>
    </div>
</body>
</html>