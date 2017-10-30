<!DOCTYPE html>
<html>
<body>

<?php

	include("Model.php");

	$database = new Model();
	
	$datos_persona["nombre"] = "nombre";
	$datos_persona["apellido"] = "apellido"; 
	$datos_persona["id_sexo"] = 111; 
	$datos_persona["id_estado_civil"] = 1;
	$datos_persona["dni"] =111;
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
		//id_persona,casa_de_estudios,nivel,especialidad,inicio_estudios,fin_estudios
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
				'idioma' => "ingles",
				'sabe_oral'=>'true',
				'sabe_escrito'=>'false',
			),
		1 => Array(
				'idioma'=> "español",
				'sabe_oral'=>'true',
				'sabe_escrito'=>'true',
			),
		3 => Array(
				'idioma'=> "frances",
				'sabe_oral'=>'false',
				'sabe_escrito'=>'false',
			)

		);
	


	echo $database->save($datos_persona,$experiencias_laborales,$estudios,$datos_idiomas);
	//$database->load();

	//echo '<pre>'; var_dump($item);
?>



</body>
</html>
