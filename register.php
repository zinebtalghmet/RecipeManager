<?php
require_once __DIR__ .'/APP/Controllers/AuthController.php';
$register = new AuthController();
$registers = $register ->register();

?>