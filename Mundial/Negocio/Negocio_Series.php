<?php
class Negocio_Serie{
var $objD_Gestionar_Serie;

	
        function Negocio_Serie(){
              
		require('../../Datos/D_Gestionar_Series.php');              
		$this->objD_Gestionar_Serie=new Datos_Gestionar_Series();
	}

  function Eliminar_Serie($ID_Serie=0,$ID_Torneo=0){
      
    
			if($this->objD_Gestionar_Serie->Eliminar_Serie($ID_Serie) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					 location.href='Series_Admin.php?id_torneo=";
                                echo base64_encode($ID_Torneo);
                                echo "&#mundial';</script>";
			}
			
  }
  
 
  function Cantidad_Series($ID_torneo=0){

      return $this->objD_Gestionar_Serie->Mostrar_Cant_Series($ID_torneo);
			
  }  
 function Insertar_Serie($Codigo_Torneo=0,$Nombre=""){
   
      
        if ( $this->objD_Gestionar_Serie->Verificar_nombre($Codigo_Torneo,$Nombre) == false){
       
    
           
            if($Nombre==""){
               echo "<script>alert('Inserte un Nombre!!');	
               location.href='Series_Admin.php?id_torneo=";
                    echo base64_encode($Codigo_Torneo);
                    echo "&#mundial';</script>";
            }
            else{  
                      
                     if( $this->objD_Gestionar_Serie->Insertar_Serie($Codigo_Torneo,$Nombre) == true){ 
                     echo '<meta http-equiv=refresh content=1;URL=Series_Admin.php?id_torneo=';echo base64_encode($Codigo_Torneo); echo '&#mundial>'; 
                   echo "<script>alert('Insercion Realizada con Exito!!');  
         </script>";
                                 
            }
                }

}
else{
  echo "<script>alert('El Nombre ya Existe!!');
                   location.href='Series_Admin.php?id_torneo=";
                                echo base64_encode($Codigo_Torneo);
                                echo "&#mundial';</script>";
}
   }
  
  
  
    

  
  function Tabla_Serie($Codigo_Torneo=0){
  
  $consulta=$this->objD_Gestionar_Serie->Mostrar_Tabla_Serie($Codigo_Torneo);
 echo '<br/>

<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>Nº</th>
                        <th>Nombre Torneo</th>                    
                        
                        <th>Nombre Serie</th>                        
                        <th></th> 
                        <th></th>
            
        </tr>
      </thead>
      <tbody>';
    
 $Contador=1;
if($consulta) {
  while( $Tabla_Series = mysql_fetch_array($consulta) ){
  
   echo '<tr > 
                          <td align="middle">'; echo $Contador;echo '</td>
                          <td align="middle">'; echo $Tabla_Series['Ntorneo'] ;echo'</td>
                          <td align="middle">'; echo $Tabla_Series['Nserie'] ;echo'</td>                         
                          <td align="middle"><span class="modi"><a href="Series_Admin.php?id_torneo=';echo base64_encode($Tabla_Series['codigo_torneo']);echo'&id_serie='; echo base64_encode($Tabla_Series['codigo_serie']) ;echo'&nombre='; echo base64_encode($Tabla_Series['Nserie']);echo'&#mundial"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Series_Admin.php?id_torneo='; echo base64_encode($Tabla_Series['codigo_torneo']) ;echo'&id_serie='; echo base64_encode($Tabla_Series['codigo_serie']) ;echo '&nombre=&#mundial"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
                          
      </tr>'; 
  
        $Contador++;
    }
}
    
echo'
</tbody>
    </table>
	';
  }  
  
  
  function Modificar_Serie($Codigo_Serie=0,$Nombre="",$ID_Torneo=0){
      
	 
    	
            
            if($Nombre==""){
               echo "<script>alert('Inserte un Nombre!!');	
              location.href='Series_Admin.php?id_torneo=";
                                echo base64_encode($ID_Torneo);
                                echo "&#mundial';</script>";
            }
            else{
                    
                    if ( $this->objD_Gestionar_Serie->Modificar_serie($Codigo_Serie,$Nombre) == true){ 

                    echo "<script>alert('Modificacion Realizada con Exito!!');
                    location.href='Series_Admin.php?id_torneo=";
                                echo base64_encode($ID_Torneo);
                                echo "&#mundial';</script>";
                    }
                 
            
            


            
                }



				
  }
   function Combo_Serie($ID_torneo=0,$ID_Serie=0){
   echo "<option value=\"A_Series_Admin.php?id_torneo=".base64_encode($ID_torneo)."\">Seleccione Serie</option>\n"; 
  $consulta_Combo=$this->objD_Gestionar_Serie->Mostrar_Tabla_Serie($ID_torneo);
   if($consulta_Combo) {
            
  while( $Combo_Serie = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Serie['codigo_serie']==$ID_Serie)
            echo "<option  value=\"A_Series_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_serie=".base64_encode($Combo_Serie['codigo_serie'])."&#mundial\" selected=\"selected\">".$Combo_Serie['Nserie']."</option>\n"; 
               else
            echo "<option  value=\"A_Series_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_serie=".base64_encode($Combo_Serie['codigo_serie'])."&#mundial\">".$Combo_Serie['Nserie']."</option>\n"; 
        }
        }
        
   }
   function Combo_Posiciones($ID_torneo=0,$ID_Serie=0){
   echo "<option value=\"Posiciones.php?id_torneo=\"".base64_encode ($ID_torneo).">Seleccione Serie</option>\n"; 
  $consulta_Combo=$this->objD_Gestionar_Serie->Mostrar_Tabla_Serie($ID_torneo);
    if($consulta_Combo) {
                                                    
    while( $Combo_Serie = mysql_fetch_array($consulta_Combo) ){

           if($Combo_Serie['codigo_serie']==$ID_Serie)
        echo "<option  value=\"Posiciones.php?id_torneo=".base64_encode($ID_torneo)."&id_serie=".base64_encode($Combo_Serie['codigo_serie'])."&#mundial\" selected=\"selected\">".$Combo_Serie['Nserie']."</option>\n"; 
           else
        echo "<option  value=\"Posiciones.php?id_torneo=".base64_encode($ID_torneo)."&id_serie=".base64_encode($Combo_Serie['codigo_serie'])."&#mundial\">".$Combo_Serie['Nserie']."</option>\n"; 
    }
    }

        
   }
   function Combo_Serie_Vinculada($ID_torneo=0,$VID_Serie=0){
    echo "<option value=\"0\">Seleccione Serie</option>\n"; 
  $consulta_Combo=$this->objD_Gestionar_Serie->Mostrar_Tabla_Serie($ID_torneo);
   if($consulta_Combo) {
        
  while( $Combo_Serie = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Serie['codigo_serie']==$VID_Serie)
            echo "<option  value=\"".($Combo_Serie['codigo_serie'])."\" selected=\"selected\">".$Combo_Serie['Nserie']."</option>\n"; 
               else
            echo "<option  value=\"".($Combo_Serie['codigo_serie'])."\">".$Combo_Serie['Nserie']."</option>\n"; 
        }
        }
        
   }

}
?>

