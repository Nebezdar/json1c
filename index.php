<?php

namespace App;


use PDO;

$dbServer = "localhost";
$dbUser = "root";
$dbPW = "";
$dbName = "json";


$dbn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPW);


    if ($dbn->errorCode()) {
        die("Connection failed: " . $dbn->errorCode());
    }


    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo "Ошибка: Метод не допускается.";
    exit();
}


$json = file_get_contents('php://input');


    if ($json === false) {
        http_response_code(400);
        echo "Ошибка: Не удалось получить JSON данные.";
        exit();
    }

$timeName =time().'.json';
    print_r($timeName);
$file = fopen("$timeName", "w+");
fwrite($file, $json);
fclose($file);




