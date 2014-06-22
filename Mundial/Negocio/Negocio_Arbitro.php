<?php
class Negocio_Arbitro{
var $objD_Gestionar_Arbitro;

	
        function Negocio_Arbitro(){
              
		require('../../Datos/D_Gestionar_Arbitro.php');              
		$this->objD_Gestionar_Arbitro=new Datos_Gestionar_Arbitro();
                       
	}

  function Eliminar_Arbitro($ID_Arbitro=0){
      
    
			if($this->objD_Gestionar_Arbitro->Eliminar_Arbitro($ID_Arbitro) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					 location.href='Arbitros_Admin.php?#lfpb';
					  </script>";
			}
			
			
  }
  
   
 function Insertar_Arbitro($Nombre="",$Ciudad=""){
    if($this->objD_Gestionar_Arbitro->Verificar_nombre($Nombre)==0){
        if($Nombre=="")
                echo "<script>alert('Inserte un Nombre!!');	
                location.href='Arbitros_Admin.php?#lfpb';
                </script>";
        else{	
            if($Ciudad=="")
              echo  "<script>alert('Inserte Ciudad!!');	
                location.href='Arbitros_Admin.php?#lfpb';
                </script>";
            else{
           
               
                
                
                    if ( $this->objD_Gestionar_Arbitro->Insertar_Arbitro($Nombre,$Ciudad) == true){ 

                    echo "<script>alert('Insercion Realizada con Exito!!');
                    location.href='Arbitros_Admin.php?#lfpb';
                    </script>";
                    }
            
            
            
            


            }
                }
    }
    else{
       echo "<script>alert('El Nombre ya Existe!!');
                    location.href='Arbitros_Admin.php?#lfpb';
                    </script>";  
    }

  }
  
    

  
  function Tabla_Arbitro(){
  
  return $consulta=$this->objD_Gestionar_Arbitro->Mostrar_Tabla_Arbitro();
 
	
  }  
  
  
  function Modificar_Arbitro($Codigo_Arbitro=0,$Nombre="",$Ciudad=""){
	
		  if($Nombre=="")
                echo "<script>alert('Inserte un Nombre!!');	
                location.href='Arbitros_Admin.php?#lfpb';
                </script>";
        else{	
            if($Ciudad=="")
              echo  "<script>alert('Inserte Ciudad!!');	
                location.href='Arbitros_Admin.php?#lfpb';
                </script>";
            else{
           
               
                
                
                    if ( $this->objD_Gestionar_Arbitro->Modificar_Arbitro($Codigo_Arbitro,$Nombre,$Ciudad) == true){ 

                    echo "<script>alert('Modificacion Realizada con Exito!!');
                    location.href='Arbitros_Admin.php?#lfpb';
                    </script>";
                    }
            
            
            
            


            }
                }

				
  }
  

}
?>

