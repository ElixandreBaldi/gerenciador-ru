# Gerenciador de Restaurantes Universitários

*Alunos:*

* [Elixandre Baldi](https://github.com/ElixandreBaldi)

* [Luiz Guilherme F. Rosa](https://github.com/luizguilhermefr)

O projeto tem como objetivo a construção de um sistema que possibilite a gerência de restaurantes universitários por meio do pagamento pré-pago (cartão recarregável). O usuário deve manter o saldo positivo de modo que consiga efetuar as refeições sem ter de utilizar dinheiro no momento da compra.

### [Controladores](#controllers)

### [Visões](#views)

### [Modelos](#models)

### [Serviços](#services)

### [Outros](#other)

## <a name="controllers"></a> Controladores

Os controladores são responsáveis pelo recebimento e resposta das requisições. Os controladores estão localizados na raiz do projeto, e são:

* `autoload.php` O autoload é um pedaço de código genérico, inserido em todos os demais controladores. Seu objetivo é o de assinalar algumas constantes que serão utilizadas no decorrer da aplicação, como por exemplo o nível de erros a serem reportados. Além disso, o autoload faz o carregamento de todas as classes do sistema, possibilitando seu devido uso.

* `index.php` É a página inicial. Na mesma, são lidas as variáveis de sessão que determinarão para que página o usuário deve ser redirecionado.

* `login.php` O controlador de login tem o papel de verificar se o usuário já está logado e, neste caso, redirecionar para a página interna, ou então, no caso do usuário não estar logado, exibir a `View` de login. As `views` são discutidas mais adiante.

* `logout.php` O controlador de saída da aplicação. Neste controlador, simplesmente destrói-se a sessão e redireciona-se para a página de login.

* `historico.php` Caso o usuário não seja administrador, porém um usuário comum, este tem acesso à seu histórico de transações, onde pode verificar seu saldo total e cada refeição ou recarga individual.

* `main.php` É a página inicial do administrador do sistema. Neste controlador, verifica-se se há usuário logado e, caso a assertiva seja verdadeira, exibe-se a `view` de consumo de refeição, onde bastará inserir o cartão do consumidor para que haja uma transação ou então o histórico do usuário.

* `consumir.php` É o controlador que responde com os dados de um usuário - se é possível efetuar uma consumação ou não, e então permite a efetivação de uma consumação no restaurante.

* `recarga.php` Bastante semelhante ao anterior. Contudo, ao invés de efetuar uma consumação, é efetuada uma recarga no perfil do usuário, possibilitando consumir novas refeições ao decorrer do tempo.

* `inserir.php` Responsável por exibir a `view` de inserção de créditos.

* `cadastro.php` Controlador restrito ao administrador, possibilita o cadastro de novos usuários no sistema, verificando-se se já existe usuário com o mesmo registro ou nome de usuário.

## <a name="views"></a> Visões

As visões, ou `views` estão localizadas na pasta `/Views` e contém as telas formuladas em HTML e JavaScript para exibição dos dados. Existem ao total cinco visões, mais duas partes generalizadas entre elas. São:

* `header.php` Cabeçalho reutilizado entre as demais visões. Inclui alguns arquivos de CSS e JavaScript, além de exibir o plano de fundo.

* `footer.php` Cabeçalho reutilizado entre as visões. Possui um menu de acordo com o nível do usuário logado.

* `cadastro.php` Visão de cadastro de um usuário no sistema. Possui um formulário simples para inserção de dados, além de ler eventuais mensagens de erro ou sucesso da sessão.

* `historico.php` Visão de histórico do usuário. Possui um apanhado de transações - em vermelho para consumo e verde para recarga.

* `inserir.php` Visão que permite a inserção de créditos. É dividida em duas etapas - na primeira recebe os dados de qual usuário terá créditos inseridos, em outra dispara a requisição para efetivação da recarga.

* `login.php` Formulário de entrada no sistema.

* `main.php` Visão que permite a consumação de uma refeição. Assim como `inserir.php`, é dividida em duas etapas.

## <a name="models"></a> Modelos

Há dois modelos no sistema. Usuário e Transação. Os modelos estão localizados na pasta `/Models`.

* `Model.php` É o modelo base. Contém os métodos mais genéricos, utilizados entre os demais modelos. Definem, por exemplo, a tabela no banco de dados, a chave primária, uma busca por id, bem como o acesso aos serviços, que serão discutidos mais adiante.

* `Usuario.php` Define um usuário. Este pode ser administrador, aluno ou funcionário. Possui atributos específicos como busca por registro e verificação de nível.

* `Transacao.php` Consumos e recargas são transações. O que difere uma da outra é se o valor é positivo (recarga) ou negativo (consumo).

## <a name="services"></a> Serviços

Alguns serviços generalizados possuem o objetivo de possibilitar um maior reuso de código e escalabilidade do sistema. Os serviços estão localizados na pasta `/Services` e são:

* `Connection.php` Singleton responsável pela conexão `PDO` ao banco de dados. Basicamente, nesta classe constrói-se a conexão e efetua-se, através dela, uma query SQL.

* `InsertBuilder.php` Esta classe permite a inserção de valores no banco de dados por meio de um construtor de comandos. Assim, além de não ser necessário utilizar uma SQL toda vez, permite-se uma fácil migração entre diferentes SGBDs, alterando apenas o código do builder, e não em cada chamada.

* `SearchBuilder.php` Permite a busca (`select`) de valores no banco de dados. Métodos como `count()`, `sum()`, `limit`, `where`, entre outros estão todos abstraídos e encapsulados.

## <a name="other"></a> Outros

Outras pastas importantes para o projeto são:

* `/db` Possui a rotina de criação e preenchimento do banco de dados com dados falsos, para fins de testes.

* `/css` Arquivos de estilo do sistema, como `bootstrap` e personalizações.

* `/fonts` Possui fontes utilizadas no sistema, como por exemplo os `glyphicons` do `bootstrap`.

* `/docs` Possui arquivos de documentação do sistema.

* `/img` Possui imagens utilizadas no sistema, como os planos de fundo.

* `/js` Possui os arquivos JavaScript. No sistema, são utilizados `bootstrap` e `jQuery`. As chamadas ficam nos arquivos de visão.
