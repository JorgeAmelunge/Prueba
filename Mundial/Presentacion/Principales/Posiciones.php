<!DOCTYPE html>
<!--
*************************************
Template designed by Austin Gregory of
AwfulMedia.com. Before using or modifying this file
please read the included license
*************************************
Date: 6/7/2012
Author: Austin Gregory
Website: AwfulMedia.com
*************************************
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>APUESTA MUNDIAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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
  <link rel="stylesheet" type="text/css" href="../../../css/jquery.dataTables.css" />
<script type="text/javascript" src="../../../js/jquery.dataTables.js"></script>
  <script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
  $('#example').dataTable( {
    "order": [[ 0, "desc" ]]
  } );
} );

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
            <li ><a href="../../../index.html">Home</a></li>
            <li><a href="Partidos.php">Partidos</a></li>
            <li><a href="Posiciones.php">Posiciones</a>
            
      
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

             
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="../../../img/arrow.png" alt="Arrow"></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="../../../img/arrow2.png" alt="Arrow"></a>
          </div>
  <!--End Carousel-->
   <a name="mundial">  <div align="center"> </a><h2>Brasil 2014</h2></br></a></div>
   
  <hr>
      <h1>Partidos</h1>
         <?php
           $ID_torneo= base64_decode(@$_GET['id_torneo']);    
          $ID_jornada=  base64_decode(@$_GET['id_jornada']);
         
          ?>
            
            
        <div class="row" >
        <div class="span4"  style="text-align: center">
           <h1>Posiciones</h1>
           <?php

                                                $ID_Serie=  base64_decode(@$_GET['id_serie']);
                                                $ID_torneo=base64_decode(@$_GET['id_torneo']);
                                                ?>
            
            
            
            
            <form  method="post" enctype="multipart/form-data">
                                            <p> 
                                                
                                            <select name="Torneo" id="Torneo" onchange="location.href = this.value">

                                                <?php
                                             
                                                require('../../Negocio/Negocio_Torneo.php');
                                                $objN_Gestionar_Torneo=new Negocio_Torneo();
                                                $objN_Gestionar_Torneo->Combo_Torneo_Posiciones($ID_torneo);
                                                


                                                ?>


                                                </select>

                                                <select name="Serie" id="Serie" onchange="location.href = this.value">
                                                    
                                                     <?php
                                                
                                                require('../../Negocio/Negocio_Series.php');
                                                $objN_Gestionar_Serie=new Negocio_Serie();
                                                $objN_Gestionar_Serie->Combo_Posiciones($ID_torneo,$ID_Serie);
                                               

                                                ?>
                                               </select>



                                        </p>

                                        </form>
                                             

                                        <?php
                                        if($ID_torneo>0 && $ID_Serie>0){
                                             require('../../Negocio/Negocio_A_Series.php');
                                                $objN_Gestionar_A_Serie=new Negocio_A_Serie();
                                                $objN_Gestionar_A_Serie->Mostrar_Tabla_Torneo_Posiciones($ID_torneo,$ID_Serie);
                                                }
                                        ?>

                                        
                            
            

                                              </div>
                                              <div class="span4"  style="text-align: center">
                                              </br>
                                              </br>
                                              </br>
                                                <h2>Equipos</h2>
          
                                                      <?php
                                                            require('../../Negocio/Negocio_Equipos.php');
                                                            $objN_Gestionar_Equipos=new Negocio_Equipos();
                                                            $objN_Gestionar_Equipos->Tabla_Equipos_Partidos($ID_torneo);
                                                           


                                                            ?>
            
                                            
                                              </div>
                                              </div>
    <!--Start second row of columns-->
    

      <hr>

    <footer class="row">
      <div>
       
      </div>
    
    </footer>
    </div><!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../../js/jquery.js"></script>
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
