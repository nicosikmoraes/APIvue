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

- A senha quando passada no PHP dá pra criptografar ela (fácil);
- Criar um Favicon;

## Próximas etapas

- Ver a questão de selecionado (acho que vou desistir por enquanto);
- Fazer a página de finalizar compra;
- Fazer a página de configurações para o usuário poder alterar seus dados;
- ...

## Ideias

 - Pensar se pode comprar mais que um (acho que vou deixar);

## Pontos Negativos

- Toda parte de comunicação do frontend com o backend foi feita usando pinia e não em uma pasta de services;

## Pontos Positivos

- Ta tudo bem componentizado eu acredito;
- Navbar e Footer componetizados;
- Validação nos formuários;
- Verificação para evitar duas contas com o mesmo email;
- Alertas estilizados;
- Comentários;

## Screenshots

![image](https://github.com/user-attachments/assets/59e6f86a-a03d-4901-9e09-31fabc7ef191)
![image](https://github.com/user-attachments/assets/f9dad755-a15e-447d-8ce9-49c5dec0da76)
![image](https://github.com/user-attachments/assets/b0982612-ae3b-4a77-955d-8a16caf98c67)
![image](https://github.com/user-attachments/assets/ed633e6f-d2c8-482e-bcbd-b65dd5e37450)
![image](https://github.com/user-attachments/assets/328425d9-2215-4888-9655-581362c41c2e)
![image](https://github.com/user-attachments/assets/28e8442c-d98b-4a89-871a-bc8f20627c8f)






