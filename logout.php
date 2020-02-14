<?php

    include 'databaseConn/session.php';

    removeSession();

    header('Location: index.php');

?>
