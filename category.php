<?php
require_once __DIR__ .'/APP/Controllers/CategoryController.php';

$catController = new CategoryController();

// ✔ غير POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $catController->addCategory();
}

// ✔ غير إلا كان delete
if(isset($_GET['delete_cat'])){
    $catController->deleteCategory();
}

// ✔ دائما نجيبو categories
$catController->index();
?>