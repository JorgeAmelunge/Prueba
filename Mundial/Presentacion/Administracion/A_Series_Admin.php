 <? //include("../autentificacion/seguridad.php"); ?>
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
    "order": [[ 0, "asc" ]]
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
   <a name="mundial">  <div align="center"> </a><h2>MUNDIALES DE FUTBOL</h2></br></div>
   
  <hr>
    
       


   <a name="mundial"> <div class="content_adm" align="center"></a>
                           
                                                       <h1>Gestionar Asignacion Series</h1>
                                     <?php
      
      
                          
       $ID_Serie=  base64_decode(@$_GET['id_serie']);
                         $ID_torneo=base64_decode(@$_GET['id_torneo']);
                         $VID_Serie=base64_decode(@$_GET['vid_serie']);
                         $VID_torneo=base64_decode(@$_GET['vid_torneo']);
                         $ID_equipo=base64_decode(@$_GET['id_equipo']);
                        
                        
                        ?>
       <form   method="post" enctype="multipart/form-data" style="text-align: center">
       
       <p>
        Torneo:</br>

        <select name="Torneo" id="Torneo" onchange="location.href = this.value">
            
        <?php
       
        require('../../Negocio/Negocio_Torneo.php');
        $objN_Gestionar_Torneo=new Negocio_Torneo();
        $objN_Gestionar_Torneo->Combo_Torneo_A_Series($ID_torneo);
        ?>
            
        
        </select>
        </p>   
        
        <p>
        Serie:</br>

        <select name="Serie" id="Serie" onchange="location.href = this.value">
           <?php
          
        require('../../Negocio/Negocio_Series.php');
        $objN_Gestionar_Serie=new Negocio_Serie();
        $objN_Gestionar_Serie->Combo_Serie($ID_torneo,$ID_Serie);
       
        
        ?>
       </select>
        </p>           
       <p>
        Equipo:</br>

        <select name="Equipo" id="Equipo" onchange="location.href = this.value">
            
        <?php
         
        require('../../Negocio/Negocio_Equipos.php');
        $objN_Gestionar_Equipo=new Negocio_Equipos();
        $objN_Gestionar_Equipo->Combo_Equipos_series($ID_torneo,$ID_Serie,$ID_equipo);
       
        
        
        ?>
            
        
        </select>
        </p>    
      
        <p> Puntos de Bonificacion:
    
    </p>
    <input type="text" name="Tbonificacion" value="0" size="65" />
    
     <p> Vinculacion de Tablas:    
    </p>
    </br>
     Torneo Vinculacion:</br>

        <select name="VTorneo" id="VTorneo" onchange="location.href = this.value">
            
        <?php    
       
        $objN_Gestionar_Torneo->Combo_Torneo_A_Series_Vinculadas($ID_torneo,$ID_Serie,$ID_equipo,$VID_torneo);
       
        
        
        ?>
            
        
        </select>
        </p>   
        
        <p>
        Serie vinculacion:</br>

        <select name="VSerie" id="VSerie" >
             <?php
          
        
        $objN_Gestionar_Serie->Combo_Serie_Vinculada($VID_torneo,$VID_Serie);
       
        
        
        ?>
        
            </select>
        </p>   
      <br><br>
      
      
      <input name="enviar" type="submit" class="boton" id="enviar" value="Asignar Equipo" />
      
      <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" /> 
      
</form>
<?php
require('../../Negocio/Negocio_A_Series.php');
 $objN_Gestionar_A_Serie=new Negocio_A_Serie();
 if($ID_Serie>0 && $ID_equipo>0 && $VID_Serie<0){
    
     $objN_Gestionar_A_Serie->Eliminar_A_Serie($ID_torneo,$ID_Serie, $ID_equipo);
 }
  if (@$_REQUEST['Cancelar'] == "Cancelar"){
  
 echo "<script>location.href='A_Series_Admin.php'</script>";
         
    
 }
 
if (@$_REQUEST['enviar'] == "Asignar Equipo"){      
 $objN_Gestionar_A_Serie->Insertar_A_Serie($ID_torneo,$ID_Serie,$ID_equipo,$_POST["Tbonificacion"],$VID_torneo,$_POST["VSerie"]);
}
if($ID_torneo>0 && $ID_Serie>0){
   
?>

<?php
   
$objN_Gestionar_A_Serie->Tabla_A_Serie($ID_Serie);
} 
?>



                        
            
                                

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
