<script>
	function confirmarEliminacion($id)
	{
		eliminar = confirm("¿Deseas eliminar este registro?");
		if (eliminar)
			window.location.href = "<?php echo APP_URL.'/accounts/delete/';?>"+$id;
		else
			alert("Eliminación cancelada");
	}
</script>

<div class="row">
	<h4>Lista de cuentas</h4>

	<a class="btn btn-success" href="<?php echo APP_URL.'/accounts/add/'; ?>">Agregar</a>

	<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<caption>
			<h4>Total de registros: <?php echo $accountsCount; ?></h4>
		</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre usuario</th>
				<th>Numero</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if (!empty($accounts)) {
			foreach ($accounts as $account):
		?>
		<tr>
			<th><?php echo $account["accounts"]["id"]; ?></th>
			<td><?php echo $account["users"]["username"]; ?></td>
			<td><?php echo $account["accounts"]["name"]; ?></td>
			<td>
				<?php echo $this->Html->link("Editar", array(
					"controller"=>"accounts",
					"method"=>"edit",
					"arg" => $account["accounts"]["id"]
				)); ?>
				<button class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $account["accounts"]["id"]; ?>);">
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
