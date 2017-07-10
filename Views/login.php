<!DOCTYPE html>
<html>
<?php include('header.php') ?>
<body>
<div class="panel panel-default container" id="all">
    <div class="panel-body">
        <legend>
            <h1>
                Restaurante Universitário
            </h1>
        </legend>
        <form id="login" method="POST" action="login.php">
            <?php if (isset($data['error'])){?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="alert alert-danger">
                            <strong>Erro!</strong> <?php echo $data['error'] ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i
                                class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" placeholder="Usuário" aria-describedby="sizing-addon1"
                               name="username" value="<?php if (isset($data['old_username'])) echo $data['old_username']; ?>">
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i
                                class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Senha"
                               aria-describedby="sizing-addon1" name="password">
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary btn-lg col-md-12">Entrar</button>
                </div>
            </div>
            <br/>
        </form>
    </div>
</div>
</body>
</html>
