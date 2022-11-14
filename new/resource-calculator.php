<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>Resource Calculator</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous" />
    <!--THIS CSS FILE HAS TO BE FIRST-->

    <style>
      #logo {
        width: 3.5em;
      }

      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type="number"] {
        -moz-appearance: textfield;
      }

      @media (max-width: 360.98px) /*motoG4 GalaxyS5 iphone5/SE*/ {
        html,
        body {
          position: fixed;
          overflow: hidden;
        }
        body {
          height: 100vh;
          width: 100vw;
          padding: 0;
        }
        #wrapper {
          padding: 0;
        }

        #banner {
          /*background-color: rgba(59, 43, 56, 0.95) !important;*/
          background-color: rgba(59, 43, 56, 1) !important;
          padding: 0 0 0 1em;
        }
        #logo {
          width: 2em;
        }

        #wall {
          background-color: rgba(59, 43, 56, 0.63);
          position: relative;
          top: -0.2em;
        }
        #priority {
          position: relative;
          top: 0.1em;
          left: -0.1em;
          /*background-color: rgba(59, 43, 56, 0.95);*/
          background-color: rgba(69, 54, 66, 0.96) !important;
          height: 3em;
          width: 100vw !important;
        }
        .total {
          font-size: 1.4em;
          position: relative;
        }

        #menuButts {
          position: relative;
          top: -0.8em;
        }
        .formButts {
          padding: 0;
          height: 2.2em !important;
          position: relative;
        }
        .menuImg {
          display: none;
        }
        #intro {
          position: absolute;
          text-align: center;
          background-color: aqua;
          width: 100%;
          height: 20vh;
          top: 20vh;
        }
        #foodFormButton {
          height: 3em;
          background-image: url(images/food.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #steelFormButton {
          height: 3em;
          background-image: url(images/steel.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #oilFormButton {
          height: 3em;
          background-image: url(images/oil.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #energyFormButton {
          height: 3em;
          background-image: url(images/energy.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }

        .tab-pane {
          background-color: rgba(59, 43, 56, 1) !important;
          position: relative;
          top: -1em;
          height: 70vh;
          font-size: 0.9em;
          padding-top: 0.5em;
          padding-bottom: 0;
        }
        #conDiv {
          color: aliceblue;
          height: 100vh !important;
        }
        .form-group {
          padding: 0 0 1em 0;
          margin-bottom: 0;
          position: relative;
        }
        .tweak {
          position: relative;
          top: -1.5em;
        }
        .totalDiv {
          position: relative;

          left: 0.5em;
        }

        .col-form-label {
          text-align: left;
          height: 1.5em;
          position: relative;
          top: -0.1em;
        }
        #nextLink {
          position: absolute;
          bottom: 10.5em;
          left: 0.15em;
          width: 23em;
        }

        .form-control {
          height: 1.7em;
          position: relative;
        }

        #foodTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #steelTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #oilTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #energyTab {
          background-color: rgba(255, 255, 255, 0.6);
        }

        .col-form-label {
          text-align: center;
        }

        li:hover {
          background-color: rgba(255, 255, 255, 0.5);
        }
        li:target {
          background-color: rgba(255, 255, 255, 0.5);
        }
      }
      @media (min-width: 361px) and (max-width: 375.98px) /*iphone X and 7/8/9*/ {
        html,
        body {
          position: fixed;
          overflow: hidden;
        }
        body {
          height: 100vh;
          width: 100vw;
          padding: 0;
        }
        #wrapper {
          padding: 0;
        }

        #banner {
          /*background-color: rgba(59, 43, 56, 0.95) !important;*/
          background-color: rgba(59, 43, 56, 1) !important;
          padding: 0 0 0 1em;
        }
        #logo {
          width: 2em;
        }

        #wall {
          background-color: rgba(59, 43, 56, 0.63);
          position: relative;
          top: -0.2em;
        }
        #priority {
          position: relative;
          top: 0.1em;
          left: -0.1em;
          /*background-color: rgba(59, 43, 56, 0.95);*/
          background-color: rgba(69, 54, 66, 0.96) !important;
          height: 3em;
          width: 100vw !important;
        }
        .total {
          font-size: 1.4em;
          position: relative;
        }

        #menuButts {
          position: relative;
          top: -0.8em;
        }
        .formButts {
          padding: 0;
          height: 2.2em !important;
          position: relative;
        }
        .menuImg {
          display: none;
        }
        #intro {
          position: absolute;
          text-align: center;
          background-color: aqua;
          width: 100%;
          height: 20vh;
          top: 20vh;
        }
        #foodFormButton {
          height: 3em;
          background-image: url(images/food.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #steelFormButton {
          height: 3em;
          background-image: url(images/steel.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #oilFormButton {
          height: 3em;
          background-image: url(images/oil.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #energyFormButton {
          height: 3em;
          background-image: url(images/energy.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }

        .tab-pane {
          background-color: rgba(59, 43, 56, 1) !important;
          position: relative;
          top: -1.3em;
          height: 70vh;
          font-size: 0.9em;
          padding-top: 0.5em;
          padding-bottom: 0;
        }
        #conDiv {
          color: aliceblue;
          height: 100vh !important;
        }
        .form-group {
          padding: 0 0 1em 0;
          margin-bottom: 0;
          position: relative;
        }
        .tweak {
          position: relative;
          top: -1.5em;
        }
        .totalDiv {
          position: relative;
          left: 0.5em;
        }

        .col-form-label {
          text-align: left;
          height: 1.5em;
          position: relative;
          top: -0.1em;
        }
        #nextLink {
          position: absolute;
          bottom: 10.5em;
          left: 0.15em;
          width: 23em;
        }

        .form-control {
          height: 1.7em;
          position: relative;
        }

        #foodTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #steelTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #oilTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #energyTab {
          background-color: rgba(255, 255, 255, 0.6);
        }

        .col-form-label {
          text-align: center;
        }

        li:hover {
          background-color: rgba(255, 255, 255, 0.5);
        }
        li:target {
          background-color: rgba(255, 255, 255, 0.5);
        }
      }
      @media (min-width: 410px) and (max-width: 767.98px) /*Pixel2 Pixel2XL iphone6/7/8PLUS */ {
        html,
        body {
          position: fixed;
          overflow: hidden;
        }
        body {
          height: 100vh;
          width: 100vw;
          padding: 0;
        }
        #wrapper {
          padding: 0;
        }

        #banner {
          /*background-color: rgba(59, 43, 56, 0.95) !important;*/
          background-color: rgba(59, 43, 56, 1) !important;
          padding: 0 0 0 1em;
        }
        #logo {
          width: 2em;
        }

        #wall {
          background-color: rgba(59, 43, 56, 0.63);
          position: relative;
          top: -0.2em;
        }
        #priority {
          position: relative;
          top: 0.1em;
          left: -0.1em;
          /*background-color: rgba(59, 43, 56, 0.95);*/
          background-color: rgba(69, 54, 66, 0.96) !important;
          height: 3em;
          width: 100vw !important;
        }
        .total {
          font-size: 1.4em;
          position: relative;
        }

        #menuButts {
          position: relative;
          top: -0.8em;
        }
        .formButts {
          padding: 0;
          height: 2.2em !important;
          position: relative;
        }
        .menuImg {
          display: none;
        }
        #intro {
          position: absolute;
          text-align: center;
          background-color: aqua;
          width: 100%;
          height: 20vh;
          top: 20vh;
        }
        #foodFormButton {
          height: 3em;
          background-image: url(images/food.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #steelFormButton {
          height: 3em;
          background-image: url(images/steel.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #oilFormButton {
          height: 3em;
          background-image: url(images/oil.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #energyFormButton {
          height: 3em;
          background-image: url(images/energy.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }

        .tab-pane {
          background-color: rgba(59, 43, 56, 1) !important;
          position: relative;
          top: -1.3em;
          height: 70vh;
          font-size: 0.9em;
          padding-top: 0.5em;
          padding-bottom: 0;
        }
        #conDiv {
          color: aliceblue;
          height: 100vh !important;
        }
        .form-group {
          padding: 0 0 1em 0;
          margin-bottom: 0;
          position: relative;
        }
        .tweak {
          position: relative;
          top: -1.5em;
        }
        .totalDiv {
          position: relative;
          left: 0.5em;
        }

        .col-form-label {
          text-align: left;
          height: 1.5em;
          position: relative;
          top: -0.1em;
        }
        #nextLink {
          position: absolute;
          bottom: 10.5em;
          left: 6.5em;
          width: 21em;
        }

        .form-control {
          height: 1.7em;
          position: relative;
        }

        #foodTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #steelTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #oilTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #energyTab {
          background-color: rgba(255, 255, 255, 0.6);
        }

        .col-form-label {
          text-align: center;
        }

        li:hover {
          background-color: rgba(255, 255, 255, 0.5);
        }
        li:target {
          background-color: rgba(255, 255, 255, 0.5);
        }
      }
      @media (min-width: 768px) and (max-width: 900px) /*iPad*/ {
        html,
        body {
          position: fixed;
          overflow: hidden;
        }
        body {
          height: 100vh;
          width: 100vw;
          padding: 0;
        }
        #wrapper {
          padding: 0;
        }

        #banner {
          /*background-color: rgba(59, 43, 56, 0.95) !important;*/
          background-color: rgba(59, 43, 56, 1) !important;
          padding: 0 0 0 1em;
        }
        #logo {
          width: 2em;
        }

        #wall {
          background-color: rgba(59, 43, 56, 0.63);
          position: relative;
          top: -0.2em;
        }
        #priority {
          position: relative;
          top: 0.1em;
          left: -0.1em;
          /*background-color: rgba(59, 43, 56, 0.95);*/
          background-color: rgba(69, 54, 66, 0.96) !important;
          height: 3em;
          width: 100vw !important;
        }
        .total {
          font-size: 1.4em;
          position: relative;
        }

        #menuButts {
          position: relative;
          top: -0.8em;
        }
        .formButts {
          padding: 0;
          height: 2.2em !important;
          position: relative;
        }
        .menuImg {
          display: none;
        }
        #intro {
          position: absolute;
          text-align: center;
          background-color: aqua;
          width: 100%;
          height: 20vh;
          top: 20vh;
        }
        #foodFormButton {
          height: 3em;
          background-image: url(images/food.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #steelFormButton {
          height: 3em;
          background-image: url(images/steel.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #oilFormButton {
          height: 3em;
          background-image: url(images/oil.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
        #energyFormButton {
          height: 3em;
          background-image: url(images/energy.png);
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }

        .tab-pane {
          background-color: rgba(59, 43, 56, 1) !important;
          position: relative;
          top: -1em;
          height: 70vh;
          font-size: 0.9em;
          padding-top: 0.5em;
          padding-bottom: 0;
        }
        #conDiv {
          color: aliceblue;
          height: 100vh !important;
        }
        .form-group {
          padding: 0 0 1em 0;
          margin-bottom: 0;
          position: relative;
        }
        .tweak {
          position: relative;
          top: -1.5em;
        }
        .totalDiv {
          position: relative;
          left: 0.5em;
        }

        .col-form-label {
          text-align: left;
          height: 1.5em;
          position: relative;
          top: -0.1em;
        }
        #nextLink {
          position: absolute;
          bottom: 10.5em;
          left: 0.15em;
          width: 23em;
        }

        .form-control {
          height: 1.7em;
          position: relative;
        }

        #foodTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #steelTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #oilTab {
          background-color: rgba(255, 255, 255, 0.6);
        }
        #energyTab {
          background-color: rgba(255, 255, 255, 0.6);
        }

        .col-form-label {
          text-align: center;
        }

        li:hover {
          background-color: rgba(255, 255, 255, 0.5);
        }
        li:target {
          background-color: rgba(255, 255, 255, 0.5);
        }
      }

      @media (min-width: 900.98px) /*iPadPro and desktops*/ {
        html,
        body {
          position: fixed;
          overflow: hidden;
        }
        body {
          height: 100vh;
          width: 100vw;
          padding: 0;
        }
        .repel {
          margin-right: 4em;
        }
        #wrapper {
          padding: 0;
        }

        #banner {
          height: 4.3em;
          /*background-color: rgba(59, 43, 56, 0.95) !important;*/
          background-color: rgba(59, 43, 56, 1) !important;
          z-index: 670;
        }
        #priority {
          background-color: rgba(69, 54, 66, 0.76) !important;
          height: 4.5em;
          width: 100vw;
          z-index: 669;
          margin-left: -0.2em;
          position: relative;
          left: 0.2em;
        }
        #logo {
          width: 3.5em;
        }

        .menuImg {
          height: 3.5em;
        }

        #wall {
          background-image: url(images/linda.png), url(images/linda.png);
          background-repeat: no-repeat, no-repeat;
          background-position: left, right;
          background-size: contain, contain;
          background-color: rgba(59, 43, 56, 0.63);
          height: 93vh;
          z-index: 668;
        }

        .card-title {
          padding-top: 0.5em;
        }

        #conDiv {
          position: relative;
          top: -1.2em;
          width: 50vw;
        }

        .form-group {
          height: 2em;
        }
        .total {
          height: 1.5em;
          position: relative;
          left: 0.7em;
          border-radius: 0.2em;
        }
        .totalDiv {
          text-align: center;
        }

        .tab-pane {
          padding-bottom: 1em;
        }

        #menuButts {
          position: relative;
          top: -0.85em;
        }

        #nextLink {
          width: 20em;

          position: absolute;
          left: 8em;
          bottom: 35vh;
          background-color: rgba(255, 255, 255, 0.5);
        }
        #prev {
          width: 10em;
          height: 10em;
          position: absolute;
          left: -10em;
          bottom: 35vh;
        }
        #foodTab {
          background-color: rgba(255, 255, 255, 0.5);
        }
        .foodInput {
          height: 2em;
        }
        #steelTab {
          background-color: rgba(255, 255, 255, 0.5);
        }
        .steelInput {
          height: 2em;
        }
        #oilTab {
          background-color: rgba(255, 255, 255, 0.5);
        }
        .oilInput {
          height: 2em;
        }
        #energyTab {
          background-color: rgba(255, 255, 255, 0.5);
        }
        .energyInput {
          height: 2em;
        }
        .col-form-label {
          text-align: center;
        }

        .total {
          font-size: 1.4em;
        }
        #nextLink {
          position: absolute;
          bottom: 0;
          right: 0;
          font-size: 1.2em;
          padding: 0 0.2em 0.2em 0;
          background-color: rgba(59, 43, 56, 0.85);
        }
        li:hover {
          background-color: rgba(255, 255, 255, 0.5);
        }
        li:target {
          background-color: rgba(255, 255, 255, 0.5);
        }
      }
    </style>
  </head>

  <body>
    <div class="container-fluid" id="wrapper">
      <nav id="banner" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid" id="menu">
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav">
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
        <!--#menu closing tag-->
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
          <!--card-header closing tag-->
          <!--<div id="intro">instructions go here...</div>-->
          <div id="conDiv" class="tab-content card-body mx-auto">
            <div id="foodTab" class="tab-pane fade in active show">
              <div id="foodForm" class="container-fluid">
                <div class="form-group row justify-content-center">
                  <div class="card-title col"><h4>Food</h4></div>
                </div>
                <div class="tweak">
                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="foodIn">1,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="foodInput form-control"
                        type="number"
                        data-amt="1000"
                        id="foodIn" />
                    </div>
                    <label id="foodTotal1000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="foodIn2">10,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="foodInput form-control"
                        type="number"
                        data-amt="10000"
                        id="foodIn2" />
                    </div>
                    <label id="foodTotal10000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="foodIn3">50,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="foodInput form-control"
                        type="number"
                        data-amt="50000"
                        id="foodIn3" />
                    </div>
                    <label id="foodTotal50000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="foodIn4">150,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="foodInput form-control"
                        type="number"
                        data-amt="150000"
                        id="foodIn4" />
                    </div>
                    <label id="foodTotal150000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="foodIn5">500,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="foodInput form-control"
                        type="number"
                        data-amt="500000"
                        id="foodIn5" />
                    </div>
                    <label id="foodTotal500000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="foodIn6">1,500,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        data-amt="1500000"
                        class="foodInput form-control"
                        type="number"
                        id="foodIn6" />
                    </div>
                    <label id="foodTotal1500000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="foodIn7">5,000,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="foodInput form-control"
                        type="number"
                        data-amt="5000000"
                        id="foodIn7" />
                    </div>
                    <label id="foodTotal5000000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>
                  <div class="form-group row">
                    <label class="col-3 col-md-4 col-form-label" for="foodIn1">Open</label>
                    <div class="col-5 col-md-4 col-lg-3">
                      <input
                        class="foodInput form-control"
                        type="number"
                        data-amt="1"
                        id="foodIn1" />
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
                  <div class="card-title col"><h4>Steel</h4></div>
                </div>
                <div class="tweak">
                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="steelIn">1,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="steelInput form-control"
                        type="number"
                        data-amt="1000"
                        id="steelIn" />
                    </div>
                    <label id="steelTotal1000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="steelIn2">10,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="steelInput form-control"
                        type="number"
                        data-amt="10000"
                        id="steelIn2" />
                    </div>
                    <label id="steelTotal10000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="steelIn3">50,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="steelInput form-control"
                        type="number"
                        data-amt="50000"
                        id="steelIn3" />
                    </div>
                    <label id="steelTotal50000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="steelIn4">150,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="steelInput form-control"
                        type="number"
                        data-amt="150000"
                        id="steelIn4" />
                    </div>
                    <label id="steelTotal150000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="steelIn5">500,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="steelInput form-control"
                        type="number"
                        data-amt="500000"
                        id="steelIn5" />
                    </div>
                    <label id="steelTotal500000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="steelIn6">1,500,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        data-amt="1500000"
                        class="steelInput form-control"
                        type="number"
                        id="steelIn6" />
                    </div>
                    <label id="steelTotal1500000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="steelIn7">5,000,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="steelInput form-control"
                        type="number"
                        data-amt="5000000"
                        id="steelIn7" />
                    </div>
                    <label id="steelTotal5000000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-3 col-md-4 col-form-label" for="steelIn1">Open</label>
                    <div class="col-5 col-md-4 col-lg-3">
                      <input
                        class="steelInput form-control"
                        type="number"
                        data-amt="1"
                        id="steelIn1" />
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
                  <div class="card-title col"><h4>Oil</h4></div>
                </div>
                <div class="tweak">
                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="oilIn">750</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="oilInput form-control"
                        type="number"
                        data-amt="750"
                        id="oilIn" />
                    </div>
                    <label id="oilTotal750" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="oilIn2">7,500</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="oilInput form-control"
                        type="number"
                        data-amt="7500"
                        id="oilIn2" />
                    </div>
                    <label id="oilTotal7500" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="oilIn3">37,500</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="oilInput form-control"
                        type="number"
                        data-amt="37500"
                        id="oilIn3" />
                    </div>
                    <label id="oilTotal37500" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="oilIn4">112,500</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="oilInput form-control"
                        type="number"
                        data-amt="112500"
                        id="oilIn4" />
                    </div>
                    <label id="oilTotal112500" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="oilIn5">375,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="oilInput form-control"
                        type="number"
                        data-amt="375000"
                        id="oilIn5" />
                    </div>
                    <label id="oilTotal375000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="oilIn6">1,125,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        data-amt="1125000"
                        class="oilInput form-control"
                        type="number"
                        id="oilIn6" />
                    </div>
                    <label id="oilTotal1125000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="oilIn7">3,750,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="oilInput form-control"
                        type="number"
                        data-amt="3750000"
                        id="oilIn7" />
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
                  <div class="card-title col"><h4>Energy</h4></div>
                </div>
                <div class="tweak">
                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="energyIn">500</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="energyInput form-control"
                        type="number"
                        data-amt="500"
                        id="energyIn" />
                    </div>
                    <label id="energyTotal500" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="energyIn2">3,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="energyInput form-control"
                        type="number"
                        data-amt="3000"
                        id="energyIn2" />
                    </div>
                    <label id="energyTotal3000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="energyIn3">15,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="energyInput form-control"
                        type="number"
                        data-amt="15000"
                        id="energyIn3" />
                    </div>
                    <label id="energyTotal15000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="energyIn4">50,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="energyInput form-control"
                        type="number"
                        data-amt="50000"
                        id="energyIn4" />
                    </div>
                    <label id="energyTotal50000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="energyIn5">200,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="energyInput form-control"
                        type="number"
                        data-amt="200000"
                        id="energyIn5" />
                    </div>
                    <label id="energyTotal200000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="energyIn6">600,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        data-amt="600000"
                        class="energyInput form-control"
                        type="number"
                        id="energyIn6" />
                    </div>
                    <label id="energyTotal600000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" for="energyIn7">2,000,000</label>
                    <div class="col-4 col-lg-3">
                      <input
                        class="energyInput form-control"
                        type="number"
                        data-amt="2000000"
                        id="energyIn7" />
                    </div>
                    <label id="energyTotal2000000" class="col-4 col-lg-5 col-form-label">0</label>
                  </div>

                  <div class="form-group row">
                    <label class="col-3 col-md-4 col-form-label" for="energyIn1">Open</label>
                    <div class="col-5 col-md-4 col-lg-3">
                      <input
                        class="energyInput form-control"
                        type="number"
                        data-amt="1"
                        id="energyIn1" />
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
    <script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-31DFNC9NYP"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "G-31DFNC9NYP");
    </script>

    <script>
      function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }

      var foodDict = {
        F1: 0,
        F1000: 0,
        F10000: 0,
        F50000: 0,
        F150000: 0,
        F500000: 0,
        F1500000: 0,
        F50000000: 0,
      };

      function updateFoodTotal() {
        total = 0;
        for (var key in foodDict) {
          var inputValue = foodDict[key];
          var labelValue = key.slice(1);
          var totalValue = inputValue * labelValue;
          $("#foodTotal" + labelValue).text(formatNumber(totalValue));
          total += totalValue;
          foodTotal = total;
        }
        total = formatNumber(total);
        $("#foodTotal").text(total);
        $(".foodTotal").val(total);
      }

      $(".foodInput").keyup(function () {
        var inputValue = $(this).val();
        var labelValue = $(this).attr("data-amt");
        foodDict["F" + labelValue] = inputValue;
        return updateFoodTotal();
      });

      var steelDict = {
        S1000: 0,
        S10000: 0,
        S50000: 0,
        S150000: 0,
        S500000: 0,
        S1500000: 0,
        S50000000: 0,
      };

      function updateSteelTotal() {
        total = 0;
        for (var key in steelDict) {
          var inputValue = steelDict[key];
          var labelValue = key.slice(1);
          var totalValue = inputValue * labelValue;
          $("#steelTotal" + labelValue).text(formatNumber(totalValue));
          total += totalValue;
          steelTotal = total;
        }
        total = formatNumber(total);
        $("#steelTotal").text(total);
        $(".steelTotal").val(total);
      }

      $(".steelInput").keyup(function () {
        var inputValue = $(this).val();
        var labelValue = $(this).attr("data-amt");
        steelDict["S" + labelValue] = inputValue;
        return updateSteelTotal();
      });

      var oilDict = {
        FU750: 0,
        FU7500: 0,
        FU37500: 0,
        FU112500: 0,
        FU375000: 0,
        FU1125000: 0,
        FU37500000: 0,
      };

      function updateOilTotal() {
        total = 0;
        for (var key in oilDict) {
          var inputValue = oilDict[key];
          var labelValue = key.slice(2);
          var totalValue = inputValue * labelValue;
          $("#oilTotal" + labelValue).text(formatNumber(totalValue));
          total += totalValue;
          oilTotal = total;
        }
        total = formatNumber(total);
        $("#oilTotal").text(total);
        $(".oilTotal").val(total);
      }

      $(".oilInput").keyup(function () {
        var inputValue = $(this).val();
        var labelValue = $(this).attr("data-amt");
        oilDict["FU" + labelValue] = inputValue;
        return updateOilTotal();
      });

      var energyDict = {
        E500: 0,
        E3000: 0,
        E15000: 0,
        E50000: 0,
        E200000: 0,
        E600000: 0,
        E20000000: 0,
      };

      function updateEnergyTotal() {
        total = 0;
        for (var key in energyDict) {
          var inputValue = energyDict[key];
          var labelValue = key.slice(1);
          var totalValue = inputValue * labelValue;
          $("#energyTotal" + labelValue).text(formatNumber(totalValue));
          total += totalValue;
          energyTotal = total;
        }
        total = formatNumber(total);
        $("#energyTotal").text(total);
        $(".energyTotal").val(total);
      }

      $(".energyInput").keyup(function () {
        var inputValue = $(this).val();
        var labelValue = $(this).attr("data-amt");
        energyDict["E" + labelValue] = inputValue;
        return updateEnergyTotal();
      });
    </script>
  </body>
</html>
