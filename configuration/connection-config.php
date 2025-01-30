<?php
    require('configuration-config.php');

    $dbPortal = new mysqli($servername, $serverusername, $serverpassword, $serverdb);

    if ($dbPortal->connect_error) {
        die("Connection Failed: " . $connection->connect_error);

    }

    $dbPortal->set_charset('utf8mmb4');

?>