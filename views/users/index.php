<script>
	function confirmarEliminacion($id)
	{
		eliminar = confirm("¿Deseas eliminar este registro?");
		if (eliminar)
			window.location.href = "<?php echo APP_URL.'/users/delete/';?>"+$id;
		else
			alert("Eliminación cancelada");
	}
</script>

<div class="row">
	<h4>Lista usuarios</h4>
	<a class="btn btn-success" href="<?php echo APP_URL.'/users/add/'; ?>">Agregar</a>
	<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<caption>
			<h4>Total de registros: <?php echo $usersCount; ?></h4>
		</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre usuario</th>
				<th>Contraseña</th>
				<th>Tipo</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if (!empty($users)) {
			foreach ($users as $user): 
		?>
		<tr>
			<th><?php echo $user["users"]["id"]; ?></th>
			<td><?php echo $user["users"]["username"]; ?></td>
			<td><?php echo $user["users"]["password"]; ?></td>
			<td><?php echo $user["types"]["name"]; ?></td>
			<td>
				<?php echo $this->Html->link("Editar", array(
					"controller"=>"users", 
					"method"=>"edit", 
					"arg" => $user["users"]["id"]
				)); ?>
				<button class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $user["users"]["id"]; ?>);">
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