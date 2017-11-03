<?php

  include("Model.php");

  $database = new Model();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jovenes Profesionales</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script src="js/jquery.validate.js"></script>  
	<script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/localization/messages_es_AR.js"> </script>
  <script>
        $("#registro").validate();
  </script>
  <style>
    
  
    .col-container {
	    display: table; /* Make the container element behave like a table */
	    width: 100%; /* Set full-width to expand the whole page */
	}

	.col {
	    display: table-cell; /* Make elements inside the container behave like table cells */
	}



    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) 
    .row.content {height: auto}*/
    
    /* Set gray background color and 100% height 
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      min-height: 200px;
    }*/
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <!--  <div id='logo' style='background:url("LOGO_BuenosAiresCiudad_REF.jpg")'>-->
    	
    </div>
    	
       

       
       <!--
      <a class="navbar-brand" href="#">Logo</a>
      -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <div class="col-sm-2 text-middle"> 
      	<!--<img src="LOGO_BuenosAiresCiudad_REF.jpg" alt="Logo" width="200">-->
      </div>
      <div class="col-sm-6 text-middle"> 
      	<a href="index.php"><img src="LOGO_BuenosAiresCiudad_REF.jpg" alt="Logo" width="200"></a>
      </div>
      <!--
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center" style="padding-bottom: 1cm">    
  
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <!--
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>-->
    </div>
	    <div class="col-sm-8 text-left" style = "overflow: auto"> 
	      <h2>Resumen de usuarios</h2>
	      <p>A continuación se presenta un resumen de los datos de los usuarios del sistema.</p>
	        <a href="index.php"  class="btn btn-info" type="submit" style=" padding: 7px;"> Volver atrás</a>  
	        
          <p> &nbsp</p>
				<?php
					$database->load();
				?>
	        
	    
	      

	    </div>

    <div class="col-sm-2 sidenav">		</div>
    </div>

  </div>
</div>


<footer class="container-fluid text-center">
  <p>2017</p>
</footer>

</body>
</html>



        <!-- /#page-wrapper -->



</body>
</html>