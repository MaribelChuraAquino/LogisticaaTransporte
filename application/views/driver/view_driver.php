<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Conductor | <a href="<?php echo base_url('driver/add_driver'); ?>">
			<button class="btn btn-info btn-sm">Agregar conductor</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Conductor</li>
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
					<h3 class="box-title">Ver Conductores</h3>
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
					
<th> ID del conductor </th>
<th> Nombre </th>
<th> Correo electronico </th>
<th> Direccion </th>
<th> Ciudad </th>
<th> Codigo postal</th>
<th> Estado </th>
<th> Teléfono </th>
<th> Fecha de nacimiento </th>
<th> SSN </th>
<th> Número de licencia </th>
<th> Caducidad de la licencia </th>
<th> Fecha médica </th>
<th> Caducidad médica </th>
<th> Prueba de drogas </th>
<th> Tipo de pago </th>
<th> Por milla </th>
<th> Milla vacía </th>
<th> Porcentaje </th>
<th> Estado </th>
<th> Notas </th>
<th> Seguro (responsabilidad civil y carga) </th>
<th> Seguro (PD de camión / remolque) </th>
<th> Servicio IFTA </th>
<th> Titular de la cuenta </th>
<th> Prepasar </th>
<th> Tabla de carga </th>
<th> Alquiler de remolque </th>
<th> Accion </th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($drivers as $driver):
							$this->load->model('MAccount');
							$holder = $this->MAccount->get_record($driver->account_holder);
							?>
							<tr>
								<td><?= htmlspecialchars($driver->driver_id); ?></td>
								<td><?= htmlspecialchars($driver->first_name . ' ' . $driver->last_name); ?></td>
								<td><?= htmlspecialchars( $driver->email); ?></td>
								<td><?= htmlspecialchars( $driver->address); ?></td>
								<td><?= htmlspecialchars( $driver->city); ?></td>
								<td><?= htmlspecialchars( $driver->postal_zip); ?></td>
								<td><?= htmlspecialchars($driver->state); ?></td>
								<td><?= htmlspecialchars($driver->phone); ?></td>
								<td><?= htmlspecialchars($driver->dob); ?></td>
								<td><?= htmlspecialchars($driver->ssn); ?></td>
								<td><?= htmlspecialchars($driver->license_number); ?></td>
								<td><?= htmlspecialchars($driver->license_exp); ?></td>
								<td><?= htmlspecialchars($driver->medical_date); ?></td>
								<td><?= htmlspecialchars($driver->medical_exp); ?></td>
								<td><?= htmlspecialchars($driver->drug_test); ?></td>
								<td><?= htmlspecialchars($driver->pay_type); ?></td>
								<td><?= htmlspecialchars($driver->per_mile); ?></td>
								<td><?= htmlspecialchars($driver->empty_mile); ?></td>
								<td><?= htmlspecialchars($driver->percentage); ?></td>
								<td><?= htmlspecialchars($driver->status); ?></td>
								<td><?= htmlspecialchars($driver->notes); ?></td>
								<td><?= htmlspecialchars($driver->insurance_cargo); ?></td>
								<td><?= htmlspecialchars($driver->insurance_truck); ?></td>
								<td><?= htmlspecialchars($driver->ifta_service); ?></td>
								<td><?= htmlspecialchars($holder->name); ?></td>
								<td><?= htmlspecialchars($driver->prepass); ?></td>
								<td><?= htmlspecialchars($driver->load_board); ?></td>
								<td><?= htmlspecialchars($driver->trailer_rent); ?></td>
								<td>
									<a class="btn btn-info btn-primary mr-1 btn-xs"
									   href="<?php echo base_url("driver/show_driver/$driver->id"); ?>"><i
											class="fa fa-eye"></i></a>
									<a class="btn btn-info btn-edit mr-1 btn-xs"
									   href="<?php echo base_url("driver/edit_driver/$driver->id"); ?>"><i
											class="fa fa-edit"></i></a>
									<a class="btn btn-danger del btn-xs"
									   href="<?php echo base_url("driver/delete_driver/$driver->id"); ?>"
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
