<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{$post->title}} route a cliquer</h3>

	</div>
	<div class="panel-body">
	<p>
		@if(isset($full) && !$full)
		 {{--*/ $mots = explode(' ', strip_tags($post->content)) /*--}}
			@if(count($mots)>20)
				@for($i = 0; $i < 20; $i++)
				{{ $mots[$i].' ' }}
				@endfor
				...
			@else
				{{strip_tags($post->content)}}
			@endif
		@else
		{!! $post->content !!}
		@endif
	</p>
		<em class="pull-right">
			Written by {{ $post->user->name }} le {{ $post->created_at->format('d-m-Y h:i:s') }}
		</em>
		<br>
		<em class="pull-left" style='display:block;'>
			{{ count($post->comments) }} comments.
		</em>
		<br>
		<em class="pull-right">
			@foreach($post->tags as $tag)
				<button class="btn btn-xs btn-info">{{ $tag->tag }}</button>
			@endforeach
		</em>
	</div>
</div>