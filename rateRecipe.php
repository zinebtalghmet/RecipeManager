<?php
session_start();

if(!isset($_SESSION['user_id']) || !isset($_GET['recipe_id']) || !isset($_GET['rating'])){
    header('Location: dashboard.php');
    exit();
}

$rating = (int)$_GET['rating'];
if($rating < 1 || $rating > 5){
    header('Location: dashboard.php');
    exit();
}

require_once __DIR__ . '/APP/Controllers/RatingController.php';

$ratingController = new RatingController();
$ratingController->rate($_SESSION['user_id'], $_GET['recipe_id'], $rating);

header('Location: dashboard.php');
exit();
?>
