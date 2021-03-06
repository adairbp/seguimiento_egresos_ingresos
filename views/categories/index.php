<script>
	function confirmarEliminacion($id)
	{
		eliminar = confirm("¿Deseas eliminar este registro?");
		if (eliminar)
			window.location.href = "<?php echo APP_URL.'/categories/delete/';?>"+$id;
		else
			alert("Eliminación cancelada");
	}
</script>

<div class="row">
	<h4>Lista de categorías</h4>
	<a class="btn btn-success" href="<?php echo APP_URL.'/categories/add/'; ?>">Add</a>
	<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<caption>
			<h4>Total of registers: <?php echo $categoriesCount; ?></h4>
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
		if (!empty($categories)) {
			foreach ($categories as $type): 
		?>
		<tr>
			<th><?php echo $type["categories"]["id"]; ?></th>
			<td><?php echo $type["categories"]["name"]; ?></td>
			<td>
				<?php echo $this->Html->link("Editar", array(
					"controller"=>"categories", 
					"method"=>"edit", 
					"arg" => $type["categories"]["id"]
				)); ?>
				<button class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $type["categories"]["id"]; ?>);">
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