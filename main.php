<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador RU | Principal</title>
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
            <legend>Consumir Refeição</legend>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-cutlery"></i></span>
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
                    <input type="text" class="form-control" readonly="readonly" name="ra"/>
                </div>
                <div class="form-group col-md-7">
                    <label for="ra">Nome:</label>
                    <input type="text" class="form-control" readonly="readonly" name="ra"/>
                </div>
            </div>
            <div id="servidor">
                <legend>Servidor</legend>
                <div class="form-group col-md-5">
                    <label for="ra">Registro Universitáro:</label>
                    <input type="text" class="form-control" readonly="readonly" name="ra"/>
                </div>
                <div class="form-group col-md-7">
                    <label for="ra">Nome:</label>
                    <input type="text" class="form-control" readonly="readonly" name="ra"/>
                </div>
            </div>
            <br/><br/><br/><br/><br/>
            <div class="col-md-offset-1" id="valor">
                <a href="main.php" class="btn button">
    				<span class="label label-danger" style="font-size: 50px;">
    					R$ 0,00 <i class="glyphicon glyphicon-refresh"></i>
    				</span>
                </a>
            </div>            
        </div>
    </form>
</div>

<div id="acoes" style="position: absolute; right: 0; bottom: 0;">
    <a href="cadastroUsuario.php">
        <button type="button" class="btn btn-primary">Cadastrar Usuário</button>
    </a>
    <a href="inserirCreditos.php">
        <button type="button" class="btn btn-primary">Recarregar Usuário</button>
    </a>
    <a href="logUsuario.php">
        <button type="button" class="btn btn-primary">Consultar Histórico </button>
    </a> 
    <a href="index.php">
        <button type="button" class="btn btn-primary">Sair <i class="glyphicon glyphicon-share"></i> </button>
    </a>    
</div>

<script>
    $('#servidor,#aluno,#valor').hide();
    $('#entrada-codigo').blur(function () {
        var cod = $('#entrada-codigo').val();
        if ((cod.length >= 4)) {
            if (cod[0] === '1') {
                $('#aluno').hide();
                $('#servidor,#valor').show();
            } else {
                $('#servidor').hide();
                $('#aluno,#valor').show();
            }
        }
    });
</script>
</body>
</html>