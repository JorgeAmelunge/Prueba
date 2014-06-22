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
                          <h1>Asignar Alineacion al Partido</h1>
                                     <?php
      
      
                         $ID_jornada= base64_decode(@$_GET['id_jornada']);
                         $ID_torneo=base64_decode(@$_GET['id_torneo']);
                         $ID_Partido=base64_decode(@$_GET['id_partido']);
                       $ID_Equipo=base64_decode(@$_GET['id_equipo']);
                       $ID_Alineacion=base64_decode(@$_GET['id_alineacion']);
                        
                        
                        ?>
                               <form  method="post" enctype="multipart/form-data" style="text-align: center">
    <p>
        Torneo:</br>

        <select name="Torneo" id="Torneo" onchange="location.href = this.value">
            
        <?php
          echo "<option value=\"A_Alineacion_Admin.php\">Seleccione Torneo</option>\n"; 
        require('../../Negocio/Negocio_Torneo.php');
        $objN_Gestionar_Torneo=new Negocio_Torneo();
        $consulta_Combo1=$objN_Gestionar_Torneo->Tabla_Torneos();
        if($consulta_Combo1) {
          
  while( $Combo_Torneo = mysql_fetch_array($consulta_Combo1) ){
            
               if($Combo_Torneo['codigo_torneo']==$ID_torneo)
            echo "<option  value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#lfpb\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
               else
            echo "<option  value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#lfpb\">".$Combo_Torneo['nombre']."</option>\n"; 
        }
        }
        
        
        ?>
            
        
        </select>
        </p>   
        
        <p>
        Jornada:</br>

        <select name="Jornada" id="Jornada" onchange="location.href = this.value">
            
        <?php
          echo "<option value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&#lfpb\">Seleccione Jornada</option>\n"; 
        require('../../Negocio/Negocio_Jornada.php');
        $objN_Gestionar_Jornada=new Negocio_Jornada();
        $consulta_Combo=$objN_Gestionar_Jornada->Tabla_Jornada($ID_torneo);
        if($consulta_Combo) {
          
  while( $Combo_Jornada = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Jornada['codigo_Jornada']==$ID_jornada)
            echo "<option  value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($Combo_Jornada['codigo_Jornada'])."&#lfpb\" selected=\"selected\">".$Combo_Jornada['Njornada']."</option>\n"; 
               else
            echo "<option  value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($Combo_Jornada['codigo_Jornada'])."&#lfpb\">".$Combo_Jornada['Njornada']."</option>\n"; 
        }
        }
        
        
        ?>
            
        
        </select>
        </p>           
       <p>
        Partido:</br>

        <select name="Partido" id="Partido" onchange="location.href = this.value">
            
        <?php
          echo "<option value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&#lfpb\">Seleccione Partido</option>\n"; 
        require('../../Negocio/Negocio_Partidos.php');
        $objN_Gestionar_Partidos=new Negocio_Partidos();
        $consulta=$objN_Gestionar_Partidos->Tabla_Partidos($ID_jornada);
        if($consulta) {
          
  while( $Combo_Partido = mysql_fetch_array($consulta) ){
            
                 if($Combo_Partido['codigo_partido']==$ID_Partido)
            echo "<option  value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_partido=".base64_encode($Combo_Partido['codigo_partido'])."&#lfpb\" selected=\"selected\">".$Combo_Partido['ELocal']."  Vs.  ".$Combo_Partido['EVisita']."</option>\n"; 
               else
            echo "<option  value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_partido=".base64_encode($Combo_Partido['codigo_partido'])."&#lfpb\">".$Combo_Partido['ELocal']."  Vs.  ".$Combo_Partido['EVisita']."</option>\n"; 
        }
        }
        
        
        ?>
        
        </select>
        </p> 
         <p>
        Equipo:</br>

        <select name="Equipo" id="Equipo" onchange="location.href = this.value">
            
        <?php
          echo "<option value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_partido=".base64_encode($ID_Partido)."&#lfpb\">Seleccione Equipo</option>\n"; 
       
        $consulta3=$objN_Gestionar_Partidos->Tabla_Partidos($ID_jornada);
        if($consulta3) {
          
  while( $Combo_Equipo = mysql_fetch_array($consulta3) ){
            if($Combo_Equipo['codigo_partido']==$ID_Partido){
               if($Combo_Equipo['codigolocal']==$ID_Equipo)
             echo "<option  value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_partido=".base64_encode($ID_Partido)."&id_equipo=".base64_encode($Combo_Equipo['codigolocal'])."&#lfpb\" selected=\"selected\">".$Combo_Equipo['ELocal']."</option>\n"; 
               else
             echo "<option  value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_partido=".base64_encode($ID_Partido)."&id_equipo=".base64_encode($Combo_Equipo['codigolocal'])."&#lfpb\">".$Combo_Equipo['ELocal']."</option>\n"; 
               if($Combo_Equipo['codigovisitante']==$ID_Equipo)
             echo "<option  value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_partido=".base64_encode($ID_Partido)."&id_equipo=".base64_encode($Combo_Equipo['codigovisitante'])."&#lfpb\" selected=\"selected\">".$Combo_Equipo['EVisita']."</option>\n"; 
               else
             echo "<option  value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_partido=".base64_encode($ID_Partido)."&id_equipo=".base64_encode($Combo_Equipo['codigovisitante'])."&#lfpb\">".$Combo_Equipo['EVisita']."</option>\n"; 
            }
               
            }
        }
        
        ?>
            
        
        </select>
         </p>
        <p>
        Alineacion:</br>

        <select name="Alineacion" id="Alineacion" >
            
        <?php
          echo "<option value=\"A_Alineacion_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_partido=".base64_encode($ID_Partido)."&id_equipo=".base64_encode($ID_Equipo)."&#lfpb\">Seleccione Jugador</option>\n"; 
        require('../../Negocio/Negocio_Alineacion.php');
        $objN_Gestionar_Alineacion=new Negocio_Alineacion();
        $consulta_Combo5=$objN_Gestionar_Alineacion->Tabla_Alineacion_Partido($ID_Partido,$ID_Equipo);
        if($consulta_Combo5) {
          
  while( $Combo_jugador = mysql_fetch_array($consulta_Combo5) ){
          
            echo "<option  value=\"".($Combo_jugador['codigo_alineacion'])."\">".$Combo_jugador['nombre']."</option>\n"; 
        }
        }
        
        
        ?>
            
        
        </select>
        </p>    
         
       <p>Observacion:</br>
           <select name="Observacion" id="Observacion">
               <option value="">Seleccione una Observacion</option>
               <option value="Cancha">Cancha</option>
               <option value="Suplente">Suplente</option>               
           </select>
         
       </p>
        <p> Camiseta:
    
    </p>
    <input type="text" name="TCamiseta" value="" size="65" onKeyPress="return validar_texto(event);"/>
    <br>
      
      <input name="enviar" type="submit" class="boton" id="enviar" value="Asignar al Partido" />
      
      <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" /> 
      
     
</form>
  <?php
 


 if (@$_REQUEST['Cancelar'] == "Cancelar"){
  
 echo "<script>location.href='A_Alineacion_Admin.php'</script>";
         
    
 }
        require('../../Negocio/Negocio_Partido_Alineacion.php');
        $objN_Gestionar_Partido_Alineacion=new Negocio_Partido_Alineacion();
       if($ID_torneo>0 && $ID_Partido>0 && $ID_jornada>0 && $ID_Alineacion>0){
    
     $objN_Gestionar_Partido_Alineacion->Eliminar_Partido_Alineacion($ID_Alineacion, $ID_Partido, $ID_torneo, $ID_jornada, $ID_Equipo);
 }
 


 
 
if (@$_REQUEST['enviar'] == "Asignar al Partido"){
      
 $objN_Gestionar_Partido_Alineacion->Insertar_Partido_Alineacion($ID_Partido,$ID_torneo,$ID_jornada,$ID_Equipo,$_POST["Alineacion"],$_POST["Observacion"],$_POST["TCamiseta"]);
}
if($ID_torneo>0 && $ID_Partido>0 && $ID_jornada>0){
   

  
$consulta2=$objN_Gestionar_Partido_Alineacion->Tabla_Partido_Alineacion($ID_Partido, $ID_Equipo);

?>


<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>Nº</th>
                        <th>Equipo</th>                                            
                        <th>Nombre</th>                            
                        <th>Observacion</th>   
                        <th>Camiseta</th>  
                        <th></th>
            
        </tr>
      </thead>
      <tbody>
    <?php
 $Contador=1;
if($consulta2) {
  while( $Tabla_Partido_Alineacion = mysql_fetch_array($consulta2) ){
  ?>
    <tr>  
                          <td align="middle"><?php echo $Contador ?></td>
                          <td align="middle"><?php echo $Tabla_Partido_Alineacion['enombre'] ?></td>
                          <td align="middle"><?php echo $Tabla_Partido_Alineacion['anombre'] ?></td>
                          <td align="middle"><?php echo $Tabla_Partido_Alineacion['observacion'] ?></td>
                          <td align="middle"><?php echo $Tabla_Partido_Alineacion['camiseta'] ?></td>
                          <td align="middle"><span class="dele"><a href="A_Alineacion_Admin.php?id_torneo=<?php echo base64_encode($ID_torneo) ?>&id_partido=<?php echo base64_encode($ID_Partido) ?>&id_jornada=<?php echo base64_encode($ID_jornada)?>&id_equipo=<?php echo base64_encode($ID_Equipo)?>&id_alineacion=<?php echo base64_encode($Tabla_Partido_Alineacion['codigo_alineacion'])?>&#anf"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
         
                        
                        
                      
                       
                                                                                                                                                                                                                
                          
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
