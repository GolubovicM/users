<?php

    include '../init.php';
    include '../markup/header.php';

    $dbConnection = getConnection();

    if (is_array($_POST) && !empty($_POST)) { // form has been submitted
        if (isFormValid($_POST)) {
            if ($user = findUser($dbConnection, $_POST)) {
                echo '<br/><strong>Welcome, ' . $user['name'] . '!</strong><br/>';
                loginUser($user);
                $_POST=array();
            }else{
                echo "<br/><strong>Username or password are not correct.</strong><br/>";
            }
        }else{
            echo "<br/><strong>Please submit all required data</strong><br/>";
        }
    }

    include '../markup/login_form.php';
    include '../markup/footer.php';

    function isFormValid($response) : bool
    {
        // Is some field empty?
        if (empty($response['email']) || empty($response['password']) ) {
            return false;
        }
        // Is email address valid ?
        if (!filter_var($response['email'], FILTER_VALIDATE_EMAIL)) {
          return false;
        }
        return true;
    }

    function findUser($dbConnection, $response)
    {
        $stmt = $dbConnection->prepare("SELECT * FROM user WHERE email=?   LIMIT 1");
        $stmt->execute([$response['email']]);
        $row = $stmt->fetch();

        $verify = password_verify($response['password'], $row['password']);
        if ($verify) {
            return $row;
        }else{
            return false;
        }
    }

    function loginUser($user)
    {
        $_SESSION["user_id"] = $user['id'];
    }