<?php 
include_once("conexao.php");

function cadastrarProduto($nome, $desc, $preco, $peso){
    $conexao = conectar();

    if(empty($nome) || empty($desc) || empty($preco) || empty($peso)){
        return "Preencha todos os campos!";
    }

    //Sanitizando os dados
    $nomeProd = htmlspecialchars(strip_tags(trim($nome)), ENT_QUOTES, 'UTF-8');
    $descricaoProd = htmlspecialchars(strip_tags(trim($desc)), ENT_QUOTES, 'UTF-8');
    $precoKG = filter_var($preco, FILTER_SANITIZE_NUMBER_FLOAT);
    $pesoKG = filter_var($peso, FILTER_SANITIZE_NUMBER_FLOAT);

    $insercao = $conexao->prepare("INSERT INTO produtos (Nome, Descricao, precoKG, Peso) VALUES (?,?,?,?)");

    if(!$insercao){
        $erro = "Erro na inserção dos dados:  " .$conexao->error;
        $conexao->close();
        return $erro;
    }

    $insercao->bind_param("ssdd", $nomeProd, $descricaoProd, $precoKG, $pesoKG);
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
    $nome = $_POST['nomeProd'] ?? '';
    $desc = $_POST['infoProd'] ?? '';
    $preco = $_POST['precoKG'] ?? '';
    $peso = $_POST['pesoTOT'] ?? '';

    echo cadastrarProduto($nome, $desc, $preco, $peso);
}
?>