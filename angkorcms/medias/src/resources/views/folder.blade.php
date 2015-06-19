<div class="col-xs-6 col-md-2" id="folder{{$folder->id}}">
	<span class="pull-right glyphicon glyphicon-remove btn btn-xs" onclick="delFolder({{$folder->id}});"></span>
		<img src="{{ asset('AngkorCMS/Medias/picture/Folder.png') }}" title="{{ $folder->name }}" alt="{{$folder->name}}" onclick="openFolder({{$folder->id}})" />
		@if(strlen($folder->name)>15)
		{{ substr($folder->name,0,12) }}...
		@else
		{{ $folder->name }}
		@endif
</div>