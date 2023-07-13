<style>
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

	.pull-right.invoice-item {
		margin-bottom: 35px;
	}

	.pull-right.invoice-item h2 {
		color: #04c;
		font-size: 35px;
	}

	tr.gtotal td {
		font-size: 16px;
		font-weight: 600;
		color: #4ebf5d;
		border-top: 1px solid red;
	}

	table.table.table-bordered.inv-table1 tr > td {
		padding: 0px;
		text-align: center;
		font-size: 16px;
	}

	tr.inv-title td {
		background: #f1f1f1;
	}

	td.empty-td {
		height: 20px;
	}

	.address {
		margin-top: 20px;
		margin-bottom: 20px;
	}

	.address p {
		padding: 0px;
		margin: 0px;
		font-size: 20px;
	}

	.inv-table2 ul li {
	}

	.inv-table2 ul li {
		list-style: none;
		font-size: 16px;
	}

	table.table.table-bordered.inv-table2 ul {
		padding-left: 0px;
	}

	table.table.table-bordered.inv-table2 .inv-title td {
		font-size: 18px;
		font-weight: 600;
	}

	.inv-table2 {
		margin-bottom: 50px;
	}

	table.table.table-bordered.main-inv-table th {
		background: #f1f1f1;
	}

	td.bgg-gray {
		background: #f1f1f1;
	}

	td.table-img img {
		width: 55px;
		margin-bottom: 20px;
	}

	td.table-img ul li {
		list-style: none;
		margin-left: 0px;
	}

	td.table-img ul {
		margin-left: 0px;
		padding-left: 0;
	}

	td.table-text ul {
		padding-left: 0px;
	}

	td.table-text ul li {
		list-style: none;
		font-size: 20px;
		margin-top: 20px;
	}

	.table-bordered {
		border: 1px solid #f4f4f4;
		border: 0px;
	}

	.border-0 {
		border: 0px !important;
	}

	.terms p {
		font-size: 18px;
	}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Driver Pay Report
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Sales</li>
	</ol>
</section>

<?php

$this->load->model('MDispatch');
$this->load->model('MShipper');
$this->load->model('MConsignee');
if ($results != '') {
	$driver = $this->MDriver->get_record($results[0]->driver_id);
}
$grant_total = 0;
?>
<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Detalles de pago del conductor</h3>

					<button id="print" onclick="printDiv('printableArea')" class="btn btn-default pull-right"
							type="button"><span><i
								class="fa fa-print"></i> Impresion</span></button>

				</div>

				<div id="printableArea">
					<!-- /.box-header -->
					<div class="row ">
						<div class="col-md-10 col-md-offset-1">
							<div class="box-body">
								<div class="row ">
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-12">
												<div id="logo">
													<img src="<?= base_url($company->logo); ?>" width="100px"
														 height="100px">
												</div>
											</div>
											<div class="col-md-12" style="margin-bottom: 20px">

											</div>

											<div class="col-md-6">
												<table class="table inv-table2">

													<tbody>
													<tr class="inv-title">
														<td><strong><?= htmlspecialchars($company->name); ?></strong></td>
													</tr>
													<tr>
														<td>
															<ul>
																<li><?= htmlspecialchars($company->address); ?></li>
																<li><?= htmlspecialchars($company->phone); ?></li>
															</ul>
														</td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<table class="table table-bordered inv-table1">
											<tbody>
											<tr class="inv-title">
												<td>Reporte</td>
												<td>Pago del conductor</td>
											</tr>
											<?php if ($results != '') { ?>
												<tr>
													<td class="">Conductor</td>
													<td class=""><?= htmlspecialchars($driver->first_name) . ' ' . htmlspecialchars($driver->last_name); ?></td>
												</tr>
												<tr>
													<td class="">Direccion</td>
													<td class=""><?= htmlspecialchars($driver->address); ?></td>
												</tr>
												<tr>
													<td class="">Telefone</td>
													<td class=""><?= htmlspecialchars($driver->phone); ?></td>
												</tr>
												<tr>
													<td class="">Fecha del informe</td>
													<td class=""><?= date('Y-m-d'); ?></td>
												</tr>
												<tr>
													<td class="">Informe desde</td>
													<td class=""><?= htmlspecialchars($from_date); ?></td>
												</tr>
												<tr>
													<td class="">Informe hasta</td>
													<td class=""><?= htmlspecialchars($to_date); ?></td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
									<div class="col-md-12">
										<table class="table table-striped">
											<tbody>
											<?php if ($results != '') {
												foreach ($results as $result):
													$shipper = $this->MShipper->get_record($result->shipper_id);
													$consignee = $this->MConsignee->get_record($result->consignee_id);
													?>
													<tr>
														<td>
															<table class="table">
																<tr>
																	<td><strong>#Carga
:</strong></td>
																	<td><strong><?= htmlspecialchars($result->load_id); ?></strong></td>
																</tr>
																<tr>
																	<td>Recoger:</td>
																	<td><?= htmlspecialchars($result->pick_up_date) . ' ' . htmlspecialchars($shipper->city) . ', ' . htmlspecialchars($shipper->state); ?></td>
																</tr>
																<tr>
																	<td>Entrega:</td>
																	<td><?= htmlspecialchars($result->delivery_date) . ' ' . htmlspecialchars($consignee->city) . ', ' . htmlspecialchars($consignee->state); ?></td>
																</tr>
																<tr>
																	<td>Pago de línea / conductor:</td>
																	<td>
																		$<?php $line_haul = ($result->line_haul_rate - ($result->line_haul_rate / $driver->percentage));
																		echo number_format($line_haul, 2); ?></td>
																</tr>
																<tr>
																	<td>Pago adicional:</td>
																	<td>$<?php
																		$total = $result->detention + $result->layover + $result->other_charge;
																		echo number_format($total, 2);
																		?></td>
																</tr>
																<tr>
																	<td>Millas de conductor:</td>
																	<td><?= htmlspecialchars($result->loaded_m) .'/'. htmlspecialchars($result->empty_m); ?></td>
																</tr>
																<tr>
																	<td>Total parcial:</td>
																	<td><?= number_format(($line_haul + $total), 2); ?></td>
																</tr>
																<tr>
																	<td>Notas:</td>
																	<td><?= htmlspecialchars($result->note); ?></td>
																</tr>
															</table>
														</td>
													</tr>
												<?php $grant_total += $line_haul + $total;
												endforeach;
											} ?>
											<tr>
											    <td>Total</td>
											    <td><?= number_format($grant_total, 2); ?></td>
											</tr>
											</tbody>
										</table>
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
<script>
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>
