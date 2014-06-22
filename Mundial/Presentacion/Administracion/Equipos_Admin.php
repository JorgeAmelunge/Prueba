 <? include("../autentificacion/seguridad.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>APUESTA MUNDIAL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <!-- Le styles -->
    <link href="../../../css/bootstrap.css" rel="stylesheet">
    <link href="../../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../../../ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../ico/apple-touch-icon-57-precomposed.png">
  <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../../../css/tcal.css" />
<script type="text/javascript" src="../../../js/tcal.js"></script>
<script src="../../../js/elegant-press.js" type="text/javascript"></script>
<script type="text/javascript" src="../../../js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../../../css/jquery.dataTables.css" />
<script type="text/javascript" src="../../../js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
  $('#example').dataTable( {
    "order": [[ 0, "ASC" ]]
  } );
} );

  </script>
  <script>
            function validar_texto(e){
        tecla = (document.Tipo) ? e.keyCode : e.which;
      
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
          return true;
        }
          
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9,.]/;
        
        tecla_final = String.fromCharCode(tecla);
        
        return patron.test(tecla_final);
} 
        </script>  
  </head>

  <body>

   <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"><span class="color-highlight">B</span>rick Software</a>
          <div class="nav-collapse">
            <ul class="nav pull-right">
            <li><a href="Torneos_Admin.php">Torneo</a></li>
                                                <li><a href="Series_Admin.php">Crear Series</a></li>
                                                <li><a href="A_Series_Admin.php">Asignar Series</a></li>
                                                <li><a href="Jornadas_Admin.php">Crear Jornada</a></li>
                                                <li><a href="Partidos_Admin.php">Crear Partidos</a></li>
                                                <li><a href="A_Alineacion_O_Admin.php">Asignar Observaciones</a></li>
                                                <li><a href="Estadios_Admin.php">Estadios</a></li>
                                                <li><a href="Equipos_Admin.php">Crear Equipos</a></li>
                                                <li><a href="../autentificacion/salir.php">Salir</a></li>
            
      
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  <div class="container">
  <!--Start Carousel-->
     <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
              <div class="item active">
                 <img src="../../../img/featured/2.jpg" alt="">
                <div class="carousel-caption">
                  <!--<h4>First Thumbnail label</h4>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
                </div>
              </div>

              <div class="item">
                <img src="../../../img/featured/2.jpg" alt="">
                <div class="carousel-caption">
                  <h4>Second Thumbnail label</h4>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="../../../img/arrow.png" alt="Arrow"></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="../../../img/arrow2.png" alt="Arrow"></a>
          </div>
  <!--End Carousel-->
   <div align="center"> <h2>MUNDIALES DE FUTBOL</h2></br></div>
   
  <hr>
    
       


        <a name="mundial"> <div class="content_adm" align="center"></a>
                           
                                
           <h1>Gestionar Equipos</h1>
                                     <?php
      
      
                          
         $Nombre=  base64_decode(@$_GET['Nombre']);
                        $ID_Equipo=base64_decode(@$_GET['ID_Equipo']);
                        $Escudo=base64_decode(@$_GET['Escudo']);
                        $Ciudad=base64_decode(@$_GET['Ciudad']);
                        $Presidente=base64_decode(@$_GET['Presidente']);
                        $Fecha=base64_decode(@$_GET['Fecha']);
                        $Direccion=base64_decode(@$_GET['Direccion']);
                        $Telefonos=base64_decode(@$_GET['Telefono']);
                        $WEB=base64_decode(@$_GET['WEB']);
                        $Email=base64_decode(@$_GET['Email']);
                        
                        
                        ?>
                  <form  method="post" enctype="multipart/form-data" style="text-align: center">
    
    <p> Nombre:</p>
    <input type="text" name="TNombre" value="<?php echo $Nombre ?>" size="65" />
     

        <p> Escudo:</p>      
        <input name="archivo" type="file" class="casilla" id="archivo" size="35" value="<?php echo $Escudo ?>"/>
        
         <?php
      if($ID_Equipo>0 && $Escudo!=""){
      ?>
        
         <p>  Mantener Imagen:</p>
        <input type="checkbox" name="Mantener_Imagen" value="ON" checked="checked" /><a href="../../img/escudos/<?php echo $Escudo ?>"><p>      <?php echo $Escudo ?></p></a>
        
         <?php
      }
      ?>
        
       <p>Ciudad:</p>
       <input type="text" name="TCiudad" value="<?php echo $Ciudad ?>" size="65" />
     
        <p>  Presidente:</p>
       <input type="text" name="TPresidente" value="<?php echo $Presidente ?>" size="65" />
    
        <p>Fecha Fundacion:</p>
       <input type="text" name="TFecha" value="<?php echo $Fecha ?>" size="65" />
      
       <p>Direccion:</p>
       <input type="text" name="TDireccion" value="<?php echo $Direccion ?>" size="65" />
      
       <p>Telefono:</p>
       <input type="text" name="TTelefono" value="<?php echo $Telefonos ?>" size="65" />
 
       <p>WEB:</p>
       <input type="text" name="TWEB" value="<?php echo $WEB ?>" size="65" />
   
       <p>EMail:</p>
       <input type="text" name="TEMail" value="<?php echo $Email ?>" size="65" />
       <br><br>
      <?php
    if($ID_Equipo>0){
      ?>
      <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
      <?php
      }
      else{
      ?>
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Equipo" />
      <?php
      }
      
      ?>
       <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
    <input name="action" type="hidden" value="upload" />    
</form>
        </div>
<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
  
 echo "<script>location.href='Equipos_Admin.php'</script>";
         
    
 }
require('../../Negocio/Negocio_Equipos.php');
$objN_Equipos=new Negocio_Equipos();
 if($ID_Equipo>0 && $Nombre==""){
    
     $objN_Equipos->Eliminar_Equipo($ID_Equipo);
 }
 if (@$_REQUEST['Modificar'] == "Modificar"){
     
     if((isset($_POST["Mantener_Imagen"]))) 
 { 
         
   $objN_Equipos->Modificar_Equipo_sin_Escudo($ID_Equipo,$_POST["TNombre"],$_POST["TCiudad"],$_POST["TPresidente"],$_POST["TFecha"],$_POST["TDireccion"],$_POST["TTelefono"],$_POST["TWEB"],$_POST["TEMail"]);     
 }  
    else{ 
     
     
        $status = "";
        $direccion_img ="";

  // obtenemos los datos del archivo 
  $tamano = $_FILES["archivo"]['size'];
  $tipo = $_FILES["archivo"]['type'];
  $archivo = $_FILES["archivo"]['name'];
  $prefijo = substr(md5(uniqid(rand())),0,6);
  
  if ($archivo != "") {
    // guardamos el archivo a la carpeta files
    $destino =  "../../img/escudos/".$prefijo."_".$archivo;
                $direccion_img="".$prefijo."_".$archivo;
    if (copy($_FILES['archivo']['tmp_name'],$destino)) {
      $status = "Archivo subido: <b>".$archivo."</b>";
    } else {
      $status = "Error al subir el archivo";
    }
  } else {
    $status = "Error al subir archivo";
  }

 
 $objN_Equipos->Modificar_Equipo($ID_Equipo,$_POST["TNombre"],$direccion_img,$_POST["TCiudad"],$_POST["TPresidente"],$_POST["TFecha"],$_POST["TDireccion"],$_POST["TTelefono"],$_POST["TWEB"],$_POST["TEMail"]);
         
    }   
 }
if (@$_REQUEST['enviar'] == "Subir Equipo"){
      
        $status = "";
        $direccion_img ="";
if ($_POST["action"] == "upload") {
  // obtenemos los datos del archivo 
  $tamano = $_FILES["archivo"]['size'];
  $tipo = $_FILES["archivo"]['type'];
  $archivo = $_FILES["archivo"]['name'];
  $prefijo = substr(md5(uniqid(rand())),0,6);
  
  if ($archivo != "") {
    // guardamos el archivo a la carpeta files
    $destino =  "../../img/escudos/".$prefijo."_".$archivo;
                $direccion_img="".$prefijo."_".$archivo;
    if (copy($_FILES['archivo']['tmp_name'],$destino)) {
      $status = "Archivo subido: <b>".$archivo."</b>";
    } else {
      $status = "Error al subir el archivo";
    }
  } else {
    $status = "Error al subir archivo";
  }
}
 
 $objN_Equipos->Insertar_Equipo($_POST["TNombre"],$direccion_img,$_POST["TCiudad"],$_POST["TPresidente"],$_POST["TFecha"],$_POST["TDireccion"],$_POST["TTelefono"],$_POST["TWEB"],$_POST["TEMail"]);
}
?>
</br></br>

<?php

$consulta=$objN_Equipos->Tabla_Equipos();
?>


<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>Nº</th>
                        <th>Nombre</th>
        <th>Escudo</th>
                        <th>Ciudad</th>
                        <th>Presidente</th>
                        <th>Fecha Fundacion</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>WEB</th>
                        <th>EMail</th>
                        <th></th> 
                        <th></th>
            
        </tr>
      </thead>
      <tbody>
    <?php
 $Contador=1;
if($consulta) {
  while( $Tabla_Equipo = mysql_fetch_array($consulta) ){
  ?>
    <tr id="<?php echo $Tabla_Equipo['codigo_equipo'] ?>">  
                          <td align="middle"><?php echo $Contador ?></td>
        <td align="middle"><?php echo $Tabla_Equipo['nombre'] ?></td> 
                          <td align="middle"><a href="../../img/escudos/<?php  echo $Tabla_Equipo['escudo'] ?>"><?php echo $Tabla_Equipo['escudo'] ?></a></td>  
                          <td align="middle"><?php echo $Tabla_Equipo['ciudad'] ?></td> 
                          <td align="middle"><?php echo $Tabla_Equipo['presidente'] ?></td> 
                          <td align="middle"><?php echo $Tabla_Equipo['fecha_fundacion'] ?></td>  
                          <td align="middle"><?php echo $Tabla_Equipo['direccion'] ?></td>  
                          <td align="middle"><?php echo $Tabla_Equipo['telefonos'] ?></td>  
                          <td align="middle"><?php echo $Tabla_Equipo['web'] ?></td>  
                          <td align="middle"><?php echo $Tabla_Equipo['email'] ?></td>  
                          
                          
                          <td align="middle"><span class="modi"><a href="Equipos_Admin.php?ID_Equipo=<?php echo base64_encode($Tabla_Equipo['codigo_equipo']) ?>&Nombre=<?php echo base64_encode($Tabla_Equipo['nombre']) ?>&Escudo=<?php echo base64_encode($Tabla_Equipo['escudo']) ?>&Ciudad=<?php echo base64_encode($Tabla_Equipo['ciudad']) ?>&Presidente=<?php echo base64_encode($Tabla_Equipo['presidente']) ?>&Fecha=<?php echo base64_encode($Tabla_Equipo['fecha_fundacion']) ?>&Direccion=<?php echo base64_encode($Tabla_Equipo['direccion']) ?>&Telefono=<?php echo base64_encode($Tabla_Equipo['telefonos']) ?>&WEB=<?php echo base64_encode($Tabla_Equipo['web']) ?>&Email=<?php echo base64_encode($Tabla_Equipo['email']) ?>"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Equipos_Admin.php?ID_Equipo=<?php echo base64_encode($Tabla_Equipo['codigo_equipo']) ?>&Nombre=&Escudo=&Ciudad=&Presidente=&Fecha=&Direccion=&Telefono=&WEB=&Email="><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
        
                          
      </tr> 
  <?php
        $Contador++;
    }
}
    
?>
</tbody>
    </table>      

            
      </div>
      
         

      

    <footer class="row">
      <div>
       
      </div>
    
    </footer>
    </div><!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <script src="../../../js/bootstrap-transition.js"></script>
  <script src="../../../js/bootstrap-carousel.js"></script>
    <script src="../../../js/bootstrap-alert.js"></script>
    <script src="../../../js/bootstrap-modal.js"></script>
  <script src="../../../js/bootstrap-dropdown.js"></script>
    <script src="../../../js/bootstrap-scrollspy.js"></script>
   <script src="../../../js/bootstrap-tab.js"></script>
    <script src="../../../js/bootstrap-tooltip.js"></script>
     <script src="../../../js/bootstrap-popover.js"></script>
    <script src="../../../js/bootstrap-button.js"></script>
    <script src="../../../js/bootstrap-collapse.js"></script>
   <script src="../../../js/bootstrap-typeahead.js"></script>
  <script src="../../../js/jquery-ui-1.8.18.custom.min.js"></script>
  <script src="../../../js/jquery.smooth-scroll.min.js"></script>
  <script src="../../../js/lightbox.js"></script>
    <script>
$('.carousel').carousel({
  interval: 8000
})
</script>
  </body>
</html>
