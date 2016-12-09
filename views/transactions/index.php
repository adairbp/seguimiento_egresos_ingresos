<script>
	function confirmarEliminacion($id)
	{
		eliminar = confirm("¿Deseas eliminar este registro?");
		if (eliminar)
			window.location.href = "<?php echo APP_URL.'/transactions/delete/';?>"+$id;
		else
			alert("Eliminación cancelada");
	}
</script>

<div class="row">
	<h4>Lista de transacciones</h4>
	<a class="btn btn-success" href="<?php echo APP_URL.'/transactions/add/'; ?>">Agregar</a>

	<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<caption>
			<h4>Total de registros: <?php echo $transactionsCount; ?></h4>
			<p>
				<strong>Balance:</strong> $
				<?php
				//Función para convertir la cantidad con números decimales
				echo number_format($transactionsSuma, 2, '.', ',');
				?>
			</p>
		</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>Cuenta</th>
				<th>Categoría</th>
				<th>Descripcion</th>
				<th>Fecha</th>
				<th>Monto</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if (!empty($transactions)) {
			foreach ($transactions as $transaction):
		?>
		<tr>
			<th><?php echo $transaction["transactions"]["id"]; ?></th>
			<td><?php echo $transaction["accounts"]["name"]; ?></td>
			<td><?php echo $transaction["categories"]["name"]; ?></td>
			<td><?php echo $transaction["transactions"]["description"]; ?></td>
			<td>
				<?php
					$date = $transaction["transactions"]["date"];
					//FUNCION para convertir la fecha año/mes/dia de la BD a dia/mes/año
					$newDate = @date('d-m-Y', strtotime($date));
					//Impresión de la nueva fecha
					echo $newDate;
				?>
			</td>
			<td>
				<?php
				//CONDICIÓN para interpretar si es un egreso o un ingreso.
					$amount = $transaction["transactions"]["amount"];
					//Si es menor o igual a cero es un egreso
					if ($amount <= 0) {
						//FUNCIÓN para convertir a decimales
						$newAmount = number_format($amount, 2, '.', ',');
						echo "<span style='color: #f55549; font-weight: bold;'> $ ".$newAmount."</span>";
					} else {
					//Si es mayor a cero es un ingreso
						//FUNCIÓN para convertir a decimales
						$newAmount = number_format($amount, 2, '.', ',');
						echo "<span style='color: #4caf50; font-weight: bold;'> $ ".$newAmount."</span>";
					}
				?>
			</td>
			<td>
				<?php echo $this->Html->link("Editar", array(
					"controller"=>"transactions",
					"method"=>"edit",
					"arg" => $transaction["transactions"]["id"]
				)); ?>
				<button class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $transaction["transactions"]["id"]; ?>);">
					Eliminar
				</button>
			</td>
		</tr>
		<?php
			endforeach;
		}
		?>
		</tbody>
	</table>
	</div>
</div>
