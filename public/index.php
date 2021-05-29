<?php

    include '../init.php';

    include '../markup/header.php';
    $dbConnection = getConnection();
    print_r($dbConnection);
?>
    <h1>Welcome</h1>


        <form action="/search.php">
            <label for="search">Search:</label><br>
            <input type="text" id="search" name="search" ><br><br>
            <input type="submit" value="Search">
        </form>

<?php
    include '../markup/footer.php';
