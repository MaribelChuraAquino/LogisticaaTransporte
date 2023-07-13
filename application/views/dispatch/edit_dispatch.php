<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Envio | <a href="<?php echo base_url('dispatch/view_dispatch'); ?>">
			<button class="btn btn-info btn-sm">Ver Envios</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Envio</li>
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
					<h3 class="box-title">Editar Envio</h3>
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
					<form role="form" action="<?= base_url('dispatch/update_dispatch'); ?>" method="post"
						  enctype="multipart/form-data">
						<div class="col-md-6">
							<div class="box-body">
								<div class="form-group">
									<label for="exampleInputPassword1"> ID Envio</label>
									<input type="text" class="form-control" name="dispatch_id"
										   id="exampleInputPassword1"
										   value="<?= htmlspecialchars($result->dispatch_id); ?>" readonly>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Nombre </label>
									<input type="text" class="form-control" name="first_name" id="exampleInputPassword1"
										   value="<?= htmlspecialchars($result->first_name); ?>" placeholder="Enter First Name">
									<span>
					<?php echo form_error('first_name', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Apellido</label>
									<input type="text" class="form-control" name="last_name" id="exampleInputPassword1"
										   value="<?= htmlspecialchars($result->last_name); ?>"
										   placeholder="Enter Last Name">
									<span>
					<?php echo form_error('last_name', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Telefono</label>
									<input type="text" class="form-control" name="phone"
										   value="<?= htmlspecialchars($result->phone); ?>" id="exampleInputPassword1"
										   placeholder="Enter Phone">
									<span>
					<?php echo form_error('phone', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Email</label>
									<input type="text" class="form-control" name="email" id="exampleInputPassword1"
										   value="<?= htmlspecialchars($result->email); ?>"
										   placeholder="Enter Email">
									<span>
					<?php echo form_error('email', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Tarifa(%)</label>
									<input type="number" step="any" class="form-control" name="rate"
										   id="exampleInputPassword1" value="<?= htmlspecialchars($result->rate); ?>"
										   placeholder="%">
									<span>
					<?php echo form_error('rate', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
								</div>
							</div>
							<!-- /.box-body -->

							<input type="hidden" value="<?= htmlspecialchars($result->id); ?>" name="id">

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
