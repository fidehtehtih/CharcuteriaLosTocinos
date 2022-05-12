<?php 
$con=new mysqli("localhost","root",null, "dbusuarios");

$usu=$_POST["user"]; $usu=$con->real_escape_string($usu);
$pass=$_POST["pass2"];  $pass=$con->real_escape_string($pass);
$nuevopass=$_POST["pass2"];
$mod=$con->query("UPDATE usuarios SET password = '$nuevopass' WHERE nombre = '$usu'");
$nfilas = $mod->num_rows;
$con->close();
if ($nfilas > 0){
 session_start();
 $_SESSION["autentificado"]= "SI";
 $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
 header ("Location: ..\login.php");
}else {
 header("Location: ..\modificar.php");
}
?>