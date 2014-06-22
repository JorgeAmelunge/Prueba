<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Partido_Arbitro{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Partido_Arbitro(){
 		$this->con=new DBManager;
 	}

	function Insertar_Partido_Arbitro($Id_Partido=0,$ID_Arbitro=0,$Observacion=""){

            if($this->con->conectar()==true){			
			return mysql_query("insert into partido_arbitro values(".$ID_Arbitro.",".$Id_Partido.",'".$Observacion."')");
		}
	}	
	function Mostrar_Tabla_partido_Arbitro($ID_Partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT arbitro.codigo_arbitro,arbitro.nombre,partido_arbitro.Observacion FROM arbitro,partido_arbitro where partido_arbitro.codigo_partido=".$ID_Partido." and arbitro.codigo_arbitro=partido_arbitro.codigo_arbitro");
		}
	}
        
	function Eliminar_Partido_Arbitro($Id_Partido=0,$ID_Arbitro=0){
		if($this->con->conectar()==true){
			return mysql_query("delete from partido_arbitro WHERE codigo_arbitro = ".$ID_Arbitro." and codigo_Partido=".$Id_Partido);
		}
	}
      
	
               
       function Verificar_Arbitros($Id_Partido=0){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT arbitro.codigo_arbitro,arbitro.nombre FROM arbitro where arbitro.codigo_arbitro not in( select partido_arbitro.codigo_arbitro from partido_arbitro where partido_arbitro.codigo_partido=".$Id_Partido.")");
                        return ($result);
		}
	}
       	 
       	
	
}
?>
