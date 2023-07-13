<!-- Content Header (Page header) -->
<section class="content-header" xmlns="http://www.w3.org/1999/html">
	<h1>
		Conductor | <a href="<?php echo base_url('driver/view_driver'); ?>">
			<button class="btn btn-info btn-sm">Ver Conductores</button>
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
					<h3 class="box-title">Editar Conductor</h3>
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
				<form role="form" action="<?= base_url('driver/update_driver'); ?>" method="post"
					  enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="box-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1"> ID Conductor</label>
											<input type="text" class="form-control" name="driver_id" readonly
												   value="<?= htmlspecialchars($driver->driver_id); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Nombre</label>
											<input type="text" class="form-control" name="first_name"
												   value="<?= htmlspecialchars($driver->first_name); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('first_name', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Apellido</label>
											<input type="text" class="form-control" name="last_name"
												   value="<?= htmlspecialchars($driver->last_name); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('last_name', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Direccion</label>
											<textarea class="form-control" name="address"
													  id="exampleInputPassword1"><?= htmlspecialchars($driver->address); ?></textarea>
											<span>
					<?php echo form_error('address', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Ciudad</label>
											<input type="text" class="form-control" name="city"
												   value="<?= htmlspecialchars($driver->city); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('city', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Estado</label>
											<input type="text" class="form-control" name="state"
												   value="<?= htmlspecialchars($driver->state); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('state', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Codigo postal</label>
											<input type="text" class="form-control" name="postal_zip"
												   value="<?= htmlspecialchars($driver->postal_zip); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('postal_zip', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Telefono</label>
											<input type="text" class="form-control" name="telephone"
												   value="<?= htmlspecialchars($driver->phone); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('telephone', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Email</label>
											<input type="text" class="form-control" name="email"
												   value="<?= htmlspecialchars($driver->email); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('email', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">DOB</label>
											<input type="text" class="form-control datepicker" name="dob"
												   value="<?= htmlspecialchars($driver->dob); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('dob', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">SSN</label>
											<input type="text" class="form-control" name="ssn"
												   value="<?= htmlspecialchars($driver->ssn); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('ssn', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Seguro (responsabilidad y carga)</label>
											<input type="number" step="any" class="form-control" name="insurance"
												   value="<?= htmlspecialchars($driver->insurance_cargo); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('insurance', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Seguro (camión / remolque PD)</label>
											<input type="number" step="any" class="form-control" name="insurance_truck"
												   value="<?= htmlspecialchars($driver->insurance_truck); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('insurance_truck', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Servicio IFTA</label>
											<input type="number" step="any" class="form-control" name="ifta_service"
												   value="<?= htmlspecialchars($driver->ifta_service); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('ifta_service', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Titular de la cuenta</label>
											<select class="form-control select2" name="account_holder">
												<option value="">--Select--</option>
												<?php foreach ($holders as $holder):
													if ($driver->account_holder == $holder->id) {
														?>
														<option value="<?= htmlspecialchars($holder->id); ?>"
																selected><?= htmlspecialchars($holder->name); ?></option>
													<?php } else { ?>
														<option
															value="<?= htmlspecialchars($holder->id); ?>"><?= htmlspecialchars($holder->name); ?></option>
													<?php } endforeach; ?>
											</select>
											<span>
					<?php echo form_error('account_holder', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Número de licencia</label>
											<input type="text" class="form-control" name="license_number"
												   value="<?= htmlspecialchars($driver->license_number); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('license_number', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Caducidad de la licencia</label>
											<input type="text" class="form-control datepicker" name="license_exp"
												   value="<?= htmlspecialchars($driver->license_exp); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('license_exp', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Fecha medica</label>
											<input type="text" class="form-control datepicker" name="medical_date"
												   value="<?= htmlspecialchars($driver->medical_date); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('medical_date', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Caducidad medica</label>
											<input type="text" class="form-control datepicker" name="medical_exp"
												   value="<?= htmlspecialchars($driver->medical_exp); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('medical_exp', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Examen de drogas</label>
											<input type="text" class="form-control datepicker" name="drug_test"
												   value="<?= htmlspecialchars($driver->drug_test); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('drug_test', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Tipo de pago</label>
											<select name="pay_type" class="select2 form-control" id="pay_type">
												<?php if ($driver->pay_type == "Percentage") { ?>
													<option value="Percentage" selected>Porcentaje</option>
													<option value="Per Mile">Por milla</option>
													<option value="Other">Otros</option>
												<?php } elseif ($driver->pay_type == "Per Mile") { ?>
													<option value="Percentage">Porcentaje</option>
													<option value="Per Mile" selected>Por milla</option>
													<option value="Other">Otros</option>
												<?php } else { ?>
													<option value="Percentage">Porcentaje</option>
													<option value="Per Mile">Por milla</option>
													<option value="Other" selected>Otros</option>
												<?php } ?>
											</select>
											<span>
					<?php echo form_error('pay_type', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Por milla</label>
											<input type="text" class="form-control" name="per_mile" readonly
												   value="<?= htmlspecialchars($driver->per_mile); ?>"
												   id="per_mile">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Milla vacía</label>
											<input type="text" class="form-control" name="empty_mile" readonly
												   value="<?= htmlspecialchars($driver->empty_mile); ?>"
												   id="empty_mile">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Porcentaje</label>
											<input type="number" step="any" class="form-control" name="percentage"
												   value="<?= htmlspecialchars($driver->percentage); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('percentage', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Estado</label>
											<select name="status" class="select2 form-control">
												<?php if ($driver->status == "Active") { ?>
													<option value="Active" selected>Activa</option>
													<option value="Terminated">Terminada</option>
													<option value="Temporary">Temporal</option>
												<?php } elseif ($driver->status == "Terminated") { ?>
													<option value="Active">Activa</option>
													<option value="Terminated" selected>Terminada</option>
													<option value="Temporary">Temporal</option>
												<?php } else { ?>
													<option value="Active">Activa</option>
													<option value="Terminated">Terminada</option>
													<option value="Temporary" selected>Temporal</option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Notas</label>
											<textarea class="form-control" name="notes"
													  id="exampleInputPassword1"><?= htmlspecialchars($driver->notes); ?></textarea>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Prepasar</label>
											<input type="number" step="any" class="form-control" name="prepass"
												   value="<?= htmlspecialchars($driver->prepass); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('prepass', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Tablero de carga</label>
											<input type="number" step="any" class="form-control" name="load_board"
												   value="<?= htmlspecialchars($driver->load_board); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('load_board', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Alquiler de remolque</label>
											<input type="number" step="any" class="form-control" name="trailer_rent"
												   value="<?= htmlspecialchars($driver->trailer_rent); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('trailer_rent', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
									</div>
								</div>
							</div>

							<input type="hidden" value="<?= htmlspecialchars($driver->id); ?>" name="id">
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
