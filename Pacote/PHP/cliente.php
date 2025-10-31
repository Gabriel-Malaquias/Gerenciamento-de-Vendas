<?php

include_once("conexao.php");

function cadastrar($nome, $dataNasc, $email, $genero, $senha){
    $conexao = conectar();

    if(empty($nome) || empty($dataNasc) || empty($email) || empty($genero) || empty($senha)){
        return "Prencha todos os campos !";
    }

    //Sanitizando os dados
    $nomeUser = htmlspecialchars(strip_tags(trim($nome)), ENT_QUOTES, 'UTF-8');
    $data = htmlspecialchars(strip_tags(trim($dataNasc)), ENT_QUOTES, 'UTF-8');
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $genero = htmlspecialchars(strip_tags(trim($genero)), ENT_QUOTES, 'UTF-8');
    $senha = filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return "Email Inválido!";
    }

    $insercao = $conexao->prepare("INSERT INTO cliente (Nome, DataNasc, Email, Genero, Senha) VALUES (?,?,?,?,?)");

    if(!$insercao){
        $erro = "Erro na inserção dos dados: " . $conexao->error;
        $conexao->close();
        return $erro;
    }

    $insercao->bind_param("sssss", $nomeUser, $data, $email, $genero, $senha);
    $insercao->execute();
    $resultado = $insercao->affected_rows;

    if($resultado > 0){
        $insercao->close();
        $conexao->close();
        return "sucesso";
    }else{
        $insercao->close();
        $conexao->close();
        return "erro";
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'] ?? '';
    $dataNasc = $_POST['dataNasc'] ?? '';
    $email = $_POST['email'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $senha = $_POST['password_1'] ?? '';

    echo cadastrar($nome, $dataNasc, $email, $genero, $senha);
}
?>