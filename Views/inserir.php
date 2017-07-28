<!DOCTYPE html>
<html>
<?php include_once('header.php') ?>
<body>
<div id="all">
    <?php if (isset($_SESSION['insert_success'])) { ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php if ($_SESSION['insert_success']) { ?>
                    <div class="alert alert-success">
                        <strong>Sucesso!</strong> Credito adicionado!
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger">
                        <strong>Erro!</strong>
                        <?php
                        if (isset($_SESSION['insert_error'])) {
                            foreach ($_SESSION['insert_error'] as $error) {
                                echo "<br>".$error;
                            }
                            unset($_SESSION['insert_error']);
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php unset($_SESSION['insert_success']);
    }
    if (! isset($_SESSION['to_insert'])) {
        ?>
        <form action="recarga.php" method="POST">
            <div class="panel-heading">
                <legend>Recarga de Créditos</legend>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><i
                                class="glyphicon glyphicon-user"></i></span>
                    <input id="entrada-codigo" name="registro" class="form-control"
                           placeholder="Insira o cartão do cliente" autofocus
                           aria-describedby="sizing-addon1">
                    <span class="input-group-btn"><button class="btn btn-default" type="submit button"><i
                                    class="glyphicon glyphicon-ok"></i></button></span>
                </div>

            </div>
        </form>
        <?php
    }
    if (isset($_SESSION['to_insert'])) {
        ?>
        <div class="panel-body">
            <legend>Recarga de Créditos</legend>
            <form action="recarga.php" method="POST">
                <?php
                if ($_SESSION['to_insert']['nivel'] == "registro_academico") {
                    ?>
                    <div id="aluno">
                        <legend>Aluno</legend>
                        <div class="form-group col-md-5">
                            <label for="ra">Registro Acadêmico:</label>
                            <input value="<?=$_SESSION['to_insert']['registro']?>" class="form-control" disabled
                                   name="ra"/>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="nome-academico">Nome:</label>
                            <input value="<?=$_SESSION['to_insert']['usuario'];?>" class="form-control" disabled
                                   name="nome-academico"/>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div id="servidor">
                        <legend>Servidor</legend>
                        <div class="form-group col-md-5">
                            <label for="ra">Registro Universitáro:</label>
                            <input class="form-control" disabled name="ra"/>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="nome-servidor">Nome:</label>
                            <input class="form-control" disabled name="nome-servidor"/>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div id="input-carga">
                    <div class="form-group col-md-7">
                        <label for="ra">Quantidade da Carga:</label>
                        <input type="number" id="valor-carga" class="form-control" name="quantidade-carga"/>
                        <input type="hidden" name="nivel" value="<?=$_SESSION['to_insert']['nivel']?>"/>
                        <input type="hidden" name="registro" value="<?=$_SESSION['to_insert']['registro']?>"/>
                    </div>
                </div>
                <div id="valor">
                    <div class="form-group col-md-7" style="margin-top:10px;">
                        <button class="">
                <span class="label label-success" id="valor-recarga" style="font-size: 50px;">
                    R$ 0,00
                </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        unset($_SESSION['to_insert']);
    }
    ?>
</div>
<?php include_once('footer.php') ?>
<script>
    $("#valor-carga").blur(function () {
        var num = parseFloat($('#valor-carga').val()).toFixed(2);
        if (isNaN(num) || num < 0) {
            num = '0.00';
        }
        var string = ("R$ " + num).replace('.', ',');
        $("#valor-recarga").html(string + ' <i class="glyphicon glyphicon-refresh"></i>');
    });
</script>
</body>
</html>