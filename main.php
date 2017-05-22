<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador RU | Main</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-cutlery"></i></span>
                <input type="text" class="form-control" placeholder="código" autofocus="autofocus"
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
            <div class="col-md-offset-1">
				<span class="label label-danger" style="font-size: 50px;">
					R$ 0,00
				</span>
            </div>
        </div>
    </form>
</div>
</body>
</html>