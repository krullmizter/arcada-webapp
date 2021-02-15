<?php

    require_once '../../core/init.php';

    session_start();
    $_SESSION = array();
    session_destroy();
    header('location: ../../../pages/frontpage');
    exit;

?>