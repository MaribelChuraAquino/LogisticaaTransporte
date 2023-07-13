$(document).ready(function(){
    'use strict'
    /*Datatable */
		$('#example1').DataTable({
            responsive:true,
			dom: 'Bfrtip',
			dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
		
		});
		
		//$('#example1').DataTable();
		$('.select2').select2();
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
		});

		//calculate total
		$('#line_haul_rate').on('change',function () {
			result();
		});

		$('#detention').on('change',function () {
			result();
		});

		$('#layover').on('change',function () {
			result();
		});

		$('#other_charges').on('change',function () {
			result();
		});

		$('#reimburse').on('change',function () {
			result();
		});

		$('#unloading').on('change',function () {
			result();
		});

		function result() {
			'use strict'
			var line_haul_rate = parseFloat($('#line_haul_rate').val());
			var reimburse = $('#reimburse').val();
			var detention = parseFloat($('#detention').val());
			if (isNaN(detention)) {
				detention = 0;
			}
			var layover = parseFloat($('#layover').val());
			if (isNaN(layover)) {
				layover = 0;
			}
			var other_charges = parseFloat($('#other_charges').val());
			if (isNaN(other_charges)) {
				other_charges = 0;
			}
			var unloading = parseFloat($('#unloading').val());
			if (isNaN(unloading)) {
				unloading = 0;
			}
			var total = 0;
			if (reimburse === "Yes") {
				total = line_haul_rate + detention + layover + other_charges + unloading;
			} else {
				total = line_haul_rate + detention + layover + other_charges;
			}
			$('#total_rate').val(total);
		}

	});

	$(window).on('load', function () {
		'use strict'
		$('.nexo-overlay').fadeOut('slow');
	})

