<?php
class Negocio_Partido_Alineacion{
var $objD_Gestionar_Partido_Alineacion;

	
        function Negocio_Partido_Alineacion(){
              
		require('../../Datos/D_Gestionar_Partido_Alineacion.php');              
		$this->objD_Gestionar_Partido_Alineacion=new Datos_Gestionar_Partido_Alineacion();
                       
	}

  function Eliminar_Partido_Alineacion($ID_Alineacion=0,$ID_Partido=0,$Torneo=0,$ID_Jornada=0,$ID_Equipo=0){

    
			if($this->objD_Gestionar_Partido_Alineacion->Eliminar_Partido_Alineacion($ID_Partido,$ID_Alineacion)== true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					 location.href='A_Alineacion_Admin.php?id_torneo=";
                                echo base64_encode($Torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                 echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                 echo "&id_equipo=";
                                echo base64_encode($ID_Equipo);
                                echo "&#lfpb'; </script>";
			}
			
			
  }
  
   
 function Insertar_Partido_Alineacion($ID_Partido=0,$Torneo=0,$ID_Jornada=0,$ID_Equipo=0,$ID_alineacion=0,$Observacion="",$Camiseta=0){
    
        if($Observacion==""){
                echo "<script>alert('Seleccione una Observacion!!');	
                location.href='A_Alineacion_Admin.php?id_torneo=";
                                echo base64_encode($Torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                 echo "&id_equipo=";
                                echo base64_encode($ID_Equipo);
                                echo "&#lfpb'; </script>";
        }
        else{	
            if($Camiseta==0){
                echo "<script>alert('Inserte un Numero de Camiseta!!');	
                location.href='A_Alineacion_Admin.php?id_torneo=";
                                echo base64_encode($Torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                 echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                 echo "&id_equipo=";
                                echo base64_encode($ID_Equipo);
                                echo "&#lfpb'; </script>";
        }
        else{	
            
      	
              if ( $this->objD_Gestionar_Partido_Alineacion->Insertar_Partido_Alineacion($ID_alineacion,$ID_Partido,$Observacion,$Camiseta) == true){ 

                    echo "<script>alert('Asignacion Realizada con Exito!!');
                      location.href='A_Alineacion_Admin.php?id_torneo=";
                                echo base64_encode($Torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                 echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                 echo "&id_equipo=";
                                echo base64_encode($ID_Equipo);
                                echo "&#lfpb'; </script>";
                    }
            
                
        }
        }

  }
  
    

  
  function Tabla_Partido_Alineacion($ID_Partido=0,$ID_Equipo=0){
  
  return $consulta=$this->objD_Gestionar_Partido_Alineacion->Mostrar_Tabla_partido_Alineacion($ID_Partido, $ID_Equipo);
 
	
  }  
  
   

}
?>

