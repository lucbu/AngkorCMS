<div class="panel panel-primary">
	<div class="panel-heading">
		@if(isset($folder))
		<span class="glyphicon glyphicon-circle-arrow-left btn" onclick="openFolder({{$folder->folder_parent_id}})"></span>
		@else
		<span class="glyphicon glyphicon-home btn"></span>
		@endif
		Folder's list : 
	</div>
	<div class="panel-body" id='listFolder'>
		<ol class="breadcrumb" id='arborescence'>
			@if(isset($folder))
				<li class="active">{{$folder->name}}</li>
				@while(($folder = $folder->folderParent) != null)
					<li><a href="javascript:void(0);" onclick="openFolder({{$folder->id}});">{{$folder->name}}</a></li>
				@endwhile
			@endif
			<li><a href="javascript:void(0);" onclick="openFolder(null);">Root</a></li>
		</ol>
		@if(isset($folders))
		@foreach($folders as $folder)
		{!! View::make('angkorcms\medias\folder')->with(array('folder' => $folder)) !!}
		@endforeach
		@endif
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">Picture's list</div>
	<div class="panel-body" id='listImage'>
		@foreach($images as $image)
		{!! View::make('angkorcms\medias\image')->with(array('image' => $image)) !!}
		@endforeach
	</div>
</div>

<script>
$(function() {
	ol = $('#arborescence');
	ol.children().each(function(i,li){ol.prepend(li)})
});
</script>