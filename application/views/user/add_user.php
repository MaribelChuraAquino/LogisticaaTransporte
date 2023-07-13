<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Usuario | <a href="<?php echo base_url('admin/view_user'); ?>">
			<button class="btn btn-info btn-sm">Ver usuario</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Usuario</li>
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
					<h3 class="box-title">Agregar usuario</h3>
				</div>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="text text-center">
							<?php
							$message = '';
							if (isset($this->session->message)) {
								$message = $this->session->message;
								if ($message == "Record Insert Successfully") { ?>
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
				<div class="row">
					<div class="col-md-1"></div>
					<form role="form" action="<?= base_url('admin/store_user'); ?>" method="post"
						  enctype="multipart/form-data">
						<div class="col-md-6">
							<div class="box-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Richard</label>
									<input type="text" class="form-control" name="name" id="exampleInputPassword1"
										   value="<?= set_value('name'); ?>"
										   placeholder="Enter Name">
									<span>
					<?php echo form_error('name', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Email</label>
									<input type="text" class="form-control" name="email" id="exampleInputPassword1"
										   value="<?= set_value('email'); ?>" placeholder="Enter Email">
									<span>
					<?php echo form_error('email', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Nombre de usuario</label>
									<input type="text" class="form-control" name="username" id="exampleInputPassword1"
										   value="<?= set_value('username'); ?>"
										   placeholder="Enter Username">
									<span>
					<?php echo form_error('username', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Telefono</label>
									<input type="text" class="form-control" name="phone" id="exampleInputPassword1"
										   placeholder="Enter Phone">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" name="password"
										   id="exampleInputPassword1"
										   placeholder="Enter Password">
									<span>
					<?php echo form_error('password', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Confirmar password</label>
									<input type="password" class="form-control" name="confirm_password"
										   id="exampleInputPassword1"
										   placeholder="Enter Confirm Password">
									<span>
					<?php echo form_error('confirm_password', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Imagen</label>
									<input type="file" id="exampleInputFile" name="image"
										   onchange="imagePreview(this);"><br>
									<img src="http://placehold.it/150x150" class="img-thumbnail" id="img">
								</div>
							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</div>
					</form>
				</div>
				<!-- form start -->
				<br><br><br>
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