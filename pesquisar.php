<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link rel="stylesheet" href="pesquisar.css">
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

        td, th {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h1>Pesquisar</h1>
    <form name="frmPesquisar" action="" method="post">
        <label>Filtro:</label>
        <input type="text" name="txtFiltro" id="txtFiltro" maxlength="40">
        <br><br>
        <input type="submit" value="Pesquisar" />
        <input type="reset" value="Limpar" onclick="location.href = 'pesquisar.php'" />
        <input type="button" value="Menu" onclick="location.href = 'menu.html'" />

        <?php
        include 'conexao.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $filtro = $_POST['txtFiltro'];

            $lista = $cmd->query(query: "select * from tbprojeto where Nome like '%$filtro%'");
            $total_registros = $lista->rowCount();
            if ($total_registros > 0) {
                echo "<table>";
                echo "<tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Email</th>
                <th>Senha</th>
              </tr>";

                while ($linha = $lista->fetch(mode: PDO::FETCH_ASSOC)) {
                    $vcodigo = $linha['Codigo'];
                    $vnome = $linha['Nome'];
                    $vsexo = $linha['Sexo'];
                    $vemail = $linha['Email'];
                    $vsenha = $linha['Senha'];
                    echo "<tr>
                    <td>$vcodigo</td>
                    <td>$vnome</td>
                    <td>$vsexo</td>
                    <td>$vemail</td>
                    <td>$vsenha</td>          
                  </tr>";
                }
            } else {
                echo "<script language=javascript> window.alert('Nenhum registro encontrado!!!'); location.href='pesquisar.php'; </script>";
            }
        }
        ?>

    </form>
</body>

</html>