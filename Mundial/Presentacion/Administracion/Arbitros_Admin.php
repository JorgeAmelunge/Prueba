  <? include("../autentificacion/seguridad.php"); ?>
<html>
<title>Liga del Futbol Profesional Bolivino - Arbitros ADM</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="../../../styles/elegant-press.css" type="text/css" />
<script src="../../../scripts/elegant-press.js" type="text/javascript"></script>
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
                           
                                 <h1>Gestionar Arbitros</h1>
                                     <?php
			
			
                          
			   $Nombre=  base64_decode(@$_GET['Nombre']);
                        $ID_Arbitro=base64_decode(@$_GET['ID_Arbitro']);                        
                        $Ciudad=base64_decode(@$_GET['Ciudad']);
                        
                        
                        ?>
                   <form  method="post" enctype="multipart/form-data" style="text-align: center">
    
    <p> Nombre:
    
    </p>
    <input type="text" name="TNombre" value="<?php echo $Nombre ?>" size="65" />
     <input  type="hidden"  name="ID_Arbitro_Text" value="<?php echo $ID_Arbitro ?>" size="65" />
    
      
       <p>Ciudad:
       
       </p>
<input type="text" name="TCiudad" value="<?php echo $Ciudad ?>" size="65" />
<br><br>
      <?php
    if($ID_Arbitro>0){
      ?>
      <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
      <?php
      }
      else{
      ?>
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Arbitro" />
      <?php
      }
      
      ?>
	 <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />  
</form>
<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
  
 echo "<script>location.href='Arbitros_Admin.php'</script>";
         
    
 }
require('../../Negocio/Negocio_Arbitro.php');
$objN_Arbitro=new Negocio_Arbitro();
 if($ID_Arbitro>0 && $Nombre==""){
    
     $objN_Arbitro->Eliminar_Arbitro($ID_Arbitro);
 }
 if (@$_REQUEST['Modificar'] == "Modificar"){
 $objN_Arbitro->Modificar_Arbitro($ID_Arbitro,$_POST["TNombre"],$_POST["TCiudad"]);
    
 }
if (@$_REQUEST['enviar'] == "Subir Arbitro"){
      
 $objN_Arbitro->Insertar_Arbitro($_POST["TNombre"],$_POST["TCiudad"]);
}
?>
</br></br>

<?php

$consulta=$objN_Arbitro->Tabla_Arbitro();
?>


<table style="text-align: center;width: 100%">
   		<tr>
			<th>Nº</th>
                        <th>Nombre</th>   			
                        <th>Ciudad</th>                                      
                        <th></th>	
                        <th></th>
            
        </tr>
		<?php
 $Contador=1;
if($consulta) {
	while( $Tabla_Arbitro = mysql_fetch_array($consulta) ){
	?>
		<tr id="<?php echo $Tabla_Arbitro['codigo_arbitro'] ?>">	
                          <td align="middle"><?php echo $Contador ?></td>
			  <td align="middle"><?php echo $Tabla_Arbitro['nombre'] ?></td>	                          
                          <td align="middle"><?php echo $Tabla_Arbitro['ciudad'] ?></td>	
                          <td align="middle"><span class="modi"><a href="Arbitros_Admin.php?ID_Arbitro=<?php echo base64_encode($Tabla_Arbitro['codigo_arbitro']) ?>&Nombre=<?php echo base64_encode($Tabla_Arbitro['nombre']) ?>&Ciudad=<?php echo base64_encode($Tabla_Arbitro['ciudad']) ?>"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Arbitros_Admin.php?ID_Arbitro=<?php echo base64_encode($Tabla_Arbitro['codigo_arbitro']) ?>&Nombre=&Ciudad="><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
			  
                          
		  </tr>	
	<?php
        $Contador++;
		}
}
		
?>
    </table>                 
			
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