<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Series{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Series(){
 		$this->con=new DBManager;
 	}

	function Insertar_Serie($Codigo_Torneo=0,$Nombre=""){
   
            if($this->con->conectar()==true){			
			return mysql_query("insert into serie values(0,".$Codigo_Torneo.",'".$Nombre."','Habilitado')");
		}
	}	
	function Mostrar_Tabla_Serie($Codigo_Torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT serie.codigo_serie,serie.nombre as Nserie,torneo.nombre as Ntorneo,torneo.codigo_torneo FROM serie,torneo where serie.codigo_torneo=".$Codigo_Torneo."  and torneo.codigo_torneo=serie.codigo_torneo and serie.observacion='Habilitado' order by serie.codigo_torneo asc");
		}
	}
        
        function Mostrar_Cant_Series($Codigo_Torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT torneo.cantidad_series-count(*) as cantidad FROM serie,torneo where serie.codigo_torneo=".$Codigo_Torneo." and torneo.codigo_torneo=serie.codigo_torneo and serie.observacion='Habilitado'");
		}
	}
        function Verificar_nombre($Codigo_Torneo=0,$nombre=""){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT count(*) as cont FROM serie where nombre='".$nombre."' and observacion='Habilitado' and codigo_torneo=".$Codigo_Torneo );
                        if($result) {
                        while( $Tabla_Series = mysql_fetch_array($result) ){                            
                            if($Tabla_Series['cont']>0)
                                return true;
                            else
                                return false;
                        }
                        }
                        
		}
	}
        
	function Eliminar_Serie($Id_serie=0){
		if($this->con->conectar()==true){
			return mysql_query("update serie set observacion='DesHabilitado' where codigo_serie = ".$Id_serie);
		}
	}
      
	
        function Modificar_serie($ID_serie=0,$Nombre=""){
		if($this->con->conectar()==true){
			
			return mysql_query("update serie set nombre='".$Nombre."' where codigo_serie = ".$ID_serie);
		}
	}
       
        
        	function Mostrar_Combo_Serie($Codigo_Torneo=0){
            if($this->con->conectar()==true){		
		
	$consulta = mysql_query("SELECT serie.codigo_serie,serie.nombre as Nserie,torneo.nombre as Ntorneo,torneo.codigo_torneo FROM serie,torneo where serie.codigo_torneo=".$Codigo_Torneo."  and torneo.codigo_torneo=serie.codigo_torneo and serie.observacion='Habilitado' order by serie.codigo_torneo asc");
		$num_total_registros = mysql_num_rows($consulta);
		if($num_total_registros>0)
		{
			$series = array();
			while($serie = mysql_fetch_array($consulta))
			{
				$code = $serie["codigo_serie"];
				$name = $serie["Nserie"];                                				
				$series[$code]=$name;
			}
			return $series;
		}
		else
		{
			return false;
		}	
			
		
	}
        }
       	
	
}
?>
