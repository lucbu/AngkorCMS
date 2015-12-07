{!! View::make('angkorcms/medias/form/graphicalView')->with(array('folders' => $foldersroot, 'images' => $images)) !!}
<div>
	<select id="selectImage" class="form-control col-xs-2">
		<option value='' url="">No picture</option>
		@foreach($folders as $folder)
		<optgroup label="{{ $folder->name }}">
			@foreach($folder->images as $image)
			<option value='{{ $image->id }}' url="{{ $image->url() }}">
				{{ $image->name }}
			</option>
			@endforeach
		</optgroup>
		@endforeach
		<optgroup label="Root">
			@foreach($images as $image)
				<option value='{{ $image->id }}' url="{{ $image->url() }}">
					{{ $image->name }}
				</option>
			@endforeach
		</optgroup>
	</select>
</div>
