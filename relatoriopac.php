<html>
<head>
<title>Relatório de Pacientes</title>
<?php include ('config.php'); ?>
</head>

<body>
<form action="relatoriopac.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=5 align="center">Relatório de Pacientes</td>
  </tr>
  <tr>
    <td width="18%" align="right">Nome</td>
    <td width="26%"><input type="text" name="nome_completo" /></td>
    <td width="17%" align="right">Nº de Prontuário:</td>
    <td width="18%"><input type="text" name="numpront" size="3" /></td>
    <td width="21%"><input type="submit" name="botao" value="Listar" /></td>
  </tr>
</table>
</form>

<?php
// Verifique se o índice 'botao' existe antes de acessar
if (isset($_REQUEST['botao']) && $_REQUEST['botao'] == "Listar") {
?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#90EE90">
    <th width="5%">C&oacute;d</th>
    <th width="30%">Nª de Prontuário</th>
    <th width="30%">Nome</th>
    <th width="15%">Data de Início</th>
    <th width="12%">Data de Nascimento</th>
    <th width="12%">Gênero</th>
    <th width="12%"> </th>
    <th width="12%">Endereço</th>
    <th width="12%">Telefone</th>
    <th width="12%">E-mail</th>
    <th width="12%">Nome (Contato de Emergência)</th>
    <th width="12%">Telefone p/ contato</th>
    <th width="12%">Escolaridade</th>
    <th width="12%">Ocupação</th>
    <th width="12%">Necessidade Especial</th>
    <th width="12%"> </th>
    <th width="12%">Estagiário</th>
    <th width="12%">Orientador</th>
  </tr>

<?php

    $nome = $_POST['nome_completo'];
    $num = $_POST['numpront'];
    
    $query = "SELECT *
              FROM prontfixo 
              WHERE id > 0 ";
    $query .= ($nome ? " AND nome_completo LIKE '%$nome%' " : "");
    $query .= ($num ? " AND numpront = '$num' " : "");
    $query .= " ORDER by id";
    $result = mysqli_query($con, $query);

    while ($coluna = mysqli_fetch_array($result)) {
    ?>

    <tr>
      <th width="5%"><?php echo $coluna['id']; ?></th>
      <th width="30%"><?php echo $coluna['numpront']; ?></th>
      <th width="30%"><?php echo $coluna['nome_completo']; ?></th>
      <th width="15%"><?php echo $coluna['data_abertura']; ?></th>
      <th width="12%"><?php echo $coluna['data_nasc']; ?></th>
      <th width="12%"><?php echo $coluna['genero']; ?></th>
      <th width="30%"><?php echo $coluna['genero_texto']; ?></th>
      <th width="15%"><?php echo $coluna['endereco']; ?></th>
      <th width="12%"><?php echo $coluna['telefone']; ?></th>
      <th width="12%"><?php echo $coluna['email']; ?></th>
      <th width="30%"><?php echo $coluna['nome_emerg']; ?></th>
      <th width="15%"><?php echo $coluna['num_emerg']; ?></th>
      <th width="12%"><?php echo $coluna['escolaridade']; ?></th>
      <th width="12%"><?php echo $coluna['ocupacao']; ?></th>
      <th width="30%"><?php echo $coluna['nec_esp']; ?></th>
      <th width="15%"><?php echo $coluna['nec_esp_texto']; ?></th>
      <th width="12%"><?php echo $coluna['estagiario']; ?></th>
      <th width="12%"><?php echo $coluna['orientador']; ?></th>
        <td>
        <a 
            href="prontfixo.php?pag=clinica&id=<?php echo $coluna['id']; ?>"
            >Editar</a>
        </td>
    </tr>

    <?php
    } // fim while
?>
</table>
<?php
} // fim do if (isset($_REQUEST['botao']) && $_REQUEST['botao'] == "Listar")
?>
</body>
</html>