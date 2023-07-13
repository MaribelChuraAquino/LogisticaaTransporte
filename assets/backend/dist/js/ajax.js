$(document).ready(function () {
	'use strict'
	$('#driver_id').change(function () {
		var driver_id = $(this).val();
		var base_url = location.protocol + '//' + location.host + '/amit/delivery/';
		$.ajax({
			url: base_url + 'driver/get_records_by_driver_id',
			type: "POST",
			data: {'driver_id': driver_id},
			cache: false,
			success: function (msg) {
				var data = $.parseJSON(msg);
				$('#truck').val(data.truck);
				$('#trailer').val(data.trailer);
				$('#rate').val(data.rate);
				$('#oldConsigneeLat').val(data.oldLat);
				$('#oldConsigneeLong').val(data.oldLong);
				$('#oldConsigneeCity').val(data.oldCity);
			},
			error: function () {
				alert('Error Occur...');
			}
		});
	});

	$('#shipper_id').change(function () {
		var shipper_id = $(this).val();
		var base_url = location.protocol + '//' + location.host + '/amit/delivery/';
		$.ajax({
			url: base_url + 'shipper/get_records_by_shipper_id',
			type: "POST",
			data: {'shipper_id': shipper_id},
			cache: false,
			success: function (msg) {
				var data = $.parseJSON(msg);
				$('#address').val(data.address);
				$('#city').val(data.city);
				$('#state').val(data.state);
				$('#zip_code').val(data.zip_code);
				$('#latitude').val(data.latitude);
				$('#longitude').val(data.longtitude);

                var oldclat = $('#oldConsigneeLat').val();
                var oldclng = $('#oldConsigneeLong').val();
                var slat = $('#latitude').val();
                var slng = $('#longitude').val();

                var origin1 = new google.maps.LatLng(oldclat, oldclng);
                var origin2 = $('#oldConsigneeCity').val();

                var destinationA = $('#city').val();
                var destinationB = new google.maps.LatLng(slat, slng);

                var service = new google.maps.DistanceMatrixService();
                service.getDistanceMatrix(
                    {
                        origins: [origin1, origin2],
                        destinations: [destinationA, destinationB],
                        travelMode: 'DRIVING',
                        //transitOptions: TransitOptions,
                        /*drivingOptions: DrivingOptions,
                        unitSystem: UnitSystem,
                        avoidHighways: Boolean,
                        avoidTolls: Boolean,*/
                    }, callback);

                function callback(response, status) {
                    // See Parsing the Results for
                    // the basics of a callback function.
                    //console.log(response.rows[0].elements[0].distance.value);
                    var result =  response.rows[0].elements[0].distance.value;
                    //var result = calcCrow(slat, slng, clat, clng);
                    var mile = parseFloat(result * 0.000621371);
                    $('#empty_mile').val(mile.toFixed(2));
                }
			},
			error: function () {
				alert('Error Occur...');
			}
		});
	});

	$('#consignee_id').change(function () {
		var distance = 0;
		var consignee_id = $(this).val();
		var base_url = location.protocol + '//' + location.host + '/amit/delivery/';
		$.ajax({
			url: base_url + 'consignee/get_records_by_consignee_id',
			type: "POST",
			data: {'consignee_id': consignee_id},
			cache: false,
			success: function (msg) {
				var data = $.parseJSON(msg);
				$('#con_address').val(data.address);
				$('#con_city').val(data.city);
				$('#con_state').val(data.state);
				$('#con_zip_code').val(data.zip_code);
				$('#clatitude').val(data.latitude);
				$('#clongitude').val(data.longtitude);

				var slat = $('#latitude').val();
				var slng = $('#longitude').val();
				var clat = $('#clatitude').val();
				var clng = $('#clongitude').val();

				var origin1 = new google.maps.LatLng(slat, slng);
				var origin2 = $('#city').val();

				var destinationA = $('#con_city').val();
				var destinationB = new google.maps.LatLng(clat, clng);

				var service = new google.maps.DistanceMatrixService();
				service.getDistanceMatrix(
					{
						origins: [origin1, origin2],
						destinations: [destinationA, destinationB],
						travelMode: 'DRIVING',
						//transitOptions: TransitOptions,
						/*drivingOptions: DrivingOptions,
						unitSystem: UnitSystem,
						avoidHighways: Boolean,
						avoidTolls: Boolean,*/
					}, callback);

				function callback(response, status) {
					// See Parsing the Results for
					// the basics of a callback function.
					//console.log(response.rows[0].elements[0].distance.value);
					var result =  response.rows[0].elements[0].distance.value;
					//var result = calcCrow(slat, slng, clat, clng);
					var mile = parseFloat(result * 0.000621371);
					var line = $('#line_haul_rate').val();
					var output = parseFloat(line / mile);
					$('#loaded').val(mile.toFixed(2));
					$('#per_mile').val(output.toFixed(5));
				}
			},
			error: function () {
				alert('Error Occur...');
			}
		});
	});

	$('#pay_type').change(function () {
		var pay_type = $(this).val();
		if (pay_type === "Per Mile") {
			$('#per_mile').attr('readonly', false);
			$('#empty_mile').attr('readonly', false);
		} else {
			$('#per_mile').attr('readonly', true);
			$('#empty_mile').attr('readonly', true);
		}
	});

	//This function takes in latitude and longitude of two location and returns the distance between them as the crow flies (in km)
	function calcCrow(lat1, lon1, lat2, lon2) {
		var R = 6371; // km
		var dLat = toRad(lat2 - lat1);
		var dLon = toRad(lon2 - lon1);
		var lat1 = toRad(lat1);
		var lat2 = toRad(lat2);

		var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
			Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(lat1) * Math.cos(lat2);
		var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
		var d = R * c;
		return d;
	}

	// Converts numeric degrees to radians
	function toRad(Value) {
		return Value * Math.PI / 180;
	}
});
