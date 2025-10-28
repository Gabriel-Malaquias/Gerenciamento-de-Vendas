const form = document.getElementById('formulario');

form.addEventListener('submit', function(event){
    event.preventDefault();

    const email = document.getElementById('email').value.trim();
    const senha = document.getElementById('senha').value.trim();

    if(email === '' || senha === ''){
        alert("Preencha os campos!");
        return;
    }

    alert("Formulário enviado!");
    const formData = new FormData();
    formData.append('email', email);
    formData.append('senha', senha);

    fetch('http://localhost/Vendas/PHP/login.php',{
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(response =>{
        switch(response){
            case 'sucesso':
                window.location.href = "http://localhost/Vendas/Pages/produto.html";
                break;
            case "dadosIncorretos":
                alert("Email ou senha incorretos! Tente novamente.");
                break;
            case "naoEncontrado":
                alert("Você não possui cadastro. Por favor, cadastre-se!")
                window.location.href = "http://localhost/Vendas/Pages/cadastro.html";
                break;
            default:
                alert("Resposta PHP inesperada: ", response);
                break;  
        }  
    })
    .catch(error =>{
        console.error("Erro na conexao ", error)
    })
})