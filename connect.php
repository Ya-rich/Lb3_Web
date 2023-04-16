<?php
    $dsn = "mysql:host=localhost;dbname=var5";
    $user = 'root';
    $pass = '';

    try {
        $dbh = new PDO($dsn, $user, $pass);
    } catch (PDOException $ex) {
        echo $ex->GetMessage();
    }
?>