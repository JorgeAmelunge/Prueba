<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_A_Series{
 //constructor	
 	var $con;
 	function Datos_Gestionar_A_Series(){
 		$this->con=new DBManager;
 	}

	function Insertar_A_Serie($Codigo_Serie=0,$Codigo_Equipo=0,$Bonificacion=0){
   
            if($this->con->conectar()==true){			
			return mysql_query("insert into serie_equipo values(".$Codigo_Serie.",".$Codigo_Equipo.",0,".$Bonificacion.",0,0,0,0,0,0)");
		}
	}
        function Insertar_A_Serie_Vinculo($Codigo_Serie=0,$Codigo_Equipo=0,$PJ=0,$PTS=0,$PG=0,$PP=0,$PE=0,$GF=0,$GC=0,$Codigo_Vinculo=0){

            if($this->con->conectar()==true){			
			return mysql_query("insert into serie_equipo values(".$Codigo_Serie.",".$Codigo_Equipo.",".$PJ.",".$PTS.",".$PG.",".$PP.",".$PE.",".$GF.",".$GC.",".$Codigo_Vinculo.")");
		}
	}
	function Mostrar_Tabla_A_Serie($Codigo_Serie=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT serie.codigo_serie,serie.nombre as Nserie,equipo.nombre as Nequipo,equipo.codigo_equipo,torneo.nombre as Ntorneo,torneo.codigo_torneo,serie_equipo.pts FROM serie,equipo,serie_equipo,torneo where serie_equipo.codigo_serie=".$Codigo_Serie." and serie.codigo_serie=serie_equipo.codigo_serie  and equipo.codigo_equipo=serie_equipo.codigo_equipo and torneo.codigo_torneo=serie.codigo_torneo");
		}
	}
        
       
        
	function Eliminar_A_Serie($Id_serie=0,$Id_Equipo=0){
		if($this->con->conectar()==true){
			return mysql_query("delete from serie_equipo WHERE codigo_serie = ".$Id_serie." and codigo_equipo=".$Id_Equipo);
		}
	}
      
	function Asignar_puntaje_ganador($Codigo_Torneo=0,$Codigo_Equipo=0,$GF=0,$GC=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update serie_equipo,torneo,serie set serie_equipo.pj=serie_equipo.pj+1, serie_equipo.pg=serie_equipo.pg+1,serie_equipo.gf=serie_equipo.gf+".$GF.",serie_equipo.gc=serie_equipo.gc+".$GC." where torneo.codigo_torneo=".$Codigo_Torneo." and serie.codigo_torneo=torneo.codigo_torneo and serie_equipo.codigo_serie=serie.codigo_serie and serie_equipo.codigo_equipo=".$Codigo_Equipo);
		}
	}
     
       function Asignar_puntaje_perdedor($Codigo_Torneo=0,$Codigo_Equipo=0,$GF=0,$GC=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update serie_equipo,torneo,serie set serie_equipo.pj=serie_equipo.pj+1, serie_equipo.pp=serie_equipo.pp+1,serie_equipo.gf=serie_equipo.gf+".$GF.",serie_equipo.gc=serie_equipo.gc+".$GC." where torneo.codigo_torneo=".$Codigo_Torneo." and serie.codigo_torneo=torneo.codigo_torneo and serie_equipo.codigo_serie=serie.codigo_serie and serie_equipo.codigo_equipo=".$Codigo_Equipo);
		}
	}
        
       function Asignar_puntaje_empate($Codigo_Torneo=0,$Codigo_Equipo=0,$GF=0,$GC=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update serie_equipo,torneo,serie set serie_equipo.pj=serie_equipo.pj+1, serie_equipo.pe=serie_equipo.pe+1,serie_equipo.gf=serie_equipo.gf+".$GF.",serie_equipo.gc=serie_equipo.gc+".$GC." where torneo.codigo_torneo=".$Codigo_Torneo." and serie.codigo_torneo=torneo.codigo_torneo and serie_equipo.codigo_serie=serie.codigo_serie and serie_equipo.codigo_equipo=".$Codigo_Equipo);
		}
	}  
       	
	function mostrar_tabla_torneo($Codigo_Torneo=0,$codigo_Serie=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select equipo.codigo_equipo,equipo.nombre,serie_equipo.PG,serie_equipo.PE,serie_equipo.PP,serie_equipo.GF,serie_equipo.GC,((serie_equipo.PG*3)+serie_equipo.PE)+serie_equipo.PTS as PTS, if((serie_equipo.GF)<(serie_equipo.GC),-((serie_equipo.GC)-(serie_equipo.GF)),(serie_equipo.GF)-(serie_equipo.GC)) as DIF,(serie_equipo.PG+serie_equipo.PE+serie_equipo.PP) as PJ,serie_equipo.vinculo,torneo.comentario,serie_equipo.PTS as Bonificacion from serie_equipo,torneo,serie,equipo where torneo.codigo_torneo=".$Codigo_Torneo." and serie.codigo_torneo=torneo.codigo_torneo and serie_equipo.codigo_serie=serie.codigo_serie and serie.codigo_serie=".$codigo_Serie." and equipo.codigo_equipo=serie_equipo.codigo_equipo order by PTS desc,DIF desc,GF desc,GC desc;");
		}
	}
        function mostrar_tabla_torneo_vinculo($Codigo_Torneo=0,$codigo_Serie=0,$vinculo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select equipo.codigo_equipo,equipo.nombre,serie_equipo.PG+(select serie_equipo.pg from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo) as PG,
serie_equipo.PE+(select serie_equipo.pe from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo) as PE,
serie_equipo.PP+(select serie_equipo.pp from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo) as PP,
serie_equipo.GF+(select serie_equipo.gf from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo) as GF,
serie_equipo.GC+(select serie_equipo.gc from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo) as GC,
((serie_equipo.PG*3)+serie_equipo.PE)+(select ((serie_equipo.PG*3)+serie_equipo.PE) from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo) as PTS,
if((serie_equipo.GF+(select serie_equipo.gf from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo))<(serie_equipo.GC+(select serie_equipo.gc from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo)),
-((serie_equipo.GC+(select serie_equipo.gc from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo))
-(serie_equipo.GF+(select serie_equipo.gf from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo))),
(serie_equipo.GF+(select serie_equipo.gf from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo))-
(serie_equipo.GC+(select serie_equipo.gc from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo))) as DIF,
(serie_equipo.PG+serie_equipo.PE+serie_equipo.PP)+(select (serie_equipo.PG+serie_equipo.PE+serie_equipo.PP) as pj from serie_equipo where serie_equipo.codigo_serie=".$vinculo." and serie_equipo.codigo_equipo=equipo.codigo_equipo) as PJ from serie_equipo,torneo,serie,equipo where
torneo.codigo_torneo=".$Codigo_Torneo." and serie.codigo_torneo=torneo.codigo_torneo and serie_equipo.codigo_serie=serie.codigo_serie
and serie.codigo_serie=".$codigo_Serie." and equipo.codigo_equipo=serie_equipo.codigo_equipo order by PTS desc,DIF desc,GF asc;
");
		}
	}
        
        function mostrar_tabla_torneo_goleadores($Codigo_Torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT count(partidos_observaciones.codigo_alineacion) as goles,alineacion.nombre as jugador, equipo.nombre as equipo,equipo.codigo_equipo,sum(partidos_observaciones.minuto)as minuto FROM partidos_observaciones,alineacion,equipo,serie_equipo,serie where (partidos_observaciones.codigo_observacion=3 or partidos_observaciones.codigo_observacion=6) and alineacion.codigo_alineacion=partidos_observaciones.codigo_alineacion and equipo.codigo_equipo=alineacion.codigo_equipo and serie_equipo.codigo_equipo=equipo.codigo_equipo and serie.codigo_serie=serie_equipo.codigo_serie and serie.codigo_torneo=".$Codigo_Torneo." group by alineacion.codigo_alineacion order by goles desc,minuto;");
		}
	}
     
}
?>
