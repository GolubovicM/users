<?php
    include '../init.php';
    include '../markup/header.php';

    session_unset();
    echo '<h1>Logout</h1>';
    echo "You are logged out now";

    include '../markup/footer.php';
