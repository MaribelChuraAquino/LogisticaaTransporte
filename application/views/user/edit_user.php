<?php
$id = $this->session->userdata('id');
$details = $this->MAdmin->get_admin_records($id);
/*$type = $this->MAdmin->get_admin_type_record($user->id);
$admin_type = $this->MAdmin->get_admin_type_record($id);*/
?>

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
					<h3 class="box-title">editar usuario</h3>
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
					<form role="form" action="<?= base_url('admin/update_user'); ?>" method="post"
						  enctype="multipart/form-data">
						<div class="col-md-6">
							<div class="box-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Nombre</label>
									<input type="text" class="form-control" name="name" value="<?= $user->name; ?>"
										   id="exampleInputPassword1"
										   placeholder="Enter Name">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Email</label>
									<input type="text" class="form-control" value="<?= $user->email; ?>" name="email"
										   id="exampleInputPassword1"
										   placeholder="Enter Email">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Nombre de usuario</label>
									<input type="text" class="form-control" value="<?= $user->username; ?>"
										   name="username" id="exampleInputPassword1"
										   placeholder="Enter Username">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Telefono</label>
									<input type="text" class="form-control" value="<?= $user->phone; ?>" name="phone"
										   id="exampleInputPassword1"
										   placeholder="Enter Phone">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" name="password"
										   id="exampleInputPassword1"
										   placeholder="Enter Password">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Confirmar Password</label>
									<input type="password" class="form-control" name="confirm_password"
										   id="exampleInputPassword1"
										   placeholder="Enter Confirm Password">
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Imagen</label>
									<input type="file" id="exampleInputFile" name="image"
										   onchange="imagePreview(this);"><br>
									<?php if ($user->image != '') { ?>
										<img src="<?= base_url("$user->image"); ?>" class="img-thumbnail" id="img">
									<?php } else { ?>
										<img src="http://placehold.it/150x150" class="img-thumbnail" id="img">
									<?php } ?>
								</div>
							</div>
							<!-- /.box-body -->

							<input type="hidden" value="<?= htmlspecialchars($user->id); ?>" name="id">
							<input type="hidden" value="<?= htmlspecialchars($user->image); ?>" name="userImage">

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