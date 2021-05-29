<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

    include '../init.php';

    include '../markup/header.php';
    $dbConnection = getConnection();
    print_r($dbConnection);

    include '../markup/footer.php';
