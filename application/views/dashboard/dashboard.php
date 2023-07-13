<!-- All counting start-->
<?php
$count_all_users = $this->MAdmin->count_all_user();
$count_all_dispatch = $this->MAdmin->count_all_dispatches();
$count_all_customers = $this->MAdmin->count_all_customers();
$count_all_drivers = $this->MAdmin->count_all_drivers();
$count_all_load_entry = $this->MAdmin->count_all_load_entry();
$count_all_shippers = $this->MAdmin->count_all_shippers();
$count_all_consignee = $this->MAdmin->count_all_consignees();
$count_all_equipments = $this->MAdmin->count_all_equipments();
$id = $this->session->userdata('id');
$details = $this->MAdmin->get_admin_records($id);
//$type = $this->MAdmin->get_type_record($details->id);
?>
<!-- All counting end -->

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Panel Control</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="https://ventadecodigofuente.com/" target="_blank"><i class="fa fa-dashboard"></i> Mas sistemas aqui</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-lightgreen">
				<div class="inner">
					<h3><?= htmlspecialchars($count_all_load_entry); ?></h3>

					<p>Entrada de carga</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<?php /*if ($type->admin_type == 1) { */ ?><!--
					<a href="<? /*= base_url('admin/view_user'); */ ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				<?php /*} else { */ ?>
					<a href="#" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				--><?php /*} */ ?>
				<a href="<?= base_url('load/view_load_entry'); ?>" class="small-box-footer">Mas informacion <i
						class="fa fa-arrow-circle-right"></i></a>
						
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?= htmlspecialchars($count_all_customers); ?></h3>

					<p>Clientes</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<?php /*if ($type->admin_type == 1) { */ ?>
				<!--	<a href="<? /*= base_url('customer/view_customer'); */ ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				<?php /*} else { */ ?>
					<a href="#" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				--><?php /*} */ ?>
				<a href="<?=base_url('customer/view_customer')?>" class="small-box-footer">Mas informacion <i
						class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?= htmlspecialchars($count_all_shippers); ?></h3>

					<p>remitentes</p>
				</div>
				<div class="icon">
					<i class="fa fa-shopping-bag"></i>
				</div>
				<?php /*if ($type->admin_type == 1) { */ ?><!--
					<a href="<? /*= base_url('product/manage_product'); */ ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				<?php /*} else { */ ?>
					<a href="#" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				--><?php /*} */ ?>
				<a href="<?= base_url('shipper/view_shippers'); ?>" class="small-box-footer">Mas informacion <i
						class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-orange">
				<div class="inner">
					<h3><?= htmlspecialchars($count_all_consignee); ?></h3>

					<p>Destinatarios</p>
				</div>
				<div class="icon">
					<i class="fa fa-shopping-bag"></i>
				</div>
				<?php /*if ($type->admin_type == 1) { */ ?><!--
					<a href="<? /*= base_url('product/manage_product'); */ ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				<?php /*} else { */ ?>
					<a href="#" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				--><?php /*} */ ?>
				<a href="<?= base_url('consignee/view_consignee'); ?>" class="small-box-footer">Mas informacion <i
						class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-lightred">
				<div class="inner">
					<h3><?= htmlspecialchars($count_all_drivers); ?></h3>

					<p>Conductores</p>
				</div>
				<div class="icon">
					<i class="fa fa-shopping-bag"></i>
				</div>
				<?php /*if ($type->admin_type == 1) { */ ?><!--
					<a href="<? /*= base_url('product/manage_product'); */ ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				<?php /*} else { */ ?>
					<a href="#" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				--><?php /*} */ ?>
				<a href="<?= base_url('driver/view_driver'); ?>" class="small-box-footer">Mas informacion  <i
						class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-mediumred">
				<div class="inner">
					<h3><?= htmlspecialchars($count_all_equipments); ?></h3>

					<p>Equipos</p>
				</div>
				<div class="icon">
					<i class="fa fa-shopping-bag"></i>
				</div>
				<?php /*if ($type->admin_type == 1) { */ ?><!--
					<a href="<? /*= base_url('product/manage_product'); */ ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				<?php /*} else { */ ?>
					<a href="#" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				--><?php /*} */ ?>
				<a href="<?= base_url('equipment/view_equipment'); ?>" class="small-box-footer">Mas informacion <i
						class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-darkred">
				<div class="inner">
					<h3><?= htmlspecialchars($count_all_dispatch); ?></h3>

					<p>Despachos</p>
				</div>
				<div class="icon">
					<i class="fa fa-shopping-cart"></i>
				</div>
				<?php /*if ($type->admin_type == 1) { */ ?><!--
					<a href="<? /*= base_url('sales/manage_order'); */ ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				<?php /*} else { */ ?>
					<a href="#" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				--><?php /*} */ ?>
				<a href="<?= base_url('dispatch/view_dispatch') ?>" class="small-box-footer">Mas informacion <i
						class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

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
