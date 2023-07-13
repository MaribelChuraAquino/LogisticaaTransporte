(function ($) {
    'use strict'
    // add input listeners
    google.maps.event.addDomListener(window, 'load', function () {
        var from_places = new google.maps.places.Autocomplete(document.getElementById('city'));

        google.maps.event.addListener(from_places, 'place_changed', function () {
            var from_place = from_places.getPlace();
            var from_address = from_place.formatted_address;
            var latitude = from_place.geometry.location.lat();
            var longtitude = from_place.geometry.location.lng();
            $('#latitude').val(latitude);
            $('#longitude').val(longtitude);
        });
    });
});

function imagePreview(input) {
    if (input.files && input.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (ev) {
            $('#img').attr('src', ev.target.result);
        };
        fileReader.readAsDataURL(input.files[0]);
    }
}
