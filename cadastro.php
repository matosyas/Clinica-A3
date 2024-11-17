<html>

<head>
<title>Cadastro Estagiário/Orientador</title>
<?php include ('config.php');  ?>
</head>

<body>
<?php
$id = @$_REQUEST['id'];

if (@$_REQUEST['botao'] == "Excluir") {
		$query_excluir = "
			DELETE FROM cad WHERE id='$id'
		";
		$result_excluir = mysqli_query($con, $query_excluir);
		
		if ($result_excluir) echo "<h2> Registro excluido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui excluir!!!</h2>";
}

if (@$_REQUEST['id'] and !$_REQUEST['botao'])
{
	$query = "
		SELECT * FROM cad WHERE id='{$_REQUEST['id']}'
	";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	//echo "<br> $query";	
	foreach( $row as $key => $value )
	{
		$_POST[$key] = $value;
	}
}

if (@$_REQUEST['botao'] == "Gravar") 
{
	if (!$_REQUEST['id'])
	{
		$insere = "INSERT into cad (nome, email, senha, matricula) VALUES ('{$_POST['nome']}', '{$_POST['email']}', '{$_POST['senha']}', '{$_POST['matricula']}')";
		$result_insere = mysqli_query($con, $insere);
		
		if ($result_insere) echo "<h2> Cadastro realizado com sucesso! </h2>";
		else echo "<h2> Nao consegui inserir! </h2>";
		
	} else 	
	{
		$insere = "UPDATE cad SET 
					nome = '{$_POST['nome']}'
					, email = '{$_POST['email']}'
					, senha = '{$_POST['senha']}'
                    , matricula = '{$_POST['matricula']}'
					WHERE id = '{$_REQUEST['id']}'
				";
		$result_update = mysqli_query($con, $insere);

		if ($result_update) echo "<h2> Registro atualizado com sucesso! </h2>";
		else echo "<h2> Nao consegui atualizar! </h2>";
		
	}

 
}
?>

<form action="cadastro.php" method="post" name="cadastro">
<table width="200" border="1">
  <tr>
    <td colspan="2">Cadastro Estagiário/Orientador</td>
  </tr>
  <tr>
    <td width="53">Cod.</td>
    <td width="131"><?php echo @$_POST['id']; ?>&nbsp;
  </tr>
  <tr>
    <td>Nome:</td>
    <td><input type="text" name="nome" value="<?php echo @$_POST['nome']; ?>"></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input type="text" name="email" value="<?php echo @$_POST['email']; ?>"></td>
  </tr>
  <tr>
    <td>Senha:</td>
    <td><input type="text" name="senha" value="<?php echo @$_POST['senha']; ?>"></td>
  </tr>
  <tr>
    <td>Matrícula:</td>
    <td><input type="text" name="matricula" value="<?php echo @$_POST['matricula']; ?>"></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input type="submit" value="Gravar" name="botao"> - <input type="submit" value="Excluir" name="botao">
    -
    <input type="reset" value="Novo" name="novo"> 	<input type="hidden" name="id" value="<?php echo @$_REQUEST['id'] ?>" />
</td>
    </tr>	
</table>
</form>


</body>
</html>