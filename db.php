<?php

define("DB_HOST", "localhost");
define("DB_NAME", "database");
define("DB_USER", "user");
define("DB_PASS", "12345");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($mysqli->connect_error)
{
    die("Connection failed: " . $mysqli->connect_error);
}


function sanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    global $mysqli;
    $data = $mysqli->real_escape_string($data);
    return $data;
}
