<div id="imageChosed">

</div>
@if(isset($object))
	@if(is_numeric($object->image_id))
		{!! Form::hidden('image_id', $object->image_id, array('id' => 'image_id')) !!}
	@else
		{!! Form::hidden('image_id', '', array('id' => 'image_id')) !!}
	@endif
	{!! View::make('angkorcms\medias\form\selectImage')->with(array('folders'=> $folders, 'object'=>$object, 'imagesroot' => $imagesroot)) !!}
@else
	{!! Form::hidden('image_id', '', array('id' => 'image_id')) !!}
	{!! View::make('angkorcms\medias\form\selectImage')->with(array('folders'=> $folders, 'imagesroot' => $imagesroot)) !!}
@endif