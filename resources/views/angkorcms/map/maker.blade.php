<h3> Edit the map :</h3>
<p>(This is saving the marker and the zoom & position of the map)</p>
<div id="formAddListItem">
	<small class="text-danger"><div id='formAddListItemError'></div></small>
	{!! Form::open(array('url' => route("angkorcmsmap.updateMap", array($map->id)), 'method' => 'post', 'class' => 'form-horizontal panel', 'id' => 'editMap')) !!}
		{!! Form::hidden('lat', $map->lat, array('id' => 'lat')) !!}
		{!! Form::hidden('lng', $map->lng, array('id' => 'lng')) !!}
		{!! Form::hidden('latMarker', $map->latMarker, array('id' => 'latMarker')) !!}
		{!! Form::hidden('lngMarker', $map->lngMarker, array('id' => 'lngMarker')) !!}
		{!! Form::hidden('zoom', $map->zoom, array('id' => 'zoom')) !!}
		<div id="googleMap" style="width:100%;height:500px;"></div>
		Name (of the marker):
		<small class="text-danger text-danger-name"></small>
		<div class="form-group form-group-name">
			{!! Form::text('name', $map->name, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
		</div>
		{!! Form::submit('Edit.', array('class' => 'btn btn-primary pull-right')) !!}
	{!! Form::close() !!}
</div>

{!! View::make('angkorcms/map/makerScript', array('map' => $map)) !!}