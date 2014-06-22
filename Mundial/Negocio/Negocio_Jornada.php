<?php
class Negocio_Jornada{
var $objD_Gestionar_Jornada;

	
        function Negocio_Jornada(){
              
		require('../../Datos/D_Gestionar_Jornada.php');              
		$this->objD_Gestionar_Jornada=new Datos_Gestionar_Jornada();
	}

  function Eliminar_Jornada($ID_jornada=0,$ID_Torneo=0){
      
    
			if($this->objD_Gestionar_Jornada->Eliminar_jornada($ID_jornada) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					 location.href='Jornadas_Admin.php?id_torneo=";
                                echo base64_encode($ID_Torneo);
                                echo "&#mundial';</script>";
			}
			
  }
  
 
  function Cantidad_Jornada($ID_torneo=0){

      return $this->objD_Gestionar_Jornada->Mostrar_Cant_Jornada($ID_torneo);
			
  }  
 function Insertar_Jornada($Codigo_Torneo=0,$FechaI="",$FechaF="",$Nombre=""){
   $f0 = strtotime($FechaI);
   $f1 = strtotime($FechaF);
   if($f1>=$f0){
        if($this->objD_Gestionar_Jornada->Verificar_fechas($FechaI,$FechaF,$Codigo_Torneo)==0){
            echo "<script>alert('Fuera de las Fechas del Torneo!!');	
                 location.href='Jornadas_Admin.php?id_torneo=";
                    echo base64_encode($Codigo_Torneo);
                    echo "&#mundial';</script>"; 
        }
        else{
        if ( $this->objD_Gestionar_Jornada->Verificar_nombre($Nombre,$FechaI,$FechaF) == 0){
       
     if($FechaI==""){
                echo "<script>alert('Inserte una Fecha de Inicio!!');	
                 location.href='Jornadas_Admin.php?id_torneo=";
                    echo base64_encode($Codigo_Torneo);
                    echo "&#mundial';</script>";
     }
        else{	
            if($FechaF==""){
             echo   "<script>alert('Inserte una Fecha de Final!!');	
                 location.href='Jornadas_Admin.php?id_torneo=";
                    echo base64_encode($Codigo_Torneo);
                    echo "&#mundial';</script>";
            }
            else{
            if($Nombre==""){
               echo "<script>alert('Inserte un Nombre!!');	
               location.href='Jornadas_Admin.php?id_torneo=";
                    echo base64_encode($Codigo_Torneo);
                    echo "&#mundial';</script>";
            }
            else{  
                  
                    if ( $this->objD_Gestionar_Jornada->Insertar_Jornada($Codigo_Torneo,$FechaI,$FechaF,$Nombre) == true){ 
                    echo '<meta http-equiv=refresh content=1;URL=Jornadas_Admin.php?id_torneo=';echo base64_encode($Codigo_Torneo); echo '&#mundial>';    
                    echo "<script>alert('Insercion Realizada con Exito!!');</script>";
                   
            }
            
            }

            
            }
                }

}
else{
  echo "<script>alert('La Jornada ya Existe!!');
                   location.href='Jornadas_Admin.php?id_torneo=";
                                echo base64_encode($Codigo_Torneo);
                                echo "&#mundial';</script>";
}
   }
   }
   else{
  echo "<script>alert('El Formato de Fecha es Incorrecto!!');
                   location.href='Jornadas_Admin.php?id_torneo=";
                                echo base64_encode($Codigo_Torneo);
                                echo "&#mundial';</script>";
}
  }
  
    

  
  function Tabla_Jornada($Codigo_Torneo=0){
  
  $consulta=$this->objD_Gestionar_Jornada->Mostrar_Tabla_Jornada($Codigo_Torneo);
 

echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>Nº</th>
                        <th>Nombre Torneo</th>                        
                        <th>Fecha Inicio</th>         
                        <th>Fecha Final</th>
                        <th>Nombre Jornada</th>                        
                        <th></th> 
                        <th></th>
            
        </tr>
      </thead>
      <tbody>';
   
 $Contador=1;
if($consulta) {
  while( $Tabla_Jornada = mysql_fetch_array($consulta) ){
  
   echo '<tr> 
                          <td align="middle">'; echo $Contador;echo '</td>
                          <td align="middle">'; echo $Tabla_Jornada['Ntorneo'];echo '</td>                           
                          <td align="middle">'; echo $Tabla_Jornada['fecha_inicio']; echo'</td>                            
                          <td align="middle">'; echo $Tabla_Jornada['fecha_fin'] ;echo '</td> 
                          <td align="middle">'; echo $Tabla_Jornada['Njornada'];echo '</td>                          
                          <td align="middle"><span class="modi"><a href="Jornadas_Admin.php?id_torneo=';echo base64_encode($Tabla_Jornada['codigo_torneo']);echo '&id_jornada=';echo base64_encode($Tabla_Jornada['codigo_Jornada']);echo'&fecha_inicio=';echo base64_encode($Tabla_Jornada['fecha_inicio']);echo'&fecha_final=';echo base64_encode($Tabla_Jornada['fecha_fin']);echo'&nombre=';echo base64_encode($Tabla_Jornada['Njornada']);echo'&#mundial"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Jornadas_Admin.php?id_torneo=';echo base64_encode($Tabla_Jornada['codigo_torneo']);echo'&id_jornada=';echo base64_encode($Tabla_Jornada['codigo_Jornada']) ;echo'&fecha_inicio=&fecha_final=&nombre=&#mundial"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
                     
      </tr> ';
 
        $Contador++;
    }
}
    

echo '</tbody>
    </table>';
	
  }  
  
  
  function Modificar_Jornada($Codigo_Jornada=0,$FechaI="",$FechaF="",$Nombre="",$ID_Torneo=0){
      
	 
     if($FechaI==""){
                echo "<script>alert('Inserte una Fecha de Inicio!!');	
                    location.href='Jornadas_Admin.php?id_torneo=";
                                echo base64_encode($ID_Torneo);
                                echo "&#mundial';</script>";
     }
        else{	
            if($FechaF==""){
              echo "<script>alert('Inserte una Fecha de Final!!');	
               location.href='Jornadas_Admin.php?id_torneo=";
                                echo base64_encode($ID_Torneo);
                                echo "&#mundial';</script>";
            }
            else{
            if($Nombre==""){
               echo "<script>alert('Inserte un Nombre!!');	
              location.href='Jornadas_Admin.php?id_torneo=";
                                echo base64_encode($ID_Torneo);
                                echo "&#mundial';</script>";
            }
            else{
                    
                    if ( $this->objD_Gestionar_Jornada->Modificar_Jornada($Codigo_Jornada,$FechaI,$FechaF,$Nombre) == true){ 

                    echo "<script>alert('Modificacion Realizada con Exito!!');
                    location.href='Jornadas_Admin.php?id_torneo=";
                                echo base64_encode($ID_Torneo);
                                echo "&#mundial';</script>";
                    }
                 
            
            }


            }
                }



				
  }
  
function Combo_Jornada($ID_torneo=0,$ID_jornada=0){
      echo "<option value=\"Partidos.php?id_torneo=".base64_encode($ID_torneo)."&#mundial\">Seleccione Jornada</option>\n"; 

      $consulta_Combo=$this->objD_Gestionar_Jornada->Mostrar_Tabla_Jornada($ID_torneo);
      if($consulta_Combo) {

      while( $Combo_Jornada = mysql_fetch_array($consulta_Combo) ){

      if($Combo_Jornada['codigo_Jornada']==$ID_jornada)
      echo "<option  value=\"Partidos.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($Combo_Jornada['codigo_Jornada'])."&#mundial\" selected=\"selected\">".$Combo_Jornada['Njornada']."</option>\n"; 
      else
      echo "<option  value=\"Partidos.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($Combo_Jornada['codigo_Jornada'])."&#mundial\">".$Combo_Jornada['Njornada']."</option>\n"; 
      }
      }
    }

    function Combo_Jornada_Equipo($ID_torneo=0,$ID_jornada=0,$ID_Equipo=0){
      echo "<option value=\"Equipos.php?id_equipo=".base64_encode($ID_Equipo)."&id_torneo=".base64_encode($ID_torneo)."&#mundial\">Seleccione Jornada</option>\n"; 

      $consulta_Combo=$this->objD_Gestionar_Jornada->Mostrar_Tabla_Jornada($ID_torneo);
      if($consulta_Combo) {
         
      while( $Combo_Jornada = mysql_fetch_array($consulta_Combo) ){

             if($Combo_Jornada['codigo_Jornada']==$ID_jornada)
          echo "<option  value=\"Equipos.php?id_equipo=".base64_encode($ID_Equipo)."&id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($Combo_Jornada['codigo_Jornada'])."&#mundial\" selected=\"selected\">".$Combo_Jornada['Njornada']."</option>\n"; 
             else
           echo "<option  value=\"Equipos.php?id_equipo=".base64_encode($ID_Equipo)."&id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($Combo_Jornada['codigo_Jornada'])."&#mundial\">".$Combo_Jornada['Njornada']."</option>\n"; 
      }
      }
    }
    function Combo_Jornada_Partidos($ID_torneo=0,$ID_jornada=0){
       echo "<option value=\"Partidos_Admin.php?id_torneo=".base64_encode($ID_torneo)."&#mundial\">Seleccione Jornada</option>\n"; 

      $consulta_Combo=$this->objD_Gestionar_Jornada->Mostrar_Tabla_Jornada($ID_torneo);
       if($consulta_Combo) {

                while( $Combo_Jornada = mysql_fetch_array($consulta_Combo) ){

                       if($Combo_Jornada['codigo_Jornada']==$ID_jornada)
                    echo "<option  value=\"Partidos_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($Combo_Jornada['codigo_Jornada'])."&#mundial\" selected=\"selected\">".$Combo_Jornada['Njornada']."</option>\n"; 
                       else
                     echo "<option  value=\"Partidos_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($Combo_Jornada['codigo_Jornada'])."&#mundial\">".$Combo_Jornada['Njornada']."</option>\n"; 
                }
                }
    }
     function Combo_Jornada_Alineacion($ID_torneo=0,$ID_jornada=0){
       echo "<option value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&#mundial\">Seleccione Jornada</option>\n"; 

      $consulta_Combo=$this->objD_Gestionar_Jornada->Mostrar_Tabla_Jornada($ID_torneo);
      if($consulta_Combo) {
          
  while( $Combo_Serie = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Serie['codigo_Jornada']==$ID_jornada)
            echo "<option  value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($Combo_Serie['codigo_Jornada'])."&#mundial\" selected=\"selected\">".$Combo_Serie['Njornada']."</option>\n"; 
               else
             echo "<option  value=\"A_Alineacion_O_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($Combo_Serie['codigo_Jornada'])."&#mundial\">".$Combo_Serie['Njornada']."</option>\n"; 
        }
        }
    }
}
?>

