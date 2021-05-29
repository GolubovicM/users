<?php

    include '../init.php';
    include '../markup/header.php';

    $dbConnection = getConnection();

    if (is_array($_POST) && !empty($_POST)) { // form has been submitted
        if (isFormValid($_POST)){
            createUser($dbConnection, $_POST);
            echo "<br/><strong>User has been created. Please loging now.</strong><br/>";
            $_POST=array();
        }else{
            echo "<br/><strong>Please submit all required data</strong><br/>";
        }
    }

?>
    <h1>Register</h1>
    <form action="/register.php" method="post">
        <input type="email" name="email" placeholder="Email" value="<?php echo $_POST['email'] ?? '' ?>"><br/><br/>
        <input type="text" name="name" placeholder="Name" value="<?php echo $_POST['name'] ?? '' ?>"><br/><br/>
        <input type="password" name="password1" placeholder="Password" value="<?php echo $_POST['password1'] ?? '' ?>"><br/><br/>
        <input type="password" name="password2" placeholder="Repeat Password" value="<?php echo $_POST['password2'] ?? '' ?>"><br/><br/>
        <input type="submit" value="Register">
    </form>


<?php
    include '../markup/footer.php';

    function isFormValid($response) : bool
    {
        // Is some field empty?
        if (empty($response['email']) ||
            empty($response['name']) ||
            empty($response['password1']) ||
            empty($response['password2']) ) {
            return false;
        }
        // Repeated password different from first one?
        if ($response['password1'] != $response['password2']){
            return false;
        }
        // Is email address valid ?
        if (!filter_var($response['email'], FILTER_VALIDATE_EMAIL)) {
          return false;
        }
        return true;
    }

    function createUser($dbConnection, $response)
    {
        $data = [
            'email' => $response['email'],
            'name' => $response['name'],
            'password' => password_hash($response['password1'], PASSWORD_DEFAULT)
        ];

        $sql = "INSERT INTO user (email, name, password) VALUES (:email, :name, :password)";
        $stmt= $dbConnection->prepare($sql);
        $stmt->execute($data);
    }