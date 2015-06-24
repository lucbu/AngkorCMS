<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{!! link_to_route('angkorcmsnews.show', $post->title, [$post->id]) !!}</h3>

	</div>
	<div class="panel-body">
	<p>
		@if(isset($full) && !$full)
		 {{--*/ $mots = explode(' ', strip_tags($post->content)) /*--}}
			@if(count($mots)>20)
				@for($i = 0; $i < 20; $i++){{ $mots[$i].' ' }}@endfor...
			@else
				{{strip_tags($post->content)}}
			@endif
		@else
		{!! $post->content !!}
		@endif
	</p>
		{!! link_to_route('angkorcmsnews.show', 'Read', [$post->id], array('class' => 'btn btn-success btn-xs')) !!}
		{!! link_to_route('angkorcmsnews.edit', 'Edit', [$post->id], array('class' => 'btn btn-warning btn-xs')) !!}
		{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmsnews.destroy', $post->id), 'style' => 'display:inline;')) !!}
			{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm(\'Are you sure you want to delete this post ?\')')) !!}
		{!! Form::close() !!}
		<em class="pull-right">
			Written by {{ $post->user->name }} le {{ $post->created_at->format('d-m-Y h:i:s') }}
		</em><br>
		<em class="pull-left" style='display:block;'>
			{{ count($post->comments) }} comments.
		</em><br>
		@if(count($post->usersEdit))
		<em class="pull-left">
			<img id="showEdit{{ $post->id }}" src="{{ asset('AngkorCMS/News/More-128.png') }}" onclick="showEdit({{ $post->id }})" width="15px">
			<img id="hideEdit{{ $post->id }}" src="{{ asset('AngkorCMS/News/Less-128.png') }}" onclick="hideEdit({{ $post->id }})" style="display:none;" width="15px">
			Modification's list
			<div id="listEdit{{ $post->id }}" style="display:none;">
				@foreach($post->usersEdit as $key => $user)
					{{ $user->pivot->modification }} : {{ $user->name }}<br/>
				@endforeach
			</div>
		</em><br>
		@endif
		<em class="pull-right">
			@foreach($post->tags as $tag)
			{!! link_to_route('angkorcmsnews.tag', $tag->tag, $tag->tag_url, array('class' => 'btn btn-xs btn-info')) !!}
			@endforeach
		</em>
	</div>
</div>

<script>
	function showEdit(id){
		document.getElementById("showEdit"+id).style.display="none";
		document.getElementById("hideEdit"+id).style.display="inline";
		document.getElementById("listEdit"+id).style.display="block";
	}
	
	function hideEdit(id){
		document.getElementById("showEdit"+id).style.display="inline";
		document.getElementById("hideEdit"+id).style.display="none";
		document.getElementById("listEdit"+id).style.display="none";
	}
</script>