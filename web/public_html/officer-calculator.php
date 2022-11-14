<?php 
session_start();
?>
<!DOCTYPE html>
<!--[if lte IE 7 ]><html lang="en" class="ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Officer Calculator</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> <!--THIS CSS FILE HAS TO BE FIRST--> 
    

	<style>

		
		#logo
		{
			width:3.5em;
		}
		
		/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button 
		{
		  -webkit-appearance: none;
		  margin: 0;
		}

		/* Firefox */
		input[type=number] 
		{
		  -moz-appearance: textfield;
		}

		@media (max-width: 360.98px)/*motoG4 GalaxyS5 iphone5/SE*/
		{

			.menuImg
			{
				height: 2em;
			}
			#logo
			{
				background-color:whitesmoke; 
			}
			#conDiv
			{
				position: relative;
				top:-0.5em;
			}
			.tweak
			{
				position: relative;
				top:-1.5em;

			}
			#nextLink
			{

				position: relative;
				float: right;

				left:-0.2em;
				font-size: 1.2em
			}
			#tableFix
			{

				width:95vw;

			}
		}
		@media (min-width: 361px) and (max-width: 375.98px)/*iphone X and 7/8/9*/

		{
			.phew1
			{
				position: relative;
				top:0.5em;
				left:1em;
			}
			.phew2
			{
				position: relative;
				top:0.2em !important;
				left:1em;
			}
			.aL
			{
				text-align: left;
			}
			.down
			{
				position: relative;
				top:0.135em;
			}
			.down2
			{
				position: relative;
				top:0.85em !important;
				left:1em !important;
				
			}

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
				padding:0;
			}
			#banner
			{
				/*background-color: rgba(59, 43, 56, 0.95) !important;*/
				background-color: rgba(59, 43, 56, 1) !important;
				padding:0;
				z-index:670;
				padding-left: 0.5em;		
			}
			#logo
			{
				background-color:whitesmoke; 
				width:2.5em;	
			}

			#wall
			{
				background-color: rgba(59, 43, 56, 0.63);
			}
			#priority
			{
				position: relative;
				top:-0.4em;
				/*background-color: rgba(59, 43, 56, 0.95);*/
				background-color: rgba(69,54,66, 0.96) !important;
				height: 3.7em;
				z-index:669;
				width:100vw;
				left:-0.1em;
			}
			.xpTotal
			{
				font-size: 1.4em;
			}
			.apTotal
			{
				font-size: 1.4em;
			}

			#menuButts
			{
				position: relative;
				top:-0.4em;	
			}
			.formButts
			{
				padding:0;
				height:2.4em !important;
				position: relative;
			}
			.menuImg
			{
				display: none;
			}
			#intro
			{
				position: absolute;
				text-align: center;
				background-color: aqua;
				width:100%;
				height:20vh;
				top:20vh;
			}
			#xpFormButton
			{
				height: 3.4em;
				background-image: url(images/xp.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#apFormButton
			{
				height: 3.4em;
				background-image: url(images/ap.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#levelUpFormButton
			{
				height: 3.4em;
				background-image: url(images/levelUp.png);
				background-size: contain;
				background-repeat:no-repeat; 
				background-position: center;
			}

			.card-title
			{
				position: relative;
				top:0.5em;
			}
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 1) !important;
				position: relative;
				top:-1.2em;
			}
			#conDiv
			{
				width:100vw;
				height:78vh;
				position: relative;
				top:-0.5em;
				background-color: rgba(59, 43, 56, 0.63) !important;
				color:aliceblue;
			}
			.form-group
			{
				padding: 0 0 1em 0;
				margin-bottom: 0.2em;
				position: relative;
			}
			.tweak
			{
				position: relative;
				top:-0.5em;
			}
			.tweak2
			{
				position: relative;
				top:-1.5em;
			}
			.totalDiv
			{
				position: relative;
				top:-0.6em;
				left:0.5em; 
			}
			.col-form-label
			{
				text-align: left;
				height: 1.5em;
				position: relative;
				top:-0.1em;
			}

			#nextButt
			{
				position: relative;
				top:-5em !important;
			}
			.form-control
			{
				height: 1.7em;
				position: relative;
			}

			#xpTab
			{
				background-color:rgba(255, 255, 255, 0.6); 
			}
			#apTab
			{
				background-color:rgba(255, 255, 255, 0.6);			
			}

			.col-form-label
			{
				text-align:center;
			}
			#nextLink
			{

				position: absolute;
				bottom:0;
				right:0;
				font-size: 1.1em;
				padding:0 0 0.4em 0;
				background-color: aqua;
			}

			li:hover
			{
				background-color:rgba(255, 255, 255, 0.5);
			}
			li:target
			{
				background-color:rgba(255, 255, 255, 0.5);
			}


		}
		@media (min-width: 410px) and (max-width: 767.98px) /*Pixel2 Pixel2XL iphone6/7/8PLUS   */
		{  
			.phew1
			{
				position: relative;
				top:0.5em;
				left:1em;
			}
			.phew2
			{
				position: relative;
				top:0.2em !important;
				left:1em;
			}
			.aL
			{
				text-align: left;
			}
			.down
			{
				position: relative;
				top:0.135em;
			}
			.down2
			{
				position: relative;
				top:0.85em !important;
				left:1em !important;
				
			}

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
				padding:0;
			}
			#banner
			{
				/*background-color: rgba(59, 43, 56, 0.95) !important;*/
				background-color: rgba(59, 43, 56, 1) !important;
				padding:0;
				z-index:670;
				padding-left: 0.5em;		
			}
			#logo
			{
				background-color:whitesmoke; 
				width:2.5em;	
			}

			#wall
			{
				background-color: rgba(59, 43, 56, 0.63);
			}
			#priority
			{
				position: relative;
				top:-0.4em;
				/*background-color: rgba(59, 43, 56, 0.95);*/
				background-color: rgba(69,54,66, 0.96) !important;
				height: 3.7em;
				z-index:669;
				width:100vw;
				margin-left:-0.2em;
				left:0.15em;
				
			}
			.xpTotal
			{
				font-size: 1.4em;
			}
			.apTotal
			{
				font-size: 1.4em;
			}

			#menuButts
			{
				position: relative;
				top:-0.4em;	
			}
			.formButts
			{
				padding:0;
				height:2.4em !important;
				position: relative;
			}
			.menuImg
			{
				display: none;
			}
			#intro
			{
				position: absolute;
				text-align: center;
				background-color: aqua;
				width:100%;
				height:20vh;
				top:20vh;
			}
			#xpFormButton
			{
				height: 3.4em;
				background-image: url(images/xp.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#apFormButton
			{
				height: 3.4em;
				background-image: url(images/ap.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#levelUpFormButton
			{
				height: 3.4em;
				background-image: url(images/levelUp.png);
				background-size: contain;
				background-repeat:no-repeat; 
				background-position: center;
			}

			.card-title
			{
				position: relative;
				top:0.5em;
			}
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 1) !important;
				position: relative;
				top:-1.2em;
			}
			#conDiv
			{
				width:100vw;
				height:78vh;
				position: relative;
				top:-0.5em;
				background-color: rgba(59, 43, 56, 0.63) !important;
				color:aliceblue;
			}
			.form-group
			{
				padding: 0 0 1em 0;
				margin-bottom: 0.2em;
				position: relative;
			}
			.tweak
			{
				position: relative;
				top:-0.5em;
			}
			.tweak2
			{
				position: relative;
				top:-1.5em;
			}
			.totalDiv
			{
				position: relative;
				top:-0.6em;
				left:0.5em; 
			}
			.col-form-label
			{
				text-align: left;
				height: 1.5em;
				position: relative;
				top:-0.1em;
			}

			#nextButt
			{
				position: relative;
				top:-5em !important;
			}
			.form-control
			{
				height: 1.7em;
				position: relative;
			}

			#xpTab
			{
				background-color:rgba(255, 255, 255, 0.6); 
			}
			#apTab
			{
				background-color:rgba(255, 255, 255, 0.6);			
			}

			.col-form-label
			{
				text-align:center;
			}
			#nextLink
			{

				position: absolute;
				bottom:0;
				right:0;
				font-size: 1.1em;
				padding:0 0 0.4em 0;
				background-color: aqua;
			}

			li:hover
			{
				background-color:rgba(255, 255, 255, 0.5);
			}
			li:target
			{
				background-color:rgba(255, 255, 255, 0.5);
			}

		}
		@media (min-width: 768px) and (max-width: 900px)/*iPad*/

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
			.repel
			{
				margin-right:4em;
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
				z-index:670;
			}
			#priority
			{
				background-color: rgba(69,54,66, 0.76) !important;
				position: relative;
				top:-1em;
				z-index:669;
				margin-left:-0.5em;
				margin-right:-0.5em;
			}
			#logo
			{
				width:3.5em;
			}

			.menuImg
			{
				height:4em;
			}

			#wall
			{
				background-image:url(images/linda.png), url(images/linda.png);
				background-repeat: no-repeat, no-repeat;
				background-position: left, right;
				background-size: contain, contain;
				background-color: rgba(59, 43, 56, 0.63);
				height: 92vh;
			}

			.card-title
			{
				padding-top: 0.5em;
			}

			#conDiv
			{
				position: relative;
				top:-1.2em;
				width:50vw;
			}

			.tweak
			{

			}
			.form-group
			{
				height: 2em;	
			}
			.total
			{
				height: 1.5em;
				position: relative;

				left:0.7em;
				border-radius: 0.2em;
			}
			.totalDiv
			{

				text-align: center;
			}
			.green
			{
				background-color: green;


			}
			.tab-pane
			{
				position: relative;
				top:-1.1em;
				padding-bottom: 1em;
			}
			.down2
			{
				position: relative;
				left:4em;
			}
			#next
			{
				width:5em;
				height:5em;
				position:absolute;
				right:10em;
				bottom: 0;
			}
			#nextButt
			{
				width:10em;
				height:5em;
				position:absolute;
				right:-20em;
				bottom: 35vh;
				background-color:rgba(255, 255, 255, 0.5); 
			}
			#prev
			{
				width:10em;
				height:10em;
				position:absolute;
				left: -10em;
				bottom: 35vh;
			}
			#xpTab
			{
				background-color:rgba(255, 255, 255, 0.5); 
			}
			.xpInput
			{
				height:2em;
			}
			#apTab
			{
				background-color:rgba(255, 255, 255, 0.5);
			}
			.apInput
			{
				height:2em;
			}
			#officerTab
			{
				background-color:rgba(255, 255, 255, 0.5);
				height:65vh;
			}
			.officerInput
			{
				height:2em;
			}
			#energyTab
			{
				background-color:rgba(255, 255, 255, 0.5);
			}
			.energyInput
			{
				height:2em;
			}
			.col-form-label
			{
				text-align:center;
			}

			.total
			{
				font-size: 1.4em;
			}
			#nextLink
			{

				position: absolute;
				bottom:0;
				right:0;
				font-size: 1.2em;
				padding:0 0.2em 0.2em 0;
				background-color: rgba(59, 43, 56, 0.85);

			}
			li:hover
			{
				background-color:rgba(255, 255, 255, 0.5);
			}
			li:target
			{
				background-color:rgba(255, 255, 255, 0.5);
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
			.repel
			{
				margin-right:4em;
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
				z-index:670;
			}
			#priority
			{
				background-color: rgba(69,54,66, 0.76) !important;
				position: relative;
				top:-1em;
				z-index:669;
				margin-left:-0.5em;
				margin-right:-0.5em;
			}
			#logo
			{
				width:3.5em;
			}

			.menuImg
			{
				height:4em;
			}

			#wall
			{
				background-image:url(images/linda.png), url(images/linda.png);
				background-repeat: no-repeat, no-repeat;
				background-position: left, right;
				background-size: contain, contain;
				background-color: rgba(59, 43, 56, 0.63);
				height: 92vh;
			}

			.card-title
			{
				padding-top: 0.5em;
			}

			#conDiv
			{
				position: relative;
				top:-1.2em;
				width:50vw;
			}

			.tweak
			{

			}
			.form-group
			{
				height: 2em;	
			}
			.total
			{
				height: 1.5em;
				position: relative;

				left:0.7em;
				border-radius: 0.2em;
			}
			.totalDiv
			{

				text-align: center;
			}
			.green
			{
				background-color: green;


			}
			.tab-pane
			{
				position: relative;
				top:-1.1em;
				padding-bottom: 1em;
			}
			.down2
			{
				position: relative;
				left:4em;
			}
			#next
			{
				width:5em;
				height:5em;
				position:absolute;
				right:10em;
				bottom: 0;
			}
			#nextButt
			{
				width:10em;
				height:5em;
				position:absolute;
				right:-20em;
				bottom: 35vh;
				background-color:rgba(255, 255, 255, 0.5); 
			}
			#prev
			{
				width:10em;
				height:10em;
				position:absolute;
				left: -10em;
				bottom: 35vh;
			}
			#xpTab
			{
				background-color:rgba(255, 255, 255, 0.5); 
			}
			.xpInput
			{
				height:2em;
			}
			#apTab
			{
				background-color:rgba(255, 255, 255, 0.5);
			}
			.apInput
			{
				height:2em;
			}
			#officerTab
			{
				background-color:rgba(255, 255, 255, 0.5);
				height:65vh;
			}
			.officerInput
			{
				height:2em;
			}
			#energyTab
			{
				background-color:rgba(255, 255, 255, 0.5);
			}
			.energyInput
			{
				height:2em;
			}
			.col-form-label
			{
				text-align:center;
			}

			.total
			{
				font-size: 1.4em;
			}
			#nextLink
			{

				position: absolute;
				bottom:0;
				right:0;
				font-size: 1.2em;
				padding:0 0.2em 0.2em 0;
				background-color: rgba(59, 43, 56, 0.85);

			}
			li:hover
			{
				background-color:rgba(255, 255, 255, 0.5);
			}
			li:target
			{
				background-color:rgba(255, 255, 255, 0.5);
			}

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
						<li class="nav-item repel">
							<a class="nav-link" href="sum.php">Summary</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="#wrapper">AP/XP/Officer Calculator</a>
						</li>
					</ul>
				</div>

			</div><!--#menu closing tag-->
		</nav>
		<form method="post" action="sessions.php" id="form">

			<div id="wall" class="card text-center">
				<div id="priority" class="card-header">

					<ul id="menuButts" class="row nav nav-tabs card-header-tabs ">
						
						<li class="nav-item col col-sm-4">
							<a id="apFormButton" class="nav-link active" data-toggle="tab" href="#apTab">
								<img class="menuImg" src="images/ap.png" alt="AP">
							</a>
						</li>

						<li class="nav-item active col col-sm-4">
							<a id="xpFormButton" class="nav-link" data-toggle="tab" href="#xpTab">
								<img class="menuImg" src="images/xp.png" alt="XP">
							</a>
						</li>
						
						<li class="nav-item col col-sm-4">
							<a id="levelUpFormButton" class="nav-link" data-toggle="tab" href="#officerTab">
								<img class="menuImg" src="images/levelUp.png" alt="Level Up">
							</a>
						</li>
					</ul>

				</div><!--card-header closing tag-->
				<!--<div id="intro">instructions go here...</div>-->
				<div id="conDiv" class="tab-content card-body mx-auto">
				
					<div id="xpTab" class=" tab-pane fade in">
						<div id="xpForm" class="container-fluid">
							<div class="form-group row justify-content-center">
								<div class="card-title col"><h4>XP</h4></div>
							</div>
							<div class="tweak">
								<div class="form-group row">
									<label class="col-3 col-md-4 col-form-label" for="xpIn">100</label>
									<div class="col-4 col-md-3">
										<input class="xpInput form-control"  type="number" data-amt="100" id="xpIn">
									</div>
									<label id="xpTotal100" class="col-5 col-form-label">0</label> 
								</div>

								<div class="form-group row">
									<label class="col-3 col-md-4 col-form-label" for="xpIn2">500</label>
									<div class="col-4 col-md-3">
										<input class="xpInput form-control" type="number" data-amt="500" id="xpIn2">
									</div>
									<label id="xpTotal500" class="col-5 col-form-label">0</label> 
								</div>

								<div class="form-group row">
									<label class="col-3 col-md-4 col-form-label" for="xpIn3">1,000</label>
									<div class="col-4 col-md-3">
										<input class="xpInput form-control" type="number" data-amt="1000" id="xpIn3">
									</div>
									<label id="xpTotal1000" class="col-5 col-form-label">0</label> 
								</div>

								<div class="form-group row">
									<label class="col-3 col-md-4 col-form-label" for="xpIn4">5,000</label>
									<div class="col-4 col-md-3">
										<input class="xpInput form-control" type="number" data-amt="5000" id="xpIn4">
									</div>
									<label id="xpTotal5000" class="col-5 col-form-label">0</label>
								</div>

								<div class="form-group row">
									<label class="col-3 col-md-4 col-form-label" for="xpIn5">10,000</label>
									<div class="col-4 col-md-3">
										<input class="xpInput form-control" type="number" data-amt="10000" id="xpIn5">
									</div>
									<label id="xpTotal10000" class="col-5 col-form-label">0</label>
								</div>

								<div class="form-group row">
									<label class="col-3 col-md-4 col-form-label " for="xpIn6">20,000</label>
									<div class="col-4 col-md-3">
										<input data-amt="20000" class="xpInput form-control" type="number" id="xpIn6">
									</div>
									<label id="xpTotal20000" class="col-5 col-form-label">0</label>
								</div>

								<div class="form-group row">
									<label class="col-3 col-md-4 col-form-label " for="xpIn7">50,000</label>
									<div class="col-4 col-md-3">
										<input class="xpInput form-control" type="number" data-amt="50000" id="xpIn7">
									</div>
									<label id="xpTotal50000" class="col-5 col-form-label">0</label> 
								</div>
								
								<div class="totalDiv form-group row down2">
									
										<h4 class ="col-4 form-text down">Total:</h4>
										<p class="col-8 col-md-6  total form-text xpTotal" id="xpTotal">0</p>
								</div>
								
							</div>
						</div>
					</div>
					<div id="apTab" class=" tab-pane fade in active show">
						<div id="apForm" class="container-fluid">
							<div class="form-group row justify-content-center">
								<div class="card-title col"><h4>AP</h4></div>
							</div>
							<div class="tweak">
								<div class="form-group row">
									<label class="col-4 col-form-label" for="apIn">20</label>
									<div class="col-4 col-lg-3">
										<input class="apInput form-control"  type="number" data-amt="20" id="apIn">
									</div>
									<label id="apTotal20" class="col-4 col-lg-5 col-form-label">0</label> 
								</div>

								<div class="form-group row">
									<label class="col-4 col-form-label" for="apIn2">50</label>
									<div class="col-4 col-lg-3">
										<input class="apInput form-control" type="number" data-amt="50" id="apIn2">
									</div>
									<label id="apTotal50" class="col-4 col-lg-5 col-form-label">0</label> 
								</div>

								<div class="form-group row">
									<label class="col-4 col-form-label" for="apIn3">100</label>
									<div class="col-4 col-lg-3">
										<input class="apInput form-control" type="number" data-amt="100" id="apIn3">
									</div>
									<label id="apTotal100" class="col-4 col-lg-5 col-form-label">0</label> 
								</div>

								<div class="form-group row">
									<label class="col-4 col-form-label" for="apIn4">500</label>
									<div class="col-4 col-lg-3">
										<input class="apInput form-control" type="number" data-amt="500" id="apIn4">
									</div>
									<label id="apTotal500" class="col-4 col-lg-5 col-form-label">0</label>
								</div>
								
								<div class="form-group row totalDiv down2">
									<h4 class ="col-4 form-text down">Total:</h4>
									<p class="col-6 total form-text apTotal" id="apTotal">0</p>
								</div>
							</div>
						</div>
					</div>
					<div id="officerTab" class=" tab-pane fade in ">
						<div id="officerForm" class="container-fluid">
							<div class="form-group row justify-content-center">
								<div class="card-title col"><h4>Level Officer</h4></div>
							</div>
							<div class="tweak tweak2">
								<p>Please enter the applicable officer levels:</p>
								<div class="form-group row">
									<label class="col-auto col-md-4 col-form-label" for="levelStart">Current Level (1-59):</label>
									<div class="col-3 col-md-2">
										<input class="officerInput form-control aL"  type="number" value="1" id="levelStart">
										
									</div>
									<p class="col- col-md-auto col-form-label">and</p>
									<input class="col-4 col-md-3 officerInput form-control aL phew1"  type="number" value="0" maxlength="7" id="currentProgress">
									<p class="col-auto col-md-1 col-form-label phew2">XP</p>
								</div>

								<div class="form-group row">
									<label class="col-auto col-md-4 col-form-label" for="levelStop">Desired Level (2-60):</label>
									<div class="col-3 col-md-2">
										<input class="officerInput form-control" type="number" value="60" id="levelStop">
									</div>
									
								</div>

								<div class="form-group row">
									<label class="col-auto col-md-5 col-form-label" for="officerIn3">Officer Rarity:</label>
								<div class="col-7 col-lg-3 rarityOptions">
									<label class="radio-inline"><input type="radio" id="blue" name="optradio">Blue</label>
									<label class="radio-inline"><input type="radio" id="purple" name="optradio" checked>Purple</label>
									<label class="radio-inline"><input type="radio" id="gold" name="optradio">Gold</label>
								</div>
								</div>
								
								<div class="form-group row totalDiv">
									<h6 class ="col-5 col-form-label form-text">Your XP:</h6>
									<p class="col-7 total form-text" id="yourXP">0</p>
									<h6 class ="col-5 col-form-label form-text">Total XP Req:</h6>
									<p class="col-7 total form-text officerTotal" id="reqXP" >0</p>
									<h6 class ="col-5 col-form-label form-text">XP needed:</h6>
									<p class="col-7 total form-text" id="resultXP">0</p>
								</div>
							</div>
						</div>
                    </div>
					
				</div><!--Card-body closing tag-->
				 
			</div><!--Card/Wall closing tag-->
			<input type="hidden" class="xpTotal" name="xp">
			<input type="hidden" class="apTotal" name="ap">
			<input type="hidden" class="currentTotal" name="current">
			<input type="hidden" value="0" class="reqTotal" name="req">
		</form><!--Form div closing tag-->


	</div>

	


	<!-- jQuery first, then Popper.js, then Bootstrap JS *NOTE* all plugins depend on jQuery (this means jQuery must be included before the plugin files -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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
    
    
    <script>
$(document).ready(function(){
	return totalxpReq(), calculateXP();
})

function formatNumber(num) {

    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};

    var xpDict = {
		"XP100": 0,
		"XP500": 0,
		"XP1000": 0,
		"XP5000": 0,
		"XP10000": 0,
		"XP20000": 0,
		"XP50000": 0
	};

	function updatexpTotal() {
		total = 0;
		for(var key in xpDict) {
			var inputValue = xpDict[key];
			var labelValue = key.slice(2);
			var totalValue = inputValue * labelValue;
            $("#xpTotal" + labelValue).text(formatNumber(totalValue))
			total += totalValue;
			xpTotal = total;
	};
	total = (total);
	$("#yourXP").text(formatNumber(total));
	$("#xpTotal").text(formatNumber(total));
	$(".xpTotal").val(total);
	return totalxpReq(), calculateXP();

	};

	$(".xpInput").keyup(function() {

		var inputValue = $(this).val();
		var labelValue = $(this).attr("data-amt");
		xpDict["XP"+labelValue] = inputValue
		return updatexpTotal();

	});
		
    var apDict = {
    "AP20": 0,
    "AP50": 0,
    "AP100": 0,
    "AP500": 0
	};

function updateapTotal() {
    total = 0;
    for(var key in apDict) {
        var inputValue = apDict[key];
        var labelValue = key.slice(2);
        var totalValue = inputValue * labelValue;
        $("#apTotal" + labelValue).text(formatNumber(totalValue))
        total += totalValue;
		apTotal = total		
};
	total = formatNumber(total);
	$("#apTotal").text(total);
	$(".apTotal").val(total);

};

$(".apInput").keyup(function() {

    var inputValue = $(this).val();
    var labelValue = $(this).attr("data-amt");
    apDict["AP"+labelValue] = inputValue
    return updateapTotal();
});


var	blueLevels = [0,80,240,480,800,2400,4800,7200,9600,12000,14800,18000,21600,25600,30000,34800,40000,45200,50400,56000,60000,64000,68800,73600,78400,84000,89600,95200,100800,108000,120000,136000,156000,180000,208000,240000,276000,316000,360000,440000,540000,640000,760000,880000,1020000,1160000,1320000,1480000,1680000,1880000,2120000,2360000,2650000,2940000,3290000,3640000,4060000,4480000,4980000,5480000];
var	purpleLevels = [0,100,300,600,1000,3000,6000,9000,12000,15000,18500,22500,27000,32000,37500,43500,50000,56500,63000,70000,75000,80000,86000,92000,98000,105000,112000,119000,126000,135000,150000,170000,195000,225000,260000,300000,345000,395000,450000,550000,675000,800000,950000,1100000,1275000,1450000,1650000,1850000,2100000,2350000,2650000,2950000,3312000,3675000,4112000,4550000,5075000,5600000,6250000,6850000];
var goldLevels = [0,120,360,720,1200,3600,7200,10800,14700,18000,22200,27000,32400,38400,45000,52200,60000,67800,75600,84000,90000,96000,103200,110400,117600,126000,134400,142800,151200,162000,180000,204000,234000,270000,312000,360000,414000,474000,540000,660000,810000,960000,1140000,1320000,1530000,1740000,1980000,2220000,2520000,2820000,3180000,3540000,3975000,4140000,4935000,5460000,6090000,6720000,7470000,8220000];

	var selectedRarity = purpleLevels;

	$(".rarityOptions").change(function(){
		if ($('#blue').is(':checked')) {
			selectedRarity = blueLevels;
		} else if ($('#purple').is(':checked')) {
			selectedRarity = purpleLevels;
		} else if ($('#gold').is(':checked')) {
			selectedRarity = goldLevels;
		};
		return totalxpReq();
	});

	function totalxpReq() {
		total = 0;
		start = $("#levelStart").val();
		stop = $("#levelStop").val()-1;
		selectedRarity.forEach(function(n,i){
			if (start <= i && i <= stop) {
				total += n;
			};
		});
		total -= $("#currentProgress").val()
		$("#reqXP").text(formatNumber(total));
		$(".reqTotal").val(total);
		return calculateXP();
};

	function calculateXP() {
		current = $(".xpTotal").val();
		required =  $(".reqTotal").val();
		result = "";
		if (current == required) {
			result = "You have exactly enough XP for this";
		} else if ( current > required) {
			result = formatNumber(current - required) + "XP leftover";
		} else if (current < required) {
			result = formatNumber(required - current) + " XP still required";}
		$("#resultXP").text(result);
	};

	$("#currentProgress").on('keyup', function(){
		if ($("#currentProgress").val() >= 8220000) {
			$("#currentProgress").val(8219999)};
		return totalxpReq(), calculateXP();
	})

	$("#levelStart").on('focusout change', function() {
		if ($("#levelStart").val() <= 0) {
			$("#levelStart").val(1)
		};
		if ($("#levelStart").val() >= 60) {
			$("#levelStart").val(59)
		};
		return totalxpReq(), calculateXP();
	})
	$("#levelStop").on('focusout change', function() {
		if ($("#levelStop").val() <= 1) {
			$("#levelStop").val(2)
		};
		if ($("#levelStop").val() >= 61) {
			$("#levelStop").val(60)
		};
		if ($("#levelStop").val() <= $("#levelStart").val()) {
			$("#levelStart").val($("#levelStop").val()-1)
		};
		return totalxpReq(), calculateXP();
	})
	$("#levelStart").keyup(function(){
		return totalxpReq(), calculateXP();
	})
	$("#levelStop").keyup(function(){
		return totalxpReq(), calculateXP();
	})

</script>

    

	</body>

</html>