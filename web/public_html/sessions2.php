<?php
session_start();
$training = $_POST['training'];
$_SESSION['training'] = $training;
$repair = $_POST['repair'];
$_SESSION['repair'] = $repair;
$research = $_POST['research'];
$_SESSION['research'] = $research;
$building = $_POST['building'];
$_SESSION['building'] = $building;
$general = $_POST['general'];
$_SESSION['general'] = $general;
header("Location: troop-calculator.php");
die();
?>