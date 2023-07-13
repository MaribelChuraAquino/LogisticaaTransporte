<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Entrada de carga | <a href="<?php echo base_url('load/add_load_entry'); ?>">
			<button class="btn btn-info btn-sm">Agregar entrada de carga</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Conductor</li>
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
					<h3 class="box-title">Ver entrada de carga</h3>
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
				<div class="box-body" style="overflow-y: scroll;overflow-x:scroll">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
		
<th> ID de carga </th>
<th> Nombre del cliente </th>
<th> Carga de clientes </th>
<th> Tipo de carga </th>
<th> Fecha </th>
<th> Fecha de recogida </th>
<th> Fecha de entrega </th>
<th> Envío </th>
<th> Tasa de transporte de linea </th>
<th> Descarga </th>
<th> Reembolsar </th>
<th> DetenciOn </th>
<th> Escala </th>
<th> Otro cargo </th>
<th> Tarifa total </th>
<th> Conductor </th>
<th> Remitente </th>
<th> Peso </th>
<th> Cantidad </th>
<th> Contacto del remitente </th>
<th> Nota </th>
<th> Destinatario </th>
<th> Contacto del destinatario </th>
<th> Nota del destinatario </th>
<th> Milla vacía </th>
<th> Milla cargada </th>
<th> Por milla </th>
<th> Acción </th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($loads as $load):
							$customer = $this->MCustomer->get_record($load->customer_id);
							$dispatch = $this->MDispatch->get_record($load->dispatch_id);
							$shipper = $this->MShipper->get_record($load->shipper_id);
							$consignee = $this->MConsignee->get_record($load->consignee_id);
							$driver = $this->MDriver->get_record($load->driver_id);
							?>
							<tr style="border-bottom: 1px solid">
								<td><?= htmlspecialchars($load->load_id); ?></td>
								<td><?= htmlspecialchars($customer->name); ?></td>
								<td><?= htmlspecialchars($load->customer_load); ?></td>
								<td><?= htmlspecialchars($load->load_type); ?></td>
								<td><?= htmlspecialchars($load->date); ?></td>
								<td><?= htmlspecialchars($load->pick_up_date); ?></td>
								<td><?= htmlspecialchars($load->delivery_date); ?></td>
								<td><?= htmlspecialchars($dispatch->first_name) . ' ' . htmlspecialchars($dispatch->last_name); ?></td>
								<td><?= htmlspecialchars($load->line_haul_rate); ?></td>
								<td><?= htmlspecialchars($load->unloading); ?></td>
								<td><?= htmlspecialchars($load->reimburse); ?></td>
								<td><?= htmlspecialchars($load->detention); ?></td>
								<td><?= htmlspecialchars($load->layover); ?></td>
								<td><?= htmlspecialchars($load->other_charge); ?></td>
								<td><?= htmlspecialchars($load->total_rate); ?></td>
								<td><?= htmlspecialchars($driver->first_name) . ' ' . htmlspecialchars($driver->last_name); ?></td>
								<td><?= htmlspecialchars($shipper->name); ?></td>
								<td><?= htmlspecialchars($load->weight); ?></td>
								<td><?= htmlspecialchars($load->qty); ?></td>
								<td><?= htmlspecialchars($load->shipper_contact); ?></td>
								<td><?= htmlspecialchars($load->note); ?></td>
								<td><?= htmlspecialchars($consignee->name); ?></td>
								<td><?= htmlspecialchars($load->consignee_contact); ?></td>
								<td><?= htmlspecialchars($load->con_note); ?></td>
								<td><?= htmlspecialchars($load->empty_m); ?></td>
								<td><?= htmlspecialchars($load->loaded_m); ?></td>
								<td><?= htmlspecialchars($load->per_mile); ?></td>
								<td>
									<a class="btn btn-info btn-primary mr-1 btn-xs" target="_blank"
									   href="<?php echo base_url("load/show_load_entry/$load->id"); ?>"><i class="fa fa-eye"></i></a>
									<a class="btn btn-info btn-edit mr-1 btn-xs"
									   href="<?php echo base_url("load/edit_load_entry/$load->id"); ?>"><i class="fa fa-edit"></i></a>
									<a class="btn btn-danger del btn-xs"
									   href="<?php echo base_url("load/delete_load_entry/$load->id"); ?>"
									   onclick="return confirm('Are you want to delete');"><i class="fa fa-trash"></i></a>
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
