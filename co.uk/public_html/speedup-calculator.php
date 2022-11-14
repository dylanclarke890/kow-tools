
<!DOCTYPE html>
<!--[if lte IE 7 ]><html lang="en" class="ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

	<title>Speedup Calculator</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> <!--THIS CSS FILE HAS TO BE FIRST--> 
    

	<style>
		
		
		#wrapper
		{
			padding: 0;
		}
		.trainingInputTotal, .repairInputTotal, .researchInputTotal, .buildingInputTotal, .generalInputTotal 
		{
			padding: 0;
			margin: 0;
		}
		#logo
		{
			width:3.5em;
		}
	
		/*Takes arrows out of inputs Chrome, Safari, Edge, Opera */
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
		
		/*motoG4 GalaxyS5 iphone5/SE*/
		@media (max-width: 360.98px)
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
				height: 2.5em;
				width:100vw !important;	
			}
		
			#menuButts
			{
				position: relative;
			}
			.formButts
			{
				padding:0;
				height:2.2em !important;
				position: relative;
				top:-0.5em;
				background-color: rgba(59, 43, 56, 1) !important;
			}
			
			.menuImg
			{
				display:none;
			}
		
			#trainingFormButton
			{
				height: 3.6em;
				background-image: url(images/training.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#repairFormButton
			{
				height: 3.6em;
				background-image: url(images/repair.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#researchFormButton
			{
				height: 3.6em;
				background-image: url(images/research.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#buildingFormButton
			{
				height: 3.6em;
				background-image: url(images/building.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#generalFormButton
			{
				height: 3.6em;
				background-image: url(images/general.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
		
			.up
			{
				position: relative;
				top:-0.4em;
			}
			.menuLabel
			{
				display:none;
			}
		
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 1) !important;
				position: relative;
				top:-1.05em;
				height:75vh;
				padding-top:0.5em;
				padding-bottom: 0;
			}
		
			#conDiv
			{
				color:aliceblue;
				height: 100vh !important;
			}
			.form-group
			{
				padding: 0;
				margin-bottom: 0;
				position: relative;
			}
		
			.tweak
			{
				position: relative;
				top:-1.5em;
			}
			.form-control
			{
				height:1.5em;
				position: relative;
				
				
			}
			.card-title
			{
				position: relative;
				top:-0.5em;
			}
			.totalDiv
			{
				position: relative;
				top:-0.5em;
			}
			#nextLink
			{
				position:absolute;
				bottom:10em;
				width:20em;
				left:1.7em;
			}	
		}
		
		/*Pixel2 Pixel2XL iphone6/7/8PLUS */
		@media (min-width: 410px) and (max-width: 767.98px)
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
				left:0.15em;
				margin-left:-0.2em;
				/*background-color: rgba(59, 43, 56, 0.95);*/
				background-color: rgba(69,54,66, 0.96) !important;
				height: 2.5em;
				width:100vw !important;	
			}
		
			#menuButts
			{
				position: relative;			
			}
			.formButts
			{
				padding:0;
				height:2.2em !important;
				position: relative;
				top:-0.5em;
				background-color: rgba(59, 43, 56, 1) !important;
			}
			
			.menuImg
			{	
				display:none;			
			}
		
			#trainingFormButton
			{
				height: 3.6em;
				background-image: url(images/training.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#repairFormButton
			{
				height: 3.6em;
				background-image: url(images/repair.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#researchFormButton
			{
				height: 3.6em;
				background-image: url(images/research.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#buildingFormButton
			{
				height: 3.6em;
				background-image: url(images/building.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#generalFormButton
			{
				height: 3.6em;
				background-image: url(images/general.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
		
			.up
			{
				position: relative;
				top:-0.4em;
			}
			.menuLabel
			{
				display:none;
			}
		
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 1) !important;
				position: relative;
				top:-1.15em;
				height:75vh;
				padding-top:0.5em;
				padding-bottom: 0;
			}
		
			#conDiv
			{
				color:aliceblue;
				height: 100vh !important;
			}
			.form-group
			{
				padding: 0;
				margin-bottom: 0;
				position: relative;
			}
		
			.tweak
			{
				position: relative;
				top:-0.8em;
			}
			.form-control
			{
				height:1.5em;
				position: relative;	
			}
			.card-title
			{
				position: relative;
				
			}
			.totalDiv
			{
				position: relative;
				top:-0.5em;
				left:3em;
			}
			#nextLink
			{
				position:absolute;
				bottom:9em;
				width:20em;
				left:7em;	
			}
		}
		
		/*iPad*/
		@media (min-width: 768px) and (max-width: 900px)
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
				height: 2.5em;
				width:100vw !important;	
			}
		
			#menuButts
			{
				position: relative;
			}
			.formButts
			{
				padding:0;
				height:2.2em !important;
				position: relative;
				top:-0.5em;
				background-color: rgba(59, 43, 56, 1) !important;
			}
			
			.menuImg
			{	
				display:none;			
			}
		
			#trainingFormButton
			{
				height: 3.6em;
				background-image: url(images/training.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#repairFormButton
			{
				height: 3.6em;
				background-image: url(images/repair.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#researchFormButton
			{
				height: 3.6em;
				background-image: url(images/research.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#buildingFormButton
			{
				height: 3.6em;
				background-image: url(images/building.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#generalFormButton
			{
				height: 3.6em;
				background-image: url(images/general.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
		
			.up
			{
				position: relative;
				top:-0.4em;
			}
			.menuLabel
			{
				display:none;
			}
		
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 1) !important;
				position: relative;
				top:-1.05em;
				height:75vh;
				padding-top:0.5em;
				padding-bottom: 0;
			}

			#conDiv
			{
				color:aliceblue;
				height: 100vh !important;
			}
			.form-group
			{
				padding: 0;
				margin-bottom: 0;
				position: relative;
			}
		
			.tweak
			{
				position: relative;
				top:-1.5em;
			}
			.form-control
			{
				height:1.5em;
				position: relative;
			}
			.card-title
			{
				position: relative;
				top:-0.5em;
			}
			.totalDiv
			{
				position: relative;
				top:-0.5em;
			}
			#nextLink
			{
				position:absolute;
				bottom:10em;
				width:20em;
				left:1.7em;
			}
		}
		
		/*iPadPro and desktops*/
		@media (min-width: 900.98px)
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
			}
			
			#logo
			{
				width:3.5em;
			}
			
			#wall
			{
				background-color: rgba(59, 43, 56, 0.63);
				
			}
		
			#priority
			{
				position: relative;
				top:-0.1em;
				margin-left:-0.2em;
				left:0.1em;
				/*background-color: rgba(59, 43, 56, 0.95);*/
				background-color: rgba(69,54,66, 0.96) !important;
			}
		
			.formButts
			{
				padding:0;
			}
			
			.menuImg
			{
				height:3.5em;
				position: relative;
				top:0.1em;
			}
			
			.menuLabel
			{
				color: black;
				font-size: 1.3em;
				padding-bottom: 0;
			}
		
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 1) !important;
				position: relative;
				top:-1.15em;
			}
			
			#conDiv
			{
				width:50vw;
				height:75vh;
				position: relative;
				background-color: rgba(59, 43, 56, 0.63);
				color:aliceblue;
				position: relative;
				top:-0.2em;
			}
			
			.form-group
			{
				padding: 0;
				margin-bottom: 0;
				position: relative;
			}
			
			.card-title
			{
				padding-top: 0.5em;
			}

			.tweak
			{
				position: relative;
				top:-1em;
			}
			.form-control
			{
				height:1.5em;
				position: relative;
				top:0.5em;
			}
		
			#nextLink
			{
				width:20em;
				position:absolute;
				left:13vw;
				bottom: 0.5em;
				background-color:rgba(255, 255, 255, 0.5); 
			}
		}
		
		/*iphone X and 7/8/9*/
		@media (min-width: 361px) and (max-width: 375.98px)
	
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
				height: 2.5em;
				width:100vw !important;	
			}
		
			#menuButts
			{
				position: relative;			
			}
			.formButts
			{
				padding:0;
				height:2.2em !important;
				position: relative;
				top:-0.5em;
				background-color: rgba(59, 43, 56, 1) !important;
			}
			
			.menuImg
			{	
				display:none;			
			}
		
			#trainingFormButton
			{
				height: 3.6em;
				background-image: url(images/training.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#repairFormButton
			{
				height: 3.6em;
				background-image: url(images/repair.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#researchFormButton
			{
				height: 3.6em;
				background-image: url(images/research.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#buildingFormButton
			{
				height: 3.6em;
				background-image: url(images/building.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#generalFormButton
			{
				height: 3.6em;
				background-image: url(images/general.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
		
			.up
			{
				position: relative;
				top:-0.4em;
			}
			.menuLabel
			{
				display:none;
			}
		
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 1) !important;
				position: relative;
				top:-1.15em;
				height:75vh;
				padding-top:0.5em;
				padding-bottom: 0;
			}
		
			#conDiv
			{
				color:aliceblue;
				height: 100vh !important;
			}
			.form-group
			{
				padding: 0;
				margin-bottom: 0;
				position: relative;
			}
		
			.tweak
			{
				position: relative;
				top:-1.5em;
			}
			.form-control
			{
				height:1.5em;
				position: relative;	
			}
			.card-title
			{
				position: relative;
				top:-0.5em;
			}
			.totalDiv
			{
				position: relative;
				top:-0.5em;
				left:3em;
			}
			#nextLink
			{
				position:absolute;
				bottom:10em;
				width:20em;
				left:1.7em;	
			}
		}	
	
		/*@media (orientation: landscape) 
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
				//background-color: rgba(59, 43, 56, 0.95) !important;//
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
				//background-color: rgba(59, 43, 56, 0.95);//
				background-color: rgba(69,54,66, 0.96) !important;
				height: 2.5em;
				width:100vw !important;	
			}
		
			#menuButts
			{
				position: relative;	
			}
			.formButts
			{
				padding:0;
				height:2.2em !important;
				position: relative;
				top:-0.5em;
				background-color: rgba(59, 43, 56, 1) !important;
			}
			
			.menuImg
			{
				display:none;	
			}
		
		
			#trainingFormButton
			{
				height: 3.6em;
				background-image: url(images/training.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#repairFormButton
			{
				height: 3.6em;
				background-image: url(images/repair.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#researchFormButton
			{
				height: 3.6em;
				background-image: url(images/research.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#buildingFormButton
			{
				height: 3.6em;
				background-image: url(images/building.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
			#generalFormButton
			{
				height: 3.6em;
				background-image: url(images/general.png);
				background-size: contain;
				background-repeat:no-repeat;
				background-position: center;
			}
		
			.up
			{
				position: relative;
				top:-0.4em;
			}
			.menuLabel
			{
				display:none;
			}
		
			.tab-pane
			{
				background-color: rgba(59, 43, 56, 1) !important;
				position: relative;
				top:-1.05em;
				height:75vh;
				padding-top:0.5em;
				padding-bottom: 0;
			}

			#conDiv
			{
				color:aliceblue;
				height: 100vh !important;
			}
			.form-group
			{
				padding: 0;
				margin-bottom: 0;
				position: relative;
			}
		
			.tweak
			{
				position: relative;
				top:-1.5em;
			}
			.form-control
			{
				height:1.5em;
				position: relative;	
			}
			.card-title
			{
				position: relative;
				top:-0.5em;
			}
			.totalDiv
			{
				position: relative;
				top:-0.5em;
			}
			#nextLink
			{
				position:absolute;
				bottom:10em;
				width:20em;
				left:1.7em;
			}
		} */
		
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
                <li class="nav-item active">
                    <a class="nav-link" href="#wrapper">Speedup Calculator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="troop-calculator.php">Troop Calculator</a>
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
<form id="form" method="post" action="sessions2.php">
   
	<div id="wall" class="card text-center">
    	<div id="priority" class="card-header">
			
			<ul id="menuButts" class="row nav nav-tabs card-header-tabs">
                        
				<li class="nav-item col ">
					<a id="trainingFormButton" class="nav-link formButts col col-md active" data-toggle="tab" href="#trainingTab">
						<div class="col col-md-6 mx-auto menuPack">
							<img class="menuImg img-fluid" src="images/training.png" alt="Training">
							<span class="menuLabel">Training</span>
						</div>
					</a>
				</li>
				<li class="nav-item col ">
					<a id="repairFormButton" class="nav-link formButts col col-md" data-toggle="tab" href="#repairTab">
						<div class="col col-md-6 mx-auto">
							<img class="menuImg img-fluid" src="images/repair.png" alt="Repair">
							<span class="menuLabel">Repair</span>
						</div>
					</a>
				</li>
				<li class="nav-item col ">
					<a id="researchFormButton" class="nav-link formButts col col-md" data-toggle="tab" href="#researchTab">
						<div class="col col-md-6 mx-auto">
							<img class="menuImg img-fluid" src="images/research.png" alt="Research">
							<span class="menuLabel">Research</span>
						</div>
					</a>
				</li>

				<li class="nav-item col ">

					<a id="buildingFormButton" class="nav-link formButts col col-md" data-toggle="tab" href="#buildingTab">
						<div class="col col-md-6 mx-auto">
							<img class="menuImg img-fluid" src="images/building.png" alt="Building">
							<span class="menuLabel">Building</span>
						</div>
					</a>
				</li>
				<li class="nav-item col ">

					<a id="generalFormButton" class="nav-link formButts col col-md" data-toggle="tab" href="#generalTab">
						<div class="col col-md-6 mx-auto">
							<img class="menuImg img-fluid" src="images/general.png" alt="General">
							<span class="menuLabel">General</span>
						</div>
					</a>
				</li>
			</ul>
			
		</div><!--card-header closing tag-->
                
		<div id="conDiv" class="tab-content card-body mx-auto">
			<div id="trainingTab" class=" tab-pane fade in active show">
				<div id="trainingForm" class="container-fluid">
					<div class="form-group row">
						<div class="card-title col"><h4>Training</h4></div>
					</div>
					<div class="tweak">
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up"  for="trainingIn">1 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="60" class="trainingInput form-control" type="number" id="trainingIn60" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="TNG60" class="trainingInputTotal col-5 col-md-5  col-form-label">0</label> 
							
						</div>
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="trainingIn2">5 min</label>
							<div class="col-4 col-md-3">
								<input data-amt="300" class="trainingInput form-control" type="number" id="trainingIn300" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="TNG300" class="trainingInputTotal col-5 col-md-5  col-form-label">0</label> 
							
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="trainingIn3">10 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="600" class="trainingInput form-control" type="number" id="trainingIn600" value="0" onclick="if(this.value==0){this.value='';}">
								
							</div>
							<label id="TNG600" class="trainingInputTotal col-5 col-form-label">0</label> 
						</div>

						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="trainingIn4">15 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="900" class="trainingInput form-control" type="number" id="trainingIn900" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="TNG900" class="trainingInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="trainingIn5">30 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="1800" class="trainingInput form-control" type="number" id="trainingIn1800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="TNG1800" class="trainingInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="trainingIn6">60 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="3600" class="trainingInput form-control" type="number" id="trainingIn3600" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="TNG3600" class="trainingInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="trainingIn7">3 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="10800"  class="trainingInput form-control" type="number" id="trainingIn10800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="TNG10800" class="trainingInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="trainingIn8">8 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="28800" class="trainingInput form-control" type="number" id="trainingIn28800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="TNG28800" class="trainingInputTotal col-5 col-form-label">0</label> 
						</div>
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="trainingIn9">15 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="54000" class="trainingInput form-control" type="number" id="trainingIn54000" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="TNG54000" class="trainingInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="trainingIn10">24 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="86400" class="trainingInput form-control" type="number" id="trainingIn86400" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="TNG86400" class="trainingInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row totalDiv">
							<h4 class ="col-4 form-text">Total:</h4>
							<p class="col-6 total form-text trainingTotal" id="trainingTotal">0</p>
						</div>
					</div>
				</div>
			</div>
			<div id="repairTab" class=" tab-pane fade in">
				<div id="repairForm" class="container-fluid">
					<div class="form-group row">
						<div class="card-title col"><h4>Repair</h4></div>
					</div>
					<div class="tweak">
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up"  for="repairIn">1 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="60" class="repairInput form-control" type="number" id="repairIn60" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RPR60" class="repairInputTotal col-5  col-form-label">0</label> 
							
						</div>
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="repairIn2">5 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="300" class="repairInput form-control" type="number" id="repairIn300" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RPR300" class=" repairInputTotal col-5  col-form-label">0</label> 
							
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="repairIn3">10 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="600" class="repairInput form-control" type="number" id="repairIn600" value="0" onclick="if(this.value==0){this.value='';}">
								
							</div>
							<label id="RPR600" class="repairInputTotal col-5 col-form-label">0</label> 
						</div>

						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="repairIn4">15 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="900" class="repairInput form-control" type="number" id="repairIn900" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RPR900" class="repairInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="repairIn5">30 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="1800" class="repairInput form-control" type="number" id="repairIn1800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RPR1800" class="repairInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="repairIn6">60 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="3600" class="repairInput form-control" type="number" id="repairIn3600" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RPR3600" class="repairInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="repairIn7">3 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="10800"  class="repairInput form-control" type="number" id="repairIn10800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RPR10800" class="repairInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="repairIn8">8 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="28800" class="repairInput form-control" type="number" id="repairIn28800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RPR28800" class="repairInputTotal col-5 col-form-label">0</label> 
						</div>
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="repairIn9">15 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="54000" class="repairInput form-control" type="number" id="repairIn54000" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RPR54000" class="repairInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="repairIn10">24 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="86400" class="repairInput form-control" type="number" id="repairIn86400" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RPR86400" class="repairInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row totalDiv">
							<h4 class ="col-4 form-text">Total:</h4>
							<p class="col-6 total form-text repairTotal" id="repairTotal">0</p>
						</div>
					</div>
				</div>
			</div>
			<div id="researchTab" class=" tab-pane fade in">
				<div id="researchForm" class="container-fluid">
					<div class="form-group row">
						<div class="card-title col"><h4>Research</h4></div>
					</div>
					<div class="tweak">
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up"  for="researchIn">1 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="60" class="researchInput form-control" type="number" id="researchIn60" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH60" class="researchInputTotal col-5  col-form-label">0</label> 
							
						</div>
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="researchIn2">5 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="300" class="researchInput form-control" type="number" id="researchIn300" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH300" class=" researchInputTotal col-5  col-form-label">0</label> 
							
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="researchIn3">10 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="600" class="researchInput form-control" type="number" id="researchIn600" value="0" onclick="if(this.value==0){this.value='';}">
								
							</div>
							<label id="RSH600" class="researchInputTotal col-5 col-form-label">0</label> 
						</div>

						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="researchIn4">15 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="900" class="researchInput form-control" type="number" id="researchIn900" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH900" class="researchInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="researchIn5">30 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="1800" class="researchInput form-control" type="number" id="researchIn1800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH1800" class="researchInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="researchIn6">60 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="3600" class="researchInput form-control" type="number" id="researchIn3600" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH3600" class="researchInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="researchIn7">3 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="10800"  class="researchInput form-control" type="number" id="researchIn10800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH10800" class="researchInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="researchIn8">8 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="28800" class="researchInput form-control" type="number" id="researchIn28800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH28800" class="researchInputTotal col-5 col-form-label">0</label> 
						</div>
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="researchIn9">15 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="54000" class="researchInput form-control" type="number" id="researchIn54000" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH54000" class="researchInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="researchIn10">24 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="86400" class="researchInput form-control" type="number" id="researchIn86400" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH86400" class="researchInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row totalDiv">
							<h4 class ="col-4 form-text">Total:</h4>
							<p class="col-6 total form-text researchTotal" id="researchTotal">0</p>
						</div>
					</div>
				</div>
			</div>
			<div id="buildingTab" class=" tab-pane fade in">
				<div id="buildingForm" class="container-fluid">
					<div class="form-group row">
						<div class="card-title col"><h4>Building</h4></div>
					</div>
					<div class="tweak">
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up"  for="buildingIn">1 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="60" class="buildingInput form-control" type="number" id="buildingIn60" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="BLD60" class="buildingInputTotal col-5  col-form-label">0</label> 
							
						</div>
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="buildingIn2">5 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="300" class="buildingInput form-control" type="number" id="buildingIn300" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="BLD300" class=" buildingInputTotal col-5  col-form-label">0</label> 
							
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="buildingIn3">10 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="600" class="buildingInput form-control" type="number" id="buildingIn600" value="0" onclick="if(this.value==0){this.value='';}">
								
							</div>
							<label id="BLD600" class="buildingInputTotal col-5 col-form-label">0</label> 
						</div>

						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="buildingIn4">15 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="900" class="buildingInput form-control" type="number" id="buildingIn900" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="BLD900" class="buildingInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="buildingIn5">30 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="1800" class="buildingInput form-control" type="number" id="buildingIn1800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="BLD1800" class="buildingInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="buildingIn6">60 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="3600" class="buildingInput form-control" type="number" id="buildingIn3600" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="BLD3600" class="buildingInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="buildingIn7">3 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="10800"  class="buildingInput form-control" type="number" id="buildingIn10800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="BLD10800" class="buildingInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="buildingIn8">8 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="28800" class="buildingInput form-control" type="number" id="buildingIn28800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="BLD28800" class="buildingInputTotal col-5 col-form-label">0</label> 
						</div>
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="buildingIn9">15 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="54000" class="buildingInput form-control" type="number" id="buildingIn54000" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="BLD54000" class="buildingInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="buildingIn10">24 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="86400" class="buildingInput form-control" type="number" id="buildingIn86400" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH86400" class="buildingInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row totalDiv">
							<h4 class ="col-4 form-text">Total:</h4>
							<p class="col-6 total form-text buildingTotal" id="buildingTotal">0</p>
						</div>
					</div>
				</div>
			</div>
			<div id="generalTab" class=" tab-pane fade in">
				<div id="generalForm" class="container-fluid">
					<div class="form-group row">
						<div class="card-title col title"><h4>General</h4></div>
					</div>
					<div class="tweak">
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up"  for="generalIn">1 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="60" class="generalInput form-control" type="number" id="generalIn60" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="GNR60" class="generalInputTotal col-5  col-form-label">0</label> 
							
						</div>
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="generalIn2">5 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="300" class="generalInput form-control" type="number" id="generalIn300" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="GNR300" class=" generalInputTotal col-5  col-form-label">0</label> 
							
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="generalIn3">10 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="600" class="generalInput form-control" type="number" id="generalIn600" value="0" onclick="if(this.value==0){this.value='';}">
								
							</div>
							<label id="GNR600" class="generalInputTotal col-5 col-form-label">0</label> 
						</div>

						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="generalIn4">15 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="900" class="generalInput form-control" type="number" id="generalIn900" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="GNR900" class="generalInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="generalIn5">30 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="1800" class="generalInput form-control" type="number" id="generalIn1800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="GNR1800" class="generalInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="generalIn6">60 min</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="3600" class="generalInput form-control" type="number" id="generalIn3600" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="GNR3600" class="generalInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="generalIn7">3 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="10800"  class="generalInput form-control" type="number" id="generalIn10800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="GNR10800" class="generalInputTotal col-5 col-form-label">0</label>
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="generalIn8">8 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="28800" class="generalInput form-control" type="number" id="generalIn28800" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="GNR28800" class="generalInputTotal col-5 col-form-label">0</label> 
						</div>
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="generalIn9">15 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="54000" class="generalInput form-control" type="number" id="generalIn54000" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="GNR54000" class="generalInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row">
							<label class="col-3 col-md-4 col-form-label up" for="generalIn10">24 hrs</label>
							<div class="col-4 col-md-3 ">
								<input data-amt="86400" class="generalInput form-control" type="number" id="generalIn86400" value="0" onclick="if(this.value==0){this.value='';}">
							</div>
							<label id="RSH86400" class="generalInputTotal col-5 col-form-label">0</label> 
						</div>
						
						<div class="form-group row totalDiv">
							<h4 class ="col-4 form-text">Total:</h4>
							<p class="col-6 total form-text generalTotal" id="generalTotal">0</p>
						</div>
					</div>
				</div>
			</div>

					
			<button type="submit" class="signpost mx-auto" id="nextLink"><span class="carousel-control-next-icon"></span>Save and continue: Troop Calculator<span class="carousel-control-next-icon"></span></button> 
					

		 
	</div><!--Card-body closing tag-->	
	</div><!--Card/Wall closing tag-->

	<input type="hidden" class="trainingTotal" name="training">
	<input type="hidden" class="repairTotal" name="repair">
	<input type="hidden" class="researchTotal" name="research">
	<input type="hidden" class="buildingTotal" name="building">
	<input type="hidden" class="generalTotal" name="general">
	 
</form><!--Form div closing tag-->


</div><!--Wrapper closing tag-->
		



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

function secondsToDhms(seconds) {
    seconds = Number(seconds);
    var d = Math.floor(seconds / (3600*24));
    var h = Math.floor(seconds % (3600*24) / 3600);
    var m = Math.floor(seconds % 3600 / 60);
    var s = Math.floor(seconds % 60);

    var dDisplay = d > 0 ? d + (d == 1 ? " D : " : " D : ") : "0 D : ";
    var hDisplay = h > 0 ? h + (h == 1 ? " H : " : " H : ") : "0 H : ";
    var mDisplay = m > 0 ? m + (m == 1 ? " M " : " M ") : "0 M";
    var sDisplay = s > 0 ? s + (s == 1 ? " : s" : " : s") : "";
    return dDisplay + hDisplay + mDisplay + sDisplay;
}

var trainingDict = {
		"TNG60": 0,
		"TNG300": 0,
		"TNG600": 0,
		"TNG1800": 0,
		"TNG3600": 0,
		"TNG10800": 0,
		"TNG28800": 0,
        "TNG54000": 0,
        "TNG86400": 0,
	}

	function updateTrainingTotal() {
		total = 0;
		for(var key in trainingDict) {
			var inputValue = trainingDict[key];
			var labelValue = key.slice(3);
			var totalValue = inputValue * labelValue;
			total += totalValue;		  
	};
		$("#trainingTotal").text(secondsToDhms(total))
		$(".trainingTotal").val(secondsToDhms(total))
	};

$(".trainingInput").on('keyup change', function() {

		var inputValue = $(this).val();
		var labelValue = $(this).attr("data-amt");
		trainingDict["TNG"+labelValue] = inputValue
        $("#TNG"+labelValue).text(secondsToDhms(inputValue * labelValue))
		return updateTrainingTotal();
	});
		
var repairDict = {
		"RPR60": 0,
		"RPR300": 0,
		"RPR600": 0,
		"RPR1800": 0,
		"RPR3600": 0,
		"RPR10800": 0,
		"RPR28800": 0,
        "RPR54000": 0,
        "RPR86400": 0,
	}
var repairTotalSeconds = 0

function updateRepairTotal() {
		total = 0;
		for(var key in repairDict) {
			var inputValue = repairDict[key];
			var labelValue = key.slice(3);
			var totalValue = inputValue * labelValue;
			total += totalValue;		  
	};
		$("#repairTotal").text(secondsToDhms(total))
		$(".repairTotal").val(secondsToDhms(total))
	};

$(".repairInput").on('keyup change', function() {
		var inputValue = $(this).val();
		var labelValue = $(this).attr("data-amt");
		repairDict["RPR"+labelValue] = inputValue
        $("#RPR"+labelValue).text(secondsToDhms(inputValue * labelValue))
		return updateRepairTotal();
	});
$(".foodInput").keyup(function() {

var inputValue = $(this).val();
var labelValue = $(this).attr("data-amt");
foodDict["F"+labelValue] = inputValue
return updateFoodTotal();

});

var researchDict = {
		"RSH60": 0,
		"RSH300": 0,
		"RSH600": 0,
		"RSH1800": 0,
		"RSH3600": 0,
		"RSH10800": 0,
		"RSH28800": 0,
        "RSH54000": 0,
        "RSH86400": 0,
	}
var researchTotalSeconds = 0

function updateResearchTotal() {
		total = 0;
		for(var key in researchDict) {
			var inputValue = researchDict[key];
			var labelValue = key.slice(3);
			var totalValue = inputValue * labelValue;
			total += totalValue;		  
	};
		$("#researchTotal").text(secondsToDhms(total))
		$(".researchTotal").val(secondsToDhms(total))
	};

$(".researchInput").on('keyup change', function() {

		var inputValue = $(this).val();
		var labelValue = $(this).attr("data-amt");
		researchDict["RSH"+labelValue] = inputValue
        $("#RSH"+labelValue).text(secondsToDhms(inputValue * labelValue))
		return updateResearchTotal();
	});

var buildingDict = {
		"BLD60": 0,
		"BLD300": 0,
		"BLD600": 0,
		"BLD1800": 0,
		"BLD3600": 0,
		"BLD10800": 0,
		"BLD28800": 0,
        "BLD54000": 0,
        "BLD86400": 0,
	}
var buildingTotalSeconds = 0

function updateBuildingTotal() {
		total = 0;
		for(var key in buildingDict) {
			var inputValue = buildingDict[key];
			var labelValue = key.slice(3);
			var totalValue = inputValue * labelValue;
			total += totalValue;		  
	};
		$("#buildingTotal").text(secondsToDhms(total))
		$(".buildingTotal").val(secondsToDhms(total))
	};

$(".buildingInput").on('keyup change', function() {

		var inputValue = $(this).val();
		var labelValue = $(this).attr("data-amt");
		buildingDict["BLD"+labelValue] = inputValue
        $("#BLD"+labelValue).text(secondsToDhms(inputValue * labelValue))
		return updateBuildingTotal();
	});

var generalDict = {
		"GNR60": 0,
		"GNR300": 0,
		"GNR600": 0,
		"GNR1800": 0,
		"GNR3600": 0,
		"GNR10800": 0,
		"GNR28800": 0,
        "GNR54000": 0,
        "GNR86400": 0,
	}
var generalTotalSeconds = 0

function updateGeneralTotal() {
		total = 0;
		for(var key in generalDict) {
			var inputValue = generalDict[key];
			var labelValue = key.slice(3);
			var totalValue = inputValue * labelValue;
			total += totalValue;		  
	};
		$("#generalTotal").text(secondsToDhms(total))
		$(".generalTotal").val(secondsToDhms(total))
	};

$(".generalInput").on('keyup change', function() {

		var inputValue = $(this).val();
		var labelValue = $(this).attr("data-amt");
		generalDict["GNR"+labelValue] = inputValue
        $("#GNR"+labelValue).text(secondsToDhms(inputValue * labelValue))
		return updateGeneralTotal();
	});

</script>

    

</body>

</html>