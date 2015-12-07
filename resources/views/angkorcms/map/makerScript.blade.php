<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var centerMap=new google.maps.LatLng({{ $map->lat }},{{ $map->lng }});
var locatMarker=new google.maps.LatLng({{ $map->latMarker }},{{ $map->lngMarker }});
var zoom = {{ $map->zoom }};

var map;

function initialize()
{

var mapProp = {
  center: centerMap,
  zoom: zoom,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
    position: locatMarker,
  });

marker.setMap(map);

google.maps.event.addListener(map, 'click', function(event) {
	var newLocatMarker = event.latLng;
    marker.setPosition(newLocatMarker);
	document.getElementById("latMarker").value = newLocatMarker.lat();
	document.getElementById("lngMarker").value = newLocatMarker.lng();
  });

google.maps.event.addListener(map,'center_changed',function(event) {
	var location = map.getCenter();
	document.getElementById("zoom").value = map.getZoom();
	document.getElementById("lat").value = location.lat();
	document.getElementById("lng").value = location.lng();
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>