<?php if(isset($usuario)): ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>House Manager</title>
<link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap.css" />
<link rel="stylesheet" href="lib/JSafo/core/JSafo.css" />
<link rel="stylesheet" href="lib/JSafo/themes/desktop.css" />
<link rel="stylesheet" href="css/housemanager.css" />
<link rel="stylesheet" href="lib/JSafo/plugins/TabNavigator/TabNavigator.css" />
<link rel="stylesheet" href="lib/JSafo/plugins/DataGrid/DataGrid.css" />
<link rel="stylesheet" href="css/botao.css" />
<script type="text/javascript" src="lib/bootstrap-3.1.1-dist/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="lib/bootstrap-3.1.1-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="lib/JSafo/core/JSafo.js"></script>
<script type="text/javascript" src="lib/JSafo/core/config.js"></script>
<script type="text/javascript" src="lib/JSafo/plugins/TabNavigator/TabNavigator.js"></script>
<script type="text/javascript" src="lib/JSafo/plugins/Form/Form.js"></script>
<script type="text/javascript" src="lib/JSafo/plugins/DataGrid/DataGrid.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/comodos.js"></script>
<script type="text/javascript" src="js/dispositivos.js"></script>
<script type="text/javascript" src="js/usuarios.js"></script>
</head>
<body>
<?php if($usuario->nome): ?>
<div id="sistema">
	<form id="topo" method="post">
		<div>
			<span class="label">Usuário:</span>
			<span class="nome"><?= $usuario->nome ?></span>
		</div>
		<input type="submit" name="acao" class="btn btn-primary" value="Sair" />
	</form>
	<h1>House Manager</h1>
	<hr />
	<?php if($usuario->administra): ?>
	<div class="JSafo TabNavigator">
		<a onclick="carregarModulo('inicio')" class="active">Inicio</a>
		<a onclick="carregarModulo('comodos')">Cômodos</a>
		<a onclick="carregarModulo('dispositivos')">Dispositivos</a>
		<a onclick="carregarModulo('usuarios')">Usuarios</a>
		<div id="inicio" class="active">
			Carregando dispositivos...
		</div>
		<div title="Comodos">
			<?php include 'php/telas/comodos.php' ?>
		</div>
		<div title="Dispositivos">
			<?php include 'php/telas/dispositivos.php' ?>
		</div>
		<div title="Usuários">
			<?php include 'php/telas/usuarios.php' ?>
		</div>
	</div>
	<?php else: ?>
	<div id="inicio">
		<?php include 'php/telas/inicio.php'; ?>
	</div>
	<?php endif; ?>
</div>
<?php else: ?>
<form id="login" method="post">
	<h1>House Manager</h1>
	<?php include 'php/includes/alerta-erro.php'; ?>
	<fieldset>
    	<div class="form-group">
    		<label>Login:</label>
        	<input class="form-control" type="text" name="login" value="<?= $login ?>" />
        </div>
    	<div class="form-group">
        	<label>Senha:</label>
        	<input class="form-control" type="password" name="senha" />
        </div>
		<input type="submit" name="acao" class="btn btn-default" value="Entrar" />
    </fieldset>
</form>
<?php endif; ?>
</body>
</html>
<?php endif; ?>