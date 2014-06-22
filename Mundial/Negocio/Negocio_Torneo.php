<?php
class Negocio_Torneo{
var $objD_Gestionar_Torneo;

	
        function Negocio_Torneo(){
              
		require('../../Datos/D_Gestionar_Torneo.php');              
		$this->objD_Gestionar_Torneo=new Datos_Gestionar_Torneo();
	}

  function Eliminar_Torneo($ID_torneo=0){
      
    
			if($this->objD_Gestionar_Torneo->Eliminar_Torneo($ID_torneo) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					 location.href='Torneos_Admin.php?#mundial';
					  </script>";
			}
			
  }
  
   
 function Insertar_Torneo($FechaI="",$FechaF="",$Nombre="",$Cant_Fechas=0,$Comentario="",$Cant_Series=0){
     $f0 = strtotime($FechaI);
   $f1 = strtotime($FechaF);
   if($f1>=$f0){
        if ( $this->objD_Gestionar_Torneo->Verificar_nombre($Nombre,$FechaI,$FechaF) == 0){
      
     if($FechaI=="")
                echo "<script>alert('Inserte una Fecha de Inicio!!');	
                location.href='Torneos_Admin.php?#mundial';
                </script>";
        else{	
            if($FechaF=="")
             echo   "<script>alert('Inserte una Fecha de Final!!');	
                location.href='Torneos_Admin.php?#mundial';
                </script>";
            else{
            if($Nombre==""){
              echo  "<script>alert('Inserte un Nombre!!');	
                location.href='Torneos_Admin.php?#mundial';
                </script>";
            }
            else{
                if($Cant_Fechas==0){
             echo   "<script>alert('Inserte la Cantidad de Fechas!!');	
                location.href='Torneos_Admin.php?#mundial';
                </script>";
            }
            else{
                        if($Cant_Series==0){
                echo       "<script>alert('Inserte la Cantidad de Series!!');	
                       location.href='Torneos_Admin.php?#mundial';
                       </script>";
                   }
                   else{
                       if($Comentario==""){
                  echo     "<script>alert('Inserte un Comentario!!');	
                       location.href='Torneos_Admin.php?#mundial';
                       </script>";
                   }
                   else{
                    if ( $this->objD_Gestionar_Torneo->Insertar_Torneo($FechaI,$FechaF,$Nombre,$Cant_Fechas,$Comentario,$Cant_Series) == true){ 
                       
                    echo "<script>alert('Insercion Realizada con Exito!!');
                    location.href='Torneos_Admin.php?#mundial';
                    </script>";
                    }
                   }
                   }
            
            }
            
            }


            }
                }

}
else{
  echo "<script>alert('El Torneo ya Existe!!');
                    location.href='Torneos_Admin.php?#mundial';
                    </script>";  
}
   }
   else{
  echo "<script>alert('El Formato de Fecha es Incorrecto!!');
                   location.href='Torneos_Admin.php?#mundial';</script>";
}
  }
  
    

  
  function Tabla_Torneos(){
  
   $consulta=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo();
  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
                                               <thead>
                                                <tr>
                                                        <th>Nº</th>
                                                        <th>Fecha Inicio</th>         
                                                        <th>Fecha Final</th>
                                                        <th>Nombre</th>
                                                        <th>Fechas</th>                    
                                                        <th>Comentarios</th>
                                                        <th>Grupos</th>
                                                        <th></th> 
                                                        <th></th>

                                        </tr>
                                      </thead>
                                      <tbody>';
                                                
                                 $Contador=1;
                                if($consulta) {
                                        while( $Tabla_Torneo = mysql_fetch_array($consulta) ){
                                       
                                          echo'      <tr>  
                                                          <td align="middle">'; echo $Contador ;echo'</td>';
                                                          echo '<td align="middle">'; echo $Tabla_Torneo['fecha_inicio'] ;echo'</td>                           
                                                          <td align="middle">'; echo $Tabla_Torneo['fecha_final'];echo '</td>  
                                                          <td align="middle">'; echo $Tabla_Torneo['nombre'] ;echo '</td> 
                                                          <td align="middle">'; echo $Tabla_Torneo['cantidad_fechas'] ;echo '</td>  
                                                          <td align="middle">'; echo $Tabla_Torneo['comentario'] ;echo '</td> 
                                                          <td align="middle">'; echo $Tabla_Torneo['cantidad_series'] ;echo '</td>
                                                          <td align="middle"><span class="modi"><a href="Torneos_Admin.php?ID_Torneo='; echo base64_encode($Tabla_Torneo['codigo_torneo']);echo '&Fecha_Inicio='; echo base64_encode($Tabla_Torneo['fecha_inicio']) ;echo'&Fecha_Final='; echo base64_encode($Tabla_Torneo['fecha_final']) ;echo'&Nombre='; echo base64_encode($Tabla_Torneo['nombre']) ;echo'&Cantidad_Fechas='; echo base64_encode($Tabla_Torneo['cantidad_fechas']);echo '&Comentario='; echo base64_encode($Tabla_Torneo['comentario']) ;echo '&cantidad_series='; echo base64_encode($Tabla_Torneo['cantidad_series']) ;echo'&#mundial"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                                                          <td align="middle"><span class="dele"><a href="Torneos_Admin.php?ID_Torneo='; echo base64_encode($Tabla_Torneo['codigo_torneo']) ;echo '&Fecha_Inicio=&Fecha_Final=&Nombre=&capacidad=&Cantidad_Fechas=&cantidad_series=&#mundial"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>







                                                  </tr> ';
                                        
                                        $Contador++;
                                                }
                                }

                                
                              echo '</tbody>
                                    </table>              ';
                                        
	
  }  
 
    function Tabla_Torneos_Equipo($ID_Equipo=0){
  
  return $consulta=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo_Equipo($ID_Equipo);
 
	
  }  
  
  function Modificar_Torneo($Codigo_Torneo=0,$FechaI="",$FechaF="",$Nombre="",$Cant_Fechas=0,$Comentario="",$Cant_Series=0){
	  
        
     if($FechaI=="")
                echo "<script>alert('Inserte una Fecha de Inicio!!');	
                location.href='Torneos_Admin.php?#mundial';
                </script>";
        else{	
            if($FechaF=="")
             echo   "<script>alert('Inserte una Fecha de Final!!');	
                location.href='Torneos_Admin.php?#mundial';
                </script>";
            else{
            if($Nombre==""){
            echo    "<script>alert('Inserte un Nombre!!');	
                location.href='Torneos_Admin.php?#mundial';
                </script>";
            }
            else{
                if($Cant_Fechas==0){
            echo    "<script>alert('Inserte la Cantidad de Fechas!!');	
                location.href='Torneos_Admin.php?#mundial';
                </script>";
            }
            else{
                        if($Cant_Series==0){
               echo        "<script>alert('Inserte la Cantidad de Series!!');	
                       location.href='Torneos_Admin.php?#mundial';
                       </script>";
                   }
                   else{
                       if($Comentario==""){
                echo       "<script>alert('Inserte un Comentario!!');	
                       location.href='Torneos_Admin.php?#mundial';
                       </script>";
                   }
                   else{
                    if ( $this->objD_Gestionar_Torneo->Modificar_Torneo($Codigo_Torneo,$FechaI,$FechaF,$Nombre,$Cant_Fechas,$Comentario,$Cant_Series) == true){ 

                    echo "<script>alert('Modificacion Realizada con Exito!!');
                    location.href='Torneos_Admin.php?#mundial';
                    </script>";
                    }
                   }
                   }
            
            }
            
            }


            }
                }


				
  }
  
  function Combo_Torneo($ID_torneo=0){
        $consulta_Combo=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo();
       
        if($consulta_Combo) {

        while( $Combo_Torneo = mysql_fetch_array($consulta_Combo) ){

        if($Combo_Torneo['codigo_torneo']==$ID_torneo)
        echo "<option  value=\"Partidos.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#mundial\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
        else
        echo "<option  value=\"Partidos.php?id_torneo=".base64_encode($Combo_Torneo['codigo_torneo'])."&#mundial\">".$Combo_Torneo['nombre']."</option>\n"; 
        }
        }
        }

   function Combo_Torneo_Posiciones($ID_torneo=0){
        $consulta_Combo=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo();
          echo "<option value=\"Posiciones.php\">Seleccione Torneo</option>\n"; 
        if($consulta_Combo) {
                                                    
        while( $Combo_Torneo = mysql_fetch_array($consulta_Combo) ){

               if($Combo_Torneo['codigo_torneo']==$ID_torneo)
            echo "<option  value=\"Posiciones.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#mundial\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
               else
             echo "<option  value=\"Posiciones.php?id_torneo=".base64_encode($Combo_Torneo['codigo_torneo'])."&#mundial\">".$Combo_Torneo['nombre']."</option>\n"; 
        }
        }
        }
      

  function Combo_Torneos_Equipo($ID_Equipo=0){
  
   $consulta_Combo=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo_Equipo($ID_Equipo);
  echo "<option value=\"Equipos.php?id_equipo=".base64_encode($ID_Equipo)."&#mundial\">Seleccione Torneo</option>\n"; 
  if($consulta_Combo) {
                                               
              while( $Combo_Torneo = mysql_fetch_array($consulta_Combo) ){

                     if($Combo_Torneo['codigo_torneo']==$ID_torneo)
                  echo "<option  value=\"Equipos.php?id_equipo=".base64_encode($ID_Equipo)."&id_torneo=".base64_encode($Combo_Torneo['codigo_torneo'])."&#mundial\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
                     else
                   echo "<option  value=\"Equipos.php?id_equipo=".base64_encode($ID_Equipo)."&id_torneo=".base64_encode($Combo_Torneo['codigo_torneo'])."&#mundial\">".$Combo_Torneo['nombre']."</option>\n"; 
              }
              }
  }  

function Combo_Torneo_Series($ID_torneo=0){
        $consulta_Combo=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo();
       
            if($consulta_Combo) {
            echo "<option value=\"Series_Admin.php\">Seleccione Torneo</option>\n"; 
            while( $Combo_Torneo = mysql_fetch_array($consulta_Combo) ){

            if($Combo_Torneo['codigo_torneo']==$ID_torneo)
            echo "<option  value=\"Series_Admin.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#mundial\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
            else
            echo "<option  value=\"Series_Admin.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#mundial\">".$Combo_Torneo['nombre']."</option>\n"; 
            }
            }
        }

  function Combo_Torneo_A_Series($ID_torneo=0){
        $consulta_Combo=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo();
        echo "<option value=\"A_Series_Admin.php\">Seleccione Torneo</option>\n"; 
            if($consulta_Combo) {
            
  while( $Combo_Torneo = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Torneo['codigo_torneo']==$ID_torneo)
            echo "<option  value=\"A_Series_Admin.php?id_torneo=".base64_encode($Combo_Torneo['codigo_torneo'])."&#mundial\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
               else
            echo "<option  value=\"A_Series_Admin.php?id_torneo=".base64_encode($Combo_Torneo['codigo_torneo'])."&#mundial\">".$Combo_Torneo['nombre']."</option>\n"; 
        }
        }
        }   
function Combo_Torneo_A_Series_Vinculadas($ID_torneo=0,$ID_Serie=0,$ID_equipo=0,$VID_torneo=0){
        $consulta_Combo=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo();
         echo "<option value=\"A_Series_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_serie=".base64_encode($ID_Serie)."&id_equipo=".base64_encode($ID_equipo)."&#mundial\">Seleccione Torneo</option>\n"; 
             if($consulta_Combo) {
            
  while( $Combo_Torneo = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Torneo['codigo_torneo']==$VID_torneo)
            echo "<option  value=\"A_Series_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_serie=".base64_encode($ID_Serie)."&id_equipo=".base64_encode($ID_equipo)."&vid_torneo=".base64_encode($Combo_Torneo['codigo_torneo'])."&#mundial\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
               else
            echo "<option  value=\"A_Series_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_serie=".base64_encode($ID_Serie)."&id_equipo=".base64_encode($ID_equipo)."&vid_torneo=".base64_encode($Combo_Torneo['codigo_torneo'])."&#mundial\">".$Combo_Torneo['nombre']."</option>\n"; 
        }
        }
        }  

  function Combo_Torneos_Jornadas($ID_torneo=0){
  
   $consulta_Combo=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo();
   if($consulta_Combo) {
            echo "<option value=\"Jornadas_Admin.php\">Seleccione Torneo</option>\n"; 
  while( $Combo_Torneo = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Torneo['codigo_torneo']==$ID_torneo)
            echo "<option  value=\"Jornadas_Admin.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#mundial\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
               else
             echo "<option  value=\"Jornadas_Admin.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#mundial\">".$Combo_Torneo['nombre']."</option>\n"; 
        }
        }
  }   
function Combo_Torneos_Partidos($ID_torneo=0){
  
   $consulta_Combo=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo();
   echo ' <option value="Partidos_Admin.php">Seleccione Torneo</option>';
   if($consulta_Combo) {

         while( $Combo_Torneo = mysql_fetch_array($consulta_Combo) ){

                if($Combo_Torneo['codigo_torneo']==$ID_torneo)
             echo "<option  value=\"Partidos_Admin.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#mundial\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
                else
              echo "<option  value=\"Partidos_Admin.php?id_torneo=".base64_encode($Combo_Torneo['codigo_torneo'])."&#mundial\">".$Combo_Torneo['nombre']."</option>\n"; 
         }
         }

  }   

  function Combo_Torneos_Alineacion($ID_torneo=0){
  
   $consulta_Combo=$this->objD_Gestionar_Torneo->Mostrar_Tabla_Torneo();
    if($consulta_Combo) {
            echo "<option value=\"A_Alineacion_O_Admin.php?#mundial\">Seleccione Torneo</option>\n"; 
  while( $Combo_Torneo = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Torneo['codigo_torneo']==$ID_torneo)
            echo "<option  value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode ($Combo_Torneo['codigo_torneo'])."&#mundial\" selected=\"selected\">".$Combo_Torneo['nombre']."</option>\n"; 
               else
             echo "<option  value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($Combo_Torneo['codigo_torneo'])."&#mundial\">".$Combo_Torneo['nombre']."</option>\n"; 
        }
        }

  }   

}
?>

