<!DOCTYPE html>
<html>
<?php include_once('header.php') ?>
<body>
<div id="all">
    <form method="POST" action="cadastro.php">
        <div class="panel-heading">
            <legend>Cadastro de Usuário</legend>
        </div>
        <?php if (isset($success)){?>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php if ($success) {?>
                    <div class="alert alert-success">
                        <strong>Sucesso!</strong> Usuário inserido!
                    </div>
                    <?php } else { ?>
                        <div class="alert alert-danger">
                            <strong>Erro!</strong> Não foi possível inserir o usuário.
                            <?php
                            if (isset($errors)) {
                                foreach($errors as $error) {
                                    echo "<br>".$error;
                                }
                            }
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="panel-body">
            <form>          
            	<div class="form-group col-md-12">
	            	<div class="col-md-7">
	            		<div class="input-group input-group-md">
			                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
			                <input class="form-control" placeholder="Usuario" autofocus aria-describedby="sizing-addon1" name="username" required>
			            </div>
	            	</div>
	            	<div class="col-md-5">
	            		<div class="input-group input-group-md">
			                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
			                <input type="password" class="form-control" placeholder="Senha" aria-describedby="sizing-addon1" name="password" required>
			            </div>
	            	</div>
	            </div>
	            <div class="form-group col-md-12">	            	 
	            	<div class="col-md-5">
	            		<div class="input-group input-group-md">
			                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tags"></i></span>
			                <select class="form-control" id="nivel" aria-describedby="sizing-addon1" name="type">
			                	<option class="form-control" value="0">Nível...</option>
			                	<option class="form-control" value="1">Aluno</option>
			                	<option class="form-control" value="2">Servidor</option>
			                </select>
			            </div>
	            	</div>
	            	<div class="col-md-7" id="registro-academico">
	            		<div class="input-group input-group-md">
			                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-education"></i></span>
			                <input  class="form-control" name="acad-reg" placeholder="Registro Acadêmico" aria-describedby="sizing-addon1">
			            </div>
	            	</div>
	            	<div class="col-md-7" id="registro-universitario">
	            		<div class="input-group input-group-md">
			                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-certificate"></i></span>
			                <input type="text" class="form-control" name="univ-reg" placeholder="Registro Universitário" aria-describedby="sizing-addon1">
			            </div>
	            	</div>	
	            </div>   
	            <div class="form-group col-md-12">	            	 
	            	<button class="btn btn-primary btn-md col-md-offset-8 col-md-3">Enviar</button>
	            </div>	                   
            </form>
        </div>
    </form>
</div>
<?php include_once('footer.php') ?>
<script>
	$('#registro-academico,#registro-universitario').hide();
    $('#nivel').change(function () {
        var cod = $('#nivel').val();
        if( cod == 0) {
            $('#registro-academico,#registro-universitario').hide();
        }
        else if (cod == 1) {
            $('#registro-universitario').hide();
            $('#registro-academico').show();
        }
        else if(cod == 2){
            $('#registro-academico').hide();
            $('#registro-universitario').show();
        
        }
    });
</script>
</body>
</html>