<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Gastos | <a href="<?php echo base_url('expense/view_expense'); ?>">
			<button class="btn btn-info btn-sm">Ver gastos</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Gastos</li>
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
					<h3 class="box-title">Agregar gasto</h3>
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
				<div class="row">
					<div class="col-md-1"></div>
					<form role="form" action="<?= base_url('expense/store_expense'); ?>" method="post"
						  enctype="multipart/form-data">
						<div class="col-md-6">
							<div class="box-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Fecha</label>
									<input type="text" class="form-control datepicker" name="date" required
										   id="exampleInputPassword1">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Nombre del vendedor</label>
									<input type="text" class="form-control" name="vendor" required
										   id="exampleInputPassword1">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Descripcion</label>
									<textarea class="form-control" name="description"
											  id="exampleInputPassword1"></textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Titular de la cuenta</label>
									<select class="form-control select2" name="account_holder" required>
										<option value="">--Select--</option>
										<?php foreach ($holders as $holder): ?>
											<option value="<?= $holder->name; ?>"><?= $holder->name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Cantidad</label>
									<input type="number" step="any" class="form-control" name="amount" required
										   id="exampleInputPassword1">
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
