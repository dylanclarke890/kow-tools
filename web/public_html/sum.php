<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<!--[if lte IE 7 ]><html lang="en" class="ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<?php


?>

<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Summary calculator page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> <!--THIS CSS FILE HAS TO BE FIRST--> 
    

	<style>
		
		#logo
		{
			width:3em;
		}

	@media (max-width: 360.98px)/*motoG4 GalaxyS5 iphone5/SE*/{}
	@media (min-width: 361px) and (max-width: 375.98px)/*iphone X and 7/8/9*/
	{
			html, body
			{
				position: fixed;
				overflow-x: hidden;
			}
			body
			{
				height:100vh;
				width:100vw;
				padding: 0;
			}
			
			#wrapper
			{
				padding: 0;
			}
			#banner
			{
				/*background-color: rgba(59, 43, 56, 0.95) !important;*/
				background-color: rgba(59, 43, 56, 1) !important;
				padding:0 0 0 1em;
				width:100vw;
				position: relative;
				
			}
			
			#logo
			{
				width:2em;
			}	
		
			.float
			{
				float: left;
			}
		
			.full
			{
				width:100vw;
			}
			
			.wrap
			{
				padding:0;
				margin: 0;
				position:relative;
				top:-1em;
			}
			.repel
			{
				margin-right:4em;
			}
			.dark
			{
				background-color:  rgba(59, 43, 56, 0.9);
				color:aliceblue;
			}
			.med2
			{
				background-color:  rgba(59, 43, 56, 0.95);
				color:aliceblue;
			}
			.med
			{
				background-color:  rgba(59, 43, 56, 0.65);
			}
			.lite
			{
				background-color:  rgba(59, 43, 56, 0.3);
			}
		}
	@media (min-width: 410px) and (max-width: 767.98px) /*Pixel2 Pixel2XL iphone6/7/8PLUS   */
	{
			html, body
			{
				position: fixed;
				overflow-x: hidden;
			}
			body
			{
				height:100vh;
				width:100vw;
				padding: 0;
			}
			
			#wrapper
			{
				padding: 0;
			}
			#banner
			{
				/*background-color: rgba(59, 43, 56, 0.95) !important;*/
				background-color: rgba(59, 43, 56, 1) !important;
				padding:0 0 0 2em;
				width:100vw;
				position: relative;
				left:-0.95em;
			}
			
			#logo
			{
				width:2em;
			}	
		
			.float
			{
				float: left;
			}
		
			.wrap
			{
				padding:0;
				margin: 0;
				position:relative;
				top:-1em;
			}
			.repel
			{
				margin-right:4em;
			}
			.dark
			{
				background-color:  rgba(59, 43, 56, 0.9);
				color:aliceblue;
			}
			.med2
			{
				background-color:  rgba(59, 43, 56, 0.95);
				color:aliceblue;
			}
			.med
			{
				background-color:  rgba(59, 43, 56, 0.65);
			}
			.lite
			{
				background-color:  rgba(59, 43, 56, 0.3);
			}
		
	}
	@media (min-width: 768px) and (max-width: 900px)/*iPad*/
	{
			html, body
			{
				position: fixed;
				overflow-x: hidden;
			}
			body
			{
				height:100vh;
				width:100vw;
				padding: 0;
			}
			
			#wrapper
			{
				padding: 0;
			}
			#banner
			{
				/*background-color: rgba(59, 43, 56, 0.95) !important;*/
				background-color: rgba(59, 43, 56, 1) !important;
				padding:0 0 0 1em;
				width:100vw;
				position: relative;
				left:-0.95em;
			}
			
			#logo
			{
				width:2em;
			}	
		
			.float
			{
				float: left;
			}
			
			.wrap
			{
				padding:0;
				margin: 0;
				position:relative;
				top:-1em;
			}
			.repel
			{
				margin-right:4em;
			}
			.dark
			{
				background-color:  rgba(59, 43, 56, 0.9);
				color:aliceblue;
			}
			.med2
			{
				background-color:  rgba(59, 43, 56, 0.95);
				color:aliceblue;
			}
			.med
			{
				background-color:  rgba(59, 43, 56, 0.65);
			}
			.lite
			{
				background-color:  rgba(59, 43, 56, 0.3);
			}
		}	
	@media (min-width: 900.98px)/*iPadPro and desktops*/
	{
		html, body
			{
				position: fixed;
				overflow: hidden;
			}
			body
			{
				height:100vh;
				width:100vw;
				padding: 0;
			}
			
			#wrapper
			{
				padding: 0;
			}

			#banner
			{
				height: 4.3em;
				/*background-color: rgba(59, 43, 56, 0.95) !important;*/
				background-color: rgba(59, 43, 56, 1) !important;
			}
			
			#logo
			{
				width:3.5em;
			}
			.float
			{
				float: left;
			}
			.third
			{
				width:32vw;
			}

			.half
			{
				width:50vw;
			}
			.full
			{
				width:100vw;
			}
			.fourth
			{
				width:25vw;
			}
			.wrap
			{
				padding:0;
				margin: 0;
				position:relative;
				top:-1em;
			}
			.repel
			{
				margin-right:4em;
			}
			.dark
			{
				background-color:  rgba(59, 43, 56, 0.9);
				color:aliceblue;
			}
			.med2
			{
				background-color:  rgba(59, 43, 56, 0.95);
				color:aliceblue;
			}
			.med
			{
				background-color:  rgba(59, 43, 56, 0.65);
			}
			.lite
			{
				background-color:  rgba(59, 43, 56, 0.3);
			}
		}
		.clear
		{
			clear: both;
		}
		.ta
		{
			text-align: center;
		}
		.fit
		{
			
			padding:0;
			margin:0;
			position: relative;
			
		}
		.slim
		{
			padding:0;
			margin:0;
		}
		
	.purp
		{
			background-color: rebeccapurple;
		}
	.blu
		{
			background-color: aqua;
		}
	.green
		{
			background-color: darkgreen;
			
		}
	</style>
</head>

<body>
	<div class="container-fluid" id="wrapper">
		<nav id="banner" class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid" id="menu">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="index.html">
					<img id="logo" src="images/logo1_50perc.png" alt="logo">
				</a>

				<div class="collapse navbar-collapse justify-content-center" id="navbarNav">   
					<ul id="menuList" class="nav navbar-nav justify-content-center">
						<li class="nav-item">
							<a class="nav-link" href="resource-calculator.php">Resource Calculator</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="speedup-calculator.php">Speedup Calculator</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="troop-calculator.php">Troop Calculator</a>
						</li>
						<li class="nav-item active repel">
							<a class="nav-link" href="#">Summary</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="officer-calculator.php">AP/XP/Officer Calculator</a>
						</li>
					</ul>
				</div>

			</div><!--#menu closing tag-->
		</nav>

		
		<div class="container-fluid table-responsive half float">
			<table class="table">
				<thead>
					<tr class="row">
					  <th class="col-12 ta dark" scope="col">RESOURCES</th>						
					</tr>
				</thead>
				<tbody>
					<tr class="row">
						<th class="col-3 col-md-2 ta med" scope="row">Food</th>
						<td class="col ta lite">
						<?php 
						if (!empty($_SESSION["food"])) {
							echo $_SESSION["food"];    
						} else {  
							echo "Not entered";
							}; 
						?>
						</td>
					</tr>
					<tr class="row">
						<th class="col-3 col-md-2 ta med" scope="row">Steel</th>
						<td class="col ta lite">
						<?php 
						if (!empty($_SESSION["steel"])) {
							echo $_SESSION["steel"];    
						} else {  
							echo "Not entered";
							}; 
						?>
						</td>
						
					</tr>
					<tr class="row">
						<th class="col-3 col-md-2 ta med" scope="row">Oil</th>
						<td class="col ta lite">
						<?php 
						if (!empty($_SESSION["oil"])) {
							echo $_SESSION["oil"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
						</td>
					</tr>
					<tr class="row">
						<th class="col-3 col-md-2 ta med" scope="row">Energy</th>
						<td class="col ta lite">
						<?php 
						if (!empty($_SESSION["energy"])) {
							echo $_SESSION["energy"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
						</td>						
					</tr>

				</tbody>
			</table>
		</div>
		<div class="container-fluid table-responsive half float">
			<table class="table">
				<thead>
					<tr class="row">					  
						<th class="col ta dark" scope="col">SPEEDUPS</th>						
					</tr>
				</thead>
				<tbody>
					<tr class="row">
						
						<th class="col- col-md-3 ta med" scope="row">Repair</th>
						<td class="col ta lite">
						<?php 
						if (!empty($_SESSION["repair"])) {
							echo $_SESSION["repair"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
						</td>
					</tr>
					<tr class="row">
						
						<th class="col- col-md-3 ta med" scope="row">Research</th>
						<td class="col ta lite">
						<?php 
						if (!empty($_SESSION["research"])) {
							echo $_SESSION["research"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
						</td>
					</tr>
					<tr class="row">
						
						<th class="col- col-md-3 ta med" scope="row">Training</th>
						<td class="col ta lite">
						<?php 
						if (!empty($_SESSION["training"])) {
							echo $_SESSION["training"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
						</td>
					</tr>
					<tr class="row">
						
						<th class="col- col-md-3 ta med" scope="row">Building</th>
						<td class="col ta lite">
						<?php 
						if (!empty($_SESSION["building"])) {
							echo $_SESSION["building"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
						</td>
					</tr>
					<tr class="row">
						
						<th class="col- col-md-3 ta med" scope="row">General</th>
						<td class="col ta lite">
						<?php 
						if (!empty($_SESSION["general"])) {
							echo $_SESSION["general"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="container-fluid table-responsive full slim">
			<table class="table mx-auto">
				<thead>
					<tr class="row slim">					  
						<th class="col-12 ta med2">TROOPS</th>						
					</tr>
				</thead>
			</table>
		</div>
		<div class="wrap">
			<div class="container-fluid table-responsive fourth float">
				<table class="table">
					<thead>
						<tr class="row">

							<th class="col ta dark" scope="col">TANKS 
							<?php 
						if (!empty($_SESSION["tankTotalTroops"])) {
							echo "( x".$_SESSION["tankTotalTroops"]." )";;    
						};
						?>	
							</th>

						</tr>
					</thead>
					<tbody>

						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total RSS cost</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["tankTotalRssCost"])) {
							echo $_SESSION["tankTotalRssCost"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
							</td>
						</tr>
						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total Time</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["tankTotalTimeTaken"])) {
							echo $_SESSION["tankTotalTimeTaken"];    
						} else {  
							echo "Not entered";
							};
						?>
							</td>
						</tr>
						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total batches</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["tankTotalBatches"])) {
							echo $_SESSION["tankTotalBatches"];} else {  
								echo "Not entered";
								};
						?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="container-fluid table-responsive fourth float">
				<table class="table">
					<thead>
						<tr class="row">

							<th class="col ta dark" scope="col">ANTI-TANK 							<?php 
						if (!empty($_SESSION["antiTotalTroops"])) {
							echo "( x".$_SESSION["antiTotalTroops"]." )";    
						};
						?>
							</th>

						</tr>
					</thead>
					<tbody>

						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total RSS cost</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["antiTotalRssCost"])) {
							echo $_SESSION["antiTotalRssCost"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
							</td>
						</tr>
						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total time</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["antiTotalTimeTaken"])) {
							echo $_SESSION["antiTotalTimeTaken"];    
						} else {  
							echo "Not entered";
							};
						?>
							</td>
						</tr>
						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total batches</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["antiTotalBatches"])) {
							echo $_SESSION["antiTotalBatches"];} else {  
								echo "Not entered";
								};
						?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="container-fluid table-responsive fourth float">
				<table class="table">
					<thead>
						<tr class="row">

							<th class="col ta dark" scope="col">INFANTRY 							<?php 
						if (!empty($_SESSION["infTotalTroops"])) {
							echo "( x".$_SESSION["infTotalTroops"]." )";    
						};
						?></th>

						</tr>
					</thead>
					<tbody>

						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total RSS cost</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["infTotalRssCost"])) {
							echo $_SESSION["infTotalRssCost"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
							</td>
						</tr>
						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total time</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["infTotalTimeTaken"])) {
							echo $_SESSION["infTotalTimeTaken"];    
						} else {  
							echo "Not entered";
							};
						?>
							</td>
						</tr>
						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total batches</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["infTotalBatches"])) {
							echo $_SESSION["infTotalBatches"];} else {  
								echo "Not entered";
								};
						?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="container-fluid table-responsive fourth float">
				<table class="table">
					<thead>
						<tr class="row">

							<th class="col ta dark" scope="col">ARTILLERY
							<?php 
						if (!empty($_SESSION["artTotalTroops"])) {
							echo "( x".$_SESSION["artTotalTroops"]." )";    
						};
						?>
							</th>

						</tr>
					</thead>
					<tbody>

						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total RSS cost</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["artTotalRssCost"])) {
							echo $_SESSION["artTotalRssCost"];    
						} else {  
							echo "Not entered";
							}; 
						?>	
							</td>
						</tr>
						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total time</th>
							<td class="col ta lite">
							<?php 
						if (!empty($_SESSION["artTotalTimeTaken"])) {
							echo $_SESSION["artTotalTimeTaken"];    
						} else {  
							echo "Not entered";
							};
						?>
							</td>
						</tr>
						<tr class="row">
							<th class="col- col-md-5 ta med" scope="row">Total batches</th>
							<td class="col ta lite">							<?php 
						if (!empty($_SESSION["artTotalBatches"])) {
							echo $_SESSION["artTotalBatches"];} else {  
								echo "Not entered";
								};
						?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
		
		
		

	
	</div>

	<!-- jQuery first, then Popper.js, then Bootstrap JS *NOTE* all plugins depend on jQuery (this means jQuery must be included before the plugin files -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-31DFNC9NYP"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-31DFNC9NYP');
	</script>
</body>

</html>