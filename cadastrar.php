<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <style>
        * {
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        body {
            background-color: rgb(142, 212, 221);
        }

        h1 {
            font-size: 3.2rem;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        form {
            background-color: thistle;
            width: 40%;
            margin: auto;
            font-size: 1.3rem;
            padding-top: 3rem;
            padding-bottom: 2rem;
            border: 1px solid black;
            border-radius: 1rem;
        }

        input[type="button"],
        input[type="submit"],
        input[type="reset"] {
            font-size: 1.5rem;
            margin-left: 1rem;
            margin-right: 1rem;
            padding-top: 0.3rem;
            padding-bottom: 0.3rem;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 25%;
        }
    </style>
</head>

<body>
    <h1>Cadastro</h1>
    <form name="frmCadastro" action="" method="post">
        <label for="txtNome">Nome: </label>
        <input type="text" name="txtNome" id="txtNome" maxlength="40" required>
        <br><br>
        <label for="radSexo">Sexo: </label>
        <input type="radio" name="radSexo" value="F" checked> F
        <input type="radio" name="radSexo" value="M"> M
        <br><br>
        <label for="txtEmail">Email: </label>
        <input type="email" name="txtEmail" id="txtEmail" maxlength="30">
        <br><br>
        <label for="txtSenha">Senha: </label>
        <input type="password" name="txtSenha" id="txtSenha" maxlength="8">
        <br><br><br>
        <input type="submit" value="Cadastrar" />
        <input type="reset" value="Limpar" onclick="document.getElementById('txtNome').focus()" />
        <br><br>
        <input type="button" value="Menu" onclick="location.href = 'menu.html'" />
    </form>


    <?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['txtNome'];
        $sexo = $_POST['radSexo'];
        $email = $_POST['txtEmail'];
        $senha = $_POST['txtSenha'];

        $cadastro = $cmd->query(query: "insert into tbprojeto(Nome, Sexo, Email, Senha) values ('$nome', '$sexo', '$email', '$senha');");

        echo "<script language='JavaScript'>
            alert('Dados cadastrados com sucesso!');
            location.href = 'menu.html';
          </script>";
    }
    ?>


</body>

</html>