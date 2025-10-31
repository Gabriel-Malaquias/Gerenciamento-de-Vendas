<?php 
include_once("conexao.php");

function login($email, $senha){
    $conexao = conectar();

    if(empty($email) || empty($senha)){
        return "Preencha todos os campos!";
    }

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $consulta = $conexao->prepare("SELECT * FROM cliente WHERE Email = ?");

    if(!$consulta){
        $erro = "Erro na consulta de dados: " . $conexao->error;
        $conexao->close();
        return $erro;
    }

    $consulta->bind_param("s", $email);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if($resultado->num_rows > 0){
        $usuario = $resultado->fetch_assoc();

        if(password_verify($senha, $usuario['Senha'])){
            $consulta->close();
            $conexao->close();
            return "sucesso";
        }else{
            $consulta->close();
            $conexao->close();
            return "dadosIncorretos";
        }
    }else{
        $consulta->close();
        $conexao->close();
        return "naoEncontrado";
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    echo login($email, $senha);
}
?>