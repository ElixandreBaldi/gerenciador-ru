<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador RU | Efetuar Recarga</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>    
    <script type="text/javascript" src="js/script.js"></script>

    <style type="text/css">
        body {
            background: url('img/imgs<?php echo rand(1,3);?>.jpg');
        }
    </style>
</head>
<body>
<div id="all">
    <form>
        <div class="panel-heading">
        <legend>Histórico do Usuário</legend>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                <input id="entrada-codigo" type="text" class="form-control" placeholder="Insira o cartão do cliente" autofocus="autofocus"
                       aria-describedby="sizing-addon1">
                <span class="input-group-btn"><button class="btn btn-default" type="button"><i
                                class="glyphicon glyphicon-ok"></i></button></span>
            </div>
        </div>

        <div class="panel-body">
            <div id="tabela-log">                
                <div class="col-md-10 col-md-offset-1">                                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Data Refeição
                                </th>
                                <th>
                                    Hora da Refeição
                                </th>
                                <th>
                                    Valor
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    19/6/2017
                                </td>
                                <td>
                                    12:37
                                </td>
                                <td>
                                    R$ 2,50
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    15/6/2017
                                </td>
                                <td>
                                    12:05
                                </td>
                                <td>
                                    R$ 2,50
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    15/6/2017
                                </td>
                                <td>
                                    18:46
                                </td>
                                <td>
                                    R$ 2,50
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
<div id="acoes" style="position: absolute; right: 0; bottom: 0;">
    <a href="main.php">
        <button type="button" class="btn btn-primary">Início</button>
    </a>  
    <a href="cadastroUsuario.php">
        <button type="button" class="btn btn-primary">Cadastrar Usuário</button>
    </a>    
    <a href="inserirCreditos.php">
        <button type="button" class="btn btn-primary">Recarregar Usuário</button>
    </a>
    <a href="index.php">
        <button type="button" class="btn btn-primary">Sair <i class="glyphicon glyphicon-share"></i></button>
    </a>  
</div>
<script>
    $('#tabela-log').hide();
    $('#entrada-codigo').blur(function () {
        var cod = $('#entrada-codigo').val();
        if ((cod.length >= 4)) {
            if (cod[0] === '1') {
                $('#tabela-log').show();
            } else {                
                $('#tabela-log').show();
            }
        }
    });    
</script>
</body>
</html>