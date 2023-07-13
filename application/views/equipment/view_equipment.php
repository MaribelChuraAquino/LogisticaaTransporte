<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehiculo | <a href="<?php echo base_url('equipment/add_equipment'); ?>">
			<button class="btn btn-info btn-sm">Agregar Vehiculo</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Vehiculo</li>
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
					<h3 class="box-title">Ver Vehiculo</h3>
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
				<th> Nombre </th>
<th> Apellido </th>
<th> Número de unidad </th>
<th> Hacer </th>
<th> Tipo </th>
<th> Año </th>
<th> VIN </th>
<th> Numero de placa </th>
<th> Caducidad de la placa </th>
<th> Kilometraje </th>
<th> Provincia </th>
<th> Ejes </th>
<th> Tipo de combustible </th>
<th> Peso </th>
<th> Fecha de inicio </th>
<th> Fecha de desactivación </th>
<th> Fecha puntual </th>
<th> Camión Ifta </th>
<th> Fecha anual </th>
<th> Dias Fecha de inspección </th>
<th> Camión </th>
<th> Trailer </th>
<th> Acción </th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($equipments as $equipment):
							?>
							<tr>
								<td><?= htmlspecialchars($equipment->first_name); ?></td>
								<td><?= htmlspecialchars($equipment->last_name); ?></td>
								<td><?= htmlspecialchars($equipment->unit_number); ?></td>
								<td><?= htmlspecialchars($equipment->make); ?></td>
								<td><?= htmlspecialchars($equipment->type); ?></td>
								<td><?= htmlspecialchars($equipment->year); ?></td>
								<td><?= htmlspecialchars($equipment->vin); ?></td>
								<td><?= htmlspecialchars($equipment->plate_number); ?></td>
								<td><?= htmlspecialchars($equipment->plate_expiry); ?></td>
								<td><?= htmlspecialchars($equipment->mileage); ?></td>
								<td><?= htmlspecialchars($equipment->province); ?></td>
								<td><?= htmlspecialchars($equipment->axels); ?></td>
								<td><?= htmlspecialchars($equipment->fuel_type); ?></td>
								<td><?= htmlspecialchars($equipment->weight); ?></td>
								<td><?= htmlspecialchars($equipment->start_date); ?></td>
								<td><?= htmlspecialchars($equipment->deactivation_date); ?></td>
								<td><?= htmlspecialchars($equipment->dot_date); ?></td>
								<td><?= htmlspecialchars($equipment->ifta_truck); ?></td>
								<td><?= htmlspecialchars($equipment->annual_date); ?></td>
								<td><?= htmlspecialchars($equipment->days_inspection_date); ?></td>
								<td><?= htmlspecialchars($equipment->truck); ?></td>
								<td><?= htmlspecialchars($equipment->trailer); ?></td>
								<td>
									<a class="btn btn-primary btn-edit mr-1 btn-xs" target="_blank"
									   href="<?php echo base_url("equipment/show_equipment/$equipment->id"); ?>"><i
											class="fa fa-eye"></i></a>
									<a class="btn btn-info btn-edit mr-1 btn-xs"
									   href="<?php echo base_url("equipment/edit_equipment/$equipment->id"); ?>"><i
											class="fa fa-edit"></i></a>
									<a class="btn btn-danger del btn-xs"
									   href="<?php echo base_url("equipment/delete_equipment/$equipment->id"); ?>"
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
