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
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Reporte
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Reporte</li>
	</ol>
</section>

<?php

//$details = $this->MSales->get_sales_details_by_sales_no($sale->sales_no);

?>
<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Resumen de pago del conductor</h3>

					<button id="print" onclick="printDiv('printableArea')" class="btn btn-default pull-right"
							type="button"><span><i
								class="fa fa-print"></i> Impresion</span></button>

				</div>

				<div id="printableArea">
					<!-- /.box-header -->
					<div class="row ">
						<div class="col-md-8 col-md-offset-2">
							<div class="box-body">
								<div class="row ">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div id="logo">
													<img src="<?= base_url($company->logo); ?>" width="150px"
														 height="50px">
												</div>
											</div>
											<div class="col-md-6">
												<div id="company" style="margin-top: 30px;">
													<h2 class="name"><?= htmlspecialchars($company->name); ?></h2>
													<div><?= htmlspecialchars($company->phone); ?></div>
													<div><?= htmlspecialchars($company->email); ?></div>
												</div>
											</div>
										</div>
										<hr>
									</div>

									<!--<div class="col-md-12">
										<div class="pull-right invoice-item">
											<h2>INVOICE# <? /*= $sale->sales_no; */ ?></h2>
											<h4>Invoice Date: <? /*= $sale->date; */ ?></h4>
										</div>
									</div>-->
									<?php
									$this->load->model('MDispatch');
									$this->load->model('MShipper');
									$this->load->model('MConsignee');
									$this->load->model('MCustomer');
									if ($results != '') {
										$customer = $this->MCustomer->get_record($results[0]->customer_id);
										?>
										<div class="col-md-6">
											<div class="sels-report">
												<h4 style="margin-bottom: 30px;">
													Nombre Conductor: <?= htmlspecialchars($customer->name); ?></h4>
											</div>
										</div>
										<div class="col-md-6">
											<div class="sels-report">
												<h4 style="margin-bottom: 30px;">
													Fecha: <?= htmlspecialchars($results[0]->date); ?></h4>
											</div>
										</div>
									<?php } ?>
									<!--<div class="col-md-6">
										<div class="sels-report">
											<h4 style="margin-bottom: 30px;">Driver CDL: </h4>
										</div>
									</div>
									<div class="col-md-6">
										<div class="sels-report">
											<h4 style="margin-bottom: 30px;">Total Unsettled Amount: </h4>
										</div>
									</div>-->

									<div class="col-md-12">
										<table class="table table-hover">
											<thead>
											<tr>
												<th scope="col">#ID Carga </th>
												<th scope="col">P/L</th>
												<th scope="col">D/L</th>
												<th scope="col">Pago de envio</th>
												<th scope="col">Anticipo de nomina</th>
											</tr>
											</thead>
											<tbody>
											<?php
											if ($results != '') {
												$total = 0;
												foreach ($results as $result):
													$dispatch_pay = ($result->line_haul_rate + $result->detention + $result->layover + $result->other_charge);
													$shipper = $this->MShipper->get_record($result->shipper_id);
													$consignee = $this->MConsignee->get_record($result->consignee_id);
													?>
													<tr>
														<td scope="col"><?= htmlspecialchars($result->load_id); ?></td>
														<td scope="col"><?= htmlspecialchars($shipper->address) . ' ' . htmlspecialchars($result->pick_up_date); ?></td>
														<td scope="col"><?= htmlspecialchars($consignee->address) . ' ' . htmlspecialchars($result->delivery_date); ?></td>
														<td scope="col"><?= number_format($dispatch_pay, 2); ?></td>
														<td scope="col">0.00</td>
													</tr>
													<?php $total += $dispatch_pay;
												endforeach; ?>
												<tr>
													<td><strong>Total Payroll: $<?= htmlspecialchars($total); ?></strong></td>
													<td></td>
													<td><strong>Total Payroll Advance: 0.00</strong></td>
													<td></td>
													<td><strong>Balance Payroll: $<?= htmlspecialchars($total); ?></strong></td>
												</tr>
											<?php } ?>
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
