<div class="row">
<div class="col-xs-12 col-sm-5 col-md-5">
    <h4>Editar categoría</h4>
    <form action="<?php echo APP_URL."/categories/edit"; ?>" method="POST">
    	<input type="hidden" name="id" value="<?php echo $category["id"]; ?>">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input class="form-control" type="text" name="name" value="<?php echo $category["name"]; ?>">
        </div>
        <input class="btn btn-success" type="submit" value="Guardar">
    </form>
</div>
</div>