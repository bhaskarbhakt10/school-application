<?php
require_once dirname(__DIR__, 3) . '/__config.php';


$validUsers = array('school@login.com' => 'school@123');
if (isset($_POST) && !empty($_POST)) {

    $responseArray = array();
    $responseArray['error'] = array();


    if (array_key_exists('username', $_POST) && empty($_POST['username'])) {

        array_push($responseArray['error'], 'Username can not be empty');
    }

    if (array_key_exists('password', $_POST) && empty($_POST['password'])) {

        array_push($responseArray['error'], 'password can not be empty');
    }


    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!array_key_exists($username, $validUsers)) {

        array_push($responseArray['error'], 'No Such User');
    }

    if (!empty($responseArray['error'])) {
        $responseArray['status'] = false;
        $responseArray['msg'] = "Error In Fields";
        echo json_encode($responseArray);
        return;
    }

    if (array_key_exists($username, $validUsers)) {

        $responseArray['msg'] = "User Exists";

        if ($validUsers[$username] === $password) {
            $responseArray['msg'] = "User Authenticated";
            $responseArray['status'] = true;
            $responseArray['dashboard'] = ADMIN_DASHBOARD;



            session_start();
            $_SESSION['username'] = $username;
        }
    }

    echo json_encode($responseArray);
}
