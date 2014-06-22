<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Torneo{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Torneo(){
            
 		$this->con=new DBManager;
 	}

	function Insertar_Torneo($FechaI="",$FechaF="",$Nombre="",$Cant_Fechas=0,$Comentario="",$Cant_Series=0){
            
            if($this->con->conectar()==true){			
			return mysql_query("insert into torneo values(0,'".$FechaI."','".$FechaF."','".$Nombre."',".$Cant_Fechas.",'".$Comentario."',".$Cant_Series.",'Habilitado')");
		}
	}	
	function Mostrar_Tabla_Torneo(){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT codigo_torneo,fecha_inicio,fecha_final,nombre,cantidad_fechas,comentario,cantidad_series FROM torneo where Observacion='Habilitado' order by fecha_inicio desc");
		}
	}
        function Mostrar_Tabla_Torneo_Equipo($ID_Equipo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT torneo.codigo_torneo,torneo.fecha_inicio,torneo.fecha_final,torneo.nombre,torneo.cantidad_fechas,torneo.comentario,torneo.cantidad_series FROM torneo,serie,serie_equipo where torneo.Observacion='Habilitado' and torneo.codigo_torneo=serie.codigo_torneo and serie.codigo_serie=serie_equipo.codigo_serie and serie_equipo.codigo_equipo=".$ID_Equipo." order by torneo.fecha_inicio desc");
		}
	}
        function Verificar_nombre($nombre="",$FechaI="",$FechaF=""){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT * FROM torneo where Observacion='Habilitado' and nombre='".$nombre."' and ((datediff(fecha_inicio,'".$FechaF."')<0 and datediff(fecha_final,'".$FechaI."')>0) or (datediff(fecha_inicio,'".$FechaF."')>0 and datediff(fecha_final,'".$FechaI."')<0)) order by codigo_torneo asc");
                        return mysql_num_rows($result);
		}
	}
         
        
	function Eliminar_Torneo($Id_torneo=0){
		if($this->con->conectar()==true){
			return mysql_query("update torneo set Observacion= 'DesHabilitado' WHERE codigo_torneo = ".$Id_torneo);
		}
	}
      
	
        function Modificar_Torneo($ID_torneo=0,$FechaI="",$FechaF="",$Nombre="",$Cant_Fechas=0,$Comentario="",$Cant_Series=0){
	
            if($this->con->conectar()==true){
			
			return mysql_query("update torneo set fecha_inicio='".$FechaI."',fecha_final='".$FechaF."',nombre='".$Nombre."',cantidad_fechas=".$Cant_Fechas.",comentario='".$Comentario."',cantidad_series=".$Cant_Series." where codigo_torneo = ".$ID_torneo);
		}
	}
       
        function Cargar_Combo_Torneo()
	{
		if($this->con->conectar()==true){
		$consulta = mysql_query("SELECT codigo_torneo,fecha_inicio,fecha_final,nombre,cantidad_fechas,comentario,cantidad_series FROM torneo where Observacion='Habilitado' order by fecha_inicio desc");
		$num_total_registros = mysql_num_rows($consulta);
		if($num_total_registros>0)
		{
			$Torneos = array();
			while($torneo = mysql_fetch_array($consulta))
			{
				$code = $torneo["codigo_torneo"];
				$name = $torneo["nombre"];				
				$Torneos[$code]=$name;
			}
			return $Torneos;
		}
		else
		{
			return false;
		}
		}
	}
       	
	
}
?>
