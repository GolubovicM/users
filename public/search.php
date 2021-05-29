<?php

    include '../init.php';

    include '../markup/header.php';
    $dbConnection = getConnection();

    if (!$userId){
        echo '<h2>Please login</h2>';
        include '../markup/login_form.php';
    }else{
        include '../markup/search_form.php';
        echo '<h2>Search results</h2>';
        $users = findUsers($dbConnection, $_GET['search']);
        printSearchResults($users);
    }

    include '../markup/footer.php';

    function findUsers($dbConnection, $keyword)
    {
        $stmt = $dbConnection->prepare("SELECT * FROM user WHERE email LIKE ? OR name LIKE ?");
        $stmt->execute(["%".$keyword."%", "%".$keyword."%"]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function printSearchResults($users)
    {
        foreach ($users as $index => $user){
            echo ($index+1).'. '.$user['name']. ' ('.$user['email'].')<br/>';
        }
    }