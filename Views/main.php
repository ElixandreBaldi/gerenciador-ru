<!DOCTYPE html>
<html>
<?php include_once('header.php') ?>
<body>
<div id="all">
<?php if (isset($_SESSION['consume_success'])) { ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <?php if ($_SESSION['consume_success']) { ?>
            <div class="alert alert-success">
                <strong>Sucesso!</strong> Consumo efetuado com sucesso!
            </div>
        <?php } else { ?>
            <div class="alert alert-danger">
                <strong>Erro!</strong>
                <?php
                if (isset($_SESSION['consume_error'])) {
                    foreach ($_SESSION['consume_error'] as $error) {
                        echo "<br>" . $error;
                    }
                    unset($_SESSION['consume_error']);
                }
                ?>
            </div>
        <?php } ?>
        </div>
    </div>
    <?php
        unset ($_SESSION['consume_success']);}
        if (!isset($_SESSION['to_consume'])) {
    ?>
    <form method="POST" action="consumir.php">
        <div class="panel-heading">
            <legend>Consumir Refeição</legend>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-cutlery"></i></span>
                <input name="novoRegistroConsumo" id="entrada-codigo" class="form-control" placeholder="Insira o cartão do cliente" autofocus="autofocus"
                       aria-describedby="sizing-addon1">
                <span class="input-group-btn"><button class="btn btn-default"><i
                                class="glyphicon glyphicon-ok"></i></button></span>
            </div>
        </div>
    </form>
    <?php } else {
        if ($_SESSION['to_consume']['nivel_str'] == 'registro_academico') {?>
        <div class="panel-body">
            <div id="aluno">
                <legend>Aluno</legend>
                <div class="form-group col-md-5">
                    <label for="ra">Registro Acadêmico:</label>
                    <input value="<?=$_SESSION['to_consume']['registro'];?>" class="form-control" readonly name="ra"/>
                </div>
                <div class="form-group col-md-7">
                    <label for="ra">Nome:</label>
                    <input value="<?=$_SESSION['to_consume']['nome'];?>" class="form-control" readonly name="ra"/>
                </div>
            </div>
            <?php
                    } else {
            ?>
            <div id="servidor">
                <legend>Servidor</legend>
                <div class="form-group col-md-5">
                    <label for="ra">Registro Universitáro:</label>
                    <input value="<?=$_SESSION['to_consume']['registro'];?>" class="form-control" readonly="readonly" name="ra"/>
                </div>
                <div class="form-group col-md-7">
                    <label for="ra">Nome:</label>
                    <input value="<?=$_SESSION['to_consume']['nome'];?>" class="form-control" readonly="readonly" name="ra"/>
                </div>
            </div>
            <?php
                    }
            ?>
            <br/><br/><br/><br/><br/>
            <div class="col-md-offset-1" id="valor">
                <form action="consumir.php" method="POST">
                    <input type="hidden" value="<?=$_SESSION['to_consume']['id'];?>" name="consumidor">
                    <button href="main.php" class="btn button">
                        <span class="label label-danger" style="font-size: 50px;">
                            <?="R$ ".$_SESSION['to_consume']['valor'];?> <i class="glyphicon glyphicon-refresh"></i>
                        </span>
                    </button>
                </form>
            </div>
            <?php
            unset($_SESSION['to_consume']); }
            ?>
        </div>
</div>
<?php include_once('footer.php') ?>
</body>
</html>