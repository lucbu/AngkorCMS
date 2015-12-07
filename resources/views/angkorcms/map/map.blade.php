<div id="googleMap{{ $unique_id }}" style="@if(isset($attr['map-height'])) height:{{$attr['map-height']}}; @else height:500px; @endif
@if(isset($attr['map-width'])) max-width:{{$attr['map-width']}}; @else width:100%; @endif
"></div>
{!! View::make('angkorcms/map/mapScript', array('map' => $map, 'attr' => $attr, "unique_id" => $unique_id)) !!}