<style>
	#logo {
		float: left;
		margin-top: 8px;
	}

	#company {
		float: right;
		text-align: right;
	}

	h2.name {
		font-size: 1.4em;
		font-weight: normal;
		margin: 0;
	}

	table .no {
		color: #000;
		font-size: 1.1em;
		/* background: #C4CBC2; */
	}

	table .desc {
		text-align: left;
	}
</style>
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
					<h3 class="box-title">Detalles Vehiculo</h3>
				</div>
				<!-- /.box-header -->
				<div class="row">
					<div class="col-md-12">
						<div class="box-body">
							<div class="row ">
								<div class="col-md-8 col-md-offset-2">
									<header class="clearfix">
										<div id="logo">
											<img src="<?= base_url("$company->logo"); ?>" width="150px" height="100px">
										</div>
										<div id="company">
											<h2 class="name"><?= htmlspecialchars($company->name); ?></h2>
											<div><?= htmlspecialchars($company->phone); ?></div>
											<div><?= htmlspecialchars($company->email); ?></div>
										</div>
									</header>
									<hr/>

									<main class="invoice_report text-center">
										<table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
											<tbody>
											<tr>
												<td width="30%" class="text-left"><h4>Nombre del propietario: </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->first_name); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Apellido del propietario : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->last_name); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Unidad numérica : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->unit_number); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Hacer : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->make); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Tipo : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->type); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Año : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->year); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>VIN : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->vin); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Numero de placa : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->plate_number); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Caducidad de la placa : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->plate_expiry); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Kilometraje : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->mileage); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Provincia : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($equipment->province); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Ejes : </h4></td>
												<td class="text-left"><?= htmlspecialchars($equipment->axels); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Tipo de combustible : </h4></td>
												<td class="text-left"><?= htmlspecialchars($equipment->fuel_type); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Peso : </h4></td>
												<td class="text-left"><?= htmlspecialchars($equipment->weight); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Fecha de inicio : </h4></td>
												<td class="text-left"><?= htmlspecialchars($equipment->start_date); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Fecha de desactivación : </h4></td>
												<td class="text-left"><?= htmlspecialchars($equipment->deactivation_date); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Fecha de inspección del DOT : </h4></td>
												<td class="text-left"><?= htmlspecialchars($equipment->dot_date); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Camión IFTA : </h4></td>
												<td class="text-left"><?= htmlspecialchars($equipment->ifta_truck); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Fecha de inspección anual : </h4>
												</td>
												<td class="text-left"><?= htmlspecialchars($equipment->annual_date); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>90 días de fecha de inspección : </h4>
												</td>
												<td class="text-left"><?= htmlspecialchars($equipment->days_inspection_date); ?></td>
											</tr>
											</tbody>
										</table>
									</main>
								</div>
							</div>
						</div>
						<br><br>
						<!-- /.box-body -->
						<div class="box-footer text-center">
							<strong><?= $company->name; ?></strong>&nbsp;&nbsp;&nbsp;<?= $company->address; ?>
						</div>
					</div>
				</div>
				<!-- form start -->
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
