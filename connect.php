<?php
    $dbh;
    try {
        $dbh = new PDO('sqlite:api/database.db');

    } catch (PDOException $e) {
        echo '<pre>';
        var_dump($e);
        die('could not connect to database');
    }   
?>