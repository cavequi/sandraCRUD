<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
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

        div {
            background-color: thistle;
            width: 40%;
            margin: auto;
            font-size: 1.3rem;
            padding: 3rem;
            border: 1px solid black;
            border-radius: 1rem;
        }

        input[type="button"] {
            font-size: 1.5rem;
            margin-left: 1rem;
            margin-right: 1rem;
            padding-top: 0.3rem;
            padding-bottom: 0.3rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            background-color: white;
        }

        td, th {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h1>Clientes Cadastrados</h1>
    <div>
        <?php
        include 'conexao.php';
        $lista = $cmd->query(query: "select * from tbprojeto");
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
            echo "</table>";
            echo "<br/><br/>";
            echo "<center>";
            echo "<form>";
            echo "<input type='button' value='Menu' onClick='window.history.back()'/>";
            echo "</form>";
            echo "</center>";
        } else {
            echo "<script language=javascript> window.alert('Não existem registros para exibir!!!'); 
            location.href='menu.html'; </script>";
        }
        ?>
    </div>
</body>

</html>