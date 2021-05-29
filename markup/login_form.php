    <h1>Login</h1>
    <form action="/login.php" method="post">
        <input type="email" name="email" placeholder="Email" value="<?php echo $_POST['email'] ?? '' ?>"><br/><br/>
        <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password'] ?? '' ?>"><br/><br/>
        <input type="submit" value="Login">
    </form>