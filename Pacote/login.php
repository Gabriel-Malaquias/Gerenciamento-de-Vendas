<?php 
include_once("conexao.php");

function login($email, $senha){
    $conexao = conectar();

    if(empty($email) || empty($senha)){
        return "Preencha todos os campos!";
    }

    //Sanitizando os dados
    $emailUser = filter_var($email, FILTER_SANITIZE_EMAIL);
    $senhaUser = filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS);

    if(!filter_var($emailUser, FILTER_VALIDATE_EMAIL)){
        return "Email Inválido!";
    }

    $consulta = $conexao->prepare("SELECT * FROM cliente WHERE Email = ? AND Senha = ?");

    if(!$consulta){
        $erro = "Erro na consulta dos dados: " . $conexao->error;
        $conexao->close();
        return $erro;
    }

    $consulta->bind_param("ss", $emailUser, $senhaUser);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if($resultado->num_rows > 0){
        $consulta->close();
        $conexao->close();
        return "sucesso";
    }else{
        $consulta->close();
        $conexao->close();
        return "erro";
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'] ?? '';
    $senha = $_POST['password'] ?? '';

    echo login($email, $senha);
}
?>