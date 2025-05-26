<?php
    echo "<link rel='stylesheet' type='text/css' href='listar.css'/>";
   	include 'conexao.php';
	$lista=$cmd->query("select * from tbprojeto");
	$total_registros =$lista->rowCount();
    if ($total_registros > 0)
    {
        echo "<title>Listar</title>";
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
        echo "<input type='button' value='MENU' onClick='window.history.back()'/>";
        echo "</form>";
        echo "</center>";
	}
    else
    {
        echo "<script language=javascript> window.alert('Não existem registros para exibir!!!'); location.href=index.html; </script>";
    }
?>