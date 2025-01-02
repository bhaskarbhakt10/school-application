<?php

require_once dirname(__DIR__, 3) . '/__config.php';

session_start();

if (isset($_POST) && !empty($_POST)) {

    $responseArray = array();
    $responseArray['status'] = false;
    $responseArray['msg'] = 'Trying to logout';

    if (array_key_exists('logout', $_POST) && !empty($_POST['logout'] && (int)$_POST['logout'] === 1)) {

        $responseArray['msg'] = 'Key Found';

        session_destroy();

        if (session_status() != PHP_SESSION_ACTIVE) {

            $responseArray['status'] = true;
            $responseArray['msg'] = "Logged Out";
            $responseArray['login'] = ENTRY;
        }
    }

    echo json_encode($responseArray);
}
