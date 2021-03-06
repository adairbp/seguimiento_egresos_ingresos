<div class="row">
    <div class="col-xs-12 col-sm-5 col-md-5">
    <h4>Editar transaccion</h4>
    <form action="<?php echo APP_URL."/transactions/edit"; ?>" method="POST">
    	<input type="hidden" name="id" value="<?php echo $transaction["id"]; ?>">
        <div class="form-group">
            <label for="operation">Operación:</label>
            <?php if ($transaction["amount"] <= 0) { ?>
            <select class="form-control" name="operation" id="operation">
                <option value="egreso">Egreso</option>
                <option value="ingreso">Ingreso</option>
            </select>
            <?php } else { ?>
            <select class="form-control" name="operation" id="operation">
                <option value="ingreso">Ingreso</option>
                <option value="egreso">Egreso</option>
            </select>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="account_id">Cuenta:</label>
            <select class="form-control" name="account_id" id="account_id">
                <?php 
                foreach ($accounts as $account):
                    if ($account["accounts"]["id"] == $transaction["account_id"]) {
                ?>
                    <option selected value="<?php echo $account["accounts"]["id"]; ?>">
                        <?php echo $account["accounts"]["name"]; ?>
                    </option>
                <?php 
                    } else {
                ?>
                    <option value="<?php echo $account["accounts"]["id"]; ?>">
                        <?php echo $account["accounts"]["name"]; ?>
                    </option>
                <?php
                    }
                    endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="category_id">Categoría:</label>
            <select class="form-control" name="category_id" id="category_id">
                <?php 
                foreach ($categories as $category):
                    if ($category["categories"]["id"] == $transaction["category_id"]) {
                ?>
                    <option selected value="<?php echo $category["categories"]["id"]; ?>">
                        <?php echo $category["categories"]["name"]; ?>
                    </option>
                <?php 
                    } else {
                ?>
                    <option value="<?php echo $category["categories"]["id"]; ?>">
                        <?php echo $category["categories"]["name"]; ?>
                    </option>
                <?php
                    }
                    endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="3"><?php echo $transaction["description"]; ?></textarea>
        </div>
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input class="form-control" type="date" id="date" name="date" value="<?php echo $transaction["date"]; ?>">
        </div>
        <div class="form-group">
            <label for="amount">Monto:</label>
            <!-- Función abs es para convertir el numero a positivo -->
            <input class="form-control" type="number" step="any" id="amount" name="amount" value="<?php echo abs($transaction["amount"]); ?>">
        </div>
        <input class="btn btn-success" type="submit" value="Guardar">
    </form>
    </div>
</div>