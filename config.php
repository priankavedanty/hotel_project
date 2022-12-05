<?php
if(!isset($_SESSION)) { session_start(); }
require_once 'class/ende.php';
$_SESSION['rtoken'] = generateRandomString(60);
?>