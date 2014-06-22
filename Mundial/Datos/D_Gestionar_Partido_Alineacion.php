<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Partido_Alineacion{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Partido_Alineacion(){
 		$this->con=new DBManager;
 	}

	function Insertar_Partido_Alineacion($ID_Alineacion=0,$ID_Partido=0,$Observacion="",$Camiseta=0){

            if($this->con->conectar()==true){			
			return mysql_query("insert into alineacion_partido values(".$ID_Alineacion.",".$ID_Partido.",'".$Observacion."',".$Camiseta.")");
		}
	}	
	function Mostrar_Tabla_partido_Alineacion($ID_Partido=0,$id_Equipo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT alineacion.codigo_alineacion,alineacion.Nombre as anombre,equipo.nombre as enombre,alineacion_partido.observacion,alineacion_partido.camiseta FROM alineacion_partido,alineacion,equipo where alineacion_partido.codigo_alineacion=alineacion.codigo_alineacion and alineacion.codigo_equipo=equipo.codigo_equipo and alineacion_partido.codigo_partido=".$ID_Partido." and equipo.codigo_equipo=".$id_Equipo." order by alineacion_partido.observacion");
		}
	}
        
	function Eliminar_Partido_Alineacion($ID_Partido=0,$id_Alineacion=0){
		if($this->con->conectar()==true){
			return mysql_query("delete from alineacion_partido WHERE codigo_alineacion = ".$id_Alineacion." and codigo_Partido=".$ID_Partido);
		}
	}
      
	
               
      
       	 
       	
	
}
?>
