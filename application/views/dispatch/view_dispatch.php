<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Envio | <a href="<?php echo base_url('dispatch/add_dispatch'); ?>">
			<button class="btn btn-info btn-sm">Agregar envio</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Envio</li>
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
					<h3 class="box-title">Ver envios</h3>
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
										<?php echo htmlspecialchars($message); ?>
									</div>
								<?php } ?>
							<?php }
							?>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
				
<th> ID de envío </th>
<th> Nombre </th>
<th> Apellido </th>
<th> Telefono </th>
<th> Correo electrónico </th>
<th> Calificar </th>
<th> Acción </th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($results as $result):
							?>
							<tr>
								<td><?= htmlspecialchars($result->dispatch_id); ?></td>
								<td><?= htmlspecialchars($result->first_name); ?></td>
								<td><?= htmlspecialchars($result->last_name); ?></td>
								<td><?= htmlspecialchars($result->phone); ?></td>
								<td><?= htmlspecialchars($result->email); ?></td>
								<td><?= htmlspecialchars($result->rate); ?></td>
								<td>
									<a class="btn btn-info btn-edit mr-1 btn-xs"
									   href="<?php echo base_url("dispatch/edit_dispatch/$result->id"); ?>"><i
											class="fa fa-edit"></i></a>
									<a class="btn btn-danger del btn-xs"
									   href="<?php echo base_url("dispatch/delete_dispatch/$result->id"); ?>"
									   onclick="return confirm('Are you want to delete');"><i
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
