<!DOCTYPE html>
<html>
<?php include_once('header.php') ?>
<body>
<div id="all">
    <form>
        <div class="panel-heading">
            <legend>Histórico do Usuário</legend>
            <?php if (isset($admin) && $admin) { ?>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="entrada-codigo" class="form-control" placeholder="Insira o cartão do cliente"
                           autofocus
                           aria-describedby="sizing-addon1">
                    <span class="input-group-btn"><button class="btn btn-default" type="button"><i
                                    class="glyphicon glyphicon-ok"></i></button></span>
                </div>
                <?php
            } else {
                ?>
                <div class="col-md-10 col-md-offset-1">
                    <legend><h3>Bem vindo, <?=$nomeUsuario?>.</h3></legend>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="panel-body">
            <div id="tabela-log">
                <div class="col-md-10 col-md-offset-1">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                Data e Hora da Transação
                            </th>
                            <th>
                                Valor
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($transactions as $t) {
                            ?>
                            <tr>
                                <td>
                                    <?=$t->getCriadoEm()?>
                                </td>
                                <td>
                                    <span class="label <?= ($t->isConsume() ? 'label-danger' : 'label-success') ?>">
                                    <?= $t->getValor() ?>
                                    </span>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="col-md-offset-1" id="valor">
                        <a href="historico.php" class="btn button">
                            <span class="label label-success" style="font-size: 50px;">
                                Saldo: R$ <?=$saldo?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include_once('footer.php') ?>
</body>
</html>