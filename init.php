<?php

    session_start();

    $userId = $_SESSION["user_id"];

    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    function getConnection()
    {
        require_once 'config.php';
        try {
          $conn = new PDO("mysql:host=$dbHost;dbname=$dbDatabase", $dbUser, $dbPass);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connection succeded ";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }