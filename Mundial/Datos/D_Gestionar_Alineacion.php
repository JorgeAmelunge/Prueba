<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Alineacion{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Alineacion(){
 		$this->con=new DBManager;
 	}

	function Insertar_Alineacion($Codigo_Equipo=0,$Nombre="",$Pais="",$fecha=""){

            if($this->con->conectar()==true){			
			return mysql_query("insert into alineacion values(0,".$Codigo_Equipo.",'".$Nombre."','".$Pais."','".$fecha."','Habilitado')");
		}
	}	
	function Mostrar_Tabla_Alineacion(){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT alineacion.codigo_alineacion,alineacion.codigo_equipo,alineacion.nombre,alineacion.pais,alineacion.fecha_nacimiento,equipo.nombre as equipos FROM alineacion,equipo where alineacion.Observacion='Habilitado' and equipo.codigo_equipo=alineacion.codigo_equipo order by equipo.nombre asc");
		}
	}
        
        function Mostrar_Tabla_Alineacion_Partido($ID_Partido=0,$ID_Equipo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT alineacion.codigo_alineacion,alineacion.codigo_equipo,alineacion.nombre,alineacion.pais,alineacion.fecha_nacimiento,equipo.nombre as equipos FROM alineacion,equipo where alineacion.Observacion='Habilitado' and equipo.codigo_equipo=alineacion.codigo_equipo and alineacion.codigo_alineacion not in (select alineacion_partido.codigo_alineacion from alineacion_partido where alineacion_partido.codigo_partido=".$ID_Partido." )  and equipo.codigo_equipo=".$ID_Equipo." order by equipo.nombre asc");
		}
	}
        
	function Eliminar_Alineacion($Id_alineacion=0){
		if($this->con->conectar()==true){
			return mysql_query("update alineacion set Observacion= 'DesHabilitado' WHERE codigo_alineacion = ".$Id_alineacion);
		}
	}
      
	
        function Modificar_Alineacion($ID_alineacion=0,$ID_equipo=0,$Nombre="",$Pais="",$fecha=""){
		if($this->con->conectar()==true){
		
			return mysql_query("update alineacion set nombre='".$Nombre."',pais='".$Pais."',fecha_nacimiento='".$fecha."',codigo_equipo=".$ID_equipo." where codigo_alineacion = ".$ID_alineacion);
		}
	}
       
        function Verificar_nombre($nombre="",$Codigo_Equipo=0){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT * FROM alineacion where nombre='".$nombre."' and observacion='Habilitado' and codigo_equipo=".$Codigo_Equipo);
                        return mysql_num_rows($result);
		}
	}
       	
	
}
?>
