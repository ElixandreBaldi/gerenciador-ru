<!DOCTYPE html>
<html>
<?php include_once('header.php') ?>
<body>
<div id="all">
    <form action="recarga.php" method="POST">
        <div class="panel-heading">
        <legend>Recarga de Créditos</legend>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                <input id="entrada-codigo" name="registro" type="text" class="form-control" placeholder="Insira o cartão do cliente" autofocus="autofocus"
                       aria-describedby="sizing-addon1">
                <span class="input-group-btn"><button class="btn btn-default" type="submit button"><i
                                class="glyphicon glyphicon-ok"></i></button></span>
            </div>
        </div>
    </form>
    <?php
        if(isset($registro)) {
    ?>
    <div class="panel-body">
        <form action="recarga.php" method="PUT">
            <?php
                if ($nivel == "registro_academico") {
            ?>
            <div id="aluno">
                <legend>Aluno</legend>
                <div class="form-group col-md-5">
                    <label for="ra">Registro Acadêmico:</label>
                    <input type="text" value="<?=$registro;?>" class="form-control" disabled name="ra"/>
                </div>
                <div class="form-group col-md-7">
                    <label for="nome-academico">Nome:</label>
                    <input type="text" value="<?=$nomeUsuarioRecarga;?>" class="form-control" disabled name="nome-academico"/>
                </div>
            </div>
            <?php
                }else {
            ?>
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
            <?php
                }
            ?>
            <div id="input-carga">
                <div class="form-group col-md-7">
                    <label for="ra">Quantidade da Carga:</label>
                    <input type="number" id="valor-carga" class="form-control" name="quantidade-carga"/>
                    <input type="hidden" name="nivel" value="<?=$nivel?>"/>
                    <input type="hidden" name="registro" value="<?=$registro?>"/>
                </div>
            </div>
            <div id="valor">
                <div class="form-group col-md-7" style="margin-top:10px;">
                    <button type="submit" class="btn button">
                <span class="label label-success" id="valor-recarga" style="font-size: 50px;">
                    R$ 0,00
                </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
        <?php
            }
        ?>
</div>
<?php include_once('footer.php') ?>
<script>
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