<html>
<body>
<?php
    include("Model.php");
    $database = new Model();

/*
	1_ El método load, encargado de traer todos los registros cargados.
	2_ El método save, que guarde la información.
	3_ El método delete, que borre la información.
*/
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
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    /*.row.content {height: 450px}*/
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
    /*  background-color: #f1f1f1;*/
      height: 100%;
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
       <img src="http://festivalesanteriores.buenosaires.gob.ar/bafici/home10/press/logos/LOGO_BuenosAiresCiudad_REF.jpg" alt="Flowers in Chania">
       -->
       

       
       <!--
      <a class="navbar-brand" href="#">Logo</a>
      -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <div class="col-sm-2 text-middle"> 
      	<!--<img src="LOGO_BuenosAiresCiudad_REF.jpg" alt="Logo" width="200">-->
      </div>
      <div class="col-sm-6 text-middle"> 
      	<img src="LOGO_BuenosAiresCiudad_REF.jpg" alt="Logo" width="200">
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
      <h1>Jovenes Profesionales Expo</h1>
      <p>El Gobierno de la Ciudad Autónoma de Buenos Aires, lanza una expo que tiene como objetivo atraer a
        jóvenes programadores estudiantes o egresados de universidades a fines para formar parte su equipo
        de trabajo.</p>
        <p>
        La promoción de dicho evento se realizará a través de una landing page, que mostrará la
        información básica de la expo y un formulario. Los interesados en concurrir deberán ingresar sus datos
        laborales en dicho formulario.</p>
      <hr>
      <h3>Registrate!</h3>

          <div class="col-lg-12">

        <div id="page-wrapper">
            <!--
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Jovenes Profesionales</h1>
                </div>
                 /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form role="form" action="db-connection" class="register" method="POST">
                <div class="col-lg-12">
                    <div class="panel panel-green" >
                        <!--
						<div class="panel-heading">
                            Buscar
                        </div>-->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    
                                        <div class="form-group">
                                            <label>DNI</label>
                                            <input class="form-control" name="dni" placeholder="Ingrese el número" required="required">
                                            <p class="help-block">Sin comas ni guiones.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <input class="form-control" name="apellido" placeholder="Ingrese el apellido" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" name="nombre" placeholder="Ingrese el nombre" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Estado civil</label>
                                            <select class="form-control" name="estado_civil" required="required">
                                                <!--
                                                <option>-</option>
                                                <option>Casado</option>
                                                <option>Soltero</option>-->
                                                <?php
                                                    $estados = $database->get_estado_civil();
                                                    foreach($estados as $estado) {
                                                        echo "<option>".$estado."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <select class="form-control" name ="sexo" required="required">
                                                <!--
                                                <option>-</option>
                                                <option>Masculino</option>
                                                <option>Femenino</option>-->
                                                
                                                <?php
                                                    $sexos = $database->get_sexos();
                                                    foreach($sexos as $sexo) {
                                                        echo "<option>".$sexo."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha de nacimiento</label>
                                                <input type="text" class="form-control" placeholder="Formato AAAA-MM-DD" required="required">  
                                        </div>
                                        <div class="form-group">
                                            <label>Telefono Celular</label>
                                            <input class="form-control" name="telefono_celular" placeholder="Ingrese el telefono celular">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefono Particular</label>
                                            <input class="form-control" name="telefono_fijo" placeholder="Ingrese el telefono particular" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input class="form-control" name="direccion_calle" placeholder="Ingrese la dirección particular" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Altura</label>
                                            <input class="form-control" name="direccion_altura" placeholder="Ingrese la altura del domicilio" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Pais</label>
                                            <input class="form-control" name="direccion_pais" placeholder="Ingrese el país de la dirección" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Provincia</label>
                                            <input class="form-control" name="direccion_provincia" placeholder="Ingrese la provincia de la dirección" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Ciudad</label>
                                            <input class="form-control" name="direccion_ciudad" placeholder="Ingrese la ciudad de la dirección" required="required">
                                        </div>
                                        
                                        <div class="form-group" align="center">
                                            <label>Objetivo laboral</label>
                                            <textarea class="form-control" name="objetivo_laboral" style="height: 150;overflow: auto"></textarea>
                                        </div>
                                    
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                        <h1 style="padding-top: 0.5cm">Idiomas</h1>
                        <h2> </h2>
                        <div>
                            <input type="button" value="Agregar Idioma" onClick="addRow('data_table_idioma')" /> 
                                <input type="button" value="Eliminar Idiomas seleccionados" onClick="deleteRow('data_table_idioma')"  /> 
                        </div>
                        <h2> </h2>


                        <h3> </h3>

                        <div class="col-lg-12">
                            <table id="data_table_idioma" class="form" border="0" style="border-collapse: separate; border-spacing: 15px;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <input required="required" name="chk[]" checked="checked" type="checkbox">
                                        </td>
                                        <td>
                                            <label>Idioma</label>
                                            <input required="required" name="idioma_nombre[]" type="text">
                                        </td>
                                        <td>
                                            <label for="sabe_oral">¿Habla el idioma?</label>
                                            <input name="idioma_sabe_oral[]" type="checkbox">
                                        </td>
                                        <td>
                                            <label for="sabe_escrito">¿Escribe el idioma?</label>
                                            <input  name="idioma_sabe_escrito[]" type="checkbox">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <h1 style="padding-top: 2cm">Experiencia Laboral</h1>
                    <h3> </h3>
                    <div>
                        <input type="button" value="Agregar Experiencia Laboral" onClick="addRow('data_table_experiencia')" /> 
                        <input type="button" value="Eliminar Experiencia Laboral" onClick="deleteRow('data_table_experiencia')"  /> 
                    </div>
                    <div class="col-lg-12" style = "overflow: auto;display:inline-block;">
                        <table id="data_table_experiencia" class="form" border="0" style="border-collapse: separate; border-spacing: 15px;">
                            <tbody>
                                <tr>
                                    <td>
                                        <input required="required" name="chk[]" checked="checked" type="checkbox">
                                    </td>

                                    <td >
                                        <label style="display: inline-block">Empresa</label>
                                        <input required="required" name="experiencia_laboral_empresa[]" type="text">
                                    </td>
                                    <td>
                                        <label>Actividad de la empresa</label>
                                        <input required="required" name="experiencia_laboral_actividad[]" type="text">
                                    </td>
                                    <td>
                                        <label>Puesto</label>
                                        <input required="required" name="experiencia_laboral_puesto[]" type="text">
                                    </td>
                                    <td>
                                        <label>Nivel</label>
                                        <input required="required" name="experiencia_laboral_nivel[]" type="text">
                                    </td>
                                    <td>
                                        <label>Pais</label>
                                        <input required="required" name="experiencia_laboral_pais[]" type="text">
                                    </td>
                                    <td>
                                        <label>Inicio Actividad</label>
                                        <input required="required" name="experiencia_laboral_inicio_actividad[]" type="text" placeholder="Formato AAAA-MM-DD">
                                    </td>
                                    <td>
                                        <label>Fin Actividad</label>
                                        <input name="experiencia_laboral_fin_actividad[]" type="text" placeholder="Formato AAAA-MM-DD">
                                    </td>
                                    <td>
                                        <label>Área del puesto</label>
                                        <input required="required" name="experiencia_laboral_area_del_puesto[]" type="text">
                                    </td>
                                    <td>
                                        <label>Descripción del trabajo</label>
                                        <input required="required" name="experiencia_laboral_descripcion[]" type="text">
                                    </td>
                                    <!--
                                    <td>
                                        <label>Empresa</label>
                                        <input required="required" name="empresa[]" type="text">
                                    </td>
                                    -->
                                    <td>
                                        <label>Cantidad de personas a cargo</label>
                                        <input required="required" name="experiencia_laboral_cantidad_personas_a_cargo[]" type="text">
                                    </td>
                                    <td>
                                        <label>Persona de referencia</label>
                                        <input required="required" name="experiencia_laboral_nombre_persona_de_referencia[]" type="text">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h1 style="padding-top: 3cm">Estudios Previos</h1>
                    <h2> </h2>
                    <div>
                        <input type="button" value="Agregar Estudios" onClick="addRow('data_table_estudios')" /> 
                        <input type="button" value="Eliminar Estudios" onClick="deleteRow('data_table_estudios')"  /> 
                    </div>
                    <h2> </h2>
                    <div class="col-lg-12" style = "overflow: auto">
                        <table id="data_table_estudios" class="form" border="0" style="border-collapse: separate; border-spacing: 5px;">
                            <tbody>
                                <tr>
                                    <td>
                                        <input required="required" name="chk[]" checked="checked" type="checkbox">
                                    </td>

                                    <td >
                                        <label >Casa de estudios</label>
                                        <input required="required" name="estudio_casa_de_estudios[]" type="text">
                                    </td>
                                    <td>
                                        <label>Nivel</label>
                                        <input required="required" name="estudio_nivel[]" type="text">
                                    </td>
                                    <td>
                                        <label>Especialidad</label>
                                        <input required="required" name="estudio_especialidad[]" type="text">
                                    </td>
                                    <td>
                                        <label>Inicio de estudios</label>
                                        <input required="required" name="estudio_inicio_estudios[]" type="text" placeholder="Formato AAAA-MM-DD">
                                    </td>
                                    <td>
                                        <label>Fin de estudios</label>
                                        <input name="estudio_fin_estudios[]" type="text" placeholder="Formato AAAA-MM-DD">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel -->
                    <div style = "padding-top: 3cm">
                        <!--
                        <input class="submit" type="submit" value="Confirmar Inscripción" onClick="hacerAlgo()" style="float: right;">
                        <button type="button" class="btn btn-primary" type="submit" style="float: right;" >Confirmar Inscripción</button>
                        

                        <input type="button" class="btn btn-primary" value="Confirmar Inscripción" style="float: right;">
                        
-->
                    </div>

                    </div>
            <!-- /.row -->
                </div>
                <!-- /.col-lg-12 -->
                <input type="button" class="btn btn-primary" value="Confirmar Inscripción" style="float: right;">
                <input class="submit" type="submit" value="Confirm &raquo;" />
                </form>
            </div>
            <!-- /.row -->
        </div>
      <!--
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>-->
    </div>
    </div>

  </div>
</div>
<?php var_dump($_POST); ?><br>

<footer class="container-fluid text-center">
  <p>2017</p>
</footer>

</body>
</html>



        <!-- /#page-wrapper -->


<script>

            $("form").submit(function () {

                var this_master = $(this);

                this_master.find('input[type="checkbox"]').each( function () {
                    var checkbox_this = $(this);


                    if( checkbox_this.is(":checked") == true ) {
                        checkbox_this.attr('value','1');
                    } else {
                        checkbox_this.prop('checked',true);
                        //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA    
                        checkbox_this.attr('value','0');
                    }
                })
            })
            /*
            $('#sandbox-container input').datepicker({
                format: "dd/mm/yyyy",
                startDate: "01/01/1850",
                endDate: "+infinity",
                multidate: false
            });*/
            </script>

</body>
</html>