<?php
class Negocio_Partido_Observacion{
var $objD_Gestionar_Partido_Observacion;

	
        function Negocio_Partido_Observacion(){
              
		require('../../Datos/D_Gestionar_Partido_Observacion.php');              
		$this->objD_Gestionar_Partido_Observacion=new Datos_Gestionar_Partido_Observacion();
                      
                       
	}

  function Eliminar_Partido_Observacion($ID_Partido=0,$Torneo=0,$ID_Jornada=0,$ID_Equipo=0,$codigo=0,$Observacion=0){
                        if($Observacion==3 || $Observacion==6){
                           $this->objD_Gestionar_Partido_Observacion->Eliminar_Partido_gol_local($ID_Partido,$ID_Equipo); 
                           $this->objD_Gestionar_Partido_Observacion->Eliminar_Partido_gol_visitante($ID_Partido,$ID_Equipo); 
                        }
    
			if($this->objD_Gestionar_Partido_Observacion->Eliminar_Partido_Observacion($ID_Partido,$codigo)== true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					 location.href='A_Alineacion_O_Admin.php?id_torneo=";
                                echo base64_encode($Torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                 echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                 echo "&id_equipo=";
                                echo base64_encode($ID_Equipo);
                                echo "&#mundial'; </script>";
			}
			
			
  }
  
   
 function Insertar_Partido_Observacion($ID_Partido=0,$Torneo=0,$ID_Jornada=0,$ID_Equipo=0,$Observacion=0){
    
        if($Observacion==0){
                echo "<script>alert('Seleccione una Observacion!!');	
                location.href='A_Alineacion_O_Admin.php?id_torneo=";
                                echo base64_encode($Torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                 echo "&id_equipo=";
                                echo base64_encode($ID_Equipo);
                                echo "&#mundial'; </script>";
                                return false;
                               
        }
        else{	
           
       
          
              if ( $this->objD_Gestionar_Partido_Observacion->Insertar_Partido_Observacion($ID_Partido,$Observacion,$ID_Equipo) == true){ 
                       echo "<script>alert('Asignacion Realizada con Exito!!');
                     
                                 </script>";
                      echo "<meta http-equiv=refresh content=1;URL=A_Alineacion_O_Admin.php?id_torneo=";echo base64_encode($Torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                 echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                 echo "&id_equipo=";
                                echo base64_encode($ID_Equipo);
                                echo "&#mundial>";           
                  
                              return true;
                    }
            
                
        
        }

  }
  
    

  
  function Tabla_Partido_Alineacion_Observacion($ID_Partido=0){
  
  return $consulta=$this->objD_Gestionar_Partido_Observacion->Mostrar_Tabla_Partido_Observacion($ID_Partido);
 
	
  }  
   function Tabla_Partido_Alineacion_Observacion_Equipo($ID_Partido=0,$ID_Equipo=0){
  
  return $consulta=$this->objD_Gestionar_Partido_Observacion->Mostrar_Tabla_Partido_Observacion_Equipo($ID_Partido,$ID_Equipo);
 
	
  } 
  function Tabla_Observacion(){
  
  return $consulta=$this->objD_Gestionar_Partido_Observacion->Mostrar_Tabla_Observacion();
 
	
  }
  
  function Combo_Observacion(){
  
  $consulta=$this->objD_Gestionar_Partido_Observacion->Mostrar_Tabla_Observacion();
  echo "<option value=\"0\">Seleccione Observacion</option>\n"; 
   if($consulta) {
          
                    while( $Combo_Observacion = mysql_fetch_array($consulta) ){

                         echo "<option  value=\"".$Combo_Observacion['codigo_observacion']."\">".$Combo_Observacion['nombre']."</option>\n"; 
                    }
                    }
  }
   function Tabla_Alineacion_Partido($ID_Partido=0,$ID_Equipo=0){
  
  return $consulta=$this->objD_Gestionar_Partido_Observacion->Mostrar_Tabla_Alineacion_Partido($ID_Partido,$ID_Equipo);
 
	
  } 
  
  /* function Insertar_Puntaje($ID_Partido=0,$Torneo=0,$ID_Jornada=0,$ID_alineacion=0){
     $consulta=$this->objD_Gestionar_Partido->Mostrar_Tabla_Partido_detallado($ID_Partido);
       if($consulta) {
          
                    while( $Combo_Partido = mysql_fetch_array($consulta) ){
                       $ML= $Combo_Partido['marcador_local'];
                       $MV= $Combo_Partido['marcador_visitante'];
                       $CL= $Combo_Partido['e_local'];
                       $CV= $Combo_Partido['evisita'];
                       if($ML>$MV){
                           
                       }
                        
                    }
                    }
  }*/

}
?>

