<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehiculo | <a href="<?php echo base_url('equipment/view_equipment'); ?>">
			<button class="btn btn-info btn-sm">Ver Vehiculo</button>
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
					<h3 class="box-title">Editar Vehiculo</h3>
				</div>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="text text-center">
							<?php
							$message = '';
							if (isset($this->session->message)) {
								$message = $this->session->message;
								if ($message == "Record Inserted Successfully") { ?>
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
				<form role="form" action="<?= base_url('equipment/update_equipment'); ?>" method="post"
					  enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="box-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Nombre del propietario</label>
											<input type="text" class="form-control" name="owner_first_name"
												   value="<?=htmlspecialchars($equipment->first_name); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('owner_first_name', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Apellido del propietario</label>
											<input type="text" class="form-control" name="owner_last_name"
												   value="<?=htmlspecialchars($equipment->last_name); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('owner_last_name', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Unidad numerica</label>
											<input type="text" class="form-control" name="unit_number"
												   value="<?= htmlspecialchars($equipment->unit_number); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('unit_number', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Hacer</label>
											<input type="text" class="form-control" name="make"
												   value="<?= htmlspecialchars($equipment->make); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('make', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Tipo</label>
											<input type="text" class="form-control" name="type"
												   value="<?= htmlspecialchars($equipment->type); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Año</label>
											<input type="text" class="form-control" name="year"
												   value="<?= htmlspecialchars($equipment->year); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('year', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">VIN</label>
											<input type="text" class="form-control" name="vin"
												   value="<?= htmlspecialchars($equipment->vin); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('vin', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Numero de placa</label>
											<input type="text" class="form-control" name="plate_number"
												   value="<?= htmlspecialchars($equipment->plate_number); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('plate_number', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Caducidad de la placa</label>
											<input type="text" class="form-control datepicker" name="plate_exp"
												   value="<?=htmlspecialchars($equipment->plate_expiry); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('plate_exp', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Kilometraje</label>
											<input type="text" class="form-control" name="mileage"
												   value="<?= htmlspecialchars($equipment->mileage); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Camión</label>
											<input type="text" class="form-control" name="truck"
												   value="<?= htmlspecialchars($equipment->truck); ?>"
												   id="truck">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Trailer</label>
											<input type="text" class="form-control" name="trailer"
												   value="<?= htmlspecialchars($equipment->trailer); ?>"
												   id="trailer">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Provincia</label>
											<input type="text" class="form-control" name="province"
												   value="<?= htmlspecialchars($equipment->province); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Ejes</label>
											<input type="text" class="form-control" name="axels"
												   value="<?= htmlspecialchars($equipment->axels); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Tipo de combustible</label>
											<input type="text" class="form-control" name="fuel_type"
												   value="<?= htmlspecialchars($equipment->fuel_type); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Peso</label>
											<input type="text" class="form-control" name="weight"
												   value="<?= htmlspecialchars($equipment->weight); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Fecha de inicio</label>
											<input type="text" class="form-control datepicker" name="start_date"
												   value="<?= htmlspecialchars($equipment->start_date); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('start_date', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Fecha de desactivación</label>
											<input type="text" class="form-control datepicker" name="deactivation_date"
												   value="<?= htmlspecialchars($equipment->deactivation_date); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Fecha de inspección del DOT</label>
											<input type="text" class="form-control datepicker" name="dot_date"
												   value="<?= htmlspecialchars($equipment->dot_date); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('dot_date', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Camión IFTA</label>
											<select class="form-control select2" name="ifta_truck" id="">
												<?php if ($equipment->ifta_truck == "Yes") { ?>
													<option value="Yes" selected>Si</option>
													<option value="No">No</option>
												<?php } else { ?>
													<option value="Yes">Si</option>
													<option value="No" selected>No</option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Fecha de inspeccion anual</label>
											<input type="text" class="form-control datepicker" name="annual_date"
												   value="<?= htmlspecialchars($equipment->annual_date); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('annual_date', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">90 dias de fecha de inspeccion</label>
											<input type="text" class="form-control datepicker"
												   name="days_inspection_date"
												   value="<?= htmlspecialchars($equipment->days_inspection_date); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('days_inspection_date', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
									</div>
								</div>
							</div>

							<input type="hidden" value="<?= htmlspecialchars($equipment->id); ?>" name="id">

							<!-- /.box-body -->
							<div class="box-footer text-center">
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</div>
					</div>
					<!-- form start -->
				</form>
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
