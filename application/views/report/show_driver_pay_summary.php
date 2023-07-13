<?php

$this->load->model('MDispatch');
$this->load->model('MShipper');
$this->load->model('MConsignee');

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
                                                        <th class="color-gray
                                                        " colspan="2">Informe de pago del conductor</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if ($results != '') {
                                                        $driver = $this->MDriver->get_record($results[0]->driver_id);
                                                        ?>
                                                        <tr>
                                                            <td>Nombre</td>
                                                            <td><?= htmlspecialchars($driver->first_name) . ' ' . htmlspecialchars($driver->last_name); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Direccion</td>
                                                            <td><?= htmlspecialchars($driver->address); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Telefono</td>
                                                            <td><?= htmlspecialchars($driver->phone); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fecha del informe</td>
                                                            <td><?= date('Y-m-d'); ?></td>
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
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="color-gray">Nomina de sueldos</th>
                                            </tr>
                                            <tr>
                                                <th class="color-blue">Linea recorridos</th>
                                                <th class="empty-border" colspan="3"></th>
                                                <th class="color-yellow" colspan="3">Miles</th>
                                            </tr>
                                            <tr>
                                                <th class="color-blue"># Carga</th>
                                                <th class="color-blue">P/L</th>
                                                <th class="color-blue">D/L</th>
                                                <th class="color-blue">Linea recorrido</th>
                                                <th class="color-yellow">DH</th>
                                                <th class="color-yellow">Cargada</th>
                                                <th class="color-yellow">Por milla</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if ($results != '') {
                                                $i = 0;
                                                $total_line_haul = 0;
                                                $total_loaded_m = 0;
                                                $total_empty_m = 0;
                                                $total_per_mile = 0;
                                                foreach ($results as $result):
                                                    $shipper = $this->MShipper->get_record($result->shipper_id);
                                                    $consignee = $this->MConsignee->get_record($result->consignee_id);
                                                    ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($result->load_id); ?></td>
                                                        <td><?= htmlspecialchars($shipper->city) . ', ' . htmlspecialchars($shipper->state); ?></td>
                                                        <td><?= htmlspecialchars($consignee->city) . ', ' . htmlspecialchars($consignee->state); ?></td>
                                                        <td><?= htmlspecialchars('$' . number_format($result->line_haul_rate * 0.621371, 2)); ?></td>
                                                        <td><?= number_format((float)$result->loaded_m * 0.621371, 2); ?></td>
                                                        <td><?= number_format((float)$result->empty_m * 0.621371, 2); ?></td>
                                                        <td><?= number_format((float)$result->per_mile * 0.621371, 2); ?></td>
                                                    </tr>
                                                    <?php
                                                    $total_line_haul += (float)$result->line_haul_rate * 0.621371;
                                                    $total_loaded_m += (float)$result->loaded_m * 0.621371;
                                                    $total_empty_m += (float)$result->empty_m * 0.621371;
                                                    $total_per_mile += (float)$result->per_mile * 0.621371;
                                                    if ($result->per_mile != '') {
                                                        if (number_format($result->per_mile, 2) != 0.00) {
                                                            $i++;
                                                        }
                                                    }
                                                endforeach; ?>
                                                <tr>
                                                    <td class="border-bottom-c" colspan="2"></td>
                                                    <td class="color-blue"><strong>Totales</strong></td>
                                                    <td class="color-green">
                                                        $<?=number_format($total_line_haul, 2); ?></td>
                                                    <td class="color-yellow"><?= number_format($total_loaded_m, 2); ?></td>
                                                    <td class="color-yellow"><?= number_format($total_empty_m, 2); ?></td>
                                                    <td class="color-yellow"><?= number_format($total_per_mile / $i, 2); ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>


                                    <?php
                                    if ($results != '') {
                                        if ($results[0]->detention != 0 || $results[0]->layover != 0 || $results[0]->other_charge != 0) {
                                            ?>
                                            <div class="col-md-8 mt-50">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th class="color-gray">Detenciones y escalas</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="color-green"># Carga</th>
                                                        <th class="color-green">Detencion</th>
                                                        <th class="color-green">Escala</th>
                                                        <th class="color-green">Otros cargos</th>
                                                        <th class="color-green">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $total = 0;
                                                    foreach ($results as $v_result):
                                                        if ($v_result->detention != 0 || $v_result->layover != 0 || $v_result->other_charge != 0) {
                                                            ?>
                                                            <tr>
                                                                <td><?= htmlspecialchars($v_result->load_id); ?></td>
                                                                <td><?= number_format($v_result->detention, 2); ?></td>
                                                                <td><?= number_format($v_result->layover, 2); ?></td>
                                                                <td><?= number_format($v_result->other_charge, 2); ?></td>
                                                                <td><?= number_format(($v_result->detention + $v_result->layover + $v_result->other_charge), 2); ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        $total += $v_result->detention + $v_result->layover + $v_result->other_charge;
                                                    endforeach; ?>
                                                    <tr>
                                                        <td class="border-bottom-c" colspan="3"></td>
                                                        <td class="color-green"><strong>Totales</strong></td>
                                                        <td class="color-green">$<?= number_format($total, 2); ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php }
                                    } ?>

                                    <?php
                                    $total_recurring_exp = 0;
                                    if ($results != '') {
                                        if ($is_expense == 1) {
                                            ?>
                                            <div class="col-md-5 mt-50">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th class="color-red">Gastos recurrentes</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Descripcion</th>
                                                        <th>Cantidad</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Seguro (responsabilidad y carga)</td>
                                                        <td>$<?= number_format($driver->insurance_cargo, 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Seguro (camión / remolque PD)</td>
                                                        <td>$<?= number_format($driver->insurance_truck, 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Servicio IFTA</td>
                                                        <td>$<?= number_format($driver->ifta_service, 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Prepasar</td>
                                                        <td>$<?= number_format($driver->prepass, 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tablero de carga</td>
                                                        <td>$<?= number_format($driver->load_board, 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alquiler de remolque</td>
                                                        <td>$<?= number_format($driver->trailer_rent, 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="color-red"><strong>Totales</strong></td>
                                                        <td class="color-red">$<?php
                                                            $total_recurring_exp = $driver->insurance_cargo + $driver->insurance_truck + $driver->ifta_service + $driver->prepass + $driver->load_board + $driver->trailer_rent;
                                                            echo number_format($total_recurring_exp, 2);
                                                            ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php }
                                    } ?>


                                    <div class="col-md-8 mt-50">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="color-red">Otros gastos</th>
                                            </tr>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if ($results != '') {
                                                //$this->load->model('MExpense');
                                                $holder = $this->MAccount->get_record($driver->account_holder);
                                                $other_expenses = $this->MExpense->get_all_expense_record($holder->name, $from_date, $to_date);
                                                if ($other_expenses) {
                                                    $total_exp = 0;
                                                    foreach ($other_expenses as $v_expense):
                                                        ?>
                                                        <tr>
                                                            <td><?= htmlspecialchars($v_expense->date); ?></td>
                                                            <td><?= htmlspecialchars($v_expense->vendor); ?></td>
                                                            <td><?= number_format($v_expense->amount, 2); ?></td>
                                                        </tr>
                                                        <?php $total_exp += $v_expense->amount;
                                                    endforeach; ?>
                                                    <tr>
                                                        <td class="border-bottom-c"></td>
                                                        <td class="color-red"><strong>Totales</strong></td>
                                                        <td class="color-red">$<?= number_format($total_exp, 2); ?></td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="col-md-8 mt-50">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="color-green">Resumen</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Ingresos totales</td>
                                                <td class="color-green">
                                                    $<?php if ($results != '') {
                                                        $total_income = $total_line_haul + $total;
                                                        echo number_format($total_income, 2);
                                                    } else {
                                                        echo 0;
                                                    } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Cargo por servicio</td>
                                                <td class="color-red">
                                                    $<?php if ($results != '') {
                                                        $amount = ($total_line_haul + $total) * $driver->percentage;
                                                        $service_charge = ($total_line_haul + $total) - $amount;
                                                        echo number_format($service_charge, 2);
                                                    } else {
                                                        echo 0;
                                                    } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gasto total</td>
                                                <td class="color-red">
                                                    $<?php if ($results != '') {
                                                        $total_expense = $total_recurring_exp + $total_exp;
                                                        echo number_format($total_expense, 2);
                                                    } else {
                                                        echo 0;
                                                    } ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Pago total</strong></td>
                                                <td class="color-green">
                                                    $<?php if ($results != '') {
                                                        echo number_format(($total_income - $service_charge - $total_expense), 2);
                                                    } else {
                                                        echo 0;
                                                    } ?></td>
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
