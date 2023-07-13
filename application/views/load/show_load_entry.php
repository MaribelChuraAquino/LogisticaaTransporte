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
					<h3 class="box-title">Detalles de entrada de carga</h3>
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
												<td width="30%" class="text-left"><h4> ID Carga : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($load->load_id); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Cliente : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($customer->name); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Carga de clientes : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($load->customer_load); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Tipo de carga : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($load->load_type); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Fecha : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($load->date); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Fecha de recogida : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($load->pick_up_date); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Fecha de entrega : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($load->delivery_date); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Envio : </h4></td>
												<td class="text-left">
													<h4><?= htmlspecialchars($dispatch->first_name) . ' ' . htmlspecialchars($dispatch->last_name); ?></h4>
												</td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Tasa de transporte de línea : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($load->line_haul_rate); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Descarga : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($load->unloading); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Reembolsar : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($load->reimburse); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Detención : </h4></td>
												<td class="text-left"><h4><?= htmlspecialchars($load->detention); ?></h4></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Escala : </h4></td>
												<td class="text-left"><?= htmlspecialchars($load->layover); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Otro cargo : </h4></td>
												<td class="text-left"><?= htmlspecialchars($load->other_charge); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Tarifa total : </h4></td>
												<td class="text-left"><?= htmlspecialchars($load->total_rate); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Conductor : </h4></td>
												<td class="text-left"><?= htmlspecialchars($driver->first_name) . ' ' . htmlspecialchars($driver->last_name); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Remitente : </h4></td>
												<td class="text-left"><?= htmlspecialchars($shipper->name); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Nota : </h4></td>
												<td class="text-left"><?= htmlspecialchars($load->note); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Destinatario : </h4></td>
												<td class="text-left"><?= htmlspecialchars($consignee->name); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Nota del destinatario : </h4>
												</td>
												<td class="text-left"><?= htmlspecialchars($load->con_note); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Vacía M : </h4>
												</td>
												<td class="text-left"><?= htmlspecialchars($load->empty_m); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Cargada M : </h4>
												</td>
												<td class="text-left"><?= htmlspecialchars($load->loaded_m); ?></td>
											</tr>
											<tr>
												<td width="30%" class="text-left"><h4>Por milla : </h4>
												</td>
												<td class="text-left"><?= htmlspecialchars($load->per_mile); ?></td>
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
							<strong><?= htmlspecialchars($company->name); ?></strong>&nbsp;&nbsp;&nbsp;<?= htmlspecialchars($company->address); ?>
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
