<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Equipos{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Equipos(){
 		$this->con=new DBManager;
 	}

	function Insertar_Equipo($Nombre="",$Escudo="",$Ciudad="",$Presidente="",$Fecha="",$Direccion="",$Telefonos="",$WEB="",$Email=""){
		
            if($this->con->conectar()==true){			
			return mysql_query("insert into equipo values(0,'".$Nombre."','".$Escudo."','".$Ciudad."','".$Presidente."','".$Fecha."','".$Direccion."','".$Telefonos."','".$WEB."','".$Email."','Habilitado')");
		}
	}	
	function Mostrar_Tabla_Equipos(){ 
		if($this->con->conectar()==true){
			return mysql_query("select codigo_equipo,nombre,escudo,ciudad,presidente,fecha_fundacion,direccion,telefonos,web,email from equipo where Observacion='Habilitado' order by nombre asc");
		}
	}
        function Mostrar_Tabla_Equipos_Especifico($ID_Equipo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select codigo_equipo,nombre,escudo,ciudad,presidente,fecha_fundacion,direccion,telefonos,web,email from equipo where codigo_equipo=".$ID_Equipo." and Observacion='Habilitado' order by nombre asc");
		}
	}
        function Mostrar_Tabla_Equipos_series($ID_torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select equipo.codigo_equipo,equipo.nombre from equipo where equipo.observacion='Habilitado' and equipo.codigo_equipo not in (select serie_equipo.codigo_equipo from serie_equipo,serie where serie.codigo_torneo=".$ID_torneo." and serie_equipo.codigo_serie=serie.codigo_serie) order by equipo.nombre asc");
		}
	}
        function Mostrar_Tabla_Equipos_Partido($ID_torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select equipo.codigo_equipo,equipo.nombre from equipo where equipo.codigo_equipo in (select serie_equipo.codigo_equipo from serie_equipo,serie where serie.codigo_torneo=".$ID_torneo." and serie_equipo.codigo_serie=serie.codigo_serie) order by equipo.nombre asc");
		}
	}
        function Mostrar_Nombre_Equipos(){ 
		if($this->con->conectar()==true){
			return mysql_query("select codigo_equipo,nombre from equipo where Observacion='Habilitado' order by nombre asc");
		}
	}
        
	function Eliminar_Equipo($Id_equipo=0){
		if($this->con->conectar()==true){
			return mysql_query("update equipo set Observacion= 'DesHabilitado' WHERE codigo_equipo = ".$Id_equipo);
		}
	}
        function Obtener_Escudo($Id_equipo=0){
		if($this->con->conectar()==true){
			return mysql_query("select escudo from equipo where codigo_equipo=".$Id_equipo);
		}
	}
	
        function Modificar_equipo($ID_equipo=0,$Nombre="",$Escudo="",$Ciudad="",$Presidente="",$Fecha="",$Direccion="",$Telefonos="",$WEB="",$Email=""){
		if($this->con->conectar()==true){
			
			return mysql_query("update equipo set nombre='".$Nombre."',escudo='".$Escudo."',ciudad='".$Ciudad."',presidente='".$Presidente."',fecha_fundacion='".$Fecha."',direccion='".$Direccion."',telefonos='".$Telefonos."',web='".$WEB."',email='".$Email."' where codigo_equipo = ".$ID_equipo);
		}
	}
        function Modificar_Equipo_S_Escudo($ID_equipo=0,$Nombre="",$Ciudad="",$Presidente="",$Fecha="",$Direccion="",$Telefonos="",$WEB="",$Email=""){
		if($this->con->conectar()==true){
			return mysql_query("update equipo set nombre='".$Nombre."',ciudad='".$Ciudad."',presidente='".$Presidente."',fecha_fundacion='".$Fecha."',direccion='".$Direccion."',telefonos='".$Telefonos."',web='".$WEB."',email='".$Email."' where codigo_equipo = ".$ID_equipo);
		}
	}
        
       		function Mostrar_Combo_Equipo($ID_torneo=0){
            if($this->con->conectar()==true){		
		
	$consulta = mysql_query("select equipo.codigo_equipo,equipo.nombre from equipo where equipo.observacion='Habilitado' and equipo.codigo_equipo not in (select serie_equipo.codigo_equipo from serie_equipo,serie where serie.codigo_torneo=".$ID_torneo." and serie_equipo.codigo_serie=serie.codigo_serie) order by equipo.nombre asc");
		$num_total_registros = mysql_num_rows($consulta);
		if($num_total_registros>0)
		{
			$equipos = array();
			while($equipo = mysql_fetch_array($consulta))
			{
				$code = $equipo["codigo_equipo"];
				$name = $equipo["equipo"];                                				
				$equipos[$code]=$name;
			}
			return $equipos;
		}
		else
		{
			return false;
		}	
			
		
	}
        }
	
}
?>
