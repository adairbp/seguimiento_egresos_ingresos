<div class="row">
	<div class="col-xs-12 col-sm-5 col-md-5">
	<h3>Inicio de sesion</h3>
	<form action="<?php echo APP_URL."/users/login"; ?>" method="POST">
		<div class="form-group">
			<label for="username">Usuario:</label>
			<input class="form-control" type="text" name="username">
		</div>
		<div class="form-group">
			<label for="password">Contraseña:</label>
			<input class="form-control" type="password" name="password">
		</div>
		<input class="btn btn-success" type="submit" value="Iniciar sesión">
	</form>
	</div>
</div>