<?php
$con=new mysqli("localhost","root",null, "dbusuarios");
$usu=$_POST["user"]; $usu=$con->real_escape_string($usu);
$pass=$_POST["pass"]; $pass=$con->real_escape_string($pass);
if ($con->connect_errno)
{
die("Error al establecer la conexión con la base de datos: " . $con->connect_error);
}
$registro=$con->query("DELETE FROM usuarios WHERE nombre='$usu' and password='$pass' ");
$nfilas = $registro->num_rows;
$con->close();
if ($nfilas > 0){
 session_start();
 $_SESSION["autentificado"]= "SI";
 $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
 header ("Location: ..\login.php");
}else {
 header("Location: ..\borrar.php");
}
?>