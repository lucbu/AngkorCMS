<div class="panel panel-primary">

		{!! Form::open(array('url' => '', 'files' => true, 'id' => 'addFolder', 'style'=>'display:inline;float:right;margin-right:15px;')) !!}
			{!! Form::hidden('folder_id', '', array('class' => 'folder_id_current')) !!}
			<small class="text-danger"><div id='errorFolder'></div></small>
			<div class="form-group" id='divFolder'>
				{!! Form::hidden('name', '', array('class' => 'form-control col-xs-3', 'id' => 'folder')) !!}
			</div>
			{!! Form::submit('Add Folder !', array('class' => 'btn btn-info pull-right', 'onclick' => 'getNameFolder();')) !!}
		{!! Form::close() !!}
	<div class="panel-heading">
		@if(isset($folder))
		<span class="glyphicon glyphicon-circle-arrow-left btn" onclick="openFolder({{$folder->folder_parent_id}})"></span>
		@else
		<span class="glyphicon glyphicon-home btn"></span>
		@endif
		Folder's list :  (you can drag and drop folder into other folder)
	</div>
	<div class="panel-body" id='listFolder'>
		<ol class="breadcrumb" id='arborescence'>
			@if(isset($folder))
				<li class="active">{{$folder->name}}</li>
				@while(($folder = $folder->folderParent) != null)
					<li><a href="javascript:void(0);" onclick="openFolder({{$folder->id}});" folder-id="{{$folder->id}}" ondrop="dropOnFolder(event, {{$folder->id}})" ondragover="allowDrop(event)">{{$folder->name}}</a></li>
				@endwhile
			@endif
			<li><a href="javascript:void(0);" onclick="openFolder(null);" ondrop="dropOnFolder(event, '')" ondragover="allowDrop(event)">Root</a></li>
		</ol>
		@if(isset($folders))
		@foreach($folders as $folder)
		{!! View::make('angkorcms\medias\folder')->with(array('folder' => $folder)) !!}
		@endforeach
		@endif
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">Picture's list (you can drag and drop image to folder)</div>
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