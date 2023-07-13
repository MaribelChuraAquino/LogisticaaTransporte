<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Gastos | <a href="<?php echo base_url('expense/add_expense'); ?>">
			<button class="btn btn-info btn-sm">Agregar gasto</button>
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
					<h3 class="box-title">Ver gastos</h3>
					<button type="button" data-toggle="modal" data-target="#exampleModal"
							class="btn btn-danger pull-right btn-sm"><i class="fa fa-upload"></i>Importar desde CSV
					</button>
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
			<th> Fecha </th>
<th> Proveedor </th>
<th> Descripcion </th>
<th> Titular de la cuenta </th>
<th> Importe </th>
<th> Accion </th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($expenses as $expense):
							/*$this->load->model('MAccount');
							$holder = $this->MAccount->get_record($expense->account_holder);*/
							?>
							<tr>
								<td><?= htmlspecialchars($expense->date); ?></td>
								<td><?= htmlspecialchars($expense->vendor); ?></td>
								<td><?= htmlspecialchars($expense->description); ?></td>
								<td><?= htmlspecialchars($expense->account_holder); ?></td>
								<td><?= htmlspecialchars($expense->amount); ?></td>
								<td>
									<a class="btn btn-info btn-edit mr-1 btn-xs"
									   href="<?php echo base_url("expense/edit_expense/$expense->id"); ?>"><i
											class="fa fa-edit"></i></a>
									<a class="btn btn-danger del btn-xs"
									   href="<?php echo base_url("expense/delete_expense/$expense->id"); ?>"
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Importar datos de archivo CSV</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url();?>expense/import_csv" method="post" enctype="multipart/form-data" name="form1" id="form1">
					Elija su archivo: <br/>
					<input class="form-control" name="csv" type="file" id="csv"/>
					<br>
					<input class="btn btn-danger" type="submit" name="Submit" value="Submit"/>
				</form>
				<a href="<?=base_url()?>assets/test.csv">Descargar archivo CSV de muestra</a>
			</div>

		</div>
	</div>
</div>
