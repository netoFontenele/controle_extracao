var geocoder;
var map;
var marker;
function initialize() {
	var latlng = new google.maps.LatLng(-4.139671, -38.218561);
	var options = {
		zoom: 8,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("mapa"), options);
	geocoder = new google.maps.Geocoder();
	marker = new google.maps.Marker({
		map: map,
		draggable: true,
	});
	marker.setPosition(latlng);
}
$(document).ready(function () {
	initialize();
	function carregarNoMapa(endereco) {
		geocoder.geocode({ 'address': endereco + ', Brasil', 'region': 'BR'  }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					var latitude = results[0].geometry.location.lat();
					var longitude = results[0].geometry.location.lng();
					$('#endereco').val(results[0].formatted_address);
					$('#latitude').val(latitude);
					$('#longitude').val(longitude);
					var location = new google.maps.LatLng(latitude, longitude);
					marker.setPosition(location);
					map.setCenter(location);
					map.setZoom(16);
				}
			}
		})
	}
	$("#btnEndereco").click(function() {
		if($(this).val() != "")
			carregarNoMapa($("endereco").val());
	})
	$("#endereco").blur(function() {
		if($(this).val() != "")
			carregarNoMapa($(this).val());
	})
	google.maps.event.addListener(marker, 'drag', function () {
		geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					$('#endereco').val(results[0].formatted_address);
					$('#latitude').val(marker.getPosition().lat());
					$('#longitude').val(marker.getPosition().lng());
				}
			}
		});
	});
	$("#endereco").autocomplete({
		source: function (request, response) {
			geocoder.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
				response($.map(results, function (item) {
					return {
						label: item.formatted_address,
						value: item.formatted_address,
						latitude: item.geometry.location.lat(),
						longitude: item.geometry.location.lng()
					}
				}));
			})
		},
		select: function (event, ui) {
			$("#latitude").val(ui.item.latitude);
			$("#longitude").val(ui.item.longitude);
			var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
			marker.setPosition(location);
			map.setCenter(location);
			map.setZoom(16);
		}
	});
	/*$("#action").click(function(){
		var endereco = $("#txtEndereco").val();
		var latitude = $("#txtLatitude").val();
		var longitude = $("#txtLongitude").val();
		alert("Endereço: " + endereco + "\nLatitude: " + latitude + "\nLongitude: " + longitude);
	});*/
	var mostrar = $(".get-localizacao");
	mostrar.click(function(){
		$('#mapa').toggleClass('hide');
	});
});