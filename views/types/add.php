<div class="row">
	<div class="col-xs-12 col-sm-5 col-md-5">
		
    <h4>Agregar tipo usuario</h4>
    <form action="<?php echo APP_URL."/types/add"; ?>" method="POST">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input class="form-control" type="text" id="name" name="name">
        </div>
        <input class="btn btn-success" type="submit" value="Guardar">
    </form>

    </div>
</div>