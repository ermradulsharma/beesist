var placeSearch, autocomplete;
function initAutocomplete(id) {
    var autocomplete = new google.maps.places.Autocomplete(
        document.getElementById(id), {
        types: ['geocode']
    });
    autocomplete.setComponentRestrictions({
        'country': ['ca', 'us']
    });
    autocomplete.addListener('place_changed', function () {
        fillInAddress(autocomplete, id);
    });
}

function fillInAddress(autocomplete, id) {
    var place = autocomplete.getPlace();
    city = country = postal_code = neighborhood = st_address = street_number = '';
    if (document.getElementById("lat") && document.getElementById("long")) {
        document.getElementById("lat").value = place.geometry.location.lat();
        document.getElementById("long").value = place.geometry.location.lng();
    }
    place.address_components.forEach(function (element2) {
        element2.types.forEach(function (element3) {
            switch (element3) {
                case 'postal_code':
                    postal_code = element2.short_name;
                    break;
                case 'administrative_area_level_1':
                    state = element2.long_name;
                    break;
                case 'locality':
                    city = element2.long_name;
                    break;
                case 'country':
                    country = element2.long_name;
                    country_short_name = element2.short_name
                    break;
                case 'neighborhood':
                    neighborhood = element2.long_name;
                    break;
                case 'route':
                    st_address = element2.long_name;
                    break;
                case 'street_number':
                    street_number = element2.long_name;
                    break;
            }
        })
    });
    if (id === "autocomplete") {
        document.getElementById("st_address").value = street_number + ' ' + st_address;
        document.getElementById("autocomplete").value = place.formatted_address;
        document.getElementById("neighborhood").value = neighborhood;
        document.getElementById("city").value = city;
        document.getElementById("state").value = state;
        document.getElementById("country").value = country;
        document.getElementById("zip").value = postal_code;
    } else if (id === "building_address") {
        document.getElementById("building_address").value = place.formatted_address;
    } else if (id === "spd_address") {
        document.getElementById("spd_address").value = street_number + ' ' + st_address;
        document.getElementById("spd_city").value = city;
        document.getElementById("spd_state").value = state;
        document.getElementById("spd_zip").value = postal_code;
        var countryDropdown = document.getElementById("spd_country");
        setSelectedOptionByValue(countryDropdown, country_short_name);
    } else if (id === "street_address") {
        document.getElementById("street_address").value = street_number + ' ' + st_address;
        document.getElementById("city").value = city;
        document.getElementById("state").value = state;
        document.getElementById("zip_code").value = postal_code;
        var countryDropdown = document.getElementById("country");
        setSelectedOptionByValue(countryDropdown, country_short_name);
    } else if (id === "h_street_address") {
        document.getElementById("h_street_address").value = street_number + ' ' + st_address;
        document.getElementById("h_city").value = city;
        document.getElementById("h_state").value = state;
        document.getElementById("h_zip_code").value = postal_code;
        var countryDropdown = document.getElementById("h_country");
        setSelectedOptionByValue(countryDropdown, country_short_name);
    } else if (id === "e_street_address") {
        document.getElementById("e_street_address").value = street_number + ' ' + st_address;
        document.getElementById("e_city").value = city;
        document.getElementById("e_state").value = state;
        document.getElementById("e_zip_code").value = postal_code;
        var countryDropdown = document.getElementById("e_country");
        setSelectedOptionByValue(countryDropdown, country_short_name);
    } else if (id === "field_id_3") {
        // pmaForm.blade.php
        document.getElementById("field_id_3").value = street_number + ' ' + st_address;
        document.getElementById("field_id_5").value = city;
        document.getElementById("field_id_6").value = state;
        document.getElementById("field_id_7").value = postal_code;
        var countryDropdown = document.getElementById("field_id_8");
        setSelectedOptionByValue(countryDropdown, country_short_name);
    } else if (id === "field_id_16") {
        document.getElementById("field_id_16").value = street_number + ' ' + st_address;
        document.getElementById("field_id_17").value = city;
        document.getElementById("field_id_18").value = state;
        document.getElementById("field_id_19").value = postal_code;
        var countryDropdown = document.getElementById("field_id_19_2");
        setSelectedOptionByValue(countryDropdown, country_short_name);
    } else if (id === 'field_id_o2_3') {
        document.getElementById("field_id_o2_3").value = street_number + ' ' + st_address;
        document.getElementById("field_id_o2_5").value = city;
        document.getElementById("field_id_o2_6").value = state;
        document.getElementById("field_id_o2_7").value = postal_code;
        var countryDropdown = document.getElementById("field_id_o2_8");
        setSelectedOptionByValue(countryDropdown, country_short_name);
    } else if (id === 'property_address_st') {
        document.getElementById("property_address_st").value = street_number + ' ' + st_address;
        document.getElementById("property_address_city").value = city;
        document.getElementById("property_address_state").value = state;
        document.getElementById("property_address_zip").value = postal_code;
        var countryDropdown = document.getElementById("property_address_country");
        setSelectedOptionByValue(countryDropdown, country_short_name);
    } else if (id === 'property_name') {
        document.getElementById("property_name").value = place.formatted_address;
    } else if (id === "rb_address") {
        document.getElementById("rb_lat").value = place.geometry.location.lat();
        document.getElementById("rb_long").value = place.geometry.location.lng();
        console.log('id', street_number + ' ' + st_address);
        document.getElementById("rb_address").value = street_number + ' ' + st_address;
        document.getElementById("rb_city").value = city;
        document.getElementById("rb_state").value = state;
        document.getElementById("rb_zip").value = postal_code;
        var countryDropdown = document.getElementById("rb_country");
        setSelectedOptionByValue(countryDropdown, country_short_name);
    }
}

function setSelectedOptionByValue(selectElement, value) {
    for (var i = 0; i < selectElement.options.length; i++) {
        if (selectElement.options[i].value === value) {
            selectElement.selectedIndex = i;
            break;
        }
    }
}

function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
        });
    }
}
