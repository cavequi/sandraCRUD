<?php
    include 'conexao.php';
    $nome = $_POST['txtNome'];
    $sexo = $_POST['radSexo'];
    $email = $_POST['txtEmail'];
    $senha = $_POST['txtSenha'];

    $cadastro = $cmd -> query("insert into tbprojeto(Nome, Sexo, Email, Senha) values ('$nome', '$sexo', '$email', '$senha');");

    echo "<script language='JavaScript'>
            alert('Dados cadastrados com sucesso!');
            location.href = 'cadastro.html';
          </script>"
?>