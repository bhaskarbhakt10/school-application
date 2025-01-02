<?php
require_once dirname(__DIR__) . "/__config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo NGROK_IS_ACTIVE; ?>
    <title>School</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">


    <?php
    $styles_dep = scandir(ROOT_PATH . 'assets/css/dependency');
    unset($styles_dep[0]);
    unset($styles_dep[1]);
    foreach ($styles_dep as $style_dep) {


    ?>
        <link rel="stylesheet" href="<?php echo ROOT_URL . 'assets/css/dependency/' . $style_dep . '?q' . time(); ?>" />
    <?php

    }

    ?>

    <?php

    $styles_custom = scandir(ROOT_PATH . 'assets/css/css');
    // print_r($styles_custom);
    unset($styles_custom[0]);
    unset($styles_custom[1]);



    foreach ($styles_custom as $style_cus) {


    ?>
        <link rel="stylesheet" href="<?php echo ROOT_URL . 'assets/css/css/' . $style_cus ?>?ver=<?php echo time(); ?>" />
    <?php

    }

    ?>


</head>

<body class="body <?php echo (session_status() === PHP_SESSION_ACTIVE) ? 'logged-in' : ''; ?> <?php $uri = explode('/', $_SERVER['PHP_SELF']);
                                                                                                echo  strtolower(preg_replace('/.php/', '', end($uri))); ?>">