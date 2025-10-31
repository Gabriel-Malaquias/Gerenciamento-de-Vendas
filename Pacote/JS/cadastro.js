const form = document.getElementById("formulario");

form.addEventListener('submit', function(event){
    event.preventDefault();

    const nome = document.getElementById('nome').value.trim()
    const dataNasc = document.getElementById('dataNasc').value.trim()
    const email = document.getElementById('email').value.trim()
    const genero = document.getElementById('genero').value.trim()
    const pass = document.getElementById('password_1').value.trim()
    const confPass = document.getElementById('password_2').value.trim()

    if(nome === "" || dataNasc === "" || email === "" || genero === "" || pass === "" || confPass === ""){
        alert("Campos vazios. Tente novamente!")
        return;
    }

    if(pass !== confPass){
        alert("As senhas informadas não coincidem. Tente novamente!")
        return;
    }

    alert("Cadastro Enviado!")

    const formData = new FormData();
    formData.append('nome', nome);
    formData.append('dataNasc', dataNasc);
    formData.append('email', email);
    formData.append('genero', genero);
    formData.append('password_1', pass);
    formData.append('password_2', confPass);

    fetch("http://localhost/Vendas/PHP/cliente.php", {
        method: 'POST',
        body: formData
    })

    .then(response => response.text())
    .then(response => {
        switch(response){
            case 'sucesso':
                alert("Cadastro realizado com sucesso!");
                window.location.href = "http://localhost/Vendas/Pages/produto.html";
                break;
            case 'erro':
                alert("Erro ao realizar o cadastro. Tente novamente.");
                
                if(response === 'sucesso'){
                    window.location.href = "http://localhost/Vendas/Pages/produto.html";
                    break;
                }
            default:
                alert("Resposta PHP inesperada:", response);
                break;
        }   
    })
    .catch(error =>{
        console.error("Erro na conexão", error)
    })
})