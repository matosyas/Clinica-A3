<?php
include ('config.php');

if (@$_REQUEST['botao']=="Entrar")
{
	$matricula = $_POST['matricula'];
	$senha = $_POST['senha'];
	
	$query = "SELECT * FROM cad WHERE matricula = '$matricula' AND senha = '$senha' ";
	$result = mysqli_query($con, $query);
	while ($coluna=mysqli_fetch_array($result)) 
	{
		header("Location: relatoriopac.php"); 
		exit; 
	}
}


?>

<html>
<body>
<form action=# method=post>

Número da Matrícula: <input type=text name=matricula>
Senha: <input type=password name=senha>
<input type=submit name=botao value=Entrar>

</form>
