 <? include("../autentificacion/seguridad.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Futbol Boliviano</title>
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
    "order": [[ 1, "desc" ]]
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
                                                <li><a href="A_Arbitros_Admin.php">Asignar Arbitros</a></li>
                                                <li><a href="A_Alineacion_Admin.php">Asignar Alineaciones</a></li>
                                                <li><a href="A_Alineacion_O_Admin.php">Asignar Observaciones</a></li>
                                                <li><a href="Estadios_Admin.php">Estadios</a></li>
                                                <li><a href="Equipos_Admin.php">Crear Equipos</a></li>
                                                <li><a href="Alineacion_Admin.php">Crear Alineacion</a></li>
                                                <li><a href="Arbitros_Admin.php">Arbitros</a></li>
                                                <li><a href="Usuario_Admin.php">Usuarios</a></li>
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
                <img src="../../../img/Brick.jpg" alt="">
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
   <div align="center"> <h2>Liga del Futbol Profesional Boliviano</h2></br></div>
   
  <hr>
    
       

 <a name="lfpb"> <div class="content_adm" align="center"></a>
                           
                                                   <h1>Gestionar Alineacion</h1>
                                     <?php
      
      
                          
        $Nombre=  base64_decode(@$_GET['Nombre']);
                        $ID_Alineacion=base64_decode(@$_GET['id_alineacion']);                        
                        $ID_Equipo=base64_decode(@$_GET['id_equipo']);
                        $Pais=base64_decode(@$_GET['pais']);
                        $Fecha=base64_decode(@$_GET['fecha']);
                        
                        
                        ?>
                    <form  method="post" enctype="multipart/form-data" style="text-align: center">
     <p>
        Equipo:</br>

        <select name="Equipo" onchange="location.href = this.value">
        <?php
        echo "<option value=\"Alineacion_Admin.php\">Seleccione Equipo</option>\n"; 
        require('../../Negocio/Negocio_Equipos.php');
        $objN_Gestionar_Equipos=new Negocio_Equipos();
        $consulta_Combo=$objN_Gestionar_Equipos->Nombre_Equipos();
        if($consulta_Combo) {
            
  while( $Combo_Equipo = mysql_fetch_array($consulta_Combo) ){
            if($Combo_Equipo['codigo_equipo']==$ID_Equipo)
            echo "<option value=\"Alineacion_Admin.php?id_equipo=".base64_encode ($Combo_Equipo['codigo_equipo'])."&#lfpb\" selected=\"selected\">".$Combo_Equipo['nombre']."</option>\n"; 
            else
            echo "<option value=\"Alineacion_Admin.php?id_equipo=".base64_encode ($Combo_Equipo['codigo_equipo'])."&#lfpb\">".$Combo_Equipo['nombre']."</option>\n"; 
        }
        }
        ?>
        </select>
        </p>
    <p> Nombre:
    
    </p>
    <input type="text" name="TNombre" value="<?php echo $Nombre ?>" size="65" />
     
    
      
       <p>Pais:
      
       </p>
        <input type="text" name="TPais" value="<?php echo $Pais ?>" size="65" />
    <p>Fecha Nacimiento:</p>
        <input type="text" name="TFecha" class="tcal" value="<?php echo $Fecha ?>" size="62"  />
        <br>
      <?php
    if($ID_Alineacion>0){
      ?>
      <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
      <?php
      }
      else{
      ?>
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Alineacion" />
      <?php
      }
      
      ?>
   <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" /> 
</form>
<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
  
 echo "<script>location.href='Alineacion_Admin.php'</script>";
         
    
 }
require('../../Negocio/Negocio_Alineacion.php');
$objN_Alineacion=new Negocio_Alineacion();
 if($ID_Alineacion>0 && $Nombre==""){
    
     $objN_Alineacion->Eliminar_Alineacion($ID_Alineacion);
 }
 if (@$_REQUEST['Modificar'] == "Modificar"){
     
 $objN_Alineacion->Modificar_Alineacion($ID_Alineacion,$ID_Equipo,$_POST["TNombre"],$_POST["TPais"],$_POST["TFecha"]);
    
 }
if (@$_REQUEST['enviar'] == "Subir Alineacion"){
      
 $objN_Alineacion->Insertar_Alineacion($ID_Equipo,$_POST["TNombre"],$_POST["TPais"],$_POST["TFecha"]);
}
?>
</br></br>

<?php

$consulta=$objN_Alineacion->Tabla_Alineacion();
?>


<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>Nº</th>
                        <th>Nombre</th>         
                        <th>Pais</th>                                      
                        <th>Fecha Nacimiento</th>                                      
                        <th>Equipo</th>                                      
                        <th></th> 
                        <th></th>
            
        </tr>
      </thead>
      <tbody>
    <?php
 $Contador=1;
if($consulta) {
  while( $Tabla_Alineacion = mysql_fetch_array($consulta) ){
  ?>
    <tr id="<?php echo $Tabla_Alineacion['codigo_alineacion'] ?>">  
                          <td align="middle"><?php echo $Contador ?></td>
        <td align="middle"><?php echo $Tabla_Alineacion['nombre'] ?></td>                           
                          <td align="middle"><?php echo $Tabla_Alineacion['pais'] ?></td> 
                          <td align="middle"><?php echo $Tabla_Alineacion['fecha_nacimiento'] ?></td>
                          <td align="middle"><?php echo $Tabla_Alineacion['equipos'] ?></td>
                          <td align="middle"><span class="modi"><a href="Alineacion_Admin.php?ID_Alineacion=<?php echo base64_encode($Tabla_Alineacion['codigo_alineacion']) ?>&ID_Equipo=<?php echo base64_encode($Tabla_Alineacion['codigo_equipo']) ?>&Nombre=<?php echo base64_encode($Tabla_Alineacion['nombre']) ?>&pais=<?php echo base64_encode($Tabla_Alineacion['pais']) ?>&fecha=<?php echo base64_encode($Tabla_Alineacion['fecha_nacimiento']) ?>&#lfpb"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Alineacion_Admin.php?ID_Alineacion=<?php echo base64_encode($Tabla_Alineacion['codigo_alineacion']) ?>&id_equipo=&Nombre=&pais=&fecha=&#lfpb"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
        
                          
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
      <p>
      &copy;2014 Br1ck Software.<br>
      <!--Design by <a href="http:/www.awfulmedia.com">AwfulMedia.com</a>-->
      </p>
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
