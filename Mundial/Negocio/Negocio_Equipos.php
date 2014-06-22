<?php
class Negocio_Equipos{
var $objD_Gestionar_Equipos;

	
        function Negocio_Equipos(){
              
		require('../../Datos/D_Gestionar_Equipos.php');              
		$this->objD_Gestionar_Equipos=new Datos_Gestionar_Equipos();
	}

  function Eliminar_Equipo($ID_Equipo=0){
      
      $consulta=$this->objD_Gestionar_Equipos->Obtener_Escudo($ID_Equipo);
      if($consulta) {
      while( $Tabla_Equipos = mysql_fetch_array($consulta) ){          
        unlink("../../images/escudos/".$Tabla_Equipos['escudo'] );  
      }
      }
			if($this->objD_Gestionar_Equipos->Eliminar_Equipo($ID_Equipo) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					 location.href='Equipos_Admin.php?#mundial';
					  </script>";
			}
			
			
  }
  
   
 function Insertar_Equipo($Nombre="",$Escudo="",$Ciudad="",$Presidente="",$Fecha="",$Direccion="",$Telefonos="",$WEB="",$Email=""){
    
        if($Nombre=="")
                echo "<script>alert('Inserte un Nombre!!');	
                location.href='Equipos_Admin.php?#mundial';
                </script>";
        else{	
            if($Escudo=="")
              echo  "<script>alert('Inserte Direccion de Escudo!!');	
                location.href='Equipos_Admin.php?#mundial';
                </script>";
            else{
           /* if($Ciudad==""){
            echo    "<script>alert('Inserte una Ciudad!!');	
                location.href='Equipos_Admin.php?#mundial';
                </script>";
            }
            else{*/
                
               
               
                    if ( $this->objD_Gestionar_Equipos->Insertar_Equipo($Nombre,$Escudo,$Ciudad,$Presidente,$Fecha,$Direccion,$Telefonos,$WEB,$Email) == true){ 

                    echo "<script>alert('Insercion Realizada con Exito!!');
                    location.href='Equipos_Admin.php?#mundial';
                    </script>";
                    }
           // }
            
            }
                }


  }
  
    

  
  function Tabla_Equipos(){
  
  return $consulta=$this->objD_Gestionar_Equipos->Mostrar_Tabla_Equipos();
 
	
  }  
   function Tabla_Equipos_Especifico($ID_Equipo=0){
  
   $consulta_Combo=$this->objD_Gestionar_Equipos->Mostrar_Tabla_Equipos_Especifico($ID_Equipo);
  if($consulta_Combo) {

    while( $Combo_equipo = mysql_fetch_array($consulta_Combo) ){
         echo "<h3 style=\"text-align: center\">".$Combo_equipo['nombre']."</h3>\n";
         echo " <p class=\"imgholder\" ><img src=\"../../img/escudos/".$Combo_equipo['escudo']."\" width=\"210\" height=\"90\" alt=\"\" /></p><br/>";
        if($Combo_equipo['presidente']!="")
         echo "<p><b>Presidente: </b>".$Combo_equipo['presidente']."</p><br/>";
        if($Combo_equipo['fecha_fundacion']!="")
         echo "<p><b>Fecha Fundacion: </b>".$Combo_equipo['fecha_fundacion']."</p><br/>";
         if($Combo_equipo['direccion']!="")
         echo "<p><b>Direccion: </b>".$Combo_equipo['direccion']."</p><br/>";
         if($Combo_equipo['telefonos']!="")
         echo "<p><b>Telefonos: </b>".$Combo_equipo['telefonos']."</p><br/>";
         if($Combo_equipo['web']!="")
         echo "<p><b>WEB: </b><a href=".$Combo_equipo['web']." target=\"_blank\">".$Combo_equipo['web']."</a></p><br/>";
         if($Combo_equipo['email']!="")
         echo "<p><b>E-Mail: </b>".$Combo_equipo['email']."</p><br/>";
    }
    }
	
  }  
  function Tabla_Equipos_series($ID_torneo=0){
  
  return $consulta=$this->objD_Gestionar_Equipos->Mostrar_Tabla_Equipos_series($ID_torneo);
 
	
  }  
    function Tabla_Equipos_Partidos($ID_torneo=0){
  
 $consulta_Combo= $this->objD_Gestionar_Equipos->Mostrar_Tabla_Equipos_Partido($ID_torneo);
 if($consulta_Combo) {
        
        while( $Combo_equipo = mysql_fetch_array($consulta_Combo) ){

        echo " <h2> <a href=\"Equipos.php?id_equipo=".base64_encode($Combo_equipo['codigo_equipo'])."\">".$Combo_equipo['nombre']."</a></h2>";

        }
        
        }
	
  } 

  function Tabla_Equipo_Local_Partidos($ID_torneo=0,$ID_equipo_local=0){
  echo "<option value=\"Partidos_Admin.php?id_torneo=".base64_encode($ID_torneo)."&#mundial\">Seleccione Equipo Local</option>\n"; 
 $consulta_Combo= $this->objD_Gestionar_Equipos->Mostrar_Tabla_Equipos_Partido($ID_torneo);
  if($consulta_Combo) {
          
  while( $Combo_Equipo = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Equipo['codigo_equipo']==$ID_equipo_local)
            echo "<option  value=\"Partidos_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_equipo_local=".base64_encode($Combo_Equipo['codigo_equipo'])."&#mundial\" selected=\"selected\">".$Combo_Equipo['nombre']."</option>\n"; 
               else
            echo "<option  value=\"Partidos_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_jornada=".base64_encode($ID_jornada)."&id_equipo_local=".base64_encode($Combo_Equipo['codigo_equipo'])."&#mundial\" >".$Combo_Equipo['nombre']."</option>\n"; 
        }
        }
        
  
  } 

  function Tabla_Equipo_Visitantes_Partidos($ID_torneo=0,$ID_equipo_local=0){
  echo "<option value=\"0\">Seleccione Equipo Visitante</option>\n"; 
 $consulta_Combo= $this->objD_Gestionar_Equipos->Mostrar_Tabla_Equipos_Partido($ID_torneo);
   if($consulta_Combo) {
          
  while( $Combo_Equipo = mysql_fetch_array($consulta_Combo) ){
            
               if($Combo_Equipo['codigo_equipo']!=$ID_equipo_local)
           
             echo "<option  value=\"".$Combo_Equipo['codigo_equipo']."\">".$Combo_Equipo['nombre']."</option>\n"; 
        }
        }
        
  
  } 

  function Nombre_Equipos(){
  
  return $consulta=$this->objD_Gestionar_Equipos->Mostrar_Nombre_Equipos();
 
	
  }  
  
  
  function Modificar_Equipo($Codigo_Equipo=0,$Nombre="",$Escudo="",$Ciudad="",$Presidente="",$Fecha="",$Direccion="",$Telefonos="",$WEB="",$Email=""){
	
		
                     if($Nombre=="")
                echo "<script>alert('Inserte un Nombre!!');	
                location.href='Equipos_Admin.php?#mundial';
                </script>";
        else{	
            if($Escudo=="")
              echo  "<script>alert('Inserte Direccion de Escudo!!');	
                location.href='Equipos_Admin.php?#mundial';
                </script>";
            else{
            if($Ciudad==""){
              echo  "<script>alert('Inserte una Ciudad!!');	
                location.href='Equipos_Admin.php?#mundial';
                </script>";
            }
            else{
                
               
                 
                                $consulta=$this->objD_Gestionar_Equipos->Obtener_Escudo($Codigo_Equipo);
                                if($consulta) {
                                while( $Tabla_Equipo = mysql_fetch_array($consulta) ){          
                                  unlink("../../images/escudos/".$Tabla_Equipo['escudo'] );  
                                    }
                                    }
                                    if ($this->objD_Gestionar_Equipos->Modificar_equipo($Codigo_Equipo,$Nombre,$Escudo,$Ciudad,$Presidente,$Fecha,$Direccion,$Telefonos,$WEB,$Email) == true){ 

                                    echo "<script>alert('Modificacion Realizada con Exito!!');
                                    location.href='Equipos_Admin.php?#mundial';
                                    </script>";
                                  }
                                  }
            
            
            


            }
                }

			
				
  }
  
function Modificar_Equipo_sin_Escudo($Codigo_Equipo=0,$Nombre="",$Ciudad="",$Presidente="",$Fecha="",$Direccion="",$Telefonos="",$WEB="",$Email=""){
	
		
                if($Nombre==""){
                echo "<script>alert('Inserte un Nombre!!');	
                location.href='Equipos_Admin.php?#mundial';
                </script>";
                }
        else{	
           
            if($Ciudad==""){
              echo  "<script>alert('Inserte una Ciudad!!');	
                location.href='Equipos_Admin.php?#mundial';
                </script>";
            }
            else{
                
                 
                         echo $Codigo_Equipo;      
                                    if ($this->objD_Gestionar_Equipos->Modificar_Equipo_S_Escudo($Codigo_Equipo,$Nombre,$Ciudad,$Presidente,$Fecha,$Direccion,$Telefonos,$WEB,$Email) == true){ 

                                    echo "<script>alert('Modificacion Realizada con Exito!!');
                                    location.href='Equipos_Admin.php?#mundial';
                                    </script>";
                                  }
                                  
            
            
            


            }
                }
  }

  function Combo_Equipos_series($ID_torneo=0,$ID_Serie=0,$ID_equipo=0){

   echo "<option value=\"A_Series_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_serie=".base64_encode($ID_Serie)."&#mundial\">Seleccione Equipo</option>\n"; 
   $consulta=$this->objD_Gestionar_Equipos->Mostrar_Tabla_Equipos_series($ID_torneo);
  
  if($consulta) {
           var_dump($ID_torneo);
  while( $Combo_Equipo = mysql_fetch_array($consulta) ){
            var_dump($Combo_Equipo['codigo_equipo']);
               if($Combo_Equipo['codigo_equipo']==$ID_equipo)
            echo "<option  value=\"A_Series_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_serie=".base64_encode($ID_Serie)."&id_equipo=".base64_encode($Combo_Equipo['codigo_equipo'])."&#mundial\" selected=\"selected\">".$Combo_Equipo['nombre']."</option>\n"; 
               else
             echo "<option  value=\"A_Series_Admin.php?id_torneo=".base64_encode($ID_torneo)."&id_serie=".base64_encode($ID_Serie)."&id_equipo=".base64_encode($Combo_Equipo['codigo_equipo'])."&#mundial\" >".$Combo_Equipo['nombre']."</option>\n"; 
        }
        }
  
  }  
  
}
?>

