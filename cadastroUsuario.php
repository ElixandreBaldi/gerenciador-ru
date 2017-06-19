<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>  

    <style type="text/css">
        body {
            background: url('img/imgs<?php echo rand(1,3);?>.jpg');
        }
    </style>  
</head>
<body>
<div id="all">
    <form>
        <div class="panel-heading">
            <legend>Cadastro de Usuário</legend>
        </div>
        <div class="panel-body">
            <form>          
            	<div class="form-group col-md-12">
	            	<div class="col-md-7">
	            		<div class="input-group input-group-md">
			                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
			                <input type="text" class="form-control" placeholder="Nome" autofocus="autofocus" aria-describedby="sizing-addon1">                
			            </div>
	            	</div>
	            	<div class="col-md-5">
	            		<div class="input-group input-group-md">
			                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
			                <input type="password" class="form-control" placeholder="Senha" aria-describedby="sizing-addon1">                
			            </div>
	            	</div>
	            </div>
	            <div class="form-group col-md-12">	            	 
	            	<div class="col-md-5">
	            		<div class="input-group input-group-md">
			                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tags"></i></span>
			                <select class="form-control" id="nivel" aria-describedby="sizing-addon1">                
			                	<option class="form-control" value="0">Nível...</option>
			                	<option class="form-control" value="1">Aluno</option>
			                	<option class="form-control" value="2">Servidor</option>
			                </select>
			            </div>
	            	</div>
	            	<div class="col-md-7" id="registroAcademico">
	            		<div class="input-group input-group-md">
			                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-education"></i></span>
			                <input type="text" class="form-control" placeholder="Registro Acadêmico" aria-describedby="sizing-addon1">
			            </div>
	            	</div>
	            	<div class="col-md-7" id="registroUniversitario">
	            		<div class="input-group input-group-md">
			                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-certificate"></i></span>
			                <input type="text" class="form-control" placeholder="Registro Universitário" aria-describedby="sizing-addon1">
			            </div>
	            	</div>	
	            </div>   
	            <div class="form-group col-md-12">	            	 
	            	<button type="submit" class="btn btn-primary btn-md col-md-offset-8 col-md-3">Enviar</button>
	            </div>	                   
            </form>
        </div>
    </form>
</div>
<script>
	$('#registroAcademico,#registroUniversitario').hide();
    $('#nivel').change(function () {        
        var cod = $('#nivel').val();
        if( cod == 0)
        	$('#registroAcademico,#registroUniversitario').hide();
        else if (cod == 1) {
            $('#registroUniversitario').hide();
            $('#registroAcademico').show();
        }
        else if(cod == 2){
            $('#registroAcademico').hide();
            $('#registroUniversitario').show();
        
        }
    });
</script>
</body>
</html>