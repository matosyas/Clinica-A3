<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Prontuário do Paciente</title>
    <style>

        
body {
    font-family: Arial, sans-serif;
    background-color: #f2f7fc;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* Alterado para min-height */
    margin: 0;
    overflow-y: auto; /* Permite rolagem em caso de excesso de conteúdo */
    box-sizing: border-box;
}

.container {
    background-color: #ffffff;
    max-width: 600px;
    width: 100%;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px; /* Adicionado para evitar que o conteúdo toque nas bordas */
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
		$insere = "INSERT into prontfixo (numpront, aluno, semestre, data_abertura, nome_completo, data_nasc, genero, genero_texto, endereco, telefone, email, nome_emerg, num_emerg, escolaridade, ocupacao, nec_esp, nec_esp_texto, histFamiliar, histSocial, finais, estagiario, orientador) VALUES ('{$_POST['numpront']}', '{$_POST['aluno']}', '{$_POST['semestre']}', '{$_POST['data_abertura']}', '{$_POST['nome_completo']}', '{$_POST['data_nasc']}', '{$_POST['genero']}', '{$_POST['genero_texto']}', '{$_POST['endereco']}', '{$_POST['telefone']}', '{$_POST['email']}', '{$_POST['nome_emerg']}', '{$_POST['num_emerg']}', '{$_POST['escolaridade']}', '{$_POST['ocupacao']}', '{$_POST['nec_esp']}', '{$_POST['nec_esp_texto']}', '{$_POST['histFamiliar']}','{$_POST['histSocial']}','{$_POST['finais']}','{$_POST['estagiario']}', '{$_POST['orientador']}')";
		$result_insere = mysqli_query($con, $insere);
		
		if ($result_insere) echo "<h2> Registro inserido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui inserir!!!</h2>";
		
	} else 	
	{
		$insere = "UPDATE prontfixo SET 

          numpront = '{$_POST['numpront']}'
          , aluno = '{$_POST['aluno']}'
          , semestre = '{$_POST['semestre']}'
          , data_abertura= '{$_POST['data_abertura']}'
          , nome_completo = '{$_POST['nome']}'
          , data_nasc = '{$_POST['dataNasc']}'
          , genero = '{$_POST['genero']}'
          , genero_texto = '{$_POST['genero_texto']}'
          , endereco = '{$_POST['endereco']}'
          , telefone = '{$_POST['telefone']}'
          , email = '{$_POST['email']}'
          , nome_emerg = '{$_POST['nome_emerg']}'
          , num_emerg = '{$_POST['num_emerg']}'
          , escolaridade = '{$_POST['escolaridade']}'
          , ocupacao = '{$_POST['ocupacao']}'
          , nec_esp = '{$_POST['nec_esp']}'
          , nec_esp_texto = '{$_POST['nec_esp_texto']}'
          , histFamiliar = '{$_POST['histFamiliar']}'
          , histSocial = '{$_POST['histSocial']}'
          , finais = '{$_POST['finais']}'
          , estagiario = '{$_POST['estagiario']}'
          , orientador = '{$_POST['orientador']}'
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
    <h1>Prontuário do Paciente</h1>

    <form action="prontfixo.php" method="post" name="prontfixo">
        <div class="form-group">
            <label for="aluno">Nome do Estagiário (a):</label>
            <input type="text" name="aluno" id="aluno" value="<?php echo @$_POST['aluno']; ?>">
        </div>

        <div class="form-group">
            <label for="semestre">Semestre letivo:</label>
            <input type="text" name="semestre" id="semestre" value="<?php echo @$_POST['semestre']; ?>">
        </div>
        
        <div class="form-group">
            <label for="numpront">Número do Prontuário:</label>
            <input type="text" name="numpront" id="numpront" value="<?php echo @$_POST['numpront']; ?>">
        </div>
        
        <div class="form-group">
            <label for="data_abertura">Data de Início:</label>
            <input type="date" name="data_abertura" id="data_abertura" value="<?php echo @$_POST['data_abertura']; ?>">
        </div>

        <div class="form-group">
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" name="nome_completo" id="nome_completo" value=" <?php echo @$_POST['nome_completo']; ?>">
        </div>

        <div class="form-group">
            <label for="data_nasc">Data de Nascimento:</label>
            <input type="date" name="data_nasc" id="data_nasc" value="<?php echo @$_POST['data_nasc']; ?>">
        </div>

        <div class="form-group">
            <label>Gênero:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="genero" value="M" <?php echo (@$_POST['genero'] == "M" ? " checked" : "" );?>> Masculino</label>
                <label><input type="checkbox" name="genero" value="F" <?php echo (@$_POST['genero'] == "F" ? " checked" : "" );?>> Feminino</label>
                <label> Outro: <input type="text" name="genero_texto" value=" " <?php echo (@$_POST['genero_texto'] == " " ? " checked" : "" );?>></label>
            </div>
        </div>

        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" value="<?php echo @$_POST['endereco']; ?>">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="<?php echo @$_POST['telefone']; ?>">
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="<?php echo @$_POST['email']; ?>">
        </div>

        <div class="form-group">
            <label for="nome_emerg">Contato de Emergência (Nome): </label>
            <input type="text" name="nome_emerg" id="nome_emerg" value="<?php echo @$_POST['nome_emerg']; ?>">
            <label for="num_emerg">Contato de Emergência (Número): </label>
            <input type="text" name="num_emerg" id="num_emerg" value="<?php echo @$_POST['num_emerg']; ?>">
        </div>

        <div class="form-group">
            <label for="escolaridade">Escolaridade:</label>
            <input type="text" name="escolaridade" id="escolaridade" value="<?php echo @$_POST['escolaridade']; ?>">
        </div>

        <div class="form-group">
            <label for="ocupacao">Ocupação:</label>
            <input type="text" name="ocupacao" id="ocupacao" value="<?php echo @$_POST['ocupacao']; ?>">
        </div>

        <div class="form-group">
        <label>Necessidade Especial:</label>
<div class="checkbox-group">
    <label>
        <input type="checkbox" name="nec_esp[]" value="Cognitiva" 
        <?php echo (isset($_POST['nec_esp']) && in_array("Cognitiva", $_POST['nec_esp']) ? " checked" : "" ); ?>> 
        Cognitiva
    </label>
    <label>
        <input type="checkbox" name="nec_esp[]" value="Locomoção" 
        <?php echo (isset($_POST['nec_esp']) && in_array("Locomoção", $_POST['nec_esp']) ? " checked" : "" ); ?>> 
        Locomoção
    </label>
    <label>
        <input type="checkbox" name="nec_esp[]" value="Visão" 
        <?php echo (isset($_POST['nec_esp']) && in_array("Visão", $_POST['nec_esp']) ? " checked" : "" ); ?>> 
        Visão
    </label>
    <label>
        <input type="checkbox" name="nec_esp[]" value="Audição" 
        <?php echo (isset($_POST['nec_esp']) && in_array("Audição", $_POST['nec_esp']) ? " checked" : "" ); ?>> 
        Audição
    </label>
    <label>
        Outro: <input type="text" name="nec_esp_texto" 
        value="<?php echo isset($_POST['nec_esp_texto']) ? htmlspecialchars($_POST['nec_esp_texto']) : ''; ?>">
    </label>
</div>

        </div>

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

        <div class="form-group">
            <label for="estagiario">Nome do Estagiário:</label>
            <input type="text" name="estagiario" id="estagiario" value="<?php echo @$_POST['estagiario']; ?>">
        </div>

        <div class="form-group">
            <label for="orientador">Nome do Orientador:</label>
            <input type="text" name="orientador" id="orientador" value="<?php echo @$_POST['orientador']; ?>">
        </div>

        <div class="button-group">
            <input type="submit" value="Gravar" name="botao">
            <input type="submit" value="Excluir" name="botao">
            <input type="reset" value="Novo">
        </div>
    </form>


</body>
</html>