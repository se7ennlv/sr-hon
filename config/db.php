<?php

$data = array(
    "server" => "172.16.98.142",
    "db" => "HoN",
    "user" => "sa",
    "password" => "Kiss@@33",
);

try {
    $conn = new PDO("sqlsrv:server=" . $data["server"] . "; database=" . $data["db"], $data["user"], $data["password"]);
    //echo 'Connect pass';
} catch (Exception $ex) {
    echo 'Cannot connect to server';
    //echo 'ERROR' . $ex->getMessage();
}
