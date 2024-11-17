<html>

<head>
 <title>Relatório paciente</title>
</head>

<body>

<h2>Gerar PDF</h2>

<form method="POST" action="gerar_pdf.php">

    <label>Nome: </label>
    <input type="text" name="nome" placeholder="Nome completo"><br><br>
    <label>E-mail: </label>
    <input type="email" name="email" placeholder="hotmail"><br><br>

    <label>Descrição Sessão</label>
    <textarea name="descriacao" placeholder="Descrição completa"></textarea><br><br>
    
    <input type="submit" name="btn-gerar" value="Gerar pdf"><br><br>

</form>

</body>

</html>