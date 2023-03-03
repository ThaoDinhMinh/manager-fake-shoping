<?php

$host = "127.0.0.1";
$dbname = "makesun";
$username = "makesun";
$password = "kienminh";

$mysqli = new mysqli(
    hostname: $host,
    username: $username,
    database: $dbname,
    password: $password
);

if ($mysqli->connect_errno) {
    die("Thành công" . $mysqli->connect_errno);
}

return $mysqli;
