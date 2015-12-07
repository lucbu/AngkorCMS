<tr id="SlideRow{{$slide->id}}" idSlide="{{$slide->id}}">
	<td>{{ $slide->id }}</td>
	<td>{{ $slide->title }}</td>
	<td>
		@if(strlen($slide->description)>16)
			<p title="{{$slide->description}}">{{ substr($slide->description, 0, 15) }}...</p>
		@else
			{{$slide->description}}
		@endif
	</td>
	<td>
		@if($slide->url != '')
			{!!link_to($slide->url, 'link')!!}
		@endif
	</td>
	<td>
		@if(isset($slide->image))
		<img style="max-height:80px;max-width=80px;" src="{{ $slide->image->url() }}" title="{{$slide->image->name}}" alt="{{$slide->image->name}}"/>
		@endif
	</td>
	<td>
		<button type="button" class="btn btn-danger" onClick="delSlide({{$slide->id}}, '{{route('angkorcmsslideshows.delSlide.ajax', $slide->id)}}');">Delete</button>
	</td>
</tr>