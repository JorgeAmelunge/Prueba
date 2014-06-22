<?
@session_start();

if($_SESSION["autentica"] != "SIP"){
	header("Location: ../Administracion/admin.php");
	exit();
}
?>
