<?php
require_once __DIR__ .'/APP/Controllers/AuthController.php';
$log = new AuthController();
$logs = $log ->logIn();

?>