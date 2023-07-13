<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Clientes | <a href="<?php echo base_url('customer/add_customer'); ?>">
			<button class="btn btn-info btn-sm">Agregar cliente</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Cliente</li>
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
					<h3 class="box-title">Ver Clientes</h3>
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
				<div class="box-body" style="overflow-y: scroll">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>ID Cliente</th>
			<th> Nombre </th>
<th> Direccion </th>
<th> Ciudad </th>
<th> Codigo postal </th>
<th> Estado </th>
<th> País </th>
<th> Telefono </th>
<th> Correo  </th>
<th> MC </th>
<th> Notas </th>
<th> Accion </th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($customers as $customer):
							?>
							<tr>
								<td><?= htmlspecialchars($customer->customer_id); ?></td>
								<td><?= htmlspecialchars($customer->name); ?></td>
								<td><?= htmlspecialchars($customer->address); ?></td>
								<td><?= htmlspecialchars($customer->city); ?></td>
								<td><?= htmlspecialchars($customer->zip); ?></td>
								<td><?= htmlspecialchars($customer->state); ?></td>
								<td><?= htmlspecialchars($customer->country); ?></td>
								<td><?= htmlspecialchars($customer->phone); ?></td>
								<td><?= htmlspecialchars($customer->email); ?></td>
								<td><?= htmlspecialchars($customer->mc); ?></td>
								<td><?= htmlspecialchars($customer->notes); ?></td>
								<td>
									<a class="btn btn-info btn-edit mr-1 btn-xs"
									   href="<?php echo base_url("customer/edit_customer/$customer->id"); ?>"><i
											class="fa fa-edit"></i></a>
									<a class="btn btn-danger del btn-xs"
									   href="<?php echo base_url("customer/delete_customer/$customer->id"); ?>"
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
