<!DOCTYPE html>
<html>
<?php include_once('header.php') ?>
<body>
<div id="all">
<?php if (isset($success)) { ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <?php if ($success) { ?>
            <div class="alert alert-success">
                <strong>Sucesso!</strong> Consumo efetuado com sucesso!
            </div>
        <?php } else { ?>
            <div class="alert alert-danger">
                <strong>Erro!</strong> Não foi possível inserir o usuário.
                <?php
                if (isset($errors)) {
                    foreach ($errors as $error) {
                        echo "<br>" . $error;
                    }
                }
                ?>
            </div>
        <?php } ?>
        </div>
    </div>
    <script>
        function disable_f5(e) {
            if ((e.which || e.keyCode) == 116) {
                e.preventDefault();
            }
        }

        $(document).ready(function () {
            $(document).bind("keydown", disable_f5);
        });
    </script>
    <?php
        }
    ?>
    <form method="POST" action="consumirController.php">
        <div class="panel-heading">
            <legend>Consumir Refeição</legend>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-cutlery"></i></span>
                <input name="novoRegistroConsumo" id="entrada-codigo" type="text" class="form-control" placeholder="Insira o cartão do cliente" autofocus="autofocus"
                       aria-describedby="sizing-addon1">
                <span class="input-group-btn"><button type="submit" class="btn btn-default"><i
                                class="glyphicon glyphicon-ok"></i></button></span>
            </div>
        </div>
    </form>
        <div class="panel-body">
            <?php
                if(isset($flagSearch)) {
                    if ($nivel == "registro_academico") {
            ?>
            <div id="aluno">
                <legend>Aluno</legend>
                <div class="form-group col-md-5">
                    <label for="ra">Registro Acadêmico:</label>
                    <input type="text" value="<?=$nomeUsuarioRecarga;?>" class="form-control" readonly="readonly" name="ra"/>
                </div>
                <div class="form-group col-md-7">
                    <label for="ra">Nome:</label>
                    <input type="text" value="<?=$registro;?>" class="form-control" readonly="readonly" name="ra"/>
                </div>
            </div>
            <?php
                    } else {
            ?>
            <div id="servidor">
                <legend>Servidor</legend>
                <div class="form-group col-md-5">
                    <label for="ra">Registro Universitáro:</label>
                    <input type="text" value="<?=$nomeUsuarioRecarga;?>" class="form-control" readonly="readonly" name="ra"/>
                </div>
                <div class="form-group col-md-7">
                    <label for="ra">Nome:</label>
                    <input type="text" value="<?=$registro;?>" class="form-control" readonly="readonly" name="ra"/>
                </div>
            </div>
            <?php
                    }
            ?>
            <br/><br/><br/><br/><br/>
            <div class="col-md-offset-1" id="valor">
                <form action="consumirController.php" method="POST">
                    <input type="hidden" value="<?=$registro;?>" name="consumidor">
                    <input type="hidden" value="<?=$nivel;?>" name="nivel">
                    <button type="submit" href="main.php" class="btn button">
                        <span class="label label-danger" style="font-size: 50px;">
                            <?="R$ ".$valorRefeicaoStr;?> <i class="glyphicon glyphicon-refresh"></i>
                        </span>
                    </button>
                </form>
            </div>
            <?php
                }
            ?>
        </div>
</div>
<?php include_once('footer.php') ?>
</body>
</html>