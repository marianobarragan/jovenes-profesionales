<?php



class Model{


		private $host;
		private $port;
		private $socket;
		private $user;
		private $password;
		private $dbname;

		function __construct()
		{
		    $this->host="localhost";
			$this->port=3306;
			$this->socket="";
			$this->user="root";
			$this->password="";
			$this->dbname="jovenes_profesionales";
		}

		function save($datos_persona,$experiencias_laborales,$estudios,$idiomas){


			global $dbh;
			$id_persona = 0;


			$con = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
			or die ('Error conectandose a la base de datos' . mysqli_connect_error());


			$query = "INSERT INTO `jovenes_profesionales`.`personas`  (nombre,apellido,id_sexo,id_estado_civil,dni,telefono_fijo,telefono_celular,objetivo_laboral,pais,provincia,ciudad,calle,altura) VALUES ('" . $datos_persona["nombre"].
			"','" .$datos_persona["apellido"].
			"','" .$datos_persona["id_sexo"].
			"','" .$datos_persona["id_estado_civil"].
			"','" .$datos_persona["dni"].
			"','" .$datos_persona["telefono_fijo"].
			"','" .$datos_persona["telefono_celular"].
			"','" .$datos_persona["objetivo_laboral"].
			"','" .$datos_persona["direccion_pais"].
			"','" .$datos_persona["direccion_provincia"].
			"','" .$datos_persona["direccion_ciudad"].
			"','" .$datos_persona["direccion_calle"].
			"','" .$datos_persona["direccion_altura"].
			"');";
			
			if ($stmt = $con->prepare($query)) {
			    $stmt->execute();

			    if ( mysqli_stmt_error($stmt) != ""){
			    	printf("Error: %s.\n", mysqli_stmt_error($stmt));
			    } else {
			    	$id_persona = $stmt->insert_id;
			        //printf("Error: %s.\n", );
			    	echo nl2br("Usuario creado correctamente! \r\n", false);
			    	$this->insertar_experiencias_laborales($experiencias_laborales,$id_persona);
					$this->insertar_estudios($estudios,$id_persona);
					$this->insertar_idiomas($idiomas,$id_persona);
			    }
			    	
			$stmt->close();	
			}else{

				echo nl2br("Error insertando los datos personales \r\n", false);
			}

			
			$con->close();
		
		}
		
	function load(){


		$con = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
			or die ('Error conectandose a la base de datos' . mysqli_connect_error());


		$query = "SELECT p.nombre,p.apellido,s.sexo,ec.estado_civil,dni,telefono_fijo,telefono_celular,p.pais,objetivo_laboral, count(el.id_experiencia_laboral) as 'cantidad de trabajos'  from personas p join sexo s on (p.id_sexo = s.id_sexo) join estado_civil ec on (ec.id_estado_civil = p.id_estado_civil) left join experiencia_laboral el on (el.id_persona = p.id_persona) group by p.nombre,p.apellido,s.sexo,ec.estado_civil,dni,telefono_fijo,telefono_celular,p.pais,objetivo_laboral";

		if ($stmt = $con->prepare($query)) {
		    $stmt->execute();
		    $stmt->bind_result($nombre, $apellido, $descripcion, $descripcion1, $dni, $telefono_fijo, $telefono_celular, $pais, $objetivo_laboral, $id_experiencia_laboral);

		            echo "<table>";
		            echo "<tr>";
		                echo "<th>Nombre</th>";
		                echo "<th>Apellido</th>";
		                echo "<th>Sexo</th>";
		                echo "<th>Estado Civil</th>";
		                echo "<th>DNI</th>";
		                echo "<th>Teléfono Fijo</th>";
		                echo "<th>Teléfono Celular</th>";
		                echo "<th>País</th>";
		                echo "<th>Objetivo Laboral</th>";
						echo "<th>Cantidad de trabajos</th>";                
		            echo "</tr>";
		    while ($stmt->fetch()) {
		        
		            echo "<tr>";

		                echo "<td>" . $nombre . "</td>";
		                echo "<td>" . $apellido . "</td>";
		                echo "<td>" . $descripcion . "</td>";
		                echo "<td>" . $descripcion1 . "</td>";
		                echo "<td>" . $dni . "</td>";
		                echo "<td>" . $telefono_fijo . "</td>";
		                echo "<td>" . $telefono_celular . "</td>";
		                echo "<td>" . $pais . "</td>";
		                echo "<td>" . $objetivo_laboral . "</td>";
		                echo "<td>" . $id_experiencia_laboral . "</td>";

		            echo "</tr>";

		//        printf("%s, %s, %s, %s, %s, %s, %s, %s, %s, %s\n", $nombre, $apellido, $descripcion, $descripcion1, $dni, $telefono_fijo, $telefono_celular, $pais, $objetivo_laboral, $id_experiencia_laboral);

		    }
		    	echo "</table>";
		    $stmt->close();
		} else {
			echo nl2br("Error leyendo los registros de la base \r\n", false);
		}

		$con->close();

	}

	function insertar_experiencias_laborales($experiencias_laborales,$id_persona){
		
		$con = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
			or die ('Error conectandose a la base de datos' . mysqli_connect_error());

		$cantidad_de_inserts = 0;

		foreach ($experiencias_laborales as $el) {
			
			if ( !empty($el['fin_actividad']) ){
				$el['fin_actividad'] = "'". $el['fin_actividad'] . "'";
			}else{
				$el['fin_actividad'] = 'NULL';
			};  
			

			$query = "INSERT INTO `jovenes_profesionales`.`experiencia_laboral` (id_persona,empresa,actividad,puesto,nivel,pais,inicio_actividad,fin_actividad,area_del_puesto,descripcion,cantidad_personas_a_cargo,nombre_persona_de_referencia) VALUES (" .$id_persona.",'" .$el['empresa']. 
			"','" .$el['actividad']. 
			"','" .$el['puesto'].
			"','" .$el['nivel'].
			"','" .$el['pais'].
			"','" .$el['inicio_actividad'].
			"'," .$el['fin_actividad'].
			",'" .$el['area_del_puesto'].
			"','" .$el['descripcion'].
			"'," . $el['cantidad_personas_a_cargo']. 
			",'" . $el['nombre_persona_de_referencia'].
			"')";


			if ($stmt = $con->prepare($query)) {
				
				$stmt->execute();
				$cantidad_de_inserts = $cantidad_de_inserts + 1 ;
			
			} else {
				
				echo nl2br("Error insertando el registro de experiencia laboral \r\n", false);
			}
		}

		echo nl2br("Cantidad de experiencias laborales insertadas:" . $cantidad_de_inserts. "\r\n" , false);
	}
		
	function insertar_estudios($estudios,$id_persona){

		$con = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
			or die ('Error conectandose a la base de datos' . mysqli_connect_error());

		$cantidad_de_inserts = 0;

		foreach ($estudios as $e) {
			
			if ( !empty($e['fin_estudios']) ){
				$e['fin_estudios'] = "'". $e['fin_estudios'] . "'";
			}else{
				$e['fin_estudios'] = 'NULL';
			};

			$query = "INSERT INTO `jovenes_profesionales`.`estudios` (id_persona,casa_de_estudios,nivel,especialidad,inicio_estudios,fin_estudios) VALUES (".$id_persona .
				",'" .$e['casa_de_estudios']. 
				"','" .$e['nivel']. 
				"','" .$e['especialidad']. 
				"','" .$e['inicio_estudios']. 
				"'," .$e['fin_estudios']. 
			") ";
			echo $query;
			if ($stmt = $con->prepare($query)) {
				
				$stmt->execute();
				$cantidad_de_inserts = $cantidad_de_inserts + 1 ;
			
			} else {
				echo nl2br("Error insertando el registro en la tabla de estudios  \r\n", false);
			}
		}

		echo nl2br("Cantidad de estudios insertados: " . $cantidad_de_inserts. "\r\n" , false);
		
		$stmt->close();
		$con->close();
	}

	function insertar_idiomas($idiomas,$id_persona){
		

		$con = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
			or die ('Error conectandose a la base de datos' . mysqli_connect_error());

		$cantidad_de_inserts = 0;

		foreach($idiomas as $idioma) {
			        
			$query = "INSERT INTO `jovenes_profesionales`.`idiomas` (id_persona,nombre_idioma,sabe_oral,sabe_escrito)VALUES (" .$id_persona.",'" .$idioma['idioma']. "'," .$idioma['sabe_oral']. "," .$idioma['sabe_escrito'].")";

			if ($stmt = $con->prepare($query)) {
				
				$stmt->execute();
				$cantidad_de_inserts = $cantidad_de_inserts + 1 ;
			
			} else {
				
				echo nl2br("Error insertando el registro en la tabla de idiomas  \r\n", false);
			}

		}

		echo nl2br("Cantidad de idiomas insertados: " . $cantidad_de_inserts. "\r\n" , false);
		
		$stmt->close();
		$con->close();

	}

	function get_sexos(){
		$con = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
			or die ('Error conectandose a la base de datos' . mysqli_connect_error());

		$sexos = array();

		$query = "SELECT sexo FROM `jovenes_profesionales`.`sexo` order by id_sexo ";

		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
    		$stmt->bind_result($sexo);
    		while ($stmt->fetch()) {
    			array_push($sexos,$sexo);
    		}
    		$stmt->close();
		} else {
			echo nl2br("Error obteniendo los datos de sexo  \r\n", false);
		}

		
		$con->close();
		return $sexos;
	}

	function get_estado_civil(){
		
		$con = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
			or die ('Error conectandose a la base de datos' . mysqli_connect_error());

		$estados = array();

		$query = "SELECT estado_civil FROM `jovenes_profesionales`.`estado_civil` order by id_estado_civil; ";

		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
    		$stmt->bind_result($estado_civil);
    		while ($stmt->fetch()) {
    			array_push($estados,$estado_civil);
    		}
    		$stmt->close();
		} else {
			echo nl2br("Error obteniendo los datos de estado civil  \r\n", false);
		}
		
		$con->close();
		return $estados;
	}


	function find_sexo_id($sexo){
		$con = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
			or die ('Error conectandose a la base de datos' . mysqli_connect_error());

		$id_sexo =0;

		$query = "SELECT id_sexo FROM `jovenes_profesionales`.`sexo` WHERE sexo = '".$sexo."';";

		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
    		$stmt->bind_result($id_sexo);
    		while ($stmt->fetch()) {
    			
    		}
    		$stmt->close();
		} else {
			echo nl2br("Error obteniendo el id de sexo  \r\n", false);
		}

		
		$con->close();
		return $id_sexo;
	}

	function find_estado_civil_id($estado_civil){
		$con = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
			or die ('Error conectandose a la base de datos' . mysqli_connect_error());

		$id_estado_civil =0;

		$query = "SELECT id_estado_civil FROM `jovenes_profesionales`.`estado_civil` WHERE estado_civil = '".$estado_civil."';";

		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
    		$stmt->bind_result($id_estado_civil);
    		while ($stmt->fetch()) {
    			
    		}
    		$stmt->close();
		} else {
			echo nl2br("Error obteniendo el id de estado civil  \r\n", false);
		}

		
		$con->close();
		return $id_estado_civil;
	}
}

?>