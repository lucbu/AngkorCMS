<div id="imageChosed{{$id}}">
	
</div>
@if(isset($object))
	@if(is_numeric($object->image_id))
		{!! Form::hidden('image_id', $object->image_id, array('id' => 'image_id'.$id)) !!}
	@else
		{!! Form::hidden('image_id', '', array('id' => 'image_id'.$id)) !!}
	@endif
	{!! View::make('angkorcms\medias\form/selectImageWithId')->with(array('folders'=> $folders, 'object'=>$object, 'imagesroot' => $imagesroot, 'id'=>$id)) !!}
@else
	{!! Form::hidden('image_id', '', array('id' => 'image_id'.$id)) !!}
	{!! View::make('angkorcms\medias\form/selectImageWithId')->with(array('folders'=> $folders, 'imagesroot' => $imagesroot, 'id'=>$id)) !!}
@endif