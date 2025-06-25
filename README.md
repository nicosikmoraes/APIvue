# APIvue

Projeto teste para aprender o básico de PHP junto com vue;

Até o momento já foi feita a conexão para realizar o cadastro diretamente no banco MySQL e o login, só consguindo entrar se a senha e o email for encontrado no db. Também tem um arquivo para realizar o SELECT de todos os itens da tabela users (única tabela até o momento);

Além da coneão com o banco de dados eu explorei o uso de pinia para a disponibilização de diferentes temas para o usuário;

## Pontos pequenos que faltam
  - Não poder criar várias contas com o mesmo email;
  - Usar o alert do `SweetAlert2`;
  - Arrumar o Disabled do botão de login (chato);
  - Usar o Axios se eu quiser;
  - A senha quando passada no PHP dá pra criptografar ela (fácil);
  - Criar um Favicon;

## Próximas etapas
  - Dar uma função a essa aplicação;
  - Criar a `Main Page`;
  - Desenvolver a `Home Page`, não da pra deixar como está né;
  - Para saber mais eu preciso ter a funcionalidade do mesmo...

## Pontos Negativos
  - Toda parte de comunicação do frontend com o backend foi feita usando pinia e não em uma pasta de services;
  - Foi usado `fetch` e não `axios` como recomendado;

## Pontos Positivos
  - Ta tudo bem componentizado eu acredito;
  - Navbar e Footer componetizados;
