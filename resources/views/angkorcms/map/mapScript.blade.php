<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var centerMap=new google.maps.LatLng({{ $map->lat }},{{ $map->lng }});
var locatMarker=new google.maps.LatLng({{ $map->latMarker }},{{ $map->lngMarker }});
var zoom = {{ $map->zoom }};

var map;

function initialize{{$unique_id}}()
{
var mapProp = {
  center: centerMap,
  zoom: zoom,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap{{$unique_id}}"),mapProp);

@if(!isset($attr['map-showMarker']) or $attr['map-showMarker'] == true)
var marker = new google.maps.Marker({
    position: locatMarker,
	title: '{{ $map->name }}',
	map: map,
  });

	@if($map->name != '' and (!isset($attr['map-showMarkerName']) or $attr['map-showMarkerName'] == true))
		var infowindow = new google.maps.InfoWindow({
			content: '{{ $map->name }}'
		});
		infowindow.open(map,marker);
	@endif
@endif
}

google.maps.event.addDomListener(window, 'load', initialize{{$unique_id}});

</script>