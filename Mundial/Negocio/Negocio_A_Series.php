<?php
class Negocio_A_Serie{
var $objD_Gestionar_A_Serie;

	
        function Negocio_A_Serie(){
              
		require('../../Datos/D_Gestionar_A_Series.php');              
		$this->objD_Gestionar_A_Serie=new Datos_Gestionar_A_Series();
	}

  function Eliminar_A_Serie($ID_Torneo=0,$ID_Serie=0,$ID_Equipo=0){
      
    
                if($this->objD_Gestionar_A_Serie->Eliminar_A_Serie($ID_Serie,$ID_Equipo) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					location.href='A_Series_Admin.php?id_torneo=";
                                 echo base64_encode($ID_Torneo);
                                echo "&id_serie=";
                                echo base64_encode($ID_Serie);
                                echo "&#mundial';</script>";
			}
			
  }
  
 
 
 function Insertar_A_Serie($ID_Torneo=0,$ID_Serie=0,$ID_Equipo=0,$Bonificacion=0,$VID_Torneo=0,$VID_Serie=0){

        if($ID_Equipo==0){
            echo "<script>alert('Seleccione un Equipo!!');
                    location.href='A_Series_Admin.php?id_torneo=";
                    echo base64_encode($ID_Torneo);
                                echo "&id_serie=";
                                echo base64_encode($ID_Serie);
                                echo "&#mundial';</script>"; 
        }
        else{
            if($VID_Torneo==0 && $VID_Serie==0){
          if ( $this->objD_Gestionar_A_Serie->Insertar_A_Serie($ID_Serie,$ID_Equipo,$Bonificacion) == true){ 
                       
                    echo "<script>alert('Asignacion Realizada con Exito!!');
                    location.href='A_Series_Admin.php?id_torneo=";
                    echo base64_encode($ID_Torneo);
                                echo "&id_serie=";
                                echo base64_encode($ID_Serie);
                                echo "&#mundial';</script>";
                           
            
                }
            }
            else{
               $consulta= $this->objD_Gestionar_A_Serie->mostrar_tabla_torneo($VID_Torneo,$VID_Serie);
               if($consulta) {
                while( $Tabla_Series = mysql_fetch_array($consulta) ){
                     
                            if ( $this->objD_Gestionar_A_Serie->Insertar_A_Serie_Vinculo($ID_Serie,$ID_Equipo,$Tabla_Series['PJ'],($Bonificacion+$Tabla_Series['Bonificacion']),$Tabla_Series['PG'],$Tabla_Series['PP'],$Tabla_Series['PE'],$Tabla_Series['GF'],$Tabla_Series['GC'],$VID_Serie) == true){ 
                       
                                echo "<script>alert('Asignacion Realizada con Exito!!');
                                location.href='A_Series_Admin.php?id_torneo=";
                                echo base64_encode($ID_Torneo);
                                            echo "&id_serie=";
                                            echo base64_encode($ID_Serie);
                                            echo "&#mundial';</script>";


                            }
                }   
                }
                }
            }
        
   }
  
  
  
    

  
  function Tabla_A_Serie($Codigo_Serie=0){
  
  $consulta=$this->objD_Gestionar_A_Serie->Mostrar_Tabla_A_Serie($Codigo_Serie);
 echo '<br><br><table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>Nº</th>
                        <th>Nombre Torneo</th>                                            
                        <th>Nombre Serie</th>                                            
                        <th>Nombre Equipo</th>                        
                          
                        <th></th>
            
        </tr>
      </thead>
      <tbody>';
    
 $Contador=1;
if($consulta) {
  while( $Tabla_Series = mysql_fetch_array($consulta) ){
  
  echo '  <tr>  
                          <td align="middle">';echo $Contador;echo'</td>
                          <td align="middle">';echo $Tabla_Series['Ntorneo'] ;echo'</td>
                          <td align="middle">';echo $Tabla_Series['Nserie'];echo'</td>
                          <td align="middle">';echo $Tabla_Series['Nequipo'] ;echo'</td>
                          
                          <td align="middle"><span class="dele"><a href="A_Series_Admin.php?id_torneo=';echo base64_encode($Tabla_Series['codigo_torneo']);echo'&id_serie='; echo base64_encode($Tabla_Series['codigo_serie']);echo'&id_equipo=';echo base64_encode($Tabla_Series['codigo_equipo']);echo'&vid_serie=';echo base64_encode(-1) ;echo'&#mundial"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
            
      </tr> ';
  
        $Contador++;
    }

} 

echo'</tbody>
    </table>';
	
  }  
  
  function Tabla_Asignar_puntos_ganador($ID_Torneo=0,$ID_Equipo=0,$GF=0,$GC=0){
      return $consulta=$this->objD_Gestionar_A_Serie->Asignar_puntaje_ganador($ID_Torneo, $ID_Equipo, $GF, $GC);      
  }
  function Tabla_Asignar_puntos_perdedor($ID_Torneo=0,$ID_Equipo=0,$GF=0,$GC=0){
      return $consulta=$this->objD_Gestionar_A_Serie->Asignar_puntaje_perdedor($ID_Torneo, $ID_Equipo, $GF, $GC);      
  }
  function Tabla_Asignar_puntos_empate($ID_Torneo=0,$ID_Equipo=0,$GF=0,$GC=0){
      return $consulta=$this->objD_Gestionar_A_Serie->Asignar_puntaje_empate($ID_Torneo, $ID_Equipo, $GF, $GC);      
  }
 function Mostrar_Tabla_Torneo($Codigo_Torneo=0,$codigo_Serie=0){
     return $consulta=$this->objD_Gestionar_A_Serie->mostrar_tabla_torneo($Codigo_Torneo,$codigo_Serie);
 }
 function Mostrar_Tabla_Torneo_vinculo($ID_torneo=0,$ID_Serie=0,$codigo_Serie=0){
     return $consulta=$this->objD_Gestionar_A_Serie->mostrar_tabla_torneo_vinculo($ID_torneo,$ID_Serie,$codigo_Serie);
 }
 function Mostrar_Tabla_Torneo_goleadores($Codigo_Torneo=0){
     return $consulta=$this->objD_Gestionar_A_Serie->mostrar_tabla_torneo_goleadores($Codigo_Torneo);
 }

 function Mostrar_Tabla_Torneo_Posiciones($Codigo_Torneo=0,$codigo_Serie=0){
     $consulta=$this->objD_Gestionar_A_Serie->mostrar_tabla_torneo($Codigo_Torneo,$codigo_Serie);
     echo' <table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
                                                        <thead>   
                                                        <tr>
                                                            <th align="middle"></th>
                                                            <th align="middle">Nombre</th>
                                                            <th align="middle">PTS</th>
                                                            <th align="middle">PJ</th>
                                                            <th align="middle">PG</th>
                                                            <th align="middle">PE</th>
                                                            <th align="middle">PP</th>
                                                            <th align="middle">GF</th>
                                                            <th align="middle">GC</th>                    
                                                            <th align="middle">DIF</th>

                                                </tr>    
                                                </thead>    
                                                <tbody>  ';       

                                                        

                                        if($consulta) {
                                            $contador=1;
                                            $Comentario_torneo="";

                                                while( $Tabla_Partido = mysql_fetch_array($consulta) ){


                                                  echo ' <tr>                           
                                                                  <td align="middle"><h3>';echo $contador ;echo'</h3></td>                           
                                                                  <td align="middle"><a href="Equipos.php?id_equipo=';echo base64_encode($Tabla_Partido['codigo_equipo']) ;echo'">';echo $Tabla_Partido['nombre'] ;echo'</a></td>                           
                                                                  <td align="middle">';echo $Tabla_Partido['PTS'];echo'</td>
                                                                  <td align="middle">';echo $Tabla_Partido['PJ'];echo'</td>  
                                                                  <td align="middle">';echo $Tabla_Partido['PG'];echo'</td>  
                                                                  <td align="middle">';echo $Tabla_Partido['PE'] ;echo'</td>  
                                                                  <td align="middle">';echo $Tabla_Partido['PP'] ;echo'</td>  
                                                                  <td align="middle">';echo $Tabla_Partido['GF'] ;echo'</td>  
                                                                  <td align="middle">';echo $Tabla_Partido['GC'] ;echo'</td>                              
                                                                  <td align="middle">';echo $Tabla_Partido['DIF'];echo'</td> 

                                                          </tr> ';

                                                
                                               $contador++;

                                                $Comentario_torneo=$Tabla_Partido['comentario'];
                                                        }

                                                
                                               echo '<tr>
                                                   <td colspan="10">';echo $Comentario_torneo; echo'</td>
                                               </tr>           ';

                                               
                                        }

                                        
                                      echo'</tbody>   
                                         </table> ';
 }
}
?>

