<h1>Gerenciamento de Vendas</h1>
<h2>Descrição</h2>
<p>O objetivo da aplicação é servir como um site de gerenciamento de vendas de um negócio. Exemplo: lojas de materiais de construção, indústrias de sucata, lojas de produtos recicláveis, açougues e casas de carne, padarias, confeitarias e etc. Com o uso do site, o usuário poderá informar dados importantes sobre um determinado produto e no final, obter o preço final da venda. Isso por sua vez, ajuda na produtividade de vendas e na precisão de cálculos além de permitir armazenar todos os dados das vendas em um banco de dados</p>
<h2>Funcionamento</h2>
<p>O site permite que o usuário realize um processo simples de autenticação. É verificado se possui cadastro ou não na plataforma e caso não tenha, o usuário é direcionado automaticamente para um formulário de cadastro. Todos os dados ficam armazenados no banco de dados da aplicação. Somente após o usuário se autenticar é que poderá ter acesso ao formulário que permitirá registrar os dados de uma determinada venda de um negócio</p>
<h2>Instalação</h2>
<p>O projeto foi desenvolvido utilizando as tecnologias HTML/CSS e Javascript para o front end e o PHP para lidar com o back end. Será necessário realizar a instalação do software XAMPP para simular um servidor na máquina local. Somente dessa maneira, a aplicação terá seu perfeito funcionamento visto que o PHP é uma linguagem que roda no lado do servidor. Além disso, será necessário configurar o banco de dados em questão que o site utilizará para realizar o armazenamento dos dados de usuário e de produtos. Siga conforme os passos listados abaixo:</p>
<div>
  <ul>
    <li>Realize a instalação do XAMPP: https://www.apachefriends.org/pt_br/download.html</li>
    <li>Ao realizar o Fork deste projeto, mova o arquivo em questão para a pasta C:\xampp\htdocs. É necessário que o arquivo esteja dentro da pasta htdocs para que o XAMPP posso executar o site no servidor local e assim, garantir o funcionamento do site no navegador</li>
    <li>No navegador, acesse: localhost/phpmyadmin para criar e configurar o banco de dados da aplicação. Em seguida, realize a execução do seguinte código SQL do banco de dados do site:</li>
    <br>
    <ul>CREATE DATABASE vendas</ul>
    <br>
    <ul>CREATE TABLE cliente(</ul>
    <ul>Nome text,</ul>
    <ul>DataNasc date,</ul>
    <ul>Email text,</ul>
    <ul>Genero text,</ul>
    <ul>Senha text</ul>
    <ul>);</ul>
    <br>
    <ul>CREATE TABLE produtos(</ul>
    <ul>Nome text,</ul>
    <ul>Descricao text,</ul>
    <ul>PrecoKG float,</ul>
    <ul>pesoTotal</ul>
    <ul>);</ul>
    <br>
    <li>Seguindo todos esses passos, basta agora executar o projeto acessando no navegador o endereço: localhost/Vendas
    OBS: O XAMPP deve estar em execução com o Apache iniciado
  </li>
  </ul>
  
</div>
