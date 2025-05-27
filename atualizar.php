<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
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
            padding: 3rem;
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

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            background-color: white;
            margin-top: 3vw;
        }

        td,
        th {
            border: 1px solid black;
            padding: 8px;
        }

        #dados {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Atualizar Dados</h1>
    <form name="frmAtualizar" action="" method="post">
        <div id="codigo">
            <label>Código:</label>
            <input type="text" name="txtCodigo" id="txtCodigo" maxlength="3">
            <br><br>
        </div>

        <div id="dados">
            <label for="txtNome">Nome: </label>
            <input type="text" name="txtNome" id="txtNome" maxlength="40">
            <br><br>
            <label for="radSexo">Sexo: </label>
            <input type="radio" name="radSexo" value="F"> F
            <input type="radio" name="radSexo" value="M"> M
            <br><br>
            <label for="txtEmail">Email: </label>
            <input type="email" name="txtEmail" id="txtEmail" maxlength="30">
            <br><br>
            <label for="txtSenha">Senha: </label>
            <input type="text" name="txtSenha" id="txtSenha" maxlength="8">
            <br><br>
        </div>

        <input type="submit" id='pesquisar' name="pesquisar" value="Pesquisar" />
        <input type="submit" id='atualizar' name="atualizar" value="Atualizar" style="display:none" />
        <input type="reset" value="Limpar" onclick="location.href = 'atualizar.php'" />
        <input type="button" value="Menu" onclick="location.href = 'menu.html'" />

        <?php
        include 'conexao.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['pesquisar'])) {
                $vcodigo = $_POST['txtCodigo'];

                if (empty($vcodigo)) {
                    echo "<script>
                alert('Código inexistente!');
                location.href='atualizar.php';
                </script>";
                    exit;
                }

                $stmt = $cmd->prepare("SELECT * FROM tbprojeto WHERE Codigo = :codigo");
                $stmt->bindParam(':codigo', $vcodigo, PDO::PARAM_INT);
                $stmt->execute();

                if ($stmt->rowCount() == 0) {
                    echo "<script>
                alert('Código inexistente!');
                location.href='atualizar.php';
                </script>";
                    exit;
                } else {
                    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

                    $vnome = addslashes($cliente['Nome']);
                    $vsexo = $cliente['Sexo'];
                    $vemail = addslashes($cliente['Email']);
                    $vsenha = addslashes($cliente['Senha']);

                    echo "<script>
                    document.getElementById('txtCodigo').value = '{$vcodigo}';
                    document.getElementById('txtCodigo').readOnly = true;
                    document.getElementById('txtNome').value = '{$vnome}';

                    var sexos = document.getElementsByName('radSexo');
                    for (var i = 0; i < sexos.length; i++) {
                    sexos[i].checked = (sexos[i].value === '{$vsexo}');
                    }

                    document.getElementById('txtEmail').value = '{$vemail}';
                    document.getElementById('txtSenha').value = '{$vsenha}';

                    document.getElementById('dados').style.display = 'block';
                    document.getElementById('pesquisar').style.display = 'none';
                    document.getElementById('atualizar').style.display = 'inline';
                    </script>";
                }
            }

            if (isset($_POST['atualizar'])) {
                $vcodigo = $_POST['txtCodigo'];
                $vnome = $_POST['txtNome'];
                $vsexo = $_POST['radSexo'];
                $vemail = $_POST['txtEmail'];
                $vsenha = $_POST['txtSenha'];

                $stmt = $cmd->prepare("UPDATE tbprojeto 
            SET Nome = '$vnome', Sexo = '$vsexo', Email = '$vemail', Senha = '$vsenha'
            WHERE Codigo = :codigo");
                $stmt->bindParam(':codigo', $vcodigo, PDO::PARAM_INT);
                $stmt->execute();

                $stmt = $cmd->prepare("SELECT * FROM tbprojeto WHERE Codigo = :codigo");
                $stmt->bindParam(':codigo', $vcodigo, PDO::PARAM_INT);
                $stmt->execute();

                $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($cliente === false) {
                    // No record found — handle error or alert user
                    echo "<script>alert('Nenhum registro encontrado para o código informado.');</script>";
                } else {
                    $vcodigo = $cliente['Codigo'];
                    $vnome = addslashes($cliente['Nome']);
                    $vsexo = $cliente['Sexo'];
                    $vemail = addslashes($cliente['Email']);
                    $vsenha = addslashes($cliente['Senha']);

                    echo "<br><br><table>";
                    echo "<tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Email</th>
                <th>Senha</th>
              </tr>";
                    echo "<tr>
                    <td>$vcodigo</td>
                    <td>$vnome</td>
                    <td>$vsexo</td>
                    <td>$vemail</td>
                    <td>$vsenha</td>          
                  </tr>";

                    echo "<script language='JavaScript'>
                    alert('Dados atualizados com sucesso!');
                    </script>";
                }
            }
        }
        ?>
    </form>
</body>

</html>