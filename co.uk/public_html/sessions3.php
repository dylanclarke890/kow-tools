<?php 
session_start();

$tankTroopLevel = $_POST['tankTroopLevel'];
$_SESSION['tankTroopLevel'] = $tankTroopLevel;
$antiTroopLevel = $_POST['antiTroopLevel'];
$_SESSION['antiTroopLevel'] = $antiTroopLevel;
$infTroopLevel = $_POST['infTroopLevel'];
$_SESSION['infTroopLevel'] = $infTroopLevel;
$artTroopLevel = $_POST['artTroopLevel'];
$_SESSION['artTroopLevel'] = $artTroopLevel;

$tankProdCap = $_POST['tankProdCap'];
$_SESSION['tankProdCap'] = $tankProdCap;
$antiProdCap = $_POST['antiProdCap'];
$_SESSION['antiProdCap'] = $antiProdCap;
$infProdCap = $_POST['infProdCap'];
$_SESSION['infProdCap'] = $infProdCap;
$artProdCap = $_POST['artProdCap'];
$_SESSION['artProdCap'] = $artProdCap;

$tankTotalTroops = $_POST['tankTotalTroops'];
$_SESSION['tankTotalTroops'] = $tankTotalTroops;
$antiTotalTroops = $_POST['antiTotalTroops'];
$_SESSION['antiTotalTroops'] = $antiTotalTroops;
$infTotalTroops = $_POST['infTotalTroops'];
$_SESSION['infTotalTroops'] = $infTotalTroops;
$artTotalTroops = $_POST['artTotalTroops'];
$_SESSION['artTotalTroops'] = $artTotalTroops;

$tankTotalRssCost = $_POST['tankTotalRssCost'];
$_SESSION['tankTotalRssCost'] = $tankTotalRssCost;
$antiTotalRssCost = $_POST['antiTotalRssCost'];
$_SESSION['antiTotalRssCost'] = $antiTotalRssCost;
$infTotalRssCost = $_POST['infTotalRssCost'];
$_SESSION['infTotalRssCost'] = $infTotalRssCost;
$artTotalRssCost = $_POST['artTotalRssCost'];
$_SESSION['artTotalRssCost'] = $artTotalRssCost;

$tankTotalTimeTaken = $_POST['tankTotalTimeTaken'];
$_SESSION['tankTotalTimeTaken'] = $tankTotalTimeTaken;
$antiTotalTimeTaken = $_POST['antiTotalTimeTaken'];
$_SESSION['antiTotalTimeTaken'] = $antiTotalTimeTaken;
$infTotalTimeTaken = $_POST['infTotalTimeTaken'];
$_SESSION['infTotalTimeTaken'] = $infTotalTimeTaken;
$artTotalTimeTaken = $_POST['artTotalTimeTaken'];
$_SESSION['artTotalTimeTaken'] = $artTotalTimeTaken;

$tankTotalBatches = $_POST['tankTotalBatches'];
$_SESSION['tankTotalBatches'] = $tankTotalBatches;
$antiTotalBatches = $_POST['antiTotalBatches'];
$_SESSION['antiTotalBatches'] = $antiTotalBatches;
$infTotalBatches = $_POST['infTotalBatches'];
$_SESSION['infTotalBatches'] = $infTotalBatches;
$artTotalBatches = $_POST['artTotalBatches'];
$_SESSION['artTotalBatches'] = $artTotalBatches;

header("Location: sum.php");
die();

?>