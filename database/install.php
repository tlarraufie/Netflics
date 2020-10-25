<?php
    require_once 'connect.php';
    $dbh->exec(file_get_contents('database/create_base.sql'));
?>