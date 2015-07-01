<h3> Editing the list : </h3>
<p>(You can change the position of each by dragging and dropping)</p>
<table class="table" id="listSlides" idSlideshow="{{ $slideshow->id }}">
    <thead><tr class="nodrop nodrag"><th>#</th><th>Title</th><th>Description</th><th>URL</th><th>Image</th><th>Delete</th></tr></thead>
    <tbody>
	@foreach ($slideshow->slides as $slide)
		{!! View::make('angkorcms/slideshow/makerSlideRow')->with('slide', $slide) !!}
	@endforeach
	</tbody>
</table>
<h3> Add a slide : </h3>
<div id="formAddSlide">
	<small class="text-danger"><div id='formAddSlideError'></div></small>
	{!! Form::open(array('url' => '{{ route("angkorcmsslideshows.addSlide.ajax") }}', 'method' => 'post', 'class' => 'form-horizontal panel', 'id' => 'addSlide')) !!}
		{!! Form::hidden('slideshow_id', $slideshow->id) !!}
		Choose an image :
		<small class="text-danger text-danger-image_id"></small>
		<div class="form-group form-group-image_id">
			{!! View::make('angkorcms/medias/form/chooseOneImage') !!}
		</div>
		Title :
		<small class="text-danger text-danger-title"></small>
		<div class="form-group form-group-title">
			{!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) !!}
		</div>
		Description :
		<small class="text-danger text-danger-description"></small>
		<div class="form-group form-group-description">
			{!! Form::text('description', null, array('class' => 'form-control', 'placeholder' => 'Description')) !!}
		</div>
		URL :
		<small class="text-danger text-danger-url"></small>
		<div class="form-group form-group-url">
			{!! Form::text('url', null, array('class' => 'form-control', 'placeholder' => 'url')) !!}
		</div>
		{!! Form::submit('Add slide', array('class' => 'btn btn-primary pull-right')) !!}
	{!! Form::close() !!}
</div>


{!! View::make('angkorcms\medias\mediamanagerform') !!}

{!! View::make('angkorcms/slideshow/makerScript')->with('image_id', 'null') !!}