<?php
    require_once 'connect.php';
    $dbh->exec(file_get_contents('create_base.sql'));
?>