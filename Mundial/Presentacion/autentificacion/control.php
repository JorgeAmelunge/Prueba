<?
     /* A continuación, realizamos la conexión con nuestra base de datos en MySQL */
  
$link = mysql_connect("127.0.0.1","root","");
     mysql_select_db("mundiales", $link);
     /* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función 
     htmlentities para evitar inyecciones SQL. */
     $myusuario = mysql_query("select * from usuarios 
                                 where username =  '".($_POST["usuario"])."'",$link);
     $nmyusuario = mysql_num_rows($myusuario);

     //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
     if($nmyusuario != 0){
         /* $sql = "select username
               from usuarios
               where 
               and username = '".($_POST["usuario"])."' 
               and clave = '".md5(($_POST["clave"]))."'";*/
          $myclave = mysql_query("select * from usuarios where username =  '".($_POST["usuario"])."' and clave='".($_POST["clave"])."'",$link);
          $nmyclave = mysql_num_rows($myclave);

          //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo.
          if($nmyclave != 0){
               session_start();
               //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario
               $_SESSION["autentica"] = "SIP";
               $_SESSION["usuarioactual"] = $_POST["usuario"];//mysql_result($myusuario,0,0); //nombre del usuario logueado.
               //Direccionamos a nuestra página principal del sistema.
              echo"<script>
               window.location.href=\"../Administracion/Torneos_Admin.php\"</script>"; 
          }
          else{
               echo"<script>alert('La contrase\u00f1a del usuario no es correcta.');
               window.location.href=\"../Administracion/admin.php\"</script>"; 
          }
     }else{
          echo"<script>alert('El usuario no existe.');window.location.href=\"../Administracion/admin.php\"</script>";
     }
     mysql_close($link);
?>
