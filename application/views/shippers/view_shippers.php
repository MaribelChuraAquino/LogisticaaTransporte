<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Remitentes | <a href="<?php echo base_url('shipper/add_shippers'); ?>">
			<button class="btn btn-info btn-sm">Agregar remitente</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Remitente</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Ver remitentes</h3>
				</div>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="text text-center">
							<?php
							$message = '';
							if (isset($this->session->message)) {
								$message = $this->session->message;
								if ($message == "Record Updated Successfully") { ?>
									<div class="alert alert-success">
										<button class="close" data-dismiss="alert">×</button>
										<?php echo htmlspecialchars($message); ?>
									</div>
								<?php } elseif ($message == "Data Deleted Successfully") { ?>
									<div class="alert alert-success">
										<button class="close" data-dismiss="alert">×</button>
										<?php echo htmlspecialchars($message); ?>
									</div>
								<?php } else { ?>
									<div class="alert alert-danger">
										<button class="close" data-dismiss="alert">×</button>
										<?php echo htmlspecialshars($message); ?>
									</div>
								<?php } ?>
							<?php }
							?>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body" style="overflow-y: scroll">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>

<th> ID del remitente </th>
<th> Nombre </th>
<th> Direccion </th>
<th> Ciudad </th>
<th> Postal / Zip </th>
<th> Estado </th>
<th> Contacto </th>
<th> Teléfono </th>
<th> Ext </th>
<th> Correo electronico </th>
<th> Notas </th>
<th> Latitud </th>
<th> Longitud </th>
<th> Accion </th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($results as $result):
							?>
							<tr id="<?php echo htmlspecialchars($result->id); ?>">
								<td><?= htmlspecialchars($result->shippers_id); ?></td>
								<td><?= htmlspecialchars($result->name); ?></td>
								<td><?= htmlspecialchars($result->address); ?></td>
								<td><?= htmlspecialchars($result->city); ?></td>
								<td><?= htmlspecialchars($result->postal_zip); ?></td>
								<td><?= htmlspecialchars($result->state); ?></td>
								<td><?= htmlspecialchars($result->contact); ?></td>
								<td><?= htmlspecialchars($result->phone); ?></td>
								<td><?= htmlspecialchars($result->ext); ?></td>
								<td><?= htmlspecialchars($result->email); ?></td>
								<td><?= htmlspecialchars($result->notes); ?></td>
								<td><?= htmlspecialchars($result->latitude); ?></td>
								<td><?= htmlspecialchars($result->longtitude); ?></td>
								<td>
									<a class="btn btn-info btn-edit mr-1 btn-xs"
									   href="<?php echo base_url("shipper/edit_shipper/$result->id"); ?>"><i
											class="fa fa-edit"></i></a>
									<a onclick="confirm('Are you sure want to delete')" class="btn btn-danger del btn-xs"
									   href="<?php echo base_url("shipper/delete_shipper/$result->id"); ?>""><i
											class="fa fa-trash"></i></a>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.box -->

		</div>
		<!--/.col (left) -->
	</div>
	<!-- /.row -->
	<!-- Main row -->
	<div class="row">
		<!-- Left col -->
		<section class="col-lg-7 connectedSortable">

		</section>
		<!-- /.Left col -->
		<!-- right col (We are only adding the ID to make the widgets sortable)-->
		<section class="col-lg-5 connectedSortable">


		</section>
		<!-- right col -->
	</div>
	<!-- /.row (main row) -->

</section>
<!-- /.content -->
