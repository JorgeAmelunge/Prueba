<?php
class Negocio_Estadio{
var $objD_Gestionar_Estadio;

	
        function Negocio_Estadio(){
              
		require('../../Datos/D_Gestionar_Estadio.php');              
		$this->objD_Gestionar_Estadio=new Datos_Gestionar_Estadio();
	}

  function Eliminar_Estadio($ID_Estadio=0){
      
    
			if($this->objD_Gestionar_Estadio->Eliminar_Estadio($ID_Estadio) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');
					 location.href='Estadios_Admin.php?#mundial';
					  </script>";
			}
			
			
  }
  
   
 function Insertar_Estadio($Nombre="",$Ciudad="",$Capacidad=0,$Departamento=""){
    if($this->objD_Gestionar_Estadio->Verificar_nombre($Nombre)==0){
        if($Nombre=="")
                echo "<script>alert('Inserte un Nombre!!');	
                location.href='Estadios_Admin.php?#mundial';
                </script>";
        else{	
            if($Ciudad=="")
               echo "<script>alert('Inserte Ciudad!!');	
                location.href='Estadios_Admin.php?#mundial';
                </script>";
            else{
            if($Capacidad==0){
               echo "<script>alert('Inserte una Capacidad!!');	
                location.href='Estadios_Admin.php?#mundial';
                </script>";
            }
            else{
                if($Departamento==""){
               echo "<script>alert('Inserte un Departamento!!');	
                location.href='Estadios_Admin.php?#mundial';
                </script>";
            }
            else{
                
                
                    if ( $this->objD_Gestionar_Estadio->Insertar_Estadio($Nombre,$Ciudad,$Capacidad,$Departamento) == true){ 

                    echo "<script>alert('Insercion Realizada con Exito!!');
                    location.href='Estadios_Admin.php?#mundial';
                    </script>";
                    }
            
            }
            
            }


            }
                }
    }
    else{
        echo "<script>alert('El nombre ya Existe!!');
                    location.href='Estadios_Admin.php?#mundial';
                    </script>";
    }

  }
  
    

  
  function Tabla_Estadio(){
  
  return $consulta=$this->objD_Gestionar_Estadio->Mostrar_Tabla_Estadio();
 
	
  }  
  
   function Combo_Estadio(){
  
   $consulta=$this->objD_Gestionar_Estadio->Mostrar_Tabla_Estadio();
  echo "<option value=\"0\">Seleccione Estadio</option>\n"; 
     if($consulta) {
          
  while( $Combo_Estadio = mysql_fetch_array($consulta) ){
          
             echo "<option  value=\"".$Combo_Estadio['codigo_estadio']."\">".$Combo_Estadio['nombre']."</option>\n"; 
        }
        }
  }  

  function Modificar_Estadio($Codigo_Estadio=0,$Nombre="",$Ciudad="",$Capacidad=0,$Departamento=""){

		  if($Nombre=="")
                echo "<script>alert('Inserte un Nombre!!');	
                location.href='Estadios_Admin.php?#mundial';
                </script>";
        else{	
            if($Ciudad=="")
              echo  "<script>alert('Inserte Ciudad!!');	
                location.href='Estadios_Admin.php?#mundial';
                </script>";
            else{
            if($Capacidad==0){
              echo  "<script>alert('Inserte una Capacidad!!');	
                location.href='Estadios_Admin.php?#mundial';
                </script>";
            }
            else{
                if($Departamento==""){
               echo "<script>alert('Inserte un Departamento!!');	
                location.href='Estadios_Admin.php?#mundial';
                </script>";
            }
            else{
                
                
                    if ( $this->objD_Gestionar_Estadio->Modificar_Estadio($Codigo_Estadio,$Nombre,$Ciudad,$Capacidad,$Departamento) == true){ 

                    echo "<script>alert('Modificacion Realizada con Exito!!');
                    location.href='Estadios_Admin.php?#mundial';
                    </script>";
                    }
            
            }
            
            }


            }
                }

				
  }
  

}
?>

