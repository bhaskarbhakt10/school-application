<?php
require_once dirname(__DIR__, 1) . '/__config.php';


session_start();



if (session_status() != PHP_SESSION_ACTIVE) {
    echo 'Something Fishy Here';
    header('Refresh: 5;url=' . ROOT_URL . 'log-in.php');
}


$pages = scandir(ROOT_PATH . 'admin/pages/');


$edit = false;

if (!array_key_exists('p', $_GET) && empty($_GET['p'])) {
    die('Are You Sure You Are Allowed Here ?');
} else if (array_key_exists('p', $_GET) && !empty($_GET['p']) && !in_array($_GET['p'] . '.php', $pages) || empty($_SESSION)) {
    $redirect = ROOT_URL . '404.php';
    header('Location: ' . $redirect);
}
$page = $_GET['p'];


if (
    (array_key_exists('q', $_GET) && !empty($_GET['q']) && $_GET['q'] === 'edit')
    &&
    (array_key_exists('p', $_GET) && !empty($_GET['p']))
) {
    $edit = true;
}
?>

<?php
if (in_array($page . '.php', $pages)) { ?>
    <?php require_once ROOT_PATH . '/common/header.php'; ?>
    <div class="<?php echo $page . '-page' ?>  main-page <?php echo ($page !== 'dashboard') ? 'page'  : 'd-page' ?>">
        <?php require_once ROOT_PATH . 'admin/pages/' . $page . '.php'; ?>
    </div>
    <?php require_once ROOT_PATH . '/common/footer.php'; ?>
<?php } else {
?>
    <?php require_once ROOT_PATH . '404.php'; ?>
<?php
}
