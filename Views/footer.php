<div id="acoes" style="position: absolute; right: 0; bottom: 0;">
<?php    
    if($admin) {
?>
    <a href="main.php">
        <button type="button" class="btn btn-primary">Início</button>
    </a>
    <a href="cadastro.php">
        <button type="button" class="btn btn-primary">Cadastrar Usuário</button>
    </a>
    <a href="inserir.php">
        <button type="button" class="btn btn-primary">Recarregar Usuário</button>
    </a>
<?php
    }
?>
    <a href="logout.php">
        <button type="button" class="btn btn-primary">Sair <i class="glyphicon glyphicon-share"></i></button>
    </a>
</div>