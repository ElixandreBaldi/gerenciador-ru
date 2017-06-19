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
        <legend>Recarga de Créditos</legend>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                <input id="entrada-codigo" type="text" class="form-control" placeholder="Insira o cartão do cliente" autofocus="autofocus"
                       aria-describedby="sizing-addon1">
                <span class="input-group-btn"><button class="btn btn-default" type="button"><i
                                class="glyphicon glyphicon-ok"></i></button></span>
            </div>
        </div>

        <div class="panel-body">
            <div id="aluno">
                <legend>Aluno</legend>
                <div class="form-group col-md-5">
                    <label for="ra">Registro Acadêmico:</label>
                    <input type="text" class="form-control" disabled name="ra"/>
                </div>
                <div class="form-group col-md-7">
                    <label for="nome-academico">Nome:</label>
                    <input type="text" class="form-control" disabled name="nome-academico"/>
                </div>
            </div>
            <div id="servidor">
                <legend>Servidor</legend>
                <div class="form-group col-md-5">
                    <label for="ra">Registro Universitáro:</label>
                    <input type="text" class="form-control" disabled name="ra"/>
                </div>
                <div class="form-group col-md-7">
                    <label for="nome-servidor">Nome:</label>
                    <input type="text" class="form-control" disabled name="nome-servidor"/>
                </div>
            </div>
            <div id="input-carga">
                <div class="form-group col-md-7">
                    <label for="ra">Quantidade da Carga:</label>
                    <input type="number" id="valor-carga" class="form-control" name="quantidade-carga"/>
                </div>
            </div>                        
            <div id="valor">
                <div class="form-group col-md-7" style="margin-top:10px;">
                    <a href="inserirCreditos.php" class="btn button">
        				<span class="label label-success" id="valor-recarga" style="font-size: 50px;">
        					R$ 0,00
        				</span>
                    </a>
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
    <a href="logUsuario.php">
        <button type="button" class="btn btn-primary">Consultar Histórico </button>
    </a> 
    <a href="index.php">
        <button type="button" class="btn btn-primary">Sair <i class="glyphicon glyphicon-share"></i></button>
    </a>  
</div>
<script>
    $('#servidor,#aluno,#valor,#input-carga').hide();
    $('#entrada-codigo').blur(function () {
        var cod = $('#entrada-codigo').val();
        if ((cod.length >= 4)) {
            if (cod[0] === '1') {
                $('#aluno').hide();
                $('#servidor,#valor,#input-carga').show();
            } else {
                $('#servidor').hide();
                $('#aluno,#valor,#input-carga').show();
            }
        }
    });
    $("#valor-carga").blur(function(){
        var num = parseFloat($('#valor-carga').val()).toFixed(2);
        if (isNaN(num) || num < 0) {
            num = '0.00';
        }
        var string = ("R$ " + num).replace('.',',');
        $("#valor-recarga").html(string+' <i class="glyphicon glyphicon-refresh"></i>');
    });
</script>
</body>
</html>