<?php

$this->load->model('MDispatch');
$this->load->model('MShipper');
$this->load->model('MConsignee');

if($results !== '') {
    $records = $this->MDispatch->get_individual_drivers_record($results[0]->dispatch_id);
    /*$from_date = DateTime::createFromFormat('Y-m-d', $from_date);
    $from_date = $from_date->format('d/m/Y');*/
    
    /*$to_date = DateTime::createFromFormat('Y-m-d', $to_date);
    $to_date = $to_date->format('d/m/Y');*/
    
    $pick_up_array = array();
    $delivery_array = array();
    foreach ($results as $value):
    	$pick_up_array[] = $value->pick_up_date;
    	$delivery_array[] = $value->delivery_date;
    endforeach;
    usort($pick_up_array, function ($a, $b) {
    	$dateTimestamp1 = strtotime($a);
    	$dateTimestamp2 = strtotime($b);
    
    	return $dateTimestamp1 < $dateTimestamp2 ? -1 : 1;
    });
    usort($delivery_array, function ($a, $b) {
    	$dateTimestamp3 = strtotime($a);
    	$dateTimestamp4 = strtotime($b);
    
    	return $dateTimestamp3 < $dateTimestamp4 ? -1 : 1;
    });
    $from_date = $pick_up_array[0];
    $to_date = $delivery_array[count($delivery_array) - 1];
}

?>

<style>
	h2.name {
		font-size: 25px;
		margin-top: 0px;
		margin-bottom: 5px;
	}

	th.empty-border {
		border-top-color: #fff !important;
	}

	.border-bottom-c {
		border-left-color: #fff !important;
		border-bottom-color: #fff !important;
	}

	.color-blue {
		background: #B3C6E7;
	}

	.color-gray {
		background: #f6cbaa;
	}

	.color-red {
		background: #ff7a7f;
	}

	.color-green {
		background: #70AD46;
	}

	.color-yellow {
		background: #fed966;
	}

	.mt-50 {
		margin-top: 50px;
	}

	.logo-area {
		border: 1px solid #222;
		width: 200px;
		text-align: center;
		padding: 10px;
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
						<div class="col-md-12">
							<div class="box-body">
								<div class="row ">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<div class="logo-area">
													<div id="logo">
														<img src="<?= base_url($company->logo); ?>" width="150px"
															 height="50px">
													</div>
													<div id="company">
														<h2 class="name"><?= htmlspecialchars($company->name); ?></h2>
														<div><?= htmlspecialchars($company->phone); ?></div>
														<div><?= htmlspecialchars($company->email); ?></div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<table class="table table-bordered text-center">
													<thead>
													<tr>
														<th class="color-gray " colspan="2">Informe de pago de despacho</th>
													</tr>
													</thead>
													<tbody>
													<?php
													if ($results != '') {
														$dispatch = $this->MDispatch->get_record($results[0]->dispatch_id);
														?>
														<tr>
															<td>Nombre</td>
															<td><?= htmlspecialchars($dispatch->first_name) . ' ' . htmlspecialchars($dispatch->last_name); ?></td>
														</tr>
														<tr>
															<td>Telefono</td>
															<td><?= htmlspecialchars($dispatch->phone); ?></td>
														</tr>
														<tr>
															<td>Fecha del informe</td>
															<td><?= date('d/m/Y'); ?></td>
														</tr>
														<tr>
															<td>Informe desde</td>
															<td><?= htmlspecialchars($from_date); ?></td>
														</tr>
														<tr>
															<td>Informe hasta</td>
															<td><?= htmlspecialchars($to_date); ?></td>
														</tr>
													<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
										<hr>
									</div>

									<div class="col-md-12 mt-50">
										<?php
										$total = 0;
										if($results !== '') {
										foreach ($records as $record):
											$driver = $this->MDriver->get_record($record->driver_id);
											$founds = $this->MDriver->get_all_data($record->driver_id, $results[0]->dispatch_id);
											?>
											<table class="table table-bordered">
												<tbody>
												<tr>
													<td><?= htmlspecialchars($driver->first_name) . ' ' . htmlspecialchars($driver->last_name); ?></td>
												</tr>
												<tr>
													<td># Carga</td>
													<td>Fecha de recogida</td>
													<td>P/L</td>
													<td>D/L</td>
													<td>Linea recorrido</td>
													<td>Comision</td>
												</tr>
												<?php
												foreach ($founds as $v_found):
													$shipper = $this->MShipper->get_record($v_found->shipper_id);
													$consignee = $this->MConsignee->get_record($v_found->consignee_id);
													$dispatch_record = $this->MDispatch->get_record($v_found->dispatch_id);
													?>
													<tr>
														<td><?= htmlspecialchars($v_found->load_id); ?></td>
														<td><?= htmlspecialchars($v_found->pick_up_date); ?></td>
														<td><?= htmlspecialchars($shipper->city) . ', ' . htmlspecialchars($shipper->state); ?></td>
														<td><?= htmlspecialchars($consignee->city) . ', ' . htmlspecialchars($consignee->state); ?></td>
														<td><?= htmlspecialchars('$' . number_format($v_found->line_haul_rate, 2)); ?></td>
														<td><?= htmlspecialchars('$' . number_format($dispatch_record->rate, 2)); ?></td>
													</tr>
													<?php $total += $dispatch_record->rate;
												endforeach; ?>
												</tbody>
											</table>
										<?php endforeach; ?>
										<table class="table">
											<tbody>
											<tr>
												<td>Total</td>
												<td colspan="5"
														<td><?= htmlspecialchars('$' . number_format($dispatch_record->rate, 2)); ?></td>
													style="text-align: right"><?= htmlspecialchars('$' . number_format($total, 2)); ?></td>
											</tr>
											</tbody>
											<?php } ?>
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
