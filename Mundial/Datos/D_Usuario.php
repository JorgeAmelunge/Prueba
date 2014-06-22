<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Usuario{
 //constructor	
 	var $con;
 	function Datos_Usuario(){
 		$this->con=new DBManager;
 	}

	function Insertar_Usuarios($ID_Empresa=0,$User="",$Clave=""){
		if($this->con->conectar()==true){
			
			return mysql_query("INSERT INTO usuarios VALUES (0,'".$User."','".$Clave."')");
		}
	}

	
	
		
	function Mostrar_Tabla_usuarios(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT idusuarios,username,clave FROM usuarios");
		}
	}
	
	
       
	
        function Modificar_usuario($id=0,$user="",$Clave=""){
		if($this->con->conectar()==true){
			
			return mysql_query("UPDATE usuarios SET username='".$user."',clave='".$Clave."' WHERE idusuarios = ".$id);
		}
	}
        
        
       	
	
}
?>
