<div>
	<select class="selectImageURL form-control col-xs-2">
		<option value='' url="">No picture</option>
		@foreach($folders as $folder)
		<optgroup label="{{ $folder->name }}">
			@foreach($folder->images as $image)
			@if(!isset($path) or $path == false)
				<option value='{{ $image->id }}' url="{{ $image->url() }}">
			@else
				<option value='{{ $image->id }}' url="{{'{'.'{'}} asset('{{ $image->path() }}') {{'}'.'}'}}">
			@endif
				{{ $image->name }}
			</option>
			@endforeach
		</optgroup>
		@endforeach
		<optgroup label="Root">
			@foreach($images as $image)
			@if(!isset($path) or $path == false)
				<option value='{{ $image->id }}' url="{{ $image->url() }}">
			@else
				<option value='{{ $image->id }}' url="{{'{'.'{'}} asset('{{ $image->path() }}') {{'}'.'}'}}">
			@endif
					{{ $image->name }}
				</option>
			@endforeach
		</optgroup>
	</select>
</div>

{!! View::make('angkorcms\medias\form\graphicalView')->with(array('folders' => $foldersroot, 'images' => $images)) !!}

<input class="form-control urlimage" type='text'  readonly value=""/>