<?php
class Negocio_Usuario{
var $objD_Gestionar_Usuario;

	function Negocio_Usuario(){
            
		require('../../Datos/D_Usuario.php');
             
		$this->objD_Gestionar_Usuario=new Datos_Usuario();
	}

  
  
   
 function Insertar_Usuario($User="",$Clave=""){
  
							
							
							if($User=="")
								echo "<script>alert('Inserte un Usuario!!');	
								location.href='Usuario_Admin.php';
								</script>";
							else{	
                                                           
                                                            if($Clave!=""){
                                                                    if ( $this->objD_Gestionar_Usuario->Insertar_Usuarios($User,$Clave) == true){ 

                                                                    echo "<script>alert('Insercion Realizada con Exito!!');
                                                                    location.href='Usuario_Admin.php';
                                                                    </script>";
                                                                    }
                                                            }	
                                                            else{
                                                            echo "<script>alert('Inserte una Contraseña!!');
                                                            location.href='Usuario_Admin.php';
                                                            </script>";
                                                            }
                                                            
								}
								
							
  }
  
    

  
  function Tabla_Usuario(){
  
  return $consulta=$this->objD_Gestionar_Usuario->Mostrar_Tabla_usuarios();
 
	
  }  
  
  function Modificar_Usuario($ID_Empresa=0,$User="",$Clave=""){
	
		
                        if($User=="")
                                echo "<script>alert('Inserte un Usuario!!');	
                                location.href='Usuario_Admin.php';
                                </script>";
                        else{	
                            if($Clave=="")
                                "<script>alert('Inserte una Contraseña!!');	
                                location.href='Usuario_Admin.php';
                                </script>";
                            else{
                           
                              
                                    if ( $this->objD_Gestionar_Usuario->Modificar_usuario($ID_Empresa,$User,$Clave) == true){ 

                                    echo "<script>alert('Modificacion Realizada con Exito!!');
                                    location.href='Usuario_Admin.php';
                                    </script>";
                                    }
                            }	
                           
                            }
                                }

			
				
  }
  
  
  

?>

