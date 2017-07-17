<!DOCTYPE html>
<html>
<?php include_once('header.php') ?>
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
<?php include_once('footer.php') ?>
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