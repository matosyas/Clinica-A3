<html>
<head>
<title>Dados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            max-width: 600px;
            width: 100%;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #5a9bd5;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #4d4d4d;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            margin-top: 5px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #5a9bd5;
            color: #fff;
        }

        input[type="reset"] {
            background-color: #f56b6b;
            color: #fff;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            opacity: 0.9;
        }

        .footer {
            text-align: center;
            font-size: 0.9em;
            color: #888;
            margin-top: 10px;
        }
    </style>
</head>
<?php include ('config.php');  ?>
</head>

<body>
<?php
$id = @$_REQUEST['id'];

if (@$_REQUEST['botao'] == "Excluir") {
		$query_excluir = "
			DELETE FROM prontfixo WHERE id='$id'
		";
		$result_excluir = mysqli_query($con, $query_excluir);
		
		if ($result_excluir) echo "<h2> Registro excluido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui excluir!!!</h2>";
}

if (@$_REQUEST['id'] and !$_REQUEST['botao'])
{
	$query = "
		SELECT * FROM prontfixo WHERE id='{$_REQUEST['id']}'
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
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
		$insere = "INSERT into prontfixo (numpront, histFamiliar, histSocial, finais) VALUES ('{$_POST['numpront']}', '{$_POST['histFamiliar']}', '{$_POST['histSocial']}', '{$_POST['finais']}')";
		$result_insere = mysqli_query($con, $insere);
		
		if ($result_insere) echo "<h2> Registro inserido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui inserir!!!</h2>";
		
	} else 	
	{
		$insere = "UPDATE prontfixo SET 

          numpront = '{$_POST['numpront']}'
          , histFamiliar = '{$_POST['histFamiliar']}'
          , histSocial = '{$_POST['histSocial']}'
          , finais = '{$_POST['finais']}'

					WHERE id = '{$_REQUEST['id']}'
				";
		$result_update = mysqli_query($con, $insere);

		if ($result_update) echo "<h2> Registro atualizado com sucesso!</h2>";
		else echo "<h2> Nao consegui atualizar!</h2>";
		
	}

 
}

?>


</body>

<body>

<div class="container">
    <h1>Dados de Sessões</h1>

    <form action="prontfixo.php" method="post" name="prontfixo">

        <div class="form-group">
            <label for="histFamiliar">Histórico Familiar:</label>
            <input type="text" name="histFamiliar" id="histFamiliar" value="<?php echo @$_POST['histFamiliar']; ?>">
        </div>

        <div class="form-group">
            <label for="histSocial">Histórico Social:</label>
            <input type="text" name="histSocial" id="histSocial" value="<?php echo @$_POST['histSocial']; ?>">
        </div>

        <div class="form-group">
            <label for="finais">Considerações Finais:</label>
            <input type="text" name="finais" id="finais" value="<?php echo @$_POST['finais']; ?>">
        </div>


        <div class="button-group">
            <input type="submit" value="Gravar" name="botao">
            <input type="submit" value="Excluir" name="botao">
            <input type="reset" value="Novo">
        </div>
    </form>


</body>
</html>