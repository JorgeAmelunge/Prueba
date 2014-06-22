<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Arbitro{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Arbitro(){
 		$this->con=new DBManager;
 	}

	function Insertar_Arbitro($Nombre="",$Ciudad=""){

            if($this->con->conectar()==true){			
			return mysql_query("insert into arbitro values(0,'".$Nombre."','".$Ciudad."','Habilitado')");
		}
	}	
	function Mostrar_Tabla_Arbitro(){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT codigo_arbitro,nombre,ciudad FROM arbitro where Observacion='Habilitado' order by codigo_arbitro asc");
		}
	}
        
	function Eliminar_Arbitro($Id_arbitro=0){
		if($this->con->conectar()==true){
			return mysql_query("update arbitro set Observacion= 'DesHabilitado' WHERE codigo_arbitro = ".$Id_arbitro);
		}
	}
      
	
        function Modificar_Arbitro($Id_arbitro=0,$Nombre="",$Ciudad=""){
		if($this->con->conectar()==true){
			
			return mysql_query("update arbitro set nombre='".$Nombre."',ciudad='".$Ciudad."' where codigo_arbitro = ".$Id_arbitro);
		}
	}
       
       function Verificar_nombre($nombre=""){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT * FROM arbitro where nombre='".$nombre."' and observacion='Habilitado'");
                        return mysql_num_rows($result);
		}
	}
       	 
       	
	
}
?>
