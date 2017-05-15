<!DOCTYPE html>
<html>
<head>
	<title>Gerenciador RU</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.min.css">
	<style type="text/css">
		body{
			background: url(img/img<?php echo rand(1,7);?>.jpg);			
		}
	</style>
</head>
<body>
<div class="panel panel-default container" id="all">
  <div class="panel-body">
  	
  	<legend>
  		<h1>
  			Restaurante Universitário
  		</h1>
  	</legend>
    <form id="login">
	    <div class="row">
	    	<div class="col-md-6 col-md-offset-3">
				<div class="input-group input-group-lg">
					<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" class="form-control" placeholder="Usuário" aria-describedby="sizing-addon1">
				</div>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="input-group input-group-lg">
					<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" class="form-control" placeholder="Senha" aria-describedby="sizing-addon1">
				</div>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<a href="main.php"><button type="button" class="btn btn-primary btn-lg col-md-12">Entrar</button></a>
			</div>
		</div>

    </form>
  </div>
</div>
</body>
</html>
