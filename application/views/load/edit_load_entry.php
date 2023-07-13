<!-- Content Header (Page header) -->
<section class="content-header" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
	<h1>
		Entrada de carga | <a href="<?php echo base_url('load/view_load_entry'); ?>">
			<button class="btn btn-info btn-sm">Ver entrada de carga</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Entrada de carga</li>
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
					<h3 class="box-title">Editar entrada de carga</h3>
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
				<form role="form" action="<?= base_url('load/update_load'); ?>" method="post"
					  enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="box-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1">#Carga</label>
											<input type="text" class="form-control" name="load_id" readonly
												   value="<?= htmlspecialchars($load->load_id); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Cliente</label>
											<select name="customer_id" class="form-control select2" id="customer_id">
												<?php foreach ($customers as $customer):
													if ($load->customer_id == $customer->id) {
														?>
														<option value="<?= htmlspecialchars($customer->id); ?>"
																selected><?= htmlspecialchars($customer->name); ?></option>
													<?php } else { ?>
														<option
															value="<?= htmlspecialchars($customer->id); ?>"><?= htmlspecialchars($customer->name); ?></option>
													<?php } endforeach; ?>
											</select>
											<span>
					<?php echo form_error('customer_id', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Carga de clientes</label>
											<input type="text" class="form-control" name="customer_load"
												   value="<?= htmlspecialchars($load->customer_load); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('customer_load', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Tipo de carga</label>
											<select name="load_type" class="form-control select2">
												<?php if ($load->load_type == "TL") { ?>
													<option value="TL" selected>TL</option>
													<option value="LTL">LTL</option>
												<?php } else { ?>
													<option value="TL">TL</option>
													<option value="LTL" selected>LTL</option>
												<?php } ?>
											</select>
											<span>
					<?php echo form_error('load_type', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Fecha</label>
											<input type="text" class="form-control datepicker" name="date" readonly
												   value="<?= htmlspecialchars($load->date); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('date', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Fecha de recogida</label>
											<input type="text" class="form-control datepicker" name="pick_up_date"
												   value="<?= htmlspecialchars($load->pick_up_date); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('pick_up_date', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Fecha de entrega</label>
											<input type="text" class="form-control datepicker" name="delivery_date"
												   value="<?= htmlspecialchars($load->delivery_date); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('delivery_date', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Envio</label>
											<select class="form-control select2" name="dispatch_id">
												<?php foreach ($dispatches as $dispatch):
													if ($load->dispatch_id == $dispatch->id) {
														?>
														<option value="<?= htmlspecialchars($dispatch->id); ?>"
																selected><?= htmlspecialchars($dispatch->first_name) . ' ' .htmlspecialchars($dispatch->last_name); ?></option>
													<?php } else { ?>
														<option
															value="<?= htmlspecialchars($dispatch->id); ?>"><?= htmlspecialchars($dispatch->first_name) . ' ' . htmlspecialchars($dispatch->last_name); ?></option>
													<?php } endforeach; ?>
											</select>
											<span>
					<?php echo form_error('dispatch_id', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Tasa de transporte de línea</label>
											<input type="text" class="form-control" name="line_haul_rate"
												   value="<?= htmlspecialchars($load->line_haul_rate); ?>"
												   id="line_haul_rate">
											<span>
					<?php echo form_error('line_haul_rate', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Descarga$</label>
											<input type="text" class="form-control" name="unloading"
												   value="<?= htmlspecialchars($load->unloading); ?>"
												   id="unloading">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Reembolsar$</label>
											<select class="form-control select2" name="reimburse" id="reimburse">
												<?php if ($load->reimburse == "Yes") { ?>
													<option value="Yes" selected>Si</option>
													<option value="No">No</option>
												<?php } else { ?>
													<option value="Yes">Si</option>
													<option value="No" selected>No</option>
												<?php } ?>
											</select>
											<span>
					<?php echo form_error('reimburse', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Detencion$</label>
											<input type="text" class="form-control" name="detention"
												   value="<?= htmlspecialchars($load->detention); ?>"
												   id="detention">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Escala$</label>
											<input type="text" class="form-control" name="layover"
												   value="<?= htmlspecialchars($load->layover); ?>"
												   id="layover">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Otros cargos$</label>
											<input type="text" class="form-control" name="other_charges"
												   value="<?= htmlspecialchars($load->other_charge); ?>"
												   id="other_charges">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Tarifa total$</label>
											<input type="text" class="form-control" name="total_rate" readonly
												   value="<?= htmlspecialchars($load->total_rate); ?>"
												   id="total_rate">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Conductor</label>
											<select name="driver_id" class="form-control select2 driver_id"
													id="driver_id">
												<option value="">--Select--</option>
												<?php foreach ($drivers as $driver):
													if ($load->driver_id == $driver->id) {
														?>
														<option value="<?= htmlspecialchars($driver->id); ?>"
																selected><?= htmlspecialchars($driver->first_name) . ' ' . htmlspecialchars($driver->last_name); ?></option>
													<?php } else { ?>
														<option
															value="<?= htmlspecialchars($driver->id); ?>"><?= htmlspecialchars($driver->first_name) . ' ' . htmlspecialchars($driver->last_name); ?></option>
													<?php } endforeach; ?>
											</select>
											<span>
					<?php echo form_error('driver_id', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Camion</label>
											<input type="text" class="form-control" name="truck"
												   id="truck">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Trailer</label>
											<input type="text" class="form-control" name="trailer"
												   id="trailer">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Tarifa</label>
											<input type="text" class="form-control" name="rate"
												   id="rate">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Remitente</label>
											<select class="form-control select2" name="shipper_id" id="shipper_id">
												<option value="">--Select--</option>
												<?php foreach ($shippers as $shipper):
													if ($load->shipper_id == $shipper->id) {
														?>
														<option value="<?= htmlspecialchars($shipper->id); ?>"
																selected><?= htmlspecialchars($shipper->name); ?></option>
													<?php } else { ?>
														<option
															value="<?= htmlspecialchars($shipper->id); ?>"><?= htmlspecialchars($shipper->name); ?></option>
													<?php } endforeach; ?>
											</select>
											<span>
					<?php echo form_error('shipper_id', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Direccion</label>
											<textarea class="form-control" name="address"
													  id="address"></textarea>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Ciudad</label>
											<input type="text" class="form-control" name="city"
												   id="city">
											<input type="hidden" value="" name="latitude" id="latitude">
											<input type="hidden" value="" name="longitude" id="longitude">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Codigo postal</label>
											<input type="text" class="form-control" name="zip_code"
												   id="zip_code">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Estado</label>
											<input type="text" class="form-control" name="state"
												   id="state">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Peso</label>
											<input type="text" class="form-control" name="weight"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Cant.</label>
											<input type="text" class="form-control" name="qty"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Contacto del remitente</label>
											<input type="text" class="form-control" name="shipper_contact"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Nota</label>
											<textarea class="form-control" name="note"
													  id="exampleInputPassword1"></textarea>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Destinatario</label>
											<select class="form-control select2" name="consignee_id" id="consignee_id">
												<option value="">--Select--</option>
												<?php foreach ($consignees as $consignee):
													if ($load->consignee_id == $consignee->id) {
														?>
														<option value="<?= htmlspecialchars($consignee->id); ?>"
																selected><?= htmlspecialchars($consignee->name); ?></option>
													<?php } else { ?>
														<option
															value="<?= $consignee->id; ?>"><?= htmlspecialchars($consignee->name); ?></option>
													<?php } endforeach; ?>
											</select>
											<span>
					<?php echo form_error('consignee_id', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Direccion</label>
											<textarea class="form-control" name="con_address"
													  id="con_address"></textarea>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Ciudad</label>
											<input type="text" class="form-control" name="con_city"
												   id="con_city">
											<input type="hidden" value="" name="clatitude" id="clatitude">
											<input type="hidden" value="" name="clongitude" id="clongitude">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Codigo postal</label>
											<input type="text" class="form-control" name="con_zip_code"
												   id="con_zip_code">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Estado</label>
											<input type="text" class="form-control" name="con_state"
												   id="con_state">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Contacto del destinatario</label>
											<input type="text" class="form-control" name="con_contact"
												   value="<?= htmlspecialchars($load->consignee_contact); ?>"
												   id="con_contact">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Con. Nota</label>
											<textarea class="form-control" name="con_note"
													  id="con_note"><?= htmlspecialchars($load->con_note); ?></textarea>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Vacía M</label>
											<input type="text" class="form-control" name="empty_m"
												   value="<?= htmlspecialchars($load->empty_m); ?>"
												   id="empty_mile">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Cargada M</label>
											<input type="text" class="form-control" name="loaded_m"
												   value="<?= htmlspecialchars($load->loaded_m) ?>"
												   id="loaded">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Por milla</label>
											<input type="text" class="form-control" name="per_mile"
												   value="<?= htmlspecialchars($load->per_mile); ?>"
												   id="per_mile">
										</div>
									</div>
								</div>
							</div>

							<input type="hidden" value="<?= htmlspecialchars($load->id); ?>" name="id">
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


