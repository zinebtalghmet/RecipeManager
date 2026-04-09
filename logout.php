<?php
require_once __DIR__ .'/APP/Controllers/AuthController.php';
$logout = new AuthController();
$logouts = $logout ->logout();

?>