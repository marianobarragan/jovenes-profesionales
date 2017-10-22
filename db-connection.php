<!DOCTYPE html>
<html>
<body>

<?php

	load();

	function load(){



		$host="localhost";
		$port=3306;
		$socket="";
		$user="root";
		$password="";
		$dbname="jovenes_profesionales";

		$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Error conectandose a la base de datos' . mysqli_connect_error());


		$query = "SELECT p.nombre,p.apellido,s.descripcion,ec.descripcion,dni,telefono_fijo,telefono_celular,d.pais,objetivo_laboral, count(el.id_experiencia_laboral) as 'cantidad de trabajos' from personas p join sexo s on (p.id_sexo = s.id_sexo) join estado_civil ec on (ec.id_estado_civil = p.id_estado_civil) join domicilio d on (p.id_domicilio = d.id_domicilio) left join experiencia_laboral el on (el.id_persona = p.id_persona) group by p.nombre,p.apellido,s.descripcion,ec.descripcion,dni,telefono_fijo,telefono_celular,d.pais,p.objetivo_laboral";

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
		}


		$con->close();

	}

?>



</body>
</html>
