<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Partidos{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Partidos(){
 		$this->con=new DBManager;
 	}

	function Insertar_Partido($Codigo_jornada=0,$Codigo_Estadio=0,$Codigo_Local=0,$Codigo_Visitante=0,$Fecha="",$Hora=""){
   
            if($this->con->conectar()==true){			
			return mysql_query("insert into partidos values(0,".$Codigo_jornada.",".$Codigo_Estadio.",".$Codigo_Local.",".$Codigo_Visitante.",'".$Fecha."','".$Hora."',0,0,0,0,0)");
		}
	}	
	function Mostrar_Tabla_Partido($Codigo_Jornada=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select partidos.pts as pts,partidos.codigo_partido,jornada.codigo_jornada,torneo.codigo_torneo,torneo.nombre as torneo,jornada.nombre as jornada,estadio.nombre as Estadio,estadio.capacidad as estadio_capacidad,estadio.ciudad as estadio_ciudad,(select equipo.nombre from equipo where equipo.codigo_equipo=partidos.codigo_local)as ELocal,(select equipo.codigo_equipo from equipo where equipo.codigo_equipo=partidos.codigo_local)as codigolocal,(select equipo.escudo from equipo where equipo.codigo_equipo=partidos.codigo_local)as EscudoLocal,(select equipo.nombre from equipo where equipo.codigo_equipo=partidos.codigo_visitante)as EVisita,(select equipo.escudo from equipo where equipo.codigo_equipo=partidos.codigo_visitante) as EscudoVisitante,(select equipo.codigo_equipo from equipo where equipo.codigo_equipo=partidos.codigo_visitante) as codigovisitante,partidos.fecha,partidos.hora,if(partidos.penal_local>0 || partidos.penal_visitante>0,concat(partidos.marcador_local,' (',partidos.penal_local,')'),partidos.marcador_local) as 'marcador_local',if(partidos.penal_local>0 || partidos.penal_visitante>0,concat(partidos.marcador_visitante,' (',partidos.penal_visitante,')'),partidos.marcador_visitante) as 'marcador_visitante' from partidos,jornada,torneo,estadio where partidos.codigo_jornada=".$Codigo_Jornada." and jornada.codigo_jornada=partidos.codigo_jornada and torneo.codigo_torneo=jornada.codigo_torneo and estadio.codigo_estadio=partidos.codigo_estadio; ");
		}
	}
        function Mostrar_Tabla_Partido_detalle($Codigo_Jornada=0,$codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select partidos.codigo_local,partidos.codigo_visitante,partidos.codigo_partido,jornada.codigo_jornada,torneo.codigo_torneo,torneo.nombre as torneo,jornada.nombre as jornada,estadio.nombre as estadio,estadio.capacidad,estadio.ciudad,estadio.departamento,(select equipo.nombre from equipo where equipo.codigo_equipo=partidos.codigo_local)as ELocal,(select equipo.escudo from equipo where equipo.codigo_equipo=partidos.codigo_local)as EscudoLocal,(select equipo.nombre from equipo where equipo.codigo_equipo=partidos.codigo_visitante)as EVisita,(select equipo.escudo from equipo where equipo.codigo_equipo=partidos.codigo_visitante) as EscudoVisitante,partidos.fecha,partidos.hora,partidos.marcador_local,partidos.marcador_visitante,partidos.pts from partidos,jornada,torneo,estadio where partidos.codigo_partido=".$codigo_partido." and partidos.codigo_jornada=".$Codigo_Jornada." and jornada.codigo_jornada=partidos.codigo_jornada and torneo.codigo_torneo=jornada.codigo_torneo and estadio.codigo_estadio=partidos.codigo_estadio; ");
		}
	}
         function Mostrar_Tabla_Partido_detallado($codigo_partido=0){ 
             
		if($this->con->conectar()==true){
			return mysql_query("select partidos.pts,partidos.codigo_partido,jornada.codigo_jornada,torneo.codigo_torneo,torneo.nombre as torneo,jornada.nombre as jornada,estadio.nombre
as estadio,estadio.capacidad,estadio.ciudad,estadio.departamento,partidos.codigo_local
as ELocal,(select equipo.escudo from equipo where equipo.codigo_equipo=partidos.codigo_local)as EscudoLocal,partidos.codigo_visitante as EVisita,(select equipo.escudo from equipo where equipo.codigo_equipo=partidos.codigo_visitante)
  as EscudoVisitante,partidos.fecha,partidos.hora,partidos.marcador_local,partidos.marcador_visitante from partidos,jornada,torneo,estadio
  where partidos.codigo_partido=".$codigo_partido." and jornada.codigo_jornada=partidos.codigo_jornada and torneo.codigo_torneo=jornada.codigo_torneo and estadio.codigo_estadio=partidos.codigo_estadio;");
		}
	}
        
        function Insertar_gol_Local($codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update partidos set marcador_local=marcador_local+1 where codigo_partido=".$codigo_partido."; ");
		}
	}
        function Insertar_gol_Visitante($codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update partidos set marcador_visitante=marcador_visitante+1 where codigo_partido=".$codigo_partido."; ");
		}
	}
	function Insertar_penal_Local($codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update partidos set penal_local=penal_local+1 where codigo_partido=".$codigo_partido."; ");
		}
	}
        function Insertar_penal_Visitante($codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update partidos set penal_visitante=penal_visitante+1 where codigo_partido=".$codigo_partido."; ");
		}
	}
        function Insertar_puntos($codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update partidos set pts=1 where codigo_partido=".$codigo_partido."; ");
		}
	}
        
       
        
	function Eliminar_Partido($Id_partido=0){
		if($this->con->conectar()==true){
			return mysql_query("delete from partidos WHERE codigo_partido = ".$Id_partido);
		}
	}
      
	
      function Verificar_fechas($FechaI="",$FechaF=""){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT * FROM jornada,torneo where jornada.codigo_torneo=torneo.codigo_torneo and datediff(torneo.fecha_inicio,'".$FechaF."')<=0 and datediff(torneo.fecha_final,'".$FechaI."')>=0");
                        return mysql_num_rows($result);
		}
	}
        
       
        
        
       	
	
}
?>
