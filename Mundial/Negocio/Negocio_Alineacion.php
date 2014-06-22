<?php
class Negocio_Alineacion{
var $objD_Gestionar_Arbitro;

	
        function Negocio_Alineacion(){
              
		require('../../Datos/D_Gestionar_Alineacion.php');              
		$this->objD_Gestionar_Arbitro=new Datos_Gestionar_Alineacion();
                       
	}

  function Eliminar_Alineacion($ID_Alineacion=0){
      
    
			if($this->objD_Gestionar_Arbitro->Eliminar_Alineacion($ID_Alineacion) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					 location.href='Alineacion_Admin.php?#lfpb';
					  </script>";
			}
			
			
  }
  
   
 function Insertar_Alineacion($Codigo_Equipo=0,$Nombre="",$pais="",$fecha=""){
     if($this->objD_Gestionar_Arbitro->Verificar_nombre($Nombre,$Codigo_Equipo)==0 ){
    if($Codigo_Equipo==0)
                echo "<script>alert('Seleccione un Equipo!!');	
                location.href='Alineacion_Admin.php?id_equipo=".base64_encode ($Codigo_Equipo)."&#lfpb';
                </script>";
        else{
       /* if($Nombre=="")
                echo "<script>alert('Inserte un Nombre!!');	
               location.href='Alineacion_Admin.php?id_equipo=".base64_encode ($Codigo_Equipo)."&#lfpb';
                </script>";
        else{	*/
           /* if($pais=="")
                echo "<script>alert('Inserte Pais!!');	
                location.href='Alineacion_Admin.php?id_equipo=".base64_encode ($Codigo_Equipo)."&#lfpb';
                </script>";
            else{*/
              /*   if($fecha=="")
              echo  "<script>alert('Inserte una Fecha!!');	
                location.href='Alineacion_Admin.php?id_equipo=".base64_encode ($Codigo_Equipo)."&#lfpb';
                </script>";
            else{*/
                if ( $this->objD_Gestionar_Arbitro->Insertar_Alineacion($Codigo_Equipo,$Nombre,$pais,$fecha) == true){ 

                    echo "<script>alert('Insercion Realizada con Exito!!');
                   location.href='Alineacion_Admin.php?id_equipo=".base64_encode ($Codigo_Equipo)."&#lfpb';
                    </script>";
                    }
            
           // }

           // }
              //  }
        }
     }
     else{
        echo "<script>alert('El Nombre ya Existe!!');
                   location.href='Alineacion_Admin.php?id_equipo=".$Codigo_Equipo."&#lfpb';
                    </script>";
                    
     }

  }
  
    

  
  function Tabla_Alineacion(){
  
  return $consulta=$this->objD_Gestionar_Arbitro->Mostrar_Tabla_Alineacion();
 
	
  }  
    function Tabla_Alineacion_Partido($ID_Partido=0,$ID_Equipo=0){
  
  return $consulta=$this->objD_Gestionar_Arbitro->Mostrar_Tabla_Alineacion_Partido($ID_Partido,$ID_Equipo);
 
	
  }  
  
  
  function Modificar_Alineacion($Codigo_Alineacion=0,$Codigo_Equipo=0,$Nombre="",$pais="",$fecha=""){
	if($Codigo_Equipo==0)
                echo "<script>alert('Seleccione un Equipo!!');	
                location.href='Alineacion_Admin.php?#lfpb';
                </script>";
        else{	
		if($Nombre=="")
                echo "<script>alert('Inserte un Nombre!!');	
                location.href='Alineacion_Admin.php?#lfpb';
                </script>";
        else{	
            if($pais=="")
             echo   "<script>alert('Inserte Pais!!');	
                location.href='Alineacion_Admin.php?#lfpb';
                </script>";
            else{
                 if($fecha=="")
             echo   "<script>alert('Inserte una Fecha!!');	
                location.href='Alineacion_Admin.php?#lfpb';
                </script>";
            else{
                    if ($this->objD_Gestionar_Arbitro->Modificar_Alineacion($Codigo_Alineacion,$Codigo_Equipo,$Nombre,$pais,$fecha) == true){ 

                    echo "<script>alert('Modificacion Realizada con Exito!!');
                    location.href='Alineacion_Admin.php?#lfpb';
                    </script>";
                    }
            }
             }

            }
                }

				
  }
  

}
?>

