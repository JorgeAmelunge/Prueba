 <?// include("../autentificacion/seguridad.php"); ?>
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
                          <h1>Asignar Observacion al Partido</h1>
                          
                                     <?php
      
      
            $ID_jornada= base64_decode(@$_GET['id_jornada']);
            $ID_torneo=base64_decode(@$_GET['id_torneo']);
            $ID_Partido=base64_decode(@$_GET['id_partido']);
            $ID_Equipo=base64_decode(@$_GET['id_equipo']);
            $Observacion= base64_decode(@$_GET['obs']);
            $ID_Puntaje=0;
            $codigo=base64_decode(@$_GET['codigo']);
            require('../../Negocio/Negocio_Partidos.php');
            $objN_Gestionar_Partidos=new Negocio_Partidos(); 
                        
                        
                        ?>
     <form  method="post" enctype="multipart/form-data" style="text-align: center">
    <p>
        Torneo:</br>

        <select name="Torneo" id="Torneo" onchange="location.href = this.value">
            
        <?php
        require('../../Negocio/Negocio_Torneo.php');
        $objN_Gestionar_Torneo=new Negocio_Torneo();
        $consulta_Combo1=$objN_Gestionar_Torneo->Combo_Torneos_Alineacion($ID_torneo);
       
        ?>
            
        
        </select>
        </p>   
        
        <p>
        Jornada:</br>

        <select name="Jornada" id="Jornada" onchange="location.href = this.value">
            
        <?php
          
        require('../../Negocio/Negocio_Jornada.php');
        $objN_Gestionar_Serie=new Negocio_Jornada();
        $consulta_Combo=$objN_Gestionar_Serie->Combo_Jornada_Alineacion($ID_torneo,$ID_jornada);
        
        
        ?>
            
        
        </select>
        </p>           
       <p>
        Partido:</br>

        <select name="Partido" id="Partido" onchange="location.href = this.value">
            
        <?php
         
        $consulta=$objN_Gestionar_Partidos->Combo_Partidos($ID_jornada,$ID_torneo,$ID_Partido);
       
        ?>
        
        </select>
        </p> 
         <p>
        Equipo:</br>

        <select name="Equipo" id="Equipo" onchange="location.href = this.value">
            
        <?php
       
       
        $objN_Gestionar_Partidos->Combo_Equipo_Partidos($ID_jornada,$ID_torneo,$ID_Partido,$ID_Equipo);
       
        
        ?>
            
        
        </select>
         </p>
        
         
       <p>Observacion:</br>
           <select name="Observacion" id="Observacion">
               <?php 
               
                require('../../Negocio/Negocio_Partido_Observacion.php');
                 $objN_Gestionar_Partido_Observacion=new Negocio_Partido_Observacion();
                $objN_Gestionar_Partido_Observacion->Combo_Observacion();
                
               ?>
                      
           </select>
         
       </p>
       
    <br><br>
      
      <input name="enviar" type="submit" class="boton" id="enviar" value="Asignar Observacion al Partido" />
      
      <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" /> 
      <?php
      $consulta=$objN_Gestionar_Partidos->Tabla_Partido_detallado($ID_Partido);
        if($consulta) {
          
  while( $Combo_Partido = mysql_fetch_array($consulta) ){
                $ID_Puntaje=$Combo_Partido['pts'];
                 
       
      if($ID_Puntaje==0){
      ?>
       <input name="enviar" type="submit" class="boton" id="enviar" value="Asignar Puntaje al Partido" />
               
    
      <?php
       }
        }
      }
       if($ID_torneo>0 && $ID_Partido>0 && $ID_jornada>0 ){
    
     $objN_Gestionar_Partido_Observacion->Eliminar_Partido_Observacion( $ID_Partido, $ID_torneo, $ID_jornada, $ID_Equipo,$codigo,$Observacion);
 }
 ?>
         <br><br>
</form>
<?php


 if (@$_REQUEST['Cancelar'] == "Cancelar"){
  
 echo "<script>location.href='A_Alineacion_O_Admin.php'</script>";
         
    
 }
 
if (@$_REQUEST['enviar'] == "Asignar Observacion al Partido"){
  if($_POST["Observacion"]==3 || $_POST["Observacion"]==6){
     if($objN_Gestionar_Partido_Observacion->Insertar_Partido_Observacion($ID_Partido,$ID_torneo,$ID_jornada,$ID_Equipo,$_POST["Observacion"])==true){
              $consulta=$objN_Gestionar_Partidos->Tabla_Partido_detallado($ID_Partido);
            if($consulta) {

                         while( $Combo_Partido_O = mysql_fetch_array($consulta) ){
                           
                           
                            $CL= $Combo_Partido_O['ELocal'];
                            if($CL!=$ID_Equipo)
                             $objN_Gestionar_Partidos->Insertar_gol_Visitante($ID_Partido);
                            else
                             $objN_Gestionar_Partidos->Insertar_Gol_Local($ID_Partido);
                          
                         }
                         }
     }
  }
 else{
  if($_POST["Observacion"]==7 ){
     if($objN_Gestionar_Partido_Observacion->Insertar_Partido_Observacion($ID_Partido,$ID_torneo,$ID_jornada,$ID_Equipo,$_POST["Observacion"])==true){
              $consulta=$objN_Gestionar_Partidos->Tabla_Partido_detallado($ID_Partido);
            if($consulta) {

                         while( $Combo_Partido_O = mysql_fetch_array($consulta) ){
                           
                           
                            $CL= $Combo_Partido_O['ELocal'];
                            if($CL!=$ID_Equipo)
                             $objN_Gestionar_Partidos->Insertar_Penal_Visitante($ID_Partido);
                            else
                             $objN_Gestionar_Partidos->Insertar_Penal_Local($ID_Partido);
                          
                         }
                         }
     }
  }
  else{
     $objN_Gestionar_Partido_Observacion->Insertar_Partido_Observacion($ID_Partido,$ID_torneo,$ID_jornada,$ID_Equipo,$_POST["Observacion"]);
     }
 }
}

if (@$_REQUEST['enviar'] == "Asignar Puntaje al Partido"){
        require('../../Negocio/Negocio_A_Series.php');
        $objN_Gestionar_A_Serie=new Negocio_A_Serie();
              $consulta=$objN_Gestionar_Partidos->Tabla_Partido_detallado($ID_Partido);
            if($consulta) {

                         while( $Combo_Partido_O = mysql_fetch_array($consulta) ){
                           $objN_Gestionar_Partidos->Insertar_Puntos($ID_Partido);
                            $CL= $Combo_Partido_O['ELocal'];
                            $CV= $Combo_Partido_O['EVisita'];
                            $ML= $Combo_Partido_O['marcador_local'];
                            $MV= $Combo_Partido_O['marcador_visitante'];
                            if($ML>$MV){
                              $objN_Gestionar_A_Serie->Tabla_Asignar_puntos_ganador($ID_torneo, $CL, $ML, $MV);
                              $objN_Gestionar_A_Serie->Tabla_Asignar_puntos_perdedor($ID_torneo, $CV, $MV, $ML);
                              
                            }
                            else{
                                if($MV>$ML){
                                     $objN_Gestionar_A_Serie->Tabla_Asignar_puntos_ganador($ID_torneo, $CV, $MV, $ML);
                                     $objN_Gestionar_A_Serie->Tabla_Asignar_puntos_perdedor($ID_torneo, $CL, $ML, $MV);
                                }
                                else{
                                   $objN_Gestionar_A_Serie->Tabla_Asignar_puntos_empate($ID_torneo, $CV, $MV, $ML);
                                   $objN_Gestionar_A_Serie->Tabla_Asignar_puntos_empate($ID_torneo, $CL, $ML, $MV);  
                                }
                            }
                            
                           echo "<script>alert('Asignacion de Puntos Realizada con Exito!!'); 
                                
                                 </script>";
                                 echo "<meta http-equiv=refresh content=1;URL=A_Alineacion_O_Admin.php?id_torneo=";
                                 echo base64_encode($ID_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_jornada);
                                echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                 echo "&id_equipo=";
                                echo base64_encode($ID_Equipo);
                                echo "&#mundial>";
                         }
                         } 
  
 
}
if($ID_torneo>0 && $ID_Partido>0 && $ID_jornada>0){
   
?>

<?php
  
$consulta2=$objN_Gestionar_Partido_Observacion->Tabla_Partido_Alineacion_Observacion($ID_Partido);

?>


<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>Nº</th>
                        <th>Equipo</th> 
                                                                                          
                        <th>Observacion</th>                            
                                                 
                        <th></th>
            
        </tr>
      </thead>
      <tody>
    <?php
 $Contador=1;
if($consulta2) {
  while( $Tabla_Partido_Observacion = mysql_fetch_array($consulta2) ){
  ?>
    <tr>  
                          <td align="middle"><?php echo $Contador ?></td>
                          <td align="middle"><?php echo $Tabla_Partido_Observacion['enombre'] ?></td>
                          <td align="middle"><?php echo $Tabla_Partido_Observacion['onombre'] ?></td>                          
                                                  
                          
                          <td align="middle"><span class="dele"><a href="A_Alineacion_O_Admin.php?id_torneo=<?php echo base64_encode($ID_torneo) ?>&id_partido=<?php echo base64_encode($ID_Partido) ?>&id_jornada=<?php echo base64_encode($ID_jornada)?>&id_equipo=<?php echo base64_encode($ID_Equipo) ?>&codigo=<?php echo base64_encode($Tabla_Partido_Observacion['codigo']) ?>&obs=<?php echo base64_encode($Tabla_Partido_Observacion['codigo_observacion']) ?>&#mundial"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
         
                        
                        
                      
                       
                                                                                                                                                                                                                
                          
      </tr> 
  <?php
        $Contador++;
    }

} 
?>
</tbody>
    </table>
<?php } ?>   
            
            

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
