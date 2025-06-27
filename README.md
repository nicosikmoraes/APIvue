# APIvue

Projeto teste para aprender o básico de PHP junto com vue;

Até o momento já foi feita a conexão para realizar o cadastro diretamente no banco MySQL e o login, só consguindo entrar se a senha e o email for encontrado no db. Também tem um arquivo para realizar o SELECT de todos os itens da tabela users (única tabela até o momento), mostrando o resultado na tela inicial;

Na tabela da página inicial foi adicionado um botão que quando clicado ele deleta aquele usuário no banco de dados e a lista é atualizada em sequência;

Além da coneão com o banco de dados eu explorei o uso de pinia para a disponibilização de diferentes temas para o usuário;

Temos agora itens para serem comprados que seriam meus projetos (foram adicionados em um banco de dados), podendo selecionar o item e adicionar no seu carrinho, ou clicar para ver o código do projeto no GitHub; 

Quero pegar os dados para mostrar no finalizar compras usando o inner join para pegar todos os dados do usuário e dos itens já que quando adiciono ao carrinho eu salvo os itens em uma tabela no banco de dados chamada carts passanco o id do usuário e o id dos itens como chaves estrangeiras;

## Objetivo
O projeto é um crud onde na página inicial aparece todas as contas podendo criar contas novas, deletar e logar. Quando entrar em uma conta o usuário vai ser redirecionado para uma página com itens (que seriam meus projetos) onde eles tem a opção de comprar esses itens;

## Pontos pequenos que faltam
  - Não poder criar várias contas com o mesmo email;
  - Usar o alert do `SweetAlert2`;
  - Arrumar o Disabled do botão de login (chato);
  - Usar o Axios se eu quiser (Uso nos novos);
  - A senha quando passada no PHP dá pra criptografar ela (fácil);
  - Criar um Favicon;

## Próximas etapas 
  - Finalizar o carrinho;
  - Ver a questão de selecionado (acho que vou desistir por enquanto);
  - Fazer a página de finalizar compra;
  - Fazer a página de configurações para o usuário poder alterar seus dados;
  - ...

## Pontos Negativos
  - Toda parte de comunicação do frontend com o backend foi feita usando pinia e não em uma pasta de services;
  - Foi usado `fetch` e não `axios` como recomendado;

## Pontos Positivos
  - Ta tudo bem componentizado eu acredito;
  - Navbar e Footer componetizados;

## Screenshots
![image](https://github.com/user-attachments/assets/3ebcde47-23b6-4c73-9b11-f8de515afd3c)
![image](https://github.com/user-attachments/assets/5696d43f-e4ab-4040-afb0-c90b8f2b09fa)
![image](https://github.com/user-attachments/assets/aab19c22-de83-4639-882a-26d66285612d)
![image](https://github.com/user-attachments/assets/3ea731c2-1859-4deb-92e5-5b5517361fec)
![image](https://github.com/user-attachments/assets/a2480c60-da44-42c1-ab8b-7c8291bacc67)
![image](https://github.com/user-attachments/assets/edb89ef9-064b-4535-ad7a-e31f2ef1f5c1)





