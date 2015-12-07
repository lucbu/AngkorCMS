<div id="imageChosed">

</div>
@if(isset($object))
	@if(is_numeric($object->image_id))
		{!! Form::hidden('image_id', $object->image_id, array('id' => 'image_id')) !!}
	@else
		{!! Form::hidden('image_id', '', array('id' => 'image_id')) !!}
	@endif
	{!! View::make('angkorcms/medias/form/selectImage') !!}
@else
	{!! Form::hidden('image_id', '', array('id' => 'image_id')) !!}
	{!! View::make('angkorcms/medias/form/selectImage') !!}
@endif
