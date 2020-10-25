<?php
    $dbh;
    try {
        $dbh = new PDO('sqlite:/var/www/netflics.com/database/database.db');

    } catch (PDOException $e) {
        echo '<pre>';
        var_dump($e);
        die('could not connect to database');
    }   
?>