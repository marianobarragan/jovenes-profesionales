

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
		
		//var_dump($datos_idiomas);
		//var_dump($idiomas);

		

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

		//$database->insertar_experiencias_laborales($experiencias_laborales,'1');
		//$database->insertar_estudios($estudios,1);
		//var_dump($experiencias_laborales2);
		//var_dump($experiencias_laborales);


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
		//var_dump($estudios);
		//var_dump($estudios2);
				
	} 

	/*

	$datos_persona["nombre"] = "nombre";
	$datos_persona["apellido"] = "apellido"; 
	$datos_persona["id_sexo"] = 1; 
	$datos_persona["id_estado_civil"] = 1;
	$datos_persona["dni"] =12;
	$datos_persona["telefono_fijo"] = 123123;
	$datos_persona["telefono_celular"] = 12312; 
	$datos_persona["objetivo_laboral"] = "el_objetivo_laboral";
	$datos_persona["direccion_pais"] = "arg";
	$datos_persona["direccion_provincia"] = "dir_prov";
	$datos_persona["direccion_ciudad"]  = "ciudad";
	$datos_persona["direccion_calle"] = "calle";
	$datos_persona["direccion_altura"] = 1231;
	
	$experiencias_laborales = array(
		0 => Array(
				'empresa' => "empresa X",
				'actividad'=> "actividad x",
				'puesto'=> "el puesto",
				'nivel'=> "el nivel-",
				'pais'=> "arg",
				'inicio_actividad'=> '2010-06-02',
				'fin_actividad'=> '2010-06-02',
				'area_del_puesto'=> "el area del puesto",
				'descripcion'=> "gran trabajo",
				'cantidad_personas_a_cargo'=> 21,
				'nombre_persona_de_referencia'=> "carlos",
			),
		1 => Array(
				'empresa' => "empresa y",
				'actividad'=> "actividad Y",
				'puesto'=> "el 2 puesto",
				'nivel'=> "el 2 nivel-",
				'pais'=> "chile wn",
				'inicio_actividad'=> '2015-06-02',
				'fin_actividad'=> '2015-06-02',
				'area_del_puesto'=> "el  2area del puesto",
				'descripcion'=> "descripcion trabajo",
				'cantidad_personas_a_cargo'=> 0,
				'nombre_persona_de_referencia'=> "otro carlos",
			)

		);

	$estudios = array(
		0 => Array(
				'casa_de_estudios' => "la casa de estudios",
				'nivel'=>"nivel x",
				'especialidad'=>"la especialidad",
				'inicio_estudios'=>'2015-06-02',
				'fin_estudios'=>'2015-06-02',
			),
		1 => Array(
				'casa_de_estudios' => "otra casa de estudios",
				'nivel'=>"nivel y",
				'especialidad'=>"una especialidad distinta",
				'inicio_estudios'=>'2017-06-02',
				'fin_estudios'=>'2017-06-02',
			)

		);
	

	$datos_idiomas = array(
		0 => Array(
				'idioma' => "Inglés",
				'sabe_oral'=>'true',
				'sabe_escrito'=>'false',
			),
		1 => Array(
				'idioma'=> "Español",
				'sabe_oral'=>'true',
				'sabe_escrito'=>'true',
			),
		3 => Array(
				'idioma'=> "Francés",
				'sabe_oral'=>'false',
				'sabe_escrito'=>'false',
			)

		);
	


	//echo $database->save($datos_persona,$experiencias_laborales,$estudios,$datos_idiomas);
	//$database->load();
	// echo $database->find_estado_civil_id("NO CONTESTA");
	//var_dump($database->get_estado_civil());
	//echo '<pre>'; var_dump($item);
	*/
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>

</body>
</html>
