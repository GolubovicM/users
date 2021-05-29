<?php

    include '../init.php';

    include '../markup/header.php';

    $dbConnection = getConnection();
    ?>
    <h1>Welcome</h1>

<?php
    include '../markup/search_form.php';
    include '../markup/footer.php';
