<?php

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