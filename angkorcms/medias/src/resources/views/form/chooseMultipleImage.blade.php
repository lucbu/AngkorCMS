{!! View::make('angkorcms\medias\form\selectImage')->with(array('folders'=> $folders, 'imagesroot' => $imagesroot)) !!}
<div id="imagesChoosen" class="col-sm-offset-2 col-sm-8">
	@foreach($project->images as $image)
		{!! View::make('angkorcms\medias\form\imageSelected')->with(array('image'=> $image)) !!}
	@endforeach
</div>
