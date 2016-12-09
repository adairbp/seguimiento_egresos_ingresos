<script>
	function confirmarEliminacion($id)
	{
		eliminar = confirm("¿Deseas eliminar este registro?");
		if (eliminar)
			window.location.href = "<?php echo APP_URL.'/types/delete/';?>"+$id;
		else
			alert("Eliminación cancelada");
	}
</script>

<div class="row">
	<h4>Lista tipo usuarios</h4>
	<a class="btn btn-success" href="<?php echo APP_URL.'/types/add/'; ?>">Agregar</a>
	<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<caption>
			<h4>Total de registros: <?php echo $typesCount; ?></h4>
		</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if (!empty($types)) {
			foreach ($types as $type): 
		?>
		<tr>
			<th><?php echo $type["types"]["id"]; ?></th>
			<td><?php echo $type["types"]["name"]; ?></td>
			<td>
				<?php echo $this->Html->link("Editar", array(
					"controller"=>"types", 
					"method"=>"edit", 
					"arg" => $type["types"]["id"]
				)); ?>
				<button class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $type['types']['id']; ?>);">
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