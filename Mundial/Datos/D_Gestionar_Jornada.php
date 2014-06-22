<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Jornada{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Jornada(){
 		$this->con=new DBManager;
 	}

	function Insertar_Jornada($Codigo_Torneo=0,$FechaI="",$FechaF="",$Nombre=""){
   
            if($this->con->conectar()==true){			
			return mysql_query("insert into jornada values(0,".$Codigo_Torneo.",'".$FechaI."','".$FechaF."','".$Nombre."')");
		}
	}	
	function Mostrar_Tabla_Jornada($Codigo_Torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT jornada.codigo_Jornada,jornada.fecha_inicio,jornada.fecha_fin,jornada.nombre as Njornada,torneo.nombre as Ntorneo,torneo.codigo_torneo FROM jornada,torneo where jornada.codigo_torneo=".$Codigo_Torneo."  and torneo.codigo_torneo=jornada.codigo_torneo order by jornada.codigo_torneo asc");
		}
	}
        
        function Mostrar_Cant_Jornada($Codigo_Torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT torneo.cantidad_fechas-count(*) as cantidad FROM jornada,torneo where jornada.codigo_torneo=".$Codigo_Torneo." and torneo.codigo_torneo=jornada.codigo_torneo");
		}
	}
        function Verificar_nombre($nombre="",$FechaI="",$FechaF=""){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT * FROM jornada where nombre='".$nombre."' and ((datediff(fecha_inicio,'".$FechaF."')<0 and datediff(fecha_fin,'".$FechaI."')>0) or (datediff(fecha_inicio,'".$FechaF."')>0 and datediff(fecha_fin,'".$FechaI."')<0))");
                        return mysql_num_rows($result);
		}
	}
        
	function Eliminar_jornada($Id_jornada=0){
		if($this->con->conectar()==true){
			return mysql_query("delete from jornada WHERE codigo_jornada = ".$Id_jornada);
		}
	}
      
	
        function Modificar_Jornada($ID_jornada=0,$FechaI="",$FechaF="",$Nombre=""){
		if($this->con->conectar()==true){
			
			return mysql_query("update jornada set fecha_inicio='".$FechaI."',fecha_fin='".$FechaF."',nombre='".$Nombre."' where codigo_jornada = ".$ID_jornada);
		}
	}
       
         function Verificar_fechas($FechaI="",$FechaF="",$Codigo_Torneo=0){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT * FROM torneo where torneo.codigo_torneo=".$Codigo_Torneo." and datediff(torneo.fecha_inicio,'".$FechaF."')<=0 and datediff(torneo.fecha_final,'".$FechaI."')>=0");
                        return mysql_num_rows($result);
		}
	}
        
       	function Mostrar_Combo_Jornada($Codigo_Torneo=0){
            if($this->con->conectar()==true){		
		
	$consulta = mysql_query("SELECT jornada.codigo_Jornada,jornada.fecha_inicio,jornada.fecha_fin,jornada.nombre as Njornada,torneo.nombre as Ntorneo,torneo.codigo_torneo FROM jornada,torneo where jornada.codigo_torneo=".$Codigo_Torneo."  and torneo.codigo_torneo=jornada.codigo_torneo order by jornada.codigo_torneo asc");
		$num_total_registros = mysql_num_rows($consulta);
		if($num_total_registros>0)
		{
			$jornadas = array();
			while($jornada = mysql_fetch_array($consulta))
			{
				$code = $jornada["codigo_Jornada"];
				$name = $jornada["Njornada"];                                				
				$jornadas[$code]=$name;
			}
			return $jornadas;
		}
		else
		{
			return false;
		}	
			
		
	}
        }
}
?>
