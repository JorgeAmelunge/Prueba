<?php
class Negocio_Partido_Arbitro{
var $objD_Gestionar_Partido_Arbitro;

	
        function Negocio_Partido_Arbitro(){
              
		require('../../Datos/D_Gestionar_Partido_Arbitro.php');              
		$this->objD_Gestionar_Partido_Arbitro=new Datos_Gestionar_Partido_Arbitro();
                       
	}

  function Eliminar_Partido_Arbitro($ID_Arbitro=0,$ID_Partido=0,$ID_torneo=0,$ID_Jornada=0){

    
			if($this->objD_Gestionar_Partido_Arbitro->Eliminar_Partido_Arbitro($ID_Partido,$ID_Arbitro)== true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					 location.href='A_Arbitros_Admin.php?id_torneo=";
                                echo base64_encode($ID_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                 echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                echo "&#lfpb'; </script>";
			}
			
			
  }
  
   
 function Insertar_Partido_Arbitro($ID_Arbitro=0,$ID_Partido=0,$Observacion="",$ID_torneo=0,$ID_Jornada=0){
    
        if($Observacion==""){
                echo "<script>alert('Seleccione una Observacion!!');	
                location.href='A_Arbitros_Admin.php?id_torneo=";
                                echo base64_encode($ID_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                echo "&#lfpb'; </script>";
        }
        else{	
            if($ID_Arbitro==0){
                echo "<script>alert('Seleccione un Arbitro!!');	
                location.href='A_Arbitros_Admin.php?id_torneo=";
                                echo base64_encode($ID_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                 echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                echo "&#lfpb'; </script>";
        }
        else{	
             if($ID_Partido==0){
                echo "<script>alert('Seleccione un Partido!!');	
                location.href='A_Arbitros_Admin.php?id_torneo=";
                                echo base64_encode($ID_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                 echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                echo "&#lfpb'; </script>";
        }
        else{	
              if ( $this->objD_Gestionar_Partido_Arbitro->Insertar_Partido_Arbitro($ID_Partido,$ID_Arbitro,$Observacion) == true){ 

                    echo "<script>alert('Asignacion Realizada con Exito!!');
                     location.href='A_Arbitros_Admin.php?id_torneo=";
                                echo base64_encode($ID_torneo);
                                echo "&id_jornada=";
                                echo base64_encode($ID_Jornada);
                                echo "&id_partido=";
                                echo base64_encode($ID_Partido);
                                echo "&#lfpb'; </script>";
                    }
            
                }
        }
        }

  }
  
    

  
  function Tabla_Partido_Arbitro($ID_Partido=0){
  
  return $consulta=$this->objD_Gestionar_Partido_Arbitro->Mostrar_Tabla_partido_Arbitro($ID_Partido);
 
	
  }  
  
  function Tabla_Partido_Arbitro_combo($ID_Partido=0){
      echo $ID_Partido;
  return $consulta=$this->objD_Gestionar_Partido_Arbitro->Verificar_Arbitros($ID_Partido);
 
	
  }  
 

}
?>

