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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

	<title>Troop Calculator</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> <!--THIS CSS FILE HAS TO BE FIRST--> 
    

	<style>
	#tankRssCostFood, #tankRssCostSteel, #tankRssCostOil, #tankRssCostEnergy,#antiRssCostFood, #antiRssCostSteel, #antiRssCostOil, #antiRssCostEnergy,#infRssCostFood, #infRssCostSteel, #infRssCostOil, #infRssCostEnergy,#artRssCostFood, #artRssCostSteel, #artRssCostOil, #artRssCostEnergy {
		display: none;
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
		
		#logo
		{
			width:3.5em;
		}

		#tankTotalTimeCost:empty:before 
		{
			content: '0 D: 0 H: 0 M: 0 s';
		}
		.antiT1Input 
		{
			display: none;
		}
		@media (min-width: 361px) and (max-width: 375.98px)/*iphone X and 7/8/9*/

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
				/*background-color: rgba(59, 43, 56, 0.95) !important;*/
				background-color: rgba(59, 43, 56, 1) !important;
				padding:0 0 0 1em;

			}

			#logo
			{
				width:2em;
			}

			#wall
			{
				background-color: rgba(59, 43, 56, 0.63);
				position: relative;
				top:-0.2em;
			}

			#priority
			{
				position: relative;
				top:0.1em;
				left:-0.1em;
				/*background-color: rgba(59, 43, 56, 0.95);*/
				background-color: rgba(69,54,66, 0.96) !important;
				height: 3em;
				width:100vw !important;	

			}
			#menuButts
			{
				position: relative;
				top:-0.8em;	

			}
			.formButts
			{
				padding:0;
				height:2.2em !important;
				position: relative;
			}
			.navCol
			{
				background-color: rgba(59, 43, 56, 1) !important;
			}

			.menuImg
			{

				display:none;

			}
			.menuLabel
			{
				display:none;
			}

				#tankFormButton
			{
				height: 3em;
				background-image: url(images/tank.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#antiFormButton
			{
				height: 3em;
				background-image: url(images/anti.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#infFormButton
			{
				height: 3em;
				background-image: url(images/infantry.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#artFormButton
			{
				height: 3em;
				background-image: url(images/artillery.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			h4
			{
				font-size: 1.9em;
				position: relative;
				top:-0.2em;
			}
			.alignLeft
			{
				text-align: left;
				position: relative;
				left:-1em;
			}
			.prodShift
			{
				position: relative;
				left:-1.65em;
				top:-0.1em;
			}
			.prodShift2
			{
				position: relative;
				left:-1em;
				top:-0.1em;
			}
			.move
			{
				position: relative;
				left:1em !important;
				top:-1.2em;
			}
			#conDiv
			{
				color:aliceblue;
				height: 100vh !important;
			}
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 1) !important;
				position: relative;
				top:-1.3em;
				height:70vh;
				font-size: 0.9em;
				padding-top:0.5em;
				padding-bottom: 0;

			}
			.tweak
			{
				position: relative;
				top:-2.5em;	
			}
			.move2
			{
				position: relative;
				left:-1em;
			}
			.alignLeft2
			{
				text-align: left;
				position: relative;
				left:0.5em;
			}
			.test
			{
				font-size: 0.5em;
			}

			.foodMove
			{
				position: relative;
				left:-3em;
			}

			.up
			{
				position: relative;
				top: -3.3em;
				left:70vw;
			}
			.rounded
			{
				height:2em;
			}
			.up2
			{
				position: relative;
				top:-0.25em;
			}
			.reAl
			{
				position: relative;
				top:-1.5em;
			}
			.left
			{
				position: relative;
				left:-1em;
			}
			.rssTotals
			{
				position: relative;
				top:-1em;
			}
			.rssShift
			{
				position: relative;
				top:-2.6em;
			}
			.timeShift
			{
				position: relative;
				top:-5.7em;
			}
			.oneMore
			{
				position: relative;
				top:-1em;
			}
			#nextLink
			{
				position:absolute;
				bottom:10.5em;
				left:6em;

			}

		}
		@media (min-width: 410px) and (max-width: 767.98px) /*Pixel2 Pixel2XL iphone6/7/8PLUS   */
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
				/*background-color: rgba(59, 43, 56, 0.95) !important;*/
				background-color: rgba(59, 43, 56, 1) !important;
				padding:0 0 0 1em;

			}

			#logo
			{
				width:2em;
			}

			#wall
			{
				background-color: rgba(59, 43, 56, 0.63);
				position: relative;
				top:-0.2em;
			}

			#priority
			{
				position: relative;
				top:0.1em;
				left:-0.1em;
				/*background-color: rgba(59, 43, 56, 0.95);*/
				background-color: rgba(69,54,66, 0.96) !important;
				height: 3em;
				width:101vw !important;	

			}
			#menuButts
			{
				position: relative;
				top:-0.8em;	

			}
			.formButts
			{
				padding:0;
				height:2.2em !important;
				position: relative;
			}
			.navCol
			{
				background-color: rgba(59, 43, 56, 1) !important;
			}

			.menuImg
			{

				display:none;

			}
			.menuLabel
			{
				display:none;
			}

				#tankFormButton
			{
				height: 3em;
				background-image: url(images/tank.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#antiFormButton
			{
				height: 3em;
				background-image: url(images/anti.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#infFormButton
			{
				height: 3em;
				background-image: url(images/infantry.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#artFormButton
			{
				height: 3em;
				background-image: url(images/artillery.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			h4
			{
				font-size: 1.9em;
				position: relative;
				top:-0.2em;
			}
			.alignLeft
			{
				text-align: left;
				position: relative;
				left:-1em;
			}
			.prodShift
			{
				position: relative;
				left:-1.65em;
				top:-0.1em;
			}
			.prodShift2
			{
				position: relative;
				left:-1em;
				top:-0.1em;
			}
			.move
			{
				position: relative;
				left:1em !important;
				top:-1.2em;
			}
			#conDiv
			{
				color:aliceblue;
				height: 100vh !important;
			}
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 1) !important;
				position: relative;
				top:-1.3em;
				height:70vh;
				font-size: 0.9em;
				padding-top:0.5em;
				padding-bottom: 0;

			}
			.tweak
			{
				position: relative;
				top:-2.5em;	
			}
			.move2
			{
				position: relative;
				left:-1em;
			}
			.alignLeft2
			{
				text-align: left;
				position: relative;
				left:0.5em;
			}
			.test
			{
				font-size: 0.5em;
			}

			.foodMove
			{
				position: relative;
				left:-3em;
			}

			.up
			{
				position: relative;
				top: -3.3em;
				left:70vw;
			}
			.rounded
			{
				height:2em;
			}
			.up2
			{
				position: relative;
				top:-0.25em;
			}
			.reAl
			{
				position: relative;
				top:-1.5em;
			}
			.left
			{
				position: relative;
				left:-1em;
			}
			.rssTotals
			{
				position: relative;
				
			}
			.rssShift
			{
				position: relative;
				
			}
			.timeShift
			{
				position: relative;
				
			}
			.oneMore
			{
				position: relative;
				
			}
			#nextLink
			{
				position:absolute;
				bottom:10.5em;
				left:12em;

			}

		}
		@media (min-width: 768px) and (max-width: 900px)/*iPad*/

		{

			.aL
			{
				text-align: left;
			}
	
			body
			{
				height: 100vh;
				overflow: hidden;
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
			
			#logo
			{
				width:3.5em;
			}
		
			#priority
			{
				position: relative;
				top:-0.5em;
				/*background-color: rgba(59, 43, 56, 0.95);*/
				background-color: rgba(69,54,66, 0.96) !important;
				z-index:669;
				width:101vw;
				left:-0.5em;	
			}
		
			#wall
			{
				background-color: rgba(59, 43, 56, 0.63);
				height: 100vh;
			}
			.formButts
			{
				padding:0;
			}
			
			.menuImg
			{
				height:4.5em;
				position: relative;
				
			}
			
			.menuLabel
			{
				color: black;
				font-size: 1.3em;
				padding-bottom: 0;
			}
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 0.63);
				height:60vh;
				position: relative;
				top:-1.74em;
			}
			#conDiv
			{
				color:aliceblue;
			}
			.card-title
			{
				position: relative;
				top:0.5em;
			}
			.tweak
			{
				position: relative;
				top:-0.5em;
				left:8em;
				width:95%;
			}
			.prodShift
			{
				position: relative;
				left:-1em;
			}
			.prodShift2
			{
				position: relative;
				left:-1em;
			}
			.signpost
			{
				position: relative;
				top:-0.8em;
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
			.aL
			{
				text-align: left;
			}
	
			body
			{
				height: 100vh;
				overflow: hidden;
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
			
			#logo
			{
				width:3.5em;
			}
		
			#priority
			{
				position: relative;
				top:-0.5em;
				/*background-color: rgba(59, 43, 56, 0.95);*/
				background-color: rgba(69,54,66, 0.96) !important;
				z-index:669;
				width:101vw;
				left:-0.5em;	
			}
		
			#wall
			{
				background-color: rgba(59, 43, 56, 0.63);
				height: 100vh;
			}
			.formButts
			{
				padding:0;
			}
			
			.menuImg
			{
				height:4.5em;
				position: relative;
				
			}
			
			.menuLabel
			{
				color: black;
				font-size: 1.3em;
				padding-bottom: 0;
			}
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 0.63);
				height:60vh;
				position: relative;
				top:-1.74em;
			}
			#conDiv
			{
				color:aliceblue;
			}
			.card-title
			{
				position: relative;
				top:0.5em;
			}
			.tweak
			{
				position: relative;
				top:-0.5em;
				left:8em;
				width:95%;
			}
			.prodShift
			{
				position: relative;
				left:-1em;
			}
			.prodShift2
			{
				position: relative;
				left:-1em;
			}
			.signpost
			{
				position: relative;
				top:-0.8em;
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
            	<li>
                	<a class="nav-link" href="resource-calculator.php">Resource Calculator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="speedup-calculator.php">Speedup Calculator</a>
                </li>
                <li  class="nav-item active">
                    <a class="nav-link" href="#wrapper">Troop Calculator</a>
                </li>
				<li class="nav-item repel">
					<a class="nav-link" href="sum.php">Summary</a>
				</li>
				<li class="nav-item">
                    <a class="nav-link" href="officer-calculator.php">AP/XP/Officer Calculator</a>
                </li>
            </ul>
        </div>
   
	</div><!--#menu closing tag-->
</nav>
<div id="form">
   
	<div id="wall" class="card text-center">
    	<div id="priority" class="card-header container-fluid">
			
			<ul id="menuButts" class="row nav nav-tabs card-header-tabs ">
                        
				<li class="nav-item col col-sm-3 ">
					<a id="tankFormButton" class="nav-link navCol active" data-toggle="tab" href="#tankTab">
						<div class="col col-md-6 mx-auto">
							<img class="menuImg img-fluid" src="images/tank.png" alt="Tank">
							<span class="menuLabel">Tank</span>
						</div>
					</a>
				</li>
				<li class="nav-item col col-sm-3">
					<a id="antiFormButton" class="nav-link navCol" data-toggle="tab" href="#antiTab">
						<div class="col col-md-6 mx-auto">
							<img class="menuImg img-fluid" src="images/anti.png" alt="Anti-tank">
							<span class="menuLabel">Anti-Tank</span>
						</div>
					</a>
				</li>
				<li class="nav-item col col-sm-3">
					<a id="infFormButton" class="nav-link navCol" data-toggle="tab" href="#infTab">
						<div class="col col-md-6 mx-auto">
							<img class="menuImg img-fluid" src="images/infantry.png" alt="Infantry">
							<span class="menuLabel">Infantry</span>
						</div>
					</a>
				</li>

				<li class="nav-item col col-sm-3">
					<a id="artFormButton" class="nav-link navCol" data-toggle="tab" href="#artTab">
						<div class="col col-md-6 mx-auto">
							<img class="menuImg img-fluid" src="images/artillery.png" alt="Artillery">
							<span class="menuLabel">Artillery</span>
						</div>
					</a>
				</li>
			</ul>
			
		</div><!--card-header closing tag-->
        <!--<div id="intro">instructions go here...</div>-->
		<div id="conDiv" class="tab-content card-body mx-auto">
			<div id="tankTab" class=" tab-pane fade in active show">
				<div id="tankForm" class="container-fluid">
					<div class="form-group row justify-content-center">
						<div class="card-title col"><h4>Tanks</h4></div>
					</div>
					<div class="tweak">
						<div class="form-group row">
							<label class="col-auto col-md-2 col-form-label up2 aL" for="tankTroopLevel">Troop Level: </label>
							<select class="col-auto col-md-1 rounded" id="tankTroopLevel">
								<option value="T1">T1</option>
								<option value="T2">T2</option>
								<option value="T3">T3</option>
								<option value="T4" selected>T4</option>
								<option value="T5">T5</option>
							</select>
							
							<label class="col-auto col-md-2 col-form-label up2 " for="tankProdCap">Production Capacity: </label>
							<select class="col-auto col-md-1 rounded" id="tankProdCap">
								<option value="800" selected>800</option>
								<option value="900">900</option>
								<option value="1000">1000</option>
								<option value="1100">1100</option>
								<option value="1200">1200</option>
								<option value="1300">1300</option>
								<option value="1400">1400</option>
								<option value="1500">1500</option>
								<option value="1600">1600</option>
								<option value="1700">1700</option>
								<option value="2000">2000</option>
							  </select>
						</div>
						
						<div class="form-group row move">
							<label class="col- col-md-2 col-form-label alignLeft aL" for="tankProdTimeDays">Production Time: </label>
							
							<input class="tankProdTime col-2 col-md-1 rounded" id="tankProdTimeDays" type="number" value="0" data-secs="86400" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift">Days</label>
							<input class="tankProdTime col-2 col-md-1 rounded " id="tankProdTimeHours" type="number" value="0" data-secs="3600" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift ">Hours</label>
							<input class="tankProdTime col-2 col-md-1 rounded " id="tankProdTimeMins" type="number" value="0" data-secs="60" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift2">Minutes</label>
							<input class="tankProdTime col-2 col-md-1 rounded " id="tankProdTimeSecs" type="number" value="0" data-secs="1" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift2 ">Seconds</label>
							
						</div>
						
						<div class="form-group row reAl">
							<label class="col-8 col-md-2 col-form-label left aL" for="tankTroopsRequired">How many do you want?</label>
							<input class="col-4 col-md-1 rounded move2" id="tankTroopsRequired" type="number" value="0" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-8 col-md-2 col-form-label left" for="tankCurrentTroopCount">Already made (Optional)</label>
							<input class="col-4 col-md-1 rounded move2" id="tankCurrentTroopCount" type="number" value="0" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
						</div>
						
						<div class="form-group row totalDiv rssShift">
							<p class ="col-auto col-md-2 form-text aL">Total Cost:   </p>
							<p class="col-auto form-text rssTotals" id="tankTotalRssCost">Food: 0 Steel: 0 Oil: 0  Energy: 0</p>
						</div>
						<div class="form-group row totalDiv timeShift">
							<p class ="form-text col-auto">Total Time:</p>
							<p class="form-text" id="tankTotalTimeCost">0 D : 0 H : 0 M : 0 s</p>
							<p class ="form-text col-auto oneMore">No. of Batches:</p>
							<p class="form-text tankTotal oneMore" id="tankTotalBatches">0</p>
						</div>
						
						<div class="form-group row test">						
							<p class="col-auto col-md-1 col-form-label" id="tankRssCostFood">240000</p>
							<p class="col-auto col-md-1 col-form-label" id="tankRssCostSteel">240000</p>				
							<p class="col-1 col-md-1 col-form-label" id="tankRssCostOil">0</p>
							<p class="col-auto col-md-1 col-form-label up" id="tankRssCostEnergy">16000</p>
						</div>
						
					</div>
				</div>
			</div>
			
			<div id="antiTab" class="tab-pane fade in">
				<div id="antiForm" class="container-fluid">
					<div class="form-group row justify-content-center">
						<div class="card-title col"><h4>Anti-tanks</h4></div>
					</div>
					<div class="tweak">
						<div class="form-group row">
							<label class="col-auto col-md-2 col-form-label up2 aL" for="antiTroopLevel">Troop Level: </label>
							<select class="col-auto col-md-1 rounded" id="antiTroopLevel">
								<option value="T1">T1</option>
								<option value="T2">T2</option>
								<option value="T3">T3</option>
								<option value="T4" selected>T4</option>
								<option value="T5">T5</option>
							</select>
						
							<label class="col-auto col-md-2 col-form-label up2" for="antiProdCap">Production Capacity: </label>
							<select class="col-auto col-md-1 rounded" id="antiProdCap">
								<option value="800" selected>800</option>
								<option value="900">900</option>
								<option value="1000">1000</option>
								<option value="1100">1100</option>
								<option value="1200">1200</option>
								<option value="1300">1300</option>
								<option value="1400">1400</option>
								<option value="1500">1500</option>
								<option value="1600">1600</option>
								<option value="1700">1700</option>
								<option value="2000">2000</option>
							  </select>
						</div>

						<div class="form-group row move">
							<label class="col- col-md-2 col-form-label alignLeft aL" for="antiProdTimeDays">Production Time: </label>
							<input class="antiProdTime col-2 col-md-1 rounded" id="antiProdTimeDays" type="number" value="0" data-secs="86400" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift">Days</label>
							<input class="antiProdTime col-2 col-md-1 rounded" id="antiProdTimeHours" type="number" value="0" data-secs="3600" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift">Hours</label>
							<input class="antiProdTime col-2 col-md-1 rounded" id="antiProdTimeMins" type="number" value="0" data-secs="60" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift2">Minutes</label>
							<input class="antiProdTime col-2 col-md-1 rounded" id="antiProdTimeSecs" type="number" value="0" data-secs="1" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift2">Seconds</label>
						</div>

						<div class="form-group row reAl">
							<label class="col-8 col-md-2 col-form-label left aL" for="antiTroopsRequired">How many do you want?</label>
							<input class="col-4 col-md-1 rounded move2" id="antiTroopsRequired" type="number" value="0" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-8 col-md-2 col-form-label left" for="antiCurrentTroopCount">Already made (Optional)</label>
							<input class="col-4 col-md-1 rounded move2" id="antiCurrentTroopCount" type="number" value="0" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
						</div>

						<div class="form-group row totalDiv rssShift">
							<p class ="col-auto col-md-2 form-text aL">Total Cost:   </p>
							<p class="col-auto form-text rssTotals" id="antiTotalRssCost">Food: 0 Steel: 0 Oil: 0  Energy: 0</p>
						</div>
						<div class="form-group row totalDiv timeShift">
							<p class ="form-text col-auto">Total Time:</p>
							<p class="form-text" id="antiTotalTimeCost">0 D : 0 H : 0 M : 0 s</p>
							<p class ="form-text col-auto oneMore">No. of Batches:</p>
							<p class="form-text antiTotal oneMore" id="antiTotalBatches">0</p>
						</div>
						
						<div class="form-group row test">
							<p class="col-auto col-md-1 col-form-label" id="antiRssCostFood">240000</p>
							<p class="col-auto col-md-1 col-form-label" id="antiRssCostSteel">0</p>
							<p class="col-1 col-md-1 col-form-label" id="antiRssCostOil">180000</p>
							<p class="col-auto col-md-1 col-form-label  up " id="antiRssCostEnergy">16000</p>
						</div>
					</div>
				</div>
			</div>

			<div id="infTab" class="tab-pane fade in">
				<div id="infForm" class="container-fluid">
					<div class="form-group row justify-content-center">
						<div class="card-title col"><h4>Infantry</h4></div>
					</div>
					<div class="tweak">
						<div class="form-group row">
							<label class="col-auto col-md-2 col-form-label up2 aL" for="infTroopLevel">Troop Level: </label>
							<select class="col-auto col-md-1 rounded" id="infTroopLevel">
								<option value="T1">T1</option>
								<option value="T2">T2</option>
								<option value="T3">T3</option>
								<option value="T4" selected>T4</option>
								<option value="T5">T5</option>
							</select>
						
							<label class="col-auto col-md-2 col-form-label up2" for="infProdCap">Production Capacity: </label>
							<select class="col-auto col-md-1 rounded" id="infProdCap">
								<option value="800" selected>800</option>
								<option value="900">900</option>
								<option value="1000">1000</option>
								<option value="1100">1100</option>
								<option value="1200">1200</option>
								<option value="1300">1300</option>
								<option value="1400">1400</option>
								<option value="1500">1500</option>
								<option value="1600">1600</option>
								<option value="1700">1700</option>
								<option value="2000">2000</option>
							</select>
						</div>

						<div class="form-group row move">
							<label class="col- col-md-2 col-form-label alignLeft aL" for="infProdTimeDays">Production Time: </label>
							<input class="infProdTime col-2 col-md-1 rounded" id="infProdTimeDays" type="number" value="0" data-secs="86400" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift ">Days</label>
							<input class="infProdTime col-2 col-md-1 rounded" id="infProdTimeHours" type="number" value="0" data-secs="3600" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift ">Hours</label>
							<input class="infProdTime col-2 col-md-1 rounded" id="infProdTimeMins" type="number" value="0" data-secs="60" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift2 ">Minutes</label>
							<input class="infProdTime col-2 col-md-1 rounded" id="infProdTimeSecs" type="number" value="0" data-secs="1" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift2 ">Seconds</label>
						</div>

						<div class="form-group row reAl">
							<label class="col-8 col-md-2 col-form-label left aL" for="infTroopsRequired">How many do you want?</label>
							<input class="col-4 col-md-1 rounded move2" id="infTroopsRequired" type="tel" value="0" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-8 col-md-2 col-form-label left" for="infCurrentTroopCount">Already made (Optional)</label>
							<input class="col-4 col-md-1 rounded move2" id="infCurrentTroopCount" type="tel" value="0" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
						</div>

						<div class="form-group row totalDiv rssShift">
							<p class ="col-auto col-md-2 form-text aL">Total Cost:</p>
							<p class="col-auto form-text rssTotals" id="infTotalRssCost">Food: 0 Steel: 0 Oil: 0  Energy: 0</p>
						</div>
						<div class="form-group row totalDiv timeShift">
							<p class ="form-text col-auto">Total Time:</p>
							<p class="form-text" id="infTotalTimeCost">0 D : 0 H : 0 M : 0 s</p>
							<p class ="form-text col-auto oneMore">No. of Batches:</p>
							<p class="form-text infTotal oneMore" id="infTotalBatches">0</p>
						</div>
						
						<div class="form-group row test">
							<p class="col-auto col-md-1 col-form-label" id="infRssCostFood">0</p>
							<p class="col-auto col-md-1 col-form-label" id="infRssCostSteel">240000</p>
							<p class="col-auto col-md-1 col-form-label" id="infRssCostOil">180000</p>
							<p class="col-auto col-md-1 col-form-label up" id="infRssCostEnergy">16000</p>
						</div>
					</div>
				</div>
			</div>
			
			<div id="artTab" class="tab-pane fade in">
				<div id="artForm" class="container-fluid">
					<div class="form-group row justify-content-center">
						<div class="card-title col"><h4>Artillery</h4></div>
					</div>
					<div class="tweak">
						<div class="form-group row">
							<label class="col-auto col-md-2 col-form-label up2 aL" for="artTroopLevel">Troop Level: </label>
							<select class="col-auto col-md-1 rounded" id="artTroopLevel">
								<option value="T1">T1</option>
								<option value="T2">T2</option>
								<option value="T3">T3</option>
								<option value="T4" selected>T4</option>
								<option value="T5">T5</option>
							</select>
						
							<label class="col-auto col-md-2 col-form-label up2" for="artProdCap">Production Capacity: </label>
							<select class="col-auto col-md-1 rounded" id="artProdCap">
								<option value="800" selected>800</option>
								<option value="900">900</option>
								<option value="1000">1000</option>
								<option value="1100">1100</option>
								<option value="1200">1200</option>
								<option value="1300">1300</option>
								<option value="1400">1400</option>
								<option value="1500">1500</option>
								<option value="1600">1600</option>
								<option value="1700">1700</option>
								<option value="2000">2000</option>
							  </select>
						</div>

						<div class="form-group row move">
							<label class="col- col-md-2 col-form-label alignLeft aL" for="artProdTimeDays">Production Time: </label>
							<input class="artProdTime col-2 col-md-1 rounded" id="artProdTimeDays" type="number" value="0" data-secs="86400" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift ">Days</label>
							<input class="artProdTime col-2 col-md-1 rounded" id="artProdTimeHours" type="number" value="0" data-secs="3600" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift ">Hours</label>
							<input class="artProdTime col-2 col-md-1 rounded" id="artProdTimeMins" type="number" value="0" data-secs="60" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift2 ">Minutes</label>
							<input class="artProdTime col-2 col-md-1 rounded" id="artProdTimeSecs" type="number" value="0" data-secs="1" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-4 col-md-1 col-form-label prodShift2 ">Seconds</label>
						</div>

						<div class="form-group row reAl">
							<label class="col-8 col-md-2 col-form-label left aL" for="artTroopsRequired">How many do you want?</label>
							<input class="col-4 col-md-1 rounded move2" id="artTroopsRequired" type="number" value="0" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
							<label class="col-8 col-md-2 col-form-label left" for="artCurrentTroopCount">Already made (Optional)</label>
							<input class="col-4 col-md-1 rounded move2" id="artCurrentTroopCount" type="number" value="0" onclick="if(this.value==0){this.value='';}" onfocusout="if(this.value==''){this.value=0;}">
						</div>

						<div class="form-group row totalDiv rssShift">
							<p class ="col-auto col-md-2 form-text aL">Total Cost:   </p>
							<p class="col-auto form-text rssTotals" id="artTotalRssCost">Food: 0 Steel: 0 Oil: 0  Energy: 0</p>
						</div>
						<div class="form-group row totalDiv timeShift">
							<p class ="form-text col-auto">Total Time:</p>
							<p class="form-text" id="artTotalTimeCost">0 D : 0 H : 0 M : 0 s</p>
							<p class ="form-text col-auto oneMore">No. of Batches:</p>
							<p class="form-text artTotal oneMore" id="artTotalBatches">0</p>
						</div>
						<div class="form-group row test">
							<p class="col-auto col-md-1 col-form-label" id="artRssCostFood">160000</p>
							<p class="col-auto col-md-1 col-form-label" id="artRssCostSteel">160000</p>
							<p class="col-auto col-md-1 col-form-label" id="artRssCostOil">120000</p>
							<p class="col-auto col-md-1 col-form-label up" id="artRssCostEnergy">16000</p>
						</div>
					</div>
				</div>
			</div>
<form method="post" action="sessions3.php">
	<input type="hidden" id="tankTroopLevelVal" name="tankTroopLevel" value="T4">
	<input type="hidden" id="antiTroopLevelVal" name="antiTroopLevel" value="T4">
	<input type="hidden" id="infTroopLevelVal" name="infTroopLevel" value="T4">
	<input type="hidden" id="artTroopLevelVal" name="artTroopLevel" value="T4">
	<input type="hidden" id="tankProdCapVal" name="tankProdCap" value="800">
	<input type="hidden" id="antiProdCapVal" name="antiProdCap" value="800">
	<input type="hidden" id="infProdCapVal" name="infProdCap" value="800">
	<input type="hidden" id="artProdCapVal" name="artProdCap" value="800">
	<input type="hidden" id="tankTotalTroopsRequired" name="tankTotalTroops">
	<input type="hidden" id="antiTotalTroopsRequired" name="antiTotalTroops">
	<input type="hidden" id="infTotalTroopsRequired" name="infTotalTroops">
	<input type="hidden" id="artTotalTroopsRequired" name="artTotalTroops">
	<input type="hidden" id="tankTotalRssCostVal" name="tankTotalRssCost">
	<input type="hidden" id="antiTotalRssCostVal" name="antiTotalRssCost">
	<input type="hidden" id="infTotalRssCostVal" name="infTotalRssCost">
	<input type="hidden" id="artTotalRssCostVal" name="artTotalRssCost">
	<input type="hidden" id="tankTotalTimeTakenVal" name="tankTotalTimeTaken">
	<input type="hidden" id="antiTotalTimeTakenVal" name="antiTotalTimeTaken">
	<input type="hidden" id="infTotalTimeTakenVal" name="infTotalTimeTaken">
	<input type="hidden" id="artTotalTimeTakenVal" name="artTotalTimeTaken">
	<input type="hidden" id="tankTotalBatchesVal" name="tankTotalBatches">
	<input type="hidden" id="antiTotalBatchesVal" name="antiTotalBatches">
	<input type="hidden" id="infTotalBatchesVal" name="infTotalBatches">
	<input type="hidden" id="artTotalBatchesVal" name="artTotalBatches">


	<button type="submit" class="signpost" id="nextLink"><span class="carousel-control-next-icon"></span>View Summary<span class="carousel-control-next-icon"></span></button> 
</form>
		</div><!--Card-body closing tag-->
		
	</div><!--Card/Wall closing tag-->

</div><!--Form div closing tag-->


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
    <script>

// Store costs for one troop as a dict.
var tanksResourceCosts ={"T1":{"Food":50,"Steel":50,"Oil":0,"Energy":0},"T2":{"Food":100,"Steel":100,"Oil":0,"Energy":0},"T3":{"Food":150,"Steel":150,"Oil":0,"Energy":10},"T4":{"Food":300,"Steel":300,"Oil":0,"Energy":20},"T5":{"Food":600,"Steel":600,"Oil":0,"Energy":40}};
var antiResourceCosts ={"T1":{"Food":60,"Steel":40,"Oil":0,"Energy":0},"T2":{"Food":100,"Steel":0,"Oil":75,"Energy":0},"T3":{"Food":150,"Steel":0,"Oil":112,"Energy":10},"T4":{"Food":300,"Steel":0,"Oil":225,"Energy":20},"T5":{"Food":600,"Steel":0,"Oil":450,"Energy":40}};
var infResourceCosts ={"T1":{"Food":40,"Steel":60,"Oil":0,"Energy":0},"T2":{"Food":0,"Steel":100,"Oil":75,"Energy":0},"T3":{"Food":0,"Steel":150,"Oil":112,"Energy":10},"T4":{"Food":0,"Steel":300,"Oil":225,"Energy":20},"T5":{"Food":0,"Steel":400,"Oil":450,"Energy":40}};
var artResourceCosts ={"T1":{"Food":60,"Steel":60,"Oil":0,"Energy":0},"T2":{"Food":65,"Steel":65,"Oil":50,"Energy":0},"T3":{"Food":100,"Steel":100,"Oil":75,"Energy":10},"T4":{"Food":200,"Steel":200,"Oil":150,"Energy":20},"T5":{"Food":400,"Steel":400,"Oil":300,"Energy":40}};
// Store selection options for production capacity.
// Tank
var tankLevelOneProdVals = {"20":20,"50":50,"100":100,"150":150,"200":200,"250":250,"300":300,"350":350,"400":400,"450":450,"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var tankLevelTwoProdVals = {"250":250,"300":300,"350":350,"400":400,"450":450,"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var tankLevelThreeProdVals = {"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var tankLevelFourProdVals = {"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var tankLevelFiveProdVals = {"1600":1600,"1700":1700,"2000":2000}; 
// Anti-tank
var antiLevelOneProdVals = {"20":20,"50":50,"100":100,"150":150,"200":200,"250":250,"300":300,"350":350,"400":400,"450":450,"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var antiLevelTwoProdVals = {"250":250,"300":300,"350":350,"400":400,"450":450,"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var antiLevelThreeProdVals = {"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var antiLevelFourProdVals = {"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var antiLevelFiveProdVals = {"1600":1600,"1700":1700,"2000":2000};
// Infantry
var infLevelOneProdVals = {"20":20,"50":50,"100":100,"150":150,"200":200,"250":250,"300":300,"350":350,"400":400,"450":450,"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var infLevelTwoProdVals = {"250":250,"300":300,"350":350,"400":400,"450":450,"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var infLevelThreeProdVals = {"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var infLevelFourProdVals = {"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var infLevelFiveProdVals = {"1600":1600,"1700":1700,"2000":2000};
// Artillery
var artLevelOneProdVals = {"20":20,"50":50,"100":100,"150":150,"200":200,"250":250,"300":300,"350":350,"400":400,"450":450,"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var artLevelTwoProdVals = {"250":250,"300":300,"350":350,"400":400,"450":450,"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var artLevelThreeProdVals = {"500":500,"550":550,"600":600,"700":700,"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var artLevelFourProdVals = {"800":800,"900":900,"1000":1000,"1100":1200,"1200":1200,"1300":1300,"1400":1400,"1500":1500,"1600":1600,"1700":1700,"2000":2000}; 
var artLevelFiveProdVals = {"1600":1600,"1700":1700,"2000":2000};
// Limit the options for production capacity based on Troop Level.
// Tank
$("#tankTroopLevel").change(function(){
    if ($("#tankTroopLevel").val() == "T1") {
    $('#tankProdCap')
        .find('option')
        .remove()
        .end()
        $.each(tankLevelOneProdVals, function(key, value) {
            $('#tankProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#tankTroopLevelVal').val("T1")
        } else if ($("#tankTroopLevel").val() == "T2"){
        $('#tankProdCap')
        .find('option')
        .remove()
        .end()
        $.each(tankLevelTwoProdVals, function(key, value) {
            $('#tankProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#tankTroopLevelVal').val("T2")
        } else if ($("#tankTroopLevel").val() == "T3"){
        $('#tankProdCap')
        .find('option')
        .remove()
        .end()
        $.each(tankLevelThreeProdVals, function(key, value) {
            $('#tankProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#tankTroopLevelVal').val("T3")
        } else if ($("#tankTroopLevel").val() == "T4"){
        $('#tankProdCap')
        .find('option')
        .remove()
        .end()
        $.each(tankLevelFourProdVals, function(key, value) {
            $('#tankProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value))});
			$('#tankTroopLevelVal').val("T4")
        } else if ($("#tankTroopLevel").val() == "T5"){
        $('#tankProdCap')
        .find('option')
        .remove()
        .end()
        $.each(tankLevelFiveProdVals, function(key, value) {
            $('#tankProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value))});
			$('#tankTroopLevelVal').val("T5")
        }
        $.each(tanksResourceCosts[$("#tankTroopLevel").val()],  function(key, value) {
            $("#tankRssCost"+key)
            .text(value*$('#tankProdCap').val());
			})
		return tankUpdateBatchesTotal(), tankUpdateTimeTotal(), tankUpdateCostTotal();
});
// Anti-tank
$("#antiTroopLevel").change(function(){
    if ($("#antiTroopLevel").val() == "T1") {
    $('#antiProdCap')
        .find('option')
        .remove()
        .end()
        $.each(antiLevelOneProdVals, function(key, value) {
            $('#antiProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#antiTroopLevelVal').val("T1")
        } else if ($("#antiTroopLevel").val() == "T2"){
        $('#antiProdCap')
        .find('option')
        .remove()
        .end()
        $.each(antiLevelTwoProdVals, function(key, value) {
            $('#antiProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#antiTroopLevelVal').val("T2")
        } else if ($("#antiTroopLevel").val() == "T3"){
        $('#antiProdCap')
        .find('option')
        .remove()
        .end()
        $.each(antiLevelThreeProdVals, function(key, value) {
            $('#antiProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#antiTroopLevelVal').val("T3")
        } else if ($("#antiTroopLevel").val() == "T4"){
        $('#antiProdCap')
        .find('option')
        .remove()
        .end()
        $.each(antiLevelFourProdVals, function(key, value) {
            $('#antiProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value))});
			$('#antiTroopLevelVal').val("T4")
        } else if ($("#antiTroopLevel").val() == "T5"){
        $('#antiProdCap')
        .find('option')
        .remove()
        .end()
        $.each(antiLevelFiveProdVals, function(key, value) {
            $('#antiProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value))});
			$('#antiTroopLevelVal').val("T5")
        };
		$.each(antiResourceCosts[$("#antiTroopLevel").val()],  function(key, value) {
            $("#antiRssCost"+key)
            .attr("value", (value*$('#antiProdCap').val()))})
		return antiUpdateBatchesTotal(), antiUpdateTimeTotal(), antiUpdateCostTotal();
});
// Infantry
$("#infTroopLevel").change(function(){
    if ($("#infTroopLevel").val() == "T1") {
    $('#infProdCap')
        .find('option')
        .remove()
        .end()
        $.each(infLevelOneProdVals, function(key, value) {
            $('#infProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#infTroopLevelVal').val("T1")
        } else if ($("#infTroopLevel").val() == "T2"){
        $('#infProdCap')
        .find('option')
        .remove()
        .end()
        $.each(infLevelTwoProdVals, function(key, value) {
            $('#infProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#infTroopLevelVal').val("T2")
        } else if ($("#infTroopLevel").val() == "T3"){
        $('#infProdCap')
        .find('option')
        .remove()
        .end()
        $.each(infLevelThreeProdVals, function(key, value) {
            $('#infProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#infTroopLevelVal').val("T3")
        } else if ($("#infTroopLevel").val() == "T4"){
        $('#infProdCap')
        .find('option')
        .remove()
        .end()
        $.each(infLevelFourProdVals, function(key, value) {
            $('#infProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value))});
			$('#infTroopLevelVal').val("T4")
        } else if ($("#infTroopLevel").val() == "T5"){
        $('#infProdCap')
        .find('option')
        .remove()
        .end()
        $.each(infLevelFiveProdVals, function(key, value) {
            $('#infProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value))});
			$('#infTroopLevelVal').val("T5")
        };
		$.each(infResourceCosts[$("#infTroopLevel").val()],  function(key, value) {
            $("#infRssCost"+key)
            .attr("value", (value*$('#infProdCap').val()))})
		return infUpdateBatchesTotal(), infUpdateTimeTotal(), infUpdateCostTotal();
});
// Artillery
$("#artTroopLevel").change(function(){
    if ($("#artTroopLevel").val() == "T1") {
    $('#artProdCap')
        .find('option')
        .remove()
        .end()
        $.each(artLevelOneProdVals, function(key, value) {
            $('#artProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#artTroopLevelVal').val("T1")
        } else if ($("#artTroopLevel").val() == "T2"){
        $('#artProdCap')
        .find('option')
        .remove()
        .end()
        $.each(artLevelTwoProdVals, function(key, value) {
            $('#artProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#artTroopLevelVal').val("T2")
        } else if ($("#artTroopLevel").val() == "T3"){
        $('#artProdCap')
        .find('option')
        .remove()
        .end()
        $.each(artLevelThreeProdVals, function(key, value) {
            $('#artProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value));})
			$('#artTroopLevelVal').val("T3")
        } else if ($("#artTroopLevel").val() == "T4"){
        $('#artProdCap')
        .find('option')
        .remove()
        .end()
        $.each(artLevelFourProdVals, function(key, value) {
            $('#artProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value))});
			$('#artTroopLevelVal').val("T4")
        } else if ($("#artTroopLevel").val() == "T5"){
        $('#artProdCap')
        .find('option')
        .remove()
        .end()
        $.each(artLevelFiveProdVals, function(key, value) {
            $('#artProdCap')
            .append($("<option></option>")
            .attr("value",key)
            .text(value))});
			$('#artTroopLevelVal').val("T5")
        };
		$.each(artResourceCosts[$("#artTroopLevel").val()],  function(key, value) {
            $("#artRssCost"+key)
            .attr("value", (value*$('#artProdCap').val()))})
		return artUpdateBatchesTotal(), artUpdateTimeTotal(), artUpdateCostTotal();
});



// Set base values for resource cost based on Troop Level and Production Value.
$('#tankProdCap').change(function() {
	$('#tankProdCapVal').val($('#tankProdCap').val())
    $.each(tanksResourceCosts[$("#tankTroopLevel").val()],  function(key, value) {
            $("#tankRssCost"+key)
            .text(value*$('#tankProdCap').val());
			})
    return tankUpdateBatchesTotal(), tankUpdateTimeTotal(), tankUpdateCostTotal();
})
$('#antiProdCap').change(function() {
	$('#antiProdCapVal').val($('#antiProdCap').val())
    $.each(antiResourceCosts[$("#antiTroopLevel").val()],  function(key, value) {
            $("#antiRssCost"+key)
            .text(value*$('#antiProdCap').val());
			})
    return antiUpdateBatchesTotal(), antiUpdateTimeTotal(), antiUpdateCostTotal();
})
$('#infProdCap').change(function() {
	$('#infProdCapVal').val($('#infProdCap').val())
    $.each(infResourceCosts[$("#infTroopLevel").val()],  function(key, value) {
            $("#infRssCost"+key)
            .text(value*$('#infProdCap').val());
			})
    return infUpdateBatchesTotal(), infUpdateTimeTotal(), infUpdateCostTotal();
})
$('#artProdCap').change(function() {
	$('#artProdCapVal').val($('#artProdCap').val())
    $.each(artResourceCosts[$("#artTroopLevel").val()],  function(key, value) {
            $("#artRssCost"+key)
            .text(value*$('#artProdCap').val());
			})
    return artUpdateBatchesTotal(), artUpdateTimeTotal(), artUpdateCostTotal();
})
// Converts seconds to Days, Mins, Hours, Secs.
function formatNumber(num) {

return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function secondsToDhms(seconds) {
    seconds = Number(seconds);
    var d = Math.floor(seconds / (3600*24));
    var h = Math.floor(seconds % (3600*24) / 3600);
    var m = Math.floor(seconds % 3600 / 60);
    var s = Math.floor(seconds % 60);
    var dDisplay = d > 0 ? d + (d == 1 ? " D : " : " D : ") : " 0 D : ";
    var hDisplay = h > 0 ? h + (h == 1 ? " H : " : " H : ") : " 0 H : ";
    var mDisplay = m > 0 ? m + (m == 1 ? " M : " : " M : ") : " 0 M : ";
    var sDisplay = s > 0 ? s + (s == 1 ? " s" : " s") : " 0 s";
    return formatNumber(dDisplay) + formatNumber(hDisplay) + formatNumber(mDisplay) + formatNumber(sDisplay);
}
// Convert inputs to seconds
var tankTroopsRequired = 0
var tankDict = {
    "86400": 0,
    "3600": 0,
    "60": 0,
    "1": 0
}
var antiTroopsRequired = 0
var antiDict = {
    "86400": 0,
    "3600": 0,
    "60": 0,
    "1": 0
}
var infTroopsRequired = 0
var infDict = {
    "86400": 0,
    "3600": 0,
    "60": 0,
    "1": 0
}
var artTroopsRequired = 0
var artDict = {
    "86400": 0,
    "3600": 0,
    "60": 0,
    "1": 0
}

function tankUpdateTimeTotal() {
		total = 0;
		for(var key in tankDict) {
			var inputValue = tankDict[key];
			var timeValue = parseInt(key);
			var totalValue = inputValue * timeValue;
			total += totalValue;		  
	}
		$("#tankTotalTimeCost").text(secondsToDhms(total * (tankTroopsRequired / ($("#tankProdCap").val()))))
		$('#tankTotalTimeTakenVal').val(secondsToDhms(total * (tankTroopsRequired / ($("#tankProdCap").val()))))
	};


$(".tankProdTime").on('keyup change', function() {

    var inputValue = $(this).val();
    var labelValue = $(this).attr("data-secs");
    tankDict[labelValue] = inputValue
    return tankUpdateTimeTotal();
});

function tankUpdateCostTotal() {
    total = 0
    total = "Food: " + formatNumber($("#tankRssCostFood").text() / ($("#tankProdCap").val()) * tankTroopsRequired)
    total += " Steel: " + formatNumber($("#tankRssCostSteel").text() / ($("#tankProdCap").val()) * tankTroopsRequired)
    total += " Oil: " + formatNumber(($("#tankRssCostOil").text() / ($("#tankProdCap").val()) * tankTroopsRequired))
    total += " Energy: " + formatNumber($("#tankRssCostEnergy").text() / ($("#tankProdCap").val()) * tankTroopsRequired)
    $("#tankTotalRssCost").text(total)
	$('#tankTotalRssCostVal').val(total)
            
};

function tankUpdateBatchesTotal() {

    total = ""
    total += Math.floor((tankTroopsRequired / $("#tankProdCap").val())) 
    if (total <  (tankTroopsRequired / $("#tankProdCap").val())) {
        total += " (+" + (tankTroopsRequired % $("#tankProdCap").val()) + ")"
    }
    $("#tankTotalBatches").text(formatNumber(total))
	$('#tankTotalBatchesVal').val(total)
}

$("#tankTroopsRequired, #tankCurrentTroopCount").on('keyup change',function() {

    tankTroopsRequired = ($('#tankTroopsRequired').val() - $("#tankCurrentTroopCount").val())
	$('#tankTotalTroopsRequired').val(tankTroopsRequired)
    return tankUpdateTimeTotal(), tankUpdateCostTotal(), tankUpdateBatchesTotal();
})

function antiUpdateTimeTotal() {
    total = 0;
    for(var key in antiDict) {
        var inputValue = antiDict[key];
        var timeValue = parseInt(key);
        var totalValue = inputValue * timeValue;
        total += totalValue;		  
}
    $("#antiTotalTimeCost").text(secondsToDhms(total * (antiTroopsRequired / ($("#antiProdCap").val()))))
	$('#antiTotalTimeTakenVal').val(secondsToDhms(total * (antiTroopsRequired / ($("#antiProdCap").val()))))
};


$(".antiProdTime").on('keyup change', function() {

var inputValue = $(this).val();
var labelValue = $(this).attr("data-secs");
antiDict[labelValue] = inputValue
return antiUpdateTimeTotal();
});

function antiUpdateCostTotal() {
	total = 0
	total = "Food: " + formatNumber($("#antiRssCostFood").text() / ($("#antiProdCap").val()) * antiTroopsRequired)
	total += " Steel: " + formatNumber($("#antiRssCostSteel").text() / ($("#antiProdCap").val()) * antiTroopsRequired)
	total += " Oil: " + formatNumber(($("#antiRssCostOil").text() / ($("#antiProdCap").val()) * antiTroopsRequired))
	total += " Energy: " + formatNumber($("#antiRssCostEnergy").text() / ($("#antiProdCap").val()) * antiTroopsRequired)
	$("#antiTotalRssCost").text(total)
	$('#antiTotalRssCostVal').val(total)
        
};

function antiUpdateBatchesTotal() {

	total = ""
	total += Math.floor((antiTroopsRequired / $("#antiProdCap").val())) 
	if (total <  (antiTroopsRequired / $("#antiProdCap").val())) {
		total += " (+" + (antiTroopsRequired % $("#antiProdCap").val()) + ")"
	}
	$("#antiTotalBatches").text(formatNumber(total))
	$('#antiTotalBatchesVal').val(total)
}

$("#antiTroopsRequired, #antiCurrentTroopCount").on('keyup change',function() {

	antiTroopsRequired = ($('#antiTroopsRequired').val() - $("#antiCurrentTroopCount").val())
	$('#antiTotalTroopsRequired').val(antiTroopsRequired)
	return antiUpdateTimeTotal(), antiUpdateCostTotal(), antiUpdateBatchesTotal();
})

function artUpdateTimeTotal() {
    total = 0;
    for(var key in artDict) {
        var inputValue = artDict[key];
        var timeValue = parseInt(key);
        var totalValue = inputValue * timeValue;
        total += totalValue;		  
}
    $("#artTotalTimeCost").text(secondsToDhms(total * (artTroopsRequired / ($("#artProdCap").val()))))
	$('#artTotalTimeTakenVal').val(secondsToDhms(total * (artTroopsRequired / ($("#artProdCap").val()))))
};


$(".artProdTime").on('keyup change', function() {

var inputValue = $(this).val();
var labelValue = $(this).attr("data-secs");
artDict[labelValue] = inputValue
return artUpdateTimeTotal();
});

function artUpdateCostTotal() {
	total = 0
	total = "Food: " + formatNumber($("#artRssCostFood").text() / ($("#artProdCap").val()) * artTroopsRequired)
	total += " Steel: " + formatNumber($("#artRssCostSteel").text() / ($("#artProdCap").val()) * artTroopsRequired)
	total += " Oil: " + formatNumber(($("#artRssCostOil").text() / ($("#artProdCap").val()) * artTroopsRequired))
	total += " Energy: " + formatNumber($("#artRssCostEnergy").text() / ($("#artProdCap").val()) * artTroopsRequired)
	$("#artTotalRssCost").text(total)
	$('#artTotalRssCostVal').val(total)
        
};

function artUpdateBatchesTotal() {

	total = ""
	total += Math.floor((artTroopsRequired / $("#artProdCap").val())) 
	if (total <  (artTroopsRequired / $("#artProdCap").val())) {
		total += " (+" + (artTroopsRequired % $("#artProdCap").val()) + ")"
	}
	$("#artTotalBatches").text(formatNumber(total))
	$('#artTotalBatchesVal').val(total)
}

$("#artTroopsRequired, #artCurrentTroopCount").on('keyup change',function() {

	artTroopsRequired = ($('#artTroopsRequired').val() - $("#artCurrentTroopCount").val())
	$('#artTotalTroopsRequired').val(artTroopsRequired)
	return artUpdateTimeTotal(), artUpdateCostTotal(), artUpdateBatchesTotal();
})

function infUpdateTimeTotal() {
    total = 0;
    for(var key in infDict) {
        var inputValue = infDict[key];
        var timeValue = parseInt(key);
        var totalValue = inputValue * timeValue;
        total += totalValue;		  
}
    $("#infTotalTimeCost").text(secondsToDhms(total * (infTroopsRequired / ($("#infProdCap").val()))))
	$('#infTotalTimeTakenVal').val(secondsToDhms(total * (infTroopsRequired / ($("#infProdCap").val()))))
};


$(".infProdTime").on('keyup change', function() {

	var inputValue = $(this).val();
	var labelValue = $(this).attr("data-secs");
	infDict[labelValue] = inputValue
	return infUpdateTimeTotal();
});

function infUpdateCostTotal() {
	total = 0
	total = "Food: " + formatNumber($("#infRssCostFood").text() / ($("#infProdCap").val()) * infTroopsRequired)
	total += " Steel: " + formatNumber($("#infRssCostSteel").text() / ($("#infProdCap").val()) * infTroopsRequired)
	total += " Oil: " + formatNumber(($("#infRssCostOil").text() / ($("#infProdCap").val()) * infTroopsRequired))
	total += " Energy: " + formatNumber($("#infRssCostEnergy").text() / ($("#infProdCap").val()) * infTroopsRequired)
	$("#infTotalRssCost").text(total)
	$('#infTotalRssCostVal').val(total)
        
};

function infUpdateBatchesTotal() {

	total = ""
	total += Math.floor((infTroopsRequired / $("#infProdCap").val())) 
	if (total <  (infTroopsRequired / $("#infProdCap").val())) {
		total += " (+" + (infTroopsRequired % $("#infProdCap").val()) + ")"
	}
	$("#infTotalBatches").text(formatNumber(total))
	$('#infTotalBatchesVal').val(total)
}

$("#infTroopsRequired, #infCurrentTroopCount").on('keyup change',function() {

	infTroopsRequired = ($('#infTroopsRequired').val() - $("#infCurrentTroopCount").val())
	$('#infTotalTroopsRequired').val(infTroopsRequired)
	return infUpdateTimeTotal(), infUpdateCostTotal(), infUpdateBatchesTotal();
})

</script>

    

</body>

</html>