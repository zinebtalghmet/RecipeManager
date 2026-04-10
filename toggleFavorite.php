<?php
session_start();

if(!isset($_SESSION['user_id']) || !isset($_GET['recipe_id'])){
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/APP/Controllers/FavoriteController.php';

$favController = new FavoriteController();
$favController->toggle($_SESSION['user_id'], $_GET['recipe_id']);

header('Location: dashboard.php');
exit();
?>
