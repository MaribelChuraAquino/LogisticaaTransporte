<!-- Content Header (Page header) -->
<section class="content-header" xmlns="http://www.w3.org/1999/html">
	<h1>
		Destinatario | <a href="<?php echo base_url('consignee/view_consignee'); ?>">
			<button class="btn btn-info btn-sm">Ver destinatario</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Destinatario</li>
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
					<h3 class="box-title">Editar destinatario</h3>
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
				<form role="form" action="<?= base_url('consignee/update_consignee'); ?>" method="post"
					  enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="box-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1">ID destinatario </label>
											<input type="text" class="form-control" name="consignee_id" readonly
												   value="<?= htmlspecialchars($result->consignee_id); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Nombre</label>
											<input type="text" class="form-control" name="name"
												   value="<?= htmlspecialchars($result->name); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('name', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Direccion</label>
											<textarea class="form-control" name="address"
													  id="exampleInputPassword1"><?= htmlspecialchars($result->address); ?></textarea>
											<span>
					<?php echo form_error('address', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Ciudad</label>
											<input type="text" class="form-control" name="city"
												   value="<?= htmlspecialchars($result->city); ?>"
												   id="city">
											<input type="hidden" value="<?= htmlspecialchars($result->latitude); ?>" name="latitude"
												   id="latitude">
											<input type="hidden" value="<?= htmlspecialchars($result->longtitude); ?>" name="longitude"
												   id="longitude">
											<span>
					<?php echo form_error('city', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Codigo Postal</label>
											<input type="text" class="form-control" name="postal_zip"
												   value="<?= htmlspecialchars($result->postal_zip); ?>"
												   id="exampleInputPassword1">
											<span>
					<?php echo form_error('postal_zip', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Estado</label>
											<input type="text" class="form-control" name="state"
												   value="<?= htmlspecialchars($result->state); ?>"
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
												   value="<?= htmlspecialchars($result->contact); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Telefono</label>
											<input type="text" class="form-control" name="telephone"
												   value="<?= htmlspecialchars($result->phone); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Ext.</label>
											<input type="text" class="form-control" name="ext"
												   value="<?= htmlspecialchars($result->ext); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Contacto Email</label>
											<input type="text" class="form-control" name="email"
												   value="<?= htmlspecialchars($result->email); ?>"
												   id="exampleInputPassword1">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Notas</label>
											<textarea class="form-control" name="notes"
													  id="exampleInputPassword1"><?= htmlspecialchars($result->notes); ?></textarea>
										</div>
									</div>
								</div>
							</div>

							<input type="hidden" value="<?= htmlspecialchars($result->id); ?>" name="id">
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
<script src="<?php echo base_url('assets/backend/dist/js/googlemapapicall.js') ?>"></script>
