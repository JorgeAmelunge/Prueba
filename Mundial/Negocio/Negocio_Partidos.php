<?php
class Negocio_Partidos{
var $objD_Gestionar_Partidos;


	
        function Negocio_Partidos(){
              
		require('../../Datos/D_Gestionar_Partido.php');              
		$this->objD_Gestionar_Partidos=new Datos_Gestionar_Partidos();
                 
	}

  function Eliminar_Partido($ID_Partido=0,$id_torneo=0,$ID_Jornada=0){
      
    
			if($this->objD_Gestionar_Partidos->Eliminar_Partido($ID_Partido) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					location.href='Partidos_Admin.php?id_torneo=";
                    echo base64_encode($id_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                echo "&#lfpb';</script>";
			}
			
  }
  
 
 
 function Insertar_Partido($codigo_torneo=0,$Codigo_jornada=0,$Codigo_Estadio=0,$Codigo_Local=0,$Codigo_Visitante=0,$Fecha="",$Hora=""){
      if($codigo_torneo==0){
           echo "<script>alert('Seleccione un Torneo!!');
                    location.href='Partidos_Admin.php?id_torneo=";
                    echo base64_encode($codigo_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($Codigo_jornada);
                                echo "&#lfpb';</script>";
      } 
      else{
          if($Codigo_jornada==0){
               echo "<script>alert('Seleccione una Jornada!!');
                    location.href='Partidos_Admin.php?id_torneo=";
                    echo base64_encode($codigo_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($Codigo_jornada);
                                echo "&#lfpb';</script>";
          }
          else{
              if($Codigo_Estadio==0){
                   echo "<script>alert('Seleccione un Estadio!!');
                    location.href='Partidos_Admin.php?id_torneo=";
                    echo base64_encode($codigo_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($Codigo_jornada);
                                echo "&#lfpb';</script>";
              }
              else{
                  if($Codigo_Local==0){
                       echo "<script>alert('Seleccione un Equipo Local!!');
                    location.href='Partidos_Admin.php?id_torneo=";
                    echo base64_encode($codigo_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($Codigo_jornada);
                                echo "&#lfpb';</script>";
                  }
                  else{
                      if($Codigo_Visitante==0){
                           echo "<script>alert('Seleccione un Equipo Visitante!!');
                    location.href='Partidos_Admin.php?id_torneo=";
                    echo base64_encode($codigo_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($Codigo_jornada);
                                echo "&#lfpb';</script>";
                      }
                      else{
      if($Fecha==""){
            echo "<script>alert('Inserte una Fecha!!');
                    location.href='Partidos_Admin.php?id_torneo=";
                    echo base64_encode($codigo_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($Codigo_jornada);
                                echo "&#lfpb';</script>";
        }
        else{
            if($Hora==""){
            echo "<script>alert('Inserte una Hora!!');
                    location.href='Partidos_Admin.php?id_torneo=";
                    echo base64_encode($codigo_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($Codigo_jornada);
                                echo "&#lfpb';</script>";
        }
        else{
           
             if($this->objD_Gestionar_Partidos->Verificar_fechas($Fecha, $Fecha)!=0){
          if ( $this->objD_Gestionar_Partidos->Insertar_Partido($Codigo_jornada,$Codigo_Estadio,$Codigo_Local,$Codigo_Visitante,$Fecha,$Hora) == true){ 
                       
                    echo "<script>alert('Creacion Realizada con Exito!!');
                    location.href='Partidos_Admin.php?id_torneo=";
                    echo base64_encode($codigo_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($Codigo_jornada);
                                echo "&#lfpb';</script>";
                           
            
                }
             }
             else{
                echo "<script>alert('Fecha Fuera de la Jornada!!');
                    location.href='Partidos_Admin.php?id_torneo=";
                    echo base64_encode($codigo_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($Codigo_jornada);
                                echo "&#lfpb';</script>"; 
             }
        }
        }
        }
        }
        }
        }
      }
   }
  
  
  
    

  
  function Tabla_Partidos_Equipos($Codigo_Jornada=0,$ID_Equipo=0){
  $consulta=$this->objD_Gestionar_Partidos->Mostrar_Tabla_Partido($Codigo_Jornada);
            

            if($consulta) {
            while( $Tabla_Partido = mysql_fetch_array($consulta) ){
           
               if($Tabla_Partido['codigolocal']==$ID_Equipo || $Tabla_Partido['codigovisitante']==$ID_Equipo){
          echo '<table  class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">';
          echo '<thead>';
          echo '<tr>';
          echo '<tr>';
          echo '<th colspan="7" align="middle">';echo $Tabla_Partido['jornada'] ;echo'  -  ';echo $Tabla_Partido['fecha'] ;echo'  -  ';echo $Tabla_Partido['hora'];echo'  - Estadio: ';echo $Tabla_Partido['Estadio'];echo' :  ';echo $Tabla_Partido['estadio_capacidad']; echo $Tabla_Partido['estadio_ciudad'] ;echo'</th>';
          echo ' </tr>  ';
          echo ' </tr>';
          echo ' </thead> ';
          echo ' <tbody>       ';
          echo '<tr id="';echo $Tabla_Partido['codigo_torneo'];echo'">';
          echo '<td align="middle"><img  src="../../img/escudos/'; echo $Tabla_Partido['EscudoLocal'] ;echo '" height="50" width="50"></img></td>';
          echo '<td align="middle"><a href="Equipos.php?id_equipo=';echo base64_encode($Tabla_Partido['codigolocal']);echo'&id_torneo=';echo base64_encode($ID_torneo);echo'&id_jornada=';echo base64_encode($ID_jornada);echo'&#mundial">';echo $Tabla_Partido['ELocal'] ;echo'</a></td> ';
            if($Tabla_Partido['pts']==1){ 
            echo '<td align="middle">'; echo $Tabla_Partido['marcador_local'] ;echo'</td>  ';
            echo'<td align="middle">-</td> ';
            echo '<td align="middle">';echo $Tabla_Partido['marcador_visitante'] ;echo '</td>  ';
            }
            else{                              
            
           echo '<td align="middle"></td>  
            <td align="middle">-</td> 
            <td align="middle"></td>';
            }                                                       
            
            echo '<td align="middle"><a href="Equipos.php?id_equipo=';echo base64_encode($Tabla_Partido['codigovisitante']) ;echo'&id_torneo=';echo base64_encode($ID_torneo) ;echo'&id_jornada=';echo base64_encode($ID_jornada);;echo'&#mundial">'; echo $Tabla_Partido['EVisita'] ;echo'</a></td>';
            echo '<td align="middle"><img  src="../../img/escudos/'; echo $Tabla_Partido['EscudoVisitante'] ;echo'" height="50" width="50"></img></td>';

            echo '</tr> 
            <br><br>
            </tbody>
            </table>';
           
            }
            }
            }

           
            

  
 
	
  }  

  function Tabla_Partidos($Codigo_Jornada=0){
  $consulta=$this->objD_Gestionar_Partidos->Mostrar_Tabla_Partido($Codigo_Jornada);
            

            if($consulta) {
            while( $Tabla_Partido = mysql_fetch_array($consulta) ){
           

          echo '<table  class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">';
          echo '<thead>';
          echo '<tr>';
          echo '<tr>';
          echo '<th colspan="7" align="middle">';echo $Tabla_Partido['jornada'] ;echo'  -  ';echo $Tabla_Partido['fecha'] ;echo'  -  ';echo $Tabla_Partido['hora'];echo'  - Estadio: ';echo $Tabla_Partido['Estadio'];echo' :  ';echo $Tabla_Partido['estadio_capacidad']; echo $Tabla_Partido['estadio_ciudad'] ;echo'</th>';
          echo ' </tr>  ';
          echo ' </tr>';
          echo ' </thead> ';
          echo ' <tbody>       ';
          echo '<tr id="';echo $Tabla_Partido['codigo_torneo'];echo'">';
          echo '<td align="middle"><img  src="../../img/escudos/'; echo $Tabla_Partido['EscudoLocal'] ;echo '" height="50" width="50"></img></td>';
          echo '<td align="middle"><a href="Equipos.php?id_equipo=';echo base64_encode($Tabla_Partido['codigolocal']);echo'&id_torneo=';echo base64_encode($ID_torneo);echo'&id_jornada=';echo base64_encode($ID_jornada);echo'&#mundial">';echo $Tabla_Partido['ELocal'] ;echo'</a></td> ';
            if($Tabla_Partido['pts']==1){ 
            echo '<td align="middle">'; echo $Tabla_Partido['marcador_local'] ;echo'</td>  ';
            echo'<td align="middle">-</td> ';
            echo '<td align="middle">';echo $Tabla_Partido['marcador_visitante'] ;echo '</td>  ';
            }
            else{                              
            
           echo '<td align="middle"></td>  
            <td align="middle">-</td> 
            <td align="middle"></td>';
            }                                                       
            
            echo '<td align="middle"><a href="Equipos.php?id_equipo=';echo base64_encode($Tabla_Partido['codigovisitante']) ;echo'&id_torneo=';echo base64_encode($ID_torneo) ;echo'&id_jornada=';echo base64_encode($ID_jornada);;echo'&#mundial">'; echo $Tabla_Partido['EVisita'] ;echo'</a></td>';
            echo '<td align="middle"><img  src="../../img/escudos/'; echo $Tabla_Partido['EscudoVisitante'] ;echo'" height="50" width="50"></img></td>';

            echo '</tr> 
            <br><br>
            </tbody>
            </table>';
           

            }
            }

           
            

  
 
  
  }  

  function Tabla_Administracion_Partidos($Codigo_Jornada=0){
  $consulta=$this->objD_Gestionar_Partidos->Mostrar_Tabla_Partido($Codigo_Jornada);
  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>Nº</th>
                        <th>Torneo</th>                                            
                        <th>Jornada</th>                                            
                        <th>Equipo Local</th>                        
                        <th>Equipo Visitante</th>
                        <th>Estadio</th>
                        <th>Fecha</th>
                        <th>Hora</th>                         
                        <th></th>
            
        </tr>
      </thead>
      <tbody>';
    
 $Contador=1;
if($consulta) {
  while( $Tabla_Partido = mysql_fetch_array($consulta) ){
  
  echo'  <tr>  
                          <td align="middle">';echo $Contador;echo '</td>
                          <td align="middle">';echo $Tabla_Partido['torneo'];echo'</td>
                          <td align="middle">';echo $Tabla_Partido['jornada'];echo '</td>
                          <td align="middle">';echo $Tabla_Partido['ELocal'];echo'</td>
                          <td align="middle">';echo $Tabla_Partido['EVisita'];echo'</td>
                          <td align="middle">';echo $Tabla_Partido['Estadio'];echo'</td>
                          <td align="middle">';echo $Tabla_Partido['fecha'];echo'</td>
                          <td align="middle">';echo $Tabla_Partido['hora'];echo'</td>                          
                          <td align="middle"><span class="dele"><a href="Partidos_Admin.php?id_torneo=';echo base64_encode($Tabla_Partido['codigo_torneo']);echo'&id_partido=';echo base64_encode($Tabla_Partido['codigo_partido']);echo'&id_jornada=';echo base64_encode($Tabla_Partido['codigo_jornada']);echo'&#mundial"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
                          
      </tr> ';
  
        $Contador++;
    }

} 
echo '
</tbody>
    </table>';

}
  function Tabla_Partidos_especificos($Codigo_Jornada=0,$codigo_partido=0){
  
  return $consulta=$this->objD_Gestionar_Partidos->Mostrar_Tabla_Partido_detalle($Codigo_Jornada,$codigo_partido);
 
	
  }   
   
  
    function Tabla_Partido_detallado($codigo_partido=0){
  
  return $consulta=$this->objD_Gestionar_Partidos->Mostrar_Tabla_Partido_detallado($codigo_partido);
 
	
  } 
  function Insertar_Gol_Local($codigo_partido=0){
     return $consulta=$this->objD_Gestionar_Partidos->Insertar_gol_Local($codigo_partido);
  }
  
function Insertar_gol_Visitante($codigo_partido=0){
     return $consulta=$this->objD_Gestionar_Partidos->Insertar_gol_Visitante($codigo_partido);
  }
  function Insertar_Penal_Local($codigo_partido=0){
     return $consulta=$this->objD_Gestionar_Partidos->Insertar_penal_Local($codigo_partido);
  }
  
function Insertar_Penal_Visitante($codigo_partido=0){
     return $consulta=$this->objD_Gestionar_Partidos->Insertar_penal_Visitante($codigo_partido);
  }
  function Insertar_Puntos($codigo_partido=0){
   return $consulta=$this->objD_Gestionar_Partidos->Insertar_puntos($codigo_partido);
  }

   function Combo_Partidos($ID_jornada=0,$ID_torneo=0,$ID_Partido=0){
     echo "<option value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".  base64_encode($ID_jornada)."&#mundial\">Seleccione Partido</option>\n"; 
  $consulta=$this->objD_Gestionar_Partidos->Mostrar_Tabla_Partido($ID_jornada);
   if($consulta) {
          
  while( $Combo_Partido = mysql_fetch_array($consulta) ){
                $ID_Puntaje=$Combo_Partido['pts'];
                 if($Combo_Partido['codigo_partido']==$ID_Partido)
            echo "<option  value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_partido=".base64_encode ($Combo_Partido['codigo_partido'])."&#mundial\" selected=\"selected\">".$Combo_Partido['ELocal']."  Vs.  ".$Combo_Partido['EVisita']."</option>\n"; 
               else
             echo "<option  value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".  base64_encode($ID_jornada)."&id_partido=".base64_encode ($Combo_Partido['codigo_partido'])."&#mundial\">".$Combo_Partido['ELocal']."  Vs.  ".$Combo_Partido['EVisita']."</option>\n"; 
        }
        }
            }

            function Combo_Equipo_Partidos($ID_jornada=0,$ID_torneo=0,$ID_Partido=0,$ID_Equipo=0){
                 echo "<option value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".  base64_encode($ID_jornada)."&id_partido=".  base64_encode($ID_Partido)."&#mundial\">Seleccione Equipo</option>\n"; 
             $consulta=$this->objD_Gestionar_Partidos->Mostrar_Tabla_Partido($ID_jornada);
              if($consulta) {
          
  while( $Combo_Equipo = mysql_fetch_array($consulta) ){
            if($Combo_Equipo['codigo_partido']==$ID_Partido){
               if($Combo_Equipo['codigolocal']==$ID_Equipo)
            echo "<option  value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".  base64_encode($ID_jornada)."&id_partido=".  base64_encode($ID_Partido)."&id_equipo=".base64_encode ($Combo_Equipo['codigolocal'])."&#mundial\" selected=\"selected\">".$Combo_Equipo['ELocal']."</option>\n"; 
               else
             echo "<option  value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".  base64_encode($ID_jornada)."&id_partido=".  base64_encode($ID_Partido)."&id_equipo=".base64_encode ($Combo_Equipo['codigolocal'])."&#mundial\">".$Combo_Equipo['ELocal']."</option>\n"; 
               if($Combo_Equipo['codigovisitante']==$ID_Equipo)
            echo "<option  value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".  base64_encode($ID_jornada)."&id_partido=".  base64_encode($ID_Partido)."&id_equipo=".base64_encode ($Combo_Equipo['codigovisitante'])."&#mundial\" selected=\"selected\">".$Combo_Equipo['EVisita']."</option>\n"; 
               else
             echo "<option  value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".  base64_encode($ID_jornada)."&id_partido=".  base64_encode($ID_Partido)."&id_equipo=".base64_encode ($Combo_Equipo['codigovisitante'])."&#mundial\">".$Combo_Equipo['EVisita']."</option>\n"; 
            }
               
            }
        }
          }
}
?>

