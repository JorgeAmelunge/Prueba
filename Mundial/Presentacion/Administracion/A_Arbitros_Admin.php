  <? include("../autentificacion/seguridad.php"); ?>
<html>
<title>Liga del Futbol Profesional Bolivino - Asignar Arbitros ADM</title>
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
                           
                                                            <h1>Asignar Arbitros</h1>
                                     <?php
			
			
                          $ID_jornada=  base64_decode(@$_GET['id_jornada']);
                         $ID_torneo=base64_decode(@$_GET['id_torneo']);
                         $ID_Partido=base64_decode(@$_GET['id_partido']);
                       $ID_Arbitro=base64_decode(@$_GET['id_arbitro']);
                        
                        
                        ?>
                        <form   method="post" enctype="multipart/form-data" style="text-align: center">
                             
    <p>
        Torneo:</br>

        <select name="Torneo" id="Torneo" onchange="location.href = this.value">
            
        <?php
         echo "<option value=\"A_Arbitros_Admin.php\">Seleccione Torneo</option>\n"; 
        require('../../Negocio/Negocio_Torneo.php');
        $objN_Gestionar_Torneo=new Negocio_Torneo();
        $consulta_Combo=$objN_Gestionar_Torneo->Tabla_Torneos();
        if($consulta_Combo) {
           
	while( $Combo_Torneo = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Torneo['codigo_torneo']==$ID_torneo)
            echo "<option  value=\"A_Arbitros_Admin.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#lfpb\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
               else
            echo "<option  value=\"A_Arbitros_Admin.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#lfpb\">".$Combo_Torneo['nombre']."</option>\n"; 
        }
        }
        
        
        ?>
            
        
        </select>
        </p>   
        
        <p>
        Jornada:</br>

        <select name="Jornada" id="Jornada" onchange="location.href = this.value">
            <?php
          echo "<option value=\"A_Arbitros_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&#lfpb\">Seleccione Jornada</option>\n"; 
        require('../../Negocio/Negocio_Jornada.php');
        $objN_Gestionar_Jornada=new Negocio_Jornada();
        $consulta_Combo=$objN_Gestionar_Jornada->Tabla_Jornada($ID_torneo);
        if($consulta_Combo) {
          
	while( $Combo_Jornada = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Jornada['codigo_Jornada']==$ID_jornada)
            echo "<option  value=\"A_Arbitros_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($Combo_Jornada['codigo_Jornada'])."&#lfpb\" selected=\"selected\">".$Combo_Jornada['Njornada']."</option>\n"; 
               else
            echo "<option  value=\"A_Arbitros_Admin.php?id_torneo=".base64_encode ($ID_torneo)."&id_jornada=".base64_encode($Combo_Jornada['codigo_Jornada'])."&#lfpb\">".$Combo_Jornada['Njornada']."</option>\n"; 
        }
        }
        
        
        ?>
       </select>
        </p>           
       <p>
        Partido:</br>

        <select name="Partido" id="Partido" onchange="location.href = this.value">
            
        <?php
           echo "<option value='A_Arbitros_Admin.php?id_torneo=";
            echo base64_encode($ID_torneo);
            echo "&id_jornada=";
            echo base64_encode($ID_jornada);
             echo "&#lfpb'>Seleccione Partido</option>";
        require('../../Negocio/Negocio_Partidos.php');
        $objN_Gestionar_Partidos=new Negocio_Partidos();
        $consulta=$objN_Gestionar_Partidos->Tabla_Partidos($ID_jornada);
        if($consulta) {
          
	while( $Combo_Partido = mysql_fetch_array($consulta) ){
            
                 if($Combo_Partido['codigo_partido']==$ID_Partido)
            echo "<option  value=\"A_Arbitros_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_partido=".base64_encode($Combo_Partido['codigo_partido'])."&#lfpb\" selected=\"selected\">".$Combo_Partido['ELocal']."  Vs.  ".$Combo_Partido['EVisita']."</option>\n"; 
               else
             echo "<option  value=\"A_Arbitros_Admin.php?id_torneo=".  base64_encode($ID_torneo)."&id_jornada=".  base64_encode($ID_jornada)."&id_partido=".base64_encode($Combo_Partido['codigo_partido'])."&#lfpb\">".$Combo_Partido['ELocal']."  Vs.  ".$Combo_Partido['EVisita']."</option>\n"; 
        }
        }
        
        
        ?>
        
        </select>
        </p>    
        <p>
        Arbitros:</br>

        <select name="Arbitros" id="Arbitros">
            
        <?php
          echo "<option value=\"0\">Seleccione Arbitro</option>\n"; 
        require('../../Negocio/Negocio_Partido_Arbitro.php');
        $objN_Gestionar_Partido_Arbitro=new Negocio_Partido_Arbitro();
        $consulta_Combo5=$objN_Gestionar_Partido_Arbitro->Tabla_Partido_Arbitro_combo($ID_Partido);
        if($consulta_Combo5) {
          
	while( $Combo_Arbitro = mysql_fetch_array($consulta_Combo5) ){
          
             echo "<option  value=\"".($Combo_Arbitro['codigo_arbitro'])."\">".$Combo_Arbitro['nombre']."</option>\n"; 
        }
        }
        
        
        ?>
            
        
        </select>
        </p>    
         
       <p>Observacion:</br>
           <select name="Observacion" id="Observacion">
               <option value="">Seleccione una Observacion</option>
               <option value="Arbitro Central">Arbitro Central</option>
               <option value="Primer Asistente">Primer Asistente</option>
               <option value="Segundo Asistente">Segundo Asistente</option>
               <option value="Cuarto Arbitro">Cuarto Arbitro</option>
           </select>
         
       </p>
       
      
      <input name="enviar" type="submit" class="boton" id="enviar" value="Asignar Arbitro" />
      
      <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" /> 
      <br><br>
  
</form>
<?php

 if($ID_torneo>0 && $ID_Partido>0 && $ID_jornada>0 && $ID_Arbitro>0){
    
     $objN_Gestionar_Partido_Arbitro->Eliminar_Partido_Arbitro($ID_Arbitro,$ID_Partido, $ID_torneo, $ID_jornada);
 }
 
 
if (@$_REQUEST['enviar'] == "Asignar Arbitro"){
      
 $objN_Gestionar_Partido_Arbitro->Insertar_Partido_Arbitro($_POST["Arbitros"],$ID_Partido,$_POST["Observacion"],$ID_torneo,$ID_jornada);
}
if (@$_REQUEST['Cancelar'] == "Cancelar"){
  
 echo "<script>location.href='A_Arbitros_Admin.php'</script>";
         
    
 }
if($ID_torneo>0 && $ID_Partido>0 && $ID_jornada>0){
   

   
$consulta2=$objN_Gestionar_Partido_Arbitro->Tabla_Partido_Arbitro($ID_Partido);

?>


<table style="text-align: center; width: 100%">
   		<tr>
			<th>Nº</th>
                        <th>Arbitro</th>                                            
                        <th>Observacion</th>   
                        <th></th>
            
        </tr>
		<?php
 $Contador=1;
if($consulta2) {
	while( $Tabla_Partido = mysql_fetch_array($consulta2) ){
	?>
		<tr>	
                          <td align="middle"><?php echo $Contador ?></td>
                          <td align="middle"><?php echo $Tabla_Partido['nombre'] ?></td>
                          <td align="middle"><?php echo $Tabla_Partido['Observacion'] ?></td>
                          <td align="middle"><span class="dele"><a href="A_Arbitros_Admin.php?id_torneo=<?php echo base64_encode($ID_torneo) ?>&id_partido=<?php echo base64_encode($ID_Partido) ?>&id_jornada=<?php echo base64_encode($ID_jornada)?>&id_arbitro=<?php echo base64_encode($Tabla_Partido['codigo_arbitro'])?>&#lfpb"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
			   
                        
                        
                      
                       
                                                                                                                                                                                                                
                          
		  </tr>	
	<?php
        $Contador++;
		}

}	
?>
    </table>
<?php } ?>                               
							

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