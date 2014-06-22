 <? include("../autentificacion/seguridad.php"); ?>
<html>
<title>Liga del Futbol Profesional Bolivino - Usuarios ADM</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="../../../styles/elegant-press.css" type="text/css" />
<script src="../../../scripts/elegant-press.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../styles/tcal.css" />
                <script type="text/javascript" src="../../../scripts/tcal.js"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->
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
<div class="main-container">
  <header>
    <h1><a href="#">Liga del Futbol Profesional Bolivino</a></h1>
    
  </header>
</div>
<div class="main-container">
  <div id="sub-headline">
    <div class="tagline_left"><p id="tagline2">Tel: 658-76116 | Mail: bricksoftware.gerencia@gmail.com</p></div>
    <div class="tagline_right">
      
    </div>
    <br class="clear" />
  </div>
</div>
<?php include("Menu_Admin.php"); ?>
<div class="main-container">
  <div class="container1">
 
<br />
<br />

    <div class="box">
         <a name="lfpb"> <div class="content_adm"></a>
                           
                     
    <h1>Gestionar Usuarios</h1>
                                     <?php
			
			
                          
			   $ID_Usuario= 0;
                        $Clave_Usuario='' ;
                        $Usuario='';
                        require('../../Negocio/Negocio_Usuario.php');
                        $objN_Usuario=new Negocio_Usuario();
			$consulta=$objN_Usuario->Tabla_Usuario();
                        if($consulta) {
                        while( $Tabla_Usuario = mysql_fetch_array($consulta) ){
                                $ID_Usuario= $Tabla_Usuario['idusuarios'] ;
                                $Usuario=$Tabla_Usuario['username'] ;
                                $Clave_Usuario= $Tabla_Usuario['clave'];
                                
                                }
                        }
                        
                        
                        ?>
         <div style="text-align: center">
<form action="Usuario_Admin.php" method="post" enctype="multipart/form-data">
    
    <p>  User Name:</p>
    <input type="text" name="username" value="<?php echo $Usuario ?>" size="65" /><br/><br/>
     <input  type="hidden"  name="ID_Usuario_Text" value="<?php echo $ID_Usuario ?>" size="65" />
    
        <p> Contraseña:</p>   
        <input type="password" name="clave" value="<?php echo $Clave_Usuario ?>" size="65" /><br/><br/>        
        
      <?php
      if($ID_Usuario>0 && $Usuario!="" && $Clave_Usuario!=""){
      ?>
      <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
      <?php
      }
      else{
      ?>
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Usuario" />
      <?php
      }
      
      ?>
	  <input name="action" type="hidden" value="upload" />	  
</form>
   </div>
<?php

 
 if (@$_REQUEST['Modificar'] == "Modificar"){    
 

 $objN_Usuario->Modificar_Usuario($_POST["ID_Usuario_Text"],$_POST["username"], $_POST["clave"]);     
       
 }
if (@$_REQUEST['enviar'] == "Subir Usuario"){
   
 $objN_Usuario->Insertar_Usuario($_POST["username"], $_POST["clave"]);       
}
?>
			  	
        		
      </div>
      
    

      
      
      <div class="clear"></div>
    </div>
    
 
 </div>
<div class="main-container">
 </div>
 

       
   
 <?php include("../Principales/footer.php"); ?>

<br />
<br />
</div>
    </body>
</html>