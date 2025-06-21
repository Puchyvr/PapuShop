<?php 
session_start();
session_unset(); //Limpia todas las sesión que accede
session_destroy(); //Destruye la sesión

header("location: ../index.php");
exit;

?>