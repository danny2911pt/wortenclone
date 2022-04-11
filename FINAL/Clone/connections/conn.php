<?php
//Estabelecer Ligação ao servidor SQL

$servername="localhost";
$username="master";
$password="123123";

//Criar a Ligação
$conn = mysqli_connect($servername, $username, $password);
$conn->set_charset('utf8');

// tells the pdo connection to deliver UTF-8 encoded strings.
$dsn = "mysql:host=$servername;dbname='wortas';charset=utf8";

//Verificar a Ligação
if(!$conn){//Se nao conseguir ligar
	die("Erro de Ligação: ". mysqli_connect_error());
}
mysqli_select_db($conn,'wortas');
?>