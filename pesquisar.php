<?php
   	include 'conexao.php';

    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Pesquisar</title>";
    echo "<link rel='stylesheet' href='pesquisar.css'>";
    echo "</head>";

    echo "<body>";
    echo "<h1>Pesquisar</h1>";
    echo "    <form name='frmPesquisar' action='pesquisar.php' method='post'>";
    echo "        <label>Filtro:</label>";
    echo "        <input type='text' name='txtFiltro' id='txtFiltro' maxlength='40'>";
    echo "        <br><br><br>";
    echo "        <input type='submit' value='Pesquisar'/>";
    echo "        <input type='reset' value='Limpar' onclick='document.getElementById('txtNome').focus()' />";

    $filtro = $_POST['txtFiltro'];

    $lista=$cmd->query("select * from tbprojeto where Nome like '%$filtro%'");
	$total_registros =$lista->rowCount();
    if ($total_registros > 0)
    {
        echo "<table>";
        echo "<tr>
                <th colspan=5>
                    Dados Cadastrados
                </th>
              </tr>";
        echo "<tr>
                <th>Código</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Sexo</th>
              </tr>";
				
        while($linha=$lista->fetch(PDO::FETCH_ASSOC))
        {
            $vcodigo=$linha['Codigo'];
            $vnome=$linha['Nome'];
            $vsexo=$linha['Sexo'];
            $vemail=$linha['Email'];
			$vsenha=$linha['Senha'];
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
	}
    else
    {
        echo "<script language=javascript> window.alert('Não existem registros para exibir!!!'); location.href=index.html; </script>";
    }

    echo "    </form>";
    echo "</body>";  
?>