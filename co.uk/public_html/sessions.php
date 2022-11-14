<?php
session_start();
$food = $_POST['food'];
$_SESSION['food'] = $food;
$steel = $_POST['steel'];
$_SESSION['steel'] = $steel;
$oil = $_POST['oil'];
$_SESSION['oil'] = $oil;
$energy = $_POST['energy'];
$_SESSION['energy'] = $energy;
header("Location: speedup-calculator.php");
die();
?>