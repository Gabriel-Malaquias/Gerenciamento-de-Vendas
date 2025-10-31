<?php 
function conectar(){
    $conexao = new mysqli("localhost", "root", "", "vendas");
    
    if(!$conexao){
        exit;
    }
    return $conexao;
}
conectar();
?>