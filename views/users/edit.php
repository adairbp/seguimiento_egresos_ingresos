<div class="row">
    <div class="col-xs-12 col-sm-5 col-md-5">
        
    <h4>Editar usuario</h4>
    <form action="<?php echo APP_URL."/users/edit"; ?>" method="POST">
    	<input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
        <div class="form-group">
            <label for="username">Nombre usuario:</label>
            <input class="form-control" type="text" name="username" value="<?php echo $user["username"]; ?>">
        </div>
        <div class="form-group">
            <label for="newPassword">Nueva contraseña:</label>
            <input class="form-control" type="password" name="newPassword">
        </div>
        <div class="form-group">
            <label for="type_id">Tipo:</label>
            <select class="form-control" name="type_id" id="type_id">
                <?php 
                foreach ($types as $type):
                    if ($type["types"]["id"] == $user["type_id"]) {
                ?>
                    <option selected value="<?php echo $type["types"]["id"]; ?>">
                        <?php echo $type["types"]["name"]; ?>
                    </option>
                <?php 
                    } else {
                ?>
                    <option value="<?php echo $type["types"]["id"]; ?>">
                        <?php echo $type["types"]["name"]; ?>
                    </option>
                <?php
                    }
                    endforeach;
                ?>
            </select>
        </div>
        <input class="btn btn-success" type="submit" value="Guardar">
    </form>

    </div>
</div>