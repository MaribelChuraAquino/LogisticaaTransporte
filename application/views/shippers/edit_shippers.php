<!-- Content Header (Page header) -->
<section class="content-header" xmlns="http://www.w3.org/1999/html">
	<h1>
		Remitente | <a href="<?php echo base_url('shipper/view_shippers'); ?>">
			<button class="btn btn-info btn-sm">Ver remitentes</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Remitentes</li>
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
					<h3 class="box-title">Editar remitente</h3>
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
										<?php echo $message; ?>
									</div>
								<?php } else { ?>
									<div class="alert alert-danger">
										<button class="close" data-dismiss="alert">×</button>
										<?php echo $message; ?>
									</div>
								<?php } ?>
							<?php }
							?>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<form role="form" action="<?= base_url('shipper/update_shipper'); ?>" method="post"
					  enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="box-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1">ID del remitente</label>
											<input type="text" class="form-control" name="shippers_id" readonly
												   value="<?= $result->shippers_id; ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Nombre</label>
											<input type="text" class="form-control" name="name"
												   value="<?= $result->name; ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('name', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Direccion</label>
											<textarea class="form-control" name="address"
													  id="exampleInputPassword1"><?= $result->address; ?></textarea>
											<span>
					<?php echo form_error('address', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Ciudad</label>
											<input type="text" class="form-control" name="city"
												   value="<?= $result->city; ?>"
												   id="city">
											<input type="hidden" value="<?= $result->latitude; ?>" name="latitude"
												   id="latitude">
											<input type="hidden" value="<?= $result->longtitude; ?>" name="longitude"
												   id="longitude">
											<span>
					<?php echo form_error('city', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Codigo postal</label>
											<input type="text" class="form-control" name="postal_zip"
												   value="<?= $result->postal_zip; ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('postal_zip', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Estado</label>
											<input type="text" class="form-control" name="state"
												   value="<?= $result->state; ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('state', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Contacto</label>
											<input type="text" class="form-control" name="contact"
												   value="<?= $result->contact; ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Telefono</label>
											<input type="text" class="form-control" name="telephone"
												   value="<?= $result->phone; ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Ext.</label>
											<input type="text" class="form-control" name="ext"
												   value="<?= $result->ext; ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Email de contacto</label>
											<input type="text" class="form-control" name="email"
												   value="<?= $result->email; ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Notas</label>
											<textarea class="form-control" name="notes"
													  id="exampleInputPassword1"><?= $result->notes; ?></textarea>
										</div>
									</div>
								</div>
							</div>

							<input type="hidden" value="<?= $result->id; ?>" name="id">
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
<!-- google map api call script -->
<script src="<?php echo base_url('assets/backend/dist/js/googlemapapicall.js') ?>"></script>
