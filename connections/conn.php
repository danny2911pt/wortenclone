<?php
//Estabelecer Ligação ao servidor SQL

$servername="localhost";
$username="root";
$password="";

//Criar a Ligação
$conn = mysqli_connect($servername, $username, $password);

//Verificar a Ligação
if(!$conn){//Se nao conseguir ligar
	die("Erro de Ligação: ". mysqli_connect_error());
}
mysqli_select_db($conn,'wortas');

?>