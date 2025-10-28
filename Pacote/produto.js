const form = document.getElementById('formulario');

form.addEventListener('submit', function(event){
    event.preventDefault();

    const nomeProduto = document.getElementById('nomeProd').value.trim();
    const descricaoProduto = document.getElementById('infoProd').value.trim();
    const precoProduto = document.getElementById('precoKG').value.trim();
    const pesoTotal = document.getElementById('pesoTOT').value.trim();

    if(nomeProduto === "" || descricaoProduto === "" || precoProduto === "" || pesoTotal === ""){
        alert("Campos vazios. Tente novamente!");
        return;
    }

    alert("Dados de produto enviados!");

    const formData = new FormData();
    formData.append('nomeProd', nomeProduto);
    formData.append('infoProd', descricaoProduto);
    formData.append('precoKG', precoProduto);
    formData.append('pesoTOT', pesoTotal);

    fetch('http://localhost/Vendas/PHP/produtos.php',{
        method: 'POST',
        body: formData
    })

    .then(response=> response.text())
    .then(response=>{
        switch(response){
            case 'sucesso':
                alert("Produto cadastrado com sucesso!");
                let calculoProduto = precoProduto * pesoTotal;
                document.getElementById('calculo').innerText = `Preço Total R$${calculoProduto.toFixed(2)}`
                break;
            case 'erro':
                alert("Erro ao cadastrar o produto. Tente novamente!");
                break;
            default:
                alert("Resposta PHP inesperada:", response);
                break;
        }
    })
    .catch(error=>{
        console.error("Erro na conexão", error);
    })
})