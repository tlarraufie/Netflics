<?php
    $dbh;
    try {
        $dbh = new PDO('sqlite:/var/www/netflics.com/base.db');

    } catch (PDOException $e) {
        echo '<pre>';
        var_dump($e);
        die('could not connect to database');
    }   
?>