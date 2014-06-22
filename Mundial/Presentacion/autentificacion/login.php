<?php
    $Link = mysql_connect("127.0.0.1","root","");
     mysql_select_db("apuestas", $Link);
     /* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función 
     htmlentities para evitar inyecciones SQL. */
     $MyUsuario = mysql_query("select * 
                               from usuario 
                               where username =  '".($_POST["usuario"])."'",$Link);
     $NumMyUsuario = mysql_num_rows($MyUsuario);

     //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
     if($NumMyUsuario != 0){
          $MyClave = mysql_query("select idusuario,username,clave 
                                  from usuario 
                                  where username =  '".($_POST["usuario"])."' and clave='".($_POST["clave"])."'",$Link);
          $NumMyClave2 = mysql_num_rows($MyClave);
          $DatosConsulta=  mysql_fetch_array($MyClave);
          //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo.
          if($NumMyClave2 != 0){
               session_start();
               //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario
               $_SESSION["autentica"] = "SIP";
               $_SESSION["idusuario"] = $DatosConsulta['idusuario'];
               $_SESSION["usuarioactual"] = $_POST["usuario"];//mysql_result($myusuario,0,0); //nombre del usuario logueado.
               //Direccionamos a nuestra página principal del sistema.
              echo"<script>window.location.href=\"../Administracion/Torneos_Admin.php\"; 
                  alert('Acceso Correcto. Bienvenido: ".$_SESSION["usuarioactual"]."')</script>"; 
          }
          else{
               echo"<script>alert('La contrase\u00f1a del usuario no es correcta.');
               window.location.href=\"../Administracion/Admin_User.php\"</script>"; 
          }
     }else{
          echo"<script>alert('El usuario no existe.');
              window.location.href=\"../Administracion/Admin_User.php\"</script>";
     }
     mysql_close($Link);
?>
