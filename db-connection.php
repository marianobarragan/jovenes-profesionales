
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
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      min-height: 200px;
    }
    
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
	    <div class="col-sm-8 text-left"> 
	      <h2>Registro exitoso!</h2>
	      <p>Tu cuenta ya fue creada en el sistema.</p>
	          
	      
<?php

	include("Model.php");

	$database = new Model();
	

	function getPost($key, $default) {
	    if (isset($_POST[$key]))
	        return $_POST[$key];
	    return $default;
	}

	if(isset($_POST)==true && empty($_POST)==false){
		
		$datos_persona["nombre"] = $_POST["nombre"];
		$datos_persona["apellido"] = $_POST["apellido"];//"apellido"; 
		
		$datos_persona["id_sexo"] = $database->find_sexo_id($_POST["sexo"]); 
		$datos_persona["id_estado_civil"] = $database->find_estado_civil_id($_POST["estado_civil"]); ;
		
		$datos_persona["dni"] =$_POST["dni"];;
		$datos_persona["telefono_fijo"] = $_POST["telefono_fijo"];
		$datos_persona["telefono_celular"] = $_POST["telefono_celular"];
		$datos_persona["objetivo_laboral"] = $_POST["objetivo_laboral"];
		$datos_persona["direccion_pais"] = $_POST["direccion_pais"];
		$datos_persona["direccion_provincia"] = $_POST["direccion_provincia"];
		$datos_persona["direccion_ciudad"]  = $_POST["direccion_ciudad"];
		$datos_persona["direccion_calle"] = $_POST["direccion_calle"];
		$datos_persona["direccion_altura"] = $_POST["direccion_altura"];	
	

		$idioma_nombre = $_POST['idioma_nombre'];
		$idioma_sabe_oral = $_POST['idioma_sabe_oral'];
		$idioma_sabe_escrito = $_POST['idioma_sabe_escrito'];

		$idiomas = array();
		foreach ($idioma_nombre as $a => $b) {

			array_push($idiomas, Array(
				'idioma' => $idioma_nombre[$a],
				'sabe_oral' => $idioma_sabe_oral[$a],
				'sabe_escrito' => $idioma_sabe_escrito[$a],
			));
		}
		
		

		

		$experiencia_laboral_empresa = $_POST['experiencia_laboral_empresa'];
		$experiencia_laboral_actividad = $_POST['experiencia_laboral_actividad'];
		$experiencia_laboral_puesto = $_POST['experiencia_laboral_puesto'];
		$experiencia_laboral_nivel = $_POST['experiencia_laboral_nivel'];
		$experiencia_laboral_pais = $_POST['experiencia_laboral_pais'];
		$experiencia_laboral_inicio_actividad = $_POST['experiencia_laboral_inicio_actividad'];
		$experiencia_laboral_fin_actividad = $_POST['experiencia_laboral_fin_actividad'];
		$experiencia_laboral_area_del_puesto = $_POST['experiencia_laboral_area_del_puesto'];
		$experiencia_laboral_descripcion = $_POST['experiencia_laboral_descripcion'];
		$experiencia_laboral_cantidad_personas_a_cargo = $_POST['experiencia_laboral_cantidad_personas_a_cargo'];
		$experiencia_laboral_nombre_persona_de_referencia = $_POST['experiencia_laboral_nombre_persona_de_referencia'];

		
		$experiencias_laborales = array();
		foreach ($experiencia_laboral_empresa as $a => $b) {
			
			array_push($experiencias_laborales, Array(
				'empresa' => $experiencia_laboral_empresa[$a],
				'actividad'=> $experiencia_laboral_actividad[$a],
				'puesto'=> $experiencia_laboral_puesto[$a],
				'nivel'=>$experiencia_laboral_nivel[$a],
				'pais'=>$experiencia_laboral_pais[$a],
				'inicio_actividad'=>$experiencia_laboral_inicio_actividad[$a],
				'fin_actividad'=>$experiencia_laboral_fin_actividad[$a],
				'area_del_puesto'=>$experiencia_laboral_area_del_puesto[$a],
				'descripcion'=>$experiencia_laboral_descripcion[$a],
				'cantidad_personas_a_cargo'=>$experiencia_laboral_cantidad_personas_a_cargo[$a],
				'nombre_persona_de_referencia'=>$experiencia_laboral_nombre_persona_de_referencia[$a],
				));

		}



		$estudio_casa_de_estudios = $_POST['estudio_casa_de_estudios'];
		$estudio_nivel=$_POST['estudio_nivel'];			
		$estudio_especialidad=$_POST['estudio_especialidad'];
		$estudio_inicio_estudios=$_POST['estudio_inicio_estudios'];	
		$estudio_fin_estudios= getPost('estudio_fin_estudios',null); // $_POST['estudio_fin_estudios'];	
		
		$estudios = array();
		foreach ($estudio_casa_de_estudios as $a => $b) {
			
			array_push($estudios, Array(
				'casa_de_estudios' => $estudio_casa_de_estudios[$a],
				'nivel'=> $estudio_nivel[$a],
				'especialidad'=> $estudio_especialidad[$a],
				'inicio_estudios'=>$estudio_inicio_estudios[$a],
				'fin_estudios'=>$estudio_fin_estudios[$a],
				));

		}

		


		$database->save($datos_persona,$experiencias_laborales,$estudios,$idiomas);
		
	} else {

	}

	
?>
		<a href="index.php"  class="btn btn-info" type="submit" style=" padding: 7px;"> Volver atrás</a>
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