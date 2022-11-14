<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <title>Resource Calculator</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  </head>

<body>
  <div class="container-fluid" id="wrapper">
    <nav id="banner" class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid" id="menu">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.html">
          <img id="logo" src="images/logo1_50perc.png" alt="logo" />
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul id="menuList" class="nav navbar-nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" href="#wrapper">Resource Calculator</a>
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
            <li class="nav-item">
              <a class="nav-link" href="officer-calculator.php">AP/XP/Officer Calculator</a>
            </li>
          </ul>
        </div>
        </div>
    </nav>
    <form method="post" action="sessions.php" id="form">
      <div id="wall" class="card text-center">
        <div id="priority" class="card-header">
          <ul id="menuButts" class="row nav nav-tabs card-header-tabs">
            <li class="nav-item col col-sm-3">
              <a id="foodFormButton" class="nav-link active" data-toggle="tab" href="#foodTab">
                <img class="menuImg" src="images/food.png" alt="Food" />
              </a>
            </li>
            <li class="nav-item col col-sm-3">
              <a id="steelFormButton" class="nav-link" data-toggle="tab" href="#steelTab">
                <img class="menuImg" src="images/steel.png" alt="Steel" />
              </a>
            </li>
            <li class="nav-item col col-sm-3">
              <a id="oilFormButton" class="nav-link" data-toggle="tab" href="#oilTab">
                <img class="menuImg" src="images/oil.png" alt="Oil" />
              </a>
            </li>
            <li class="nav-item col col-sm-3">
              <a id="energyFormButton" class="nav-link" data-toggle="tab" href="#energyTab">
                <img class="menuImg" src="images/energy.png" alt="Energy" />
              </a>
            </li>
            </ul>
            </div>
        <div id="conDiv" class="tab-content card-body mx-auto">
          <div id="foodTab" class="tab-pane fade in active show">
            <div id="foodForm" class="container-fluid">
              <div class="form-group row justify-content-center">
                <div class="card-title col">
                  <h4>Food</h4>
                </div>
                </div>
                <div class="tweak">
                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="foodIn">1,000</label>
                    <div class="col-4 col-lg-3">
                    <input class="foodInput form-control" type="number" data-amt="1000" id="foodIn" />
                    </div>
                    <label id="foodTotal1000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="foodIn2">10,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="foodInput form-control" type="number" data-amt="10000" id="foodIn2" />
                    </div>
                    <label id="foodTotal10000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="foodIn3">50,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="foodInput form-control" type="number" data-amt="50000" id="foodIn3" />
                    </div>
                    <label id="foodTotal50000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="foodIn4">150,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="foodInput form-control" type="number" data-amt="150000" id="foodIn4" />
                    </div>
                    <label id="foodTotal150000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="foodIn5">500,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="foodInput form-control" type="number" data-amt="500000" id="foodIn5" />
                    </div>
                    <label id="foodTotal500000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="foodIn6">1,500,000</label>
                  <div class="col-4 col-lg-3">
                    <input data-amt="1500000" class="foodInput form-control" type="number" id="foodIn6" />
                    </div>
                    <label id="foodTotal1500000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="foodIn7">5,000,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="foodInput form-control" type="number" data-amt="5000000" id="foodIn7" />
                    </div>
                    <label id="foodTotal5000000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                    <div class="form-group row">
                      <label class="col-3 col-md-4 col-form-label" for="foodIn1">Open</label>
                      <div class="col-5 col-md-4 col-lg-3">
                    <input class="foodInput form-control" type="number" data-amt="1" id="foodIn1" />
                    </div>
                    <label id="foodTotal1" class="col-4 col-md-5 col-form-label">0</label>
                    </div>
                <div class="totalDiv form-group row">
                  <h4 class="col-4 form-text">Total:</h4>
                  <p class="col-6 total form-text foodTotal" id="foodTotal">0</p>
                </div>
                </div>
                </div>
                </div>
                <div id="steelTab" class="tab-pane fade in">
                  <div id="steelForm" class="container-fluid">
                    <div class="form-group row justify-content-center">
                <div class="card-title col">
                  <h4>Steel</h4>
                </div>
                </div>
                <div class="tweak">
                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="steelIn">1,000</label>
                    <div class="col-4 col-lg-3">
                    <input class="steelInput form-control" type="number" data-amt="1000" id="steelIn" />
                    </div>
                    <label id="steelTotal1000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="steelIn2">10,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="steelInput form-control" type="number" data-amt="10000" id="steelIn2" />
                    </div>
                    <label id="steelTotal10000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="steelIn3">50,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="steelInput form-control" type="number" data-amt="50000" id="steelIn3" />
                    </div>
                    <label id="steelTotal50000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="steelIn4">150,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="steelInput form-control" type="number" data-amt="150000" id="steelIn4" />
                    </div>
                    <label id="steelTotal150000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="steelIn5">500,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="steelInput form-control" type="number" data-amt="500000" id="steelIn5" />
                    </div>
                    <label id="steelTotal500000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="steelIn6">1,500,000</label>
                  <div class="col-4 col-lg-3">
                    <input data-amt="1500000" class="steelInput form-control" type="number" id="steelIn6" />
                    </div>
                    <label id="steelTotal1500000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="steelIn7">5,000,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="steelInput form-control" type="number" data-amt="5000000" id="steelIn7" />
                    </div>
                    <label id="steelTotal5000000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-3 col-md-4 col-form-label" for="steelIn1">Open</label>
                  <div class="col-5 col-md-4 col-lg-3">
                    <input class="steelInput form-control" type="number" data-amt="1" id="steelIn1" />
                    </div>
                    <label id="steelTotal1" class="col-4 col-md-5 col-form-label">0</label>
                    </div>
                <div class="form-group row totalDiv">
                  <h4 class="col-4 form-text">Total:</h4>
                  <p class="col-6 total form-text steelTotal" id="steelTotal">0</p>
                </div>
                </div>
                </div>
                </div>
          <div id="oilTab" class="tab-pane fade in">
            <div id="oilForm" class="container-fluid">
              <div class="form-group row justify-content-center">
                <div class="card-title col">
                  <h4>Oil</h4>
                </div>
                </div>
                <div class="tweak">
                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="oilIn">750</label>
                    <div class="col-4 col-lg-3">
                    <input class="oilInput form-control" type="number" data-amt="750" id="oilIn" />
                    </div>
                    <label id="oilTotal750" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="oilIn2">7,500</label>
                  <div class="col-4 col-lg-3">
                    <input class="oilInput form-control" type="number" data-amt="7500" id="oilIn2" />
                    </div>
                    <label id="oilTotal7500" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="oilIn3">37,500</label>
                  <div class="col-4 col-lg-3">
                    <input class="oilInput form-control" type="number" data-amt="37500" id="oilIn3" />
                    </div>
                    <label id="oilTotal37500" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="oilIn4">112,500</label>
                  <div class="col-4 col-lg-3">
                    <input class="oilInput form-control" type="number" data-amt="112500" id="oilIn4" />
                    </div>
                    <label id="oilTotal112500" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="oilIn5">375,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="oilInput form-control" type="number" data-amt="375000" id="oilIn5" />
                    </div>
                    <label id="oilTotal375000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="oilIn6">1,125,000</label>
                  <div class="col-4 col-lg-3">
                    <input data-amt="1125000" class="oilInput form-control" type="number" id="oilIn6" />
                    </div>
                    <label id="oilTotal1125000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="oilIn7">3,750,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="oilInput form-control" type="number" data-amt="3750000" id="oilIn7" />
                    </div>
                    <label id="oilTotal3750000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-3 col-md-4 col-form-label" for="oilInC1">Open</label>
                  <div class="col-5 col-md-4 col-lg-3">
                    <input class="oilInput form-control" type="number" data-amt="1" id="oilIn1" />
                  </div>
                  <label id="oilTotal1" class="col-4 col-md-5 col-form-label">0</label>
                </div>
                <div class="form-group row totalDiv">
                  <h4 class="col-4 form-text">Total:</h4>
                  <p class="col-6 total form-text oilTotal" id="oilTotal">0</p>
                </div>
                </div>
                </div>
                </div>
          <div id="energyTab" class="tab-pane fade in">
            <div id="energyForm" class="container-fluid">
              <div class="form-group row justify-content-center">
                <div class="card-title col">
                  <h4>Energy</h4>
                </div>
                </div>
                <div class="tweak">
                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="energyIn">500</label>
                    <div class="col-4 col-lg-3">
                    <input class="energyInput form-control" type="number" data-amt="500" id="energyIn" />
                    </div>
                    <label id="energyTotal500" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="energyIn2">3,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="energyInput form-control" type="number" data-amt="3000" id="energyIn2" />
                    </div>
                    <label id="energyTotal3000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="energyIn3">15,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="energyInput form-control" type="number" data-amt="15000" id="energyIn3" />
                    </div>
                    <label id="energyTotal15000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="energyIn4">50,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="energyInput form-control" type="number" data-amt="50000" id="energyIn4" />
                    </div>
                    <label id="energyTotal50000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="energyIn5">200,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="energyInput form-control" type="number" data-amt="200000" id="energyIn5" />
                    </div>
                    <label id="energyTotal200000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="energyIn6">600,000</label>
                  <div class="col-4 col-lg-3">
                    <input data-amt="600000" class="energyInput form-control" type="number" id="energyIn6" />
                    </div>
                    <label id="energyTotal600000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label" for="energyIn7">2,000,000</label>
                  <div class="col-4 col-lg-3">
                    <input class="energyInput form-control" type="number" data-amt="2000000" id="energyIn7" />
                    </div>
                    <label id="energyTotal2000000" class="col-4 col-lg-5 col-form-label">0</label>
                    </div>
                <div class="form-group row">
                  <label class="col-3 col-md-4 col-form-label" for="energyIn1">Open</label>
                  <div class="col-5 col-md-4 col-lg-3">
                    <input class="energyInput form-control" type="number" data-amt="1" id="energyIn1" />
                    </div>
                    <label id="energyTotal1" class="col-4 col-md-5 col-form-label">0</label>
                    </div>
                <div class="form-group row totalDiv">
                  <h4 class="col-4 form-text">Total:</h4>
                  <p class="col-6 total form-text energyTotal" id="energyTotal">0</p>
                </div>
                </div>
                </div>
                </div>
          <button type="submit" class="signpost" id="nextLink">
            <span class="carousel-control-next-icon"></span>Save and continue: Speedup
            Calculator<span class="carousel-control-next-icon"></span>
          </button>
          </div>
          <!--Card-body closing tag-->
          </div>
          <!--Card/Wall closing tag-->
          <input type="hidden" class="foodTotal" name="food" />
          <input type="hidden" class="steelTotal" name="steel" />
          <input type="hidden" class="oilTotal" name="oil" />
          <input type="hidden" class="energyTotal" name="energy" />
          </form>
          <!--Form div closing tag-->
          </div>
  <!-- jQuery first, then Popper.js, then Bootstrap JS *NOTE* all plugins depend on jQuery (this means jQuery must be included before the plugin files -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
  <script src="scripts/resource-calculator.js"></script>
</body>

</html>