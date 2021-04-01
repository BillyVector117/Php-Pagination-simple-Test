<?php

function connection($name = 'databasethree', $user = 'root', $password = '')
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=$name", "$user", "$password");
        return $connection;
    } catch (PDOException $event) {
        echo "ERROR: " . $event->getMessage();
        die();
    }
}
?>