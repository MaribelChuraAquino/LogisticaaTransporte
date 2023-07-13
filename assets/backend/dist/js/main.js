$(document).ready(function () {
	'use strict'
	$('#purchase_check_all').change(function () {
		$('.purchase_check_box').prop("checked", $(this).prop("checked"));
	});
	$('.purchase_check_box').change(function () {
		if ($(this).prop("checked") == false) {
			$('#purchase_check_all').prop("checked", false);
		}
		if ($('.purchase_check_box:checked').length == $('.purchase_check_box').length) {
			$('#purchase_check_all').prop("checked", true);
		}
	});
	$('#supplier_check_all').change(function () {
		$('.supplier_check_box').prop("checked", $(this).prop("checked"));
	});
	$('.supplier_check_box').change(function () {
		if ($(this).prop("checked") == false) {
			$('#supplier_check_all').prop("checked", false);
		}
		if ($('.supplier_check_box:checked').length == $('.supplier_check_box').length) {
			$('#supplier_check_all').prop("checked", true);
		}
	});

	//purchase check box
	$('#purchase_check_all2').change(function () {
		$('.purchase_check_box1').prop("checked", $(this).prop("checked"));
	});
	$('.purchase_check_box1').change(function () {
		if ($(this).prop("checked") == false) {
			$('#purchase_check_all2').prop("checked", false);
		}
		if ($('.purchase_check_box1:checked').length == $('.purchase_check_box1').length) {
			$('#purchase_check_all2').prop("checked", true);
		}
	});

	//order process check box
	$('#order_process_all').change(function () {
		$('.order_check_box').prop("checked", $(this).prop("checked"));
	});
	$('.order_check_box').change(function () {
		if ($(this).prop("checked") == false) {
			$('#order_process_all').prop("checked", false);
		}
		if ($('.order_check_box:checked').length == $('.order_check_box').length) {
			$('#order_process_all').prop("checked", true);
		}
	});

	//customer check box
	$('#customer_check_all').change(function () {
		$('.customer_check_box').prop("checked", $(this).prop("checked"));
	});
	$('.customer_check_box').change(function () {
		if ($(this).prop("checked") == false) {
			$('#customer_check_all').prop("checked", false);
		}
		if ($('.customer_check_box:checked').length == $('.customer_check_box').length) {
			$('#customer_check_all').prop("checked", true);
		}
	});

	//report check box
	$('#report_check_all').change(function () {
		$('.report_check_box').prop("checked", $(this).prop("checked"));
	});
	$('.report_check_box').change(function () {
		if ($(this).prop("checked") == false) {
			$('#report_check_all').prop("checked", false);
		}
		if ($('.report_check_box:checked').length == $('.report_check_box').length) {
			$('#report_check_all').prop("checked", true);
		}
	});

	//employee check box
	$('#employee_check_all').change(function () {
		$('.employee_check_box').prop("checked", $(this).prop("checked"));
	});
	$('.employee_check_box').change(function () {
		if ($(this).prop("checked") == false) {
			$('#employee_check_all').prop("checked", false);
		}
		if ($('.employee_check_box:checked').length == $('.employee_check_box').length) {
			$('#employee_check_all').prop("checked", true);
		}
	});

	//product check box
	$('#product_check_all').change(function () {
		$('.product_check_box').prop("checked", $(this).prop("checked"));
	});
	$('.product_check_box').change(function () {
		if ($(this).prop("checked") == false) {
			$('#product_check_all').prop("checked", false);
		}
		if ($('.product_check_box:checked').length == $('.product_check_box').length) {
			$('#product_check_all').prop("checked", true);
		}
	});

	//category check box
	$('#category_check_all').change(function () {
		$('.category_check_box').prop("checked", $(this).prop("checked"));
	});
	$('.category_check_box').change(function () {
		if ($(this).prop("checked") == false) {
			$('#category_check_all').prop("checked", false);
		}
		if ($('.category_check_box:checked').length == $('.category_check_box').length) {
			$('#category_check_all').prop("checked", true);
		}
	});
});
