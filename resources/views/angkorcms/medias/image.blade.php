<div class="col-xs-6 col-md-2" id="image{{$image->id}}">
	<span class="pull-right glyphicon glyphicon-remove btn btn-xs" onclick="delImage({{$image->id}});"></span>
	<a href="{{ asset($image->path.'/'.$image->filename.'.'.$image->extension) }}" class="thumbnail">
		<img style="height:80px;max-width=80px;" src="{{ asset($image->path.'/'.$image->filename.'.'.$image->extension) }}" title="{{$image->name}}" alt="{{$image->name}}"/>
		@if(strlen($image->name)>15)
		{{ substr($image->name,0,12) }}...
		@else
		{{ $image->name }}
		@endif
	</a>
</div>