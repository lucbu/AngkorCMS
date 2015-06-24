{!! View::make('angkorcms/news/modules/post')->with(array('post' => $post, 'full' => $full)) !!}
<br>
@if(count($post->comments_paginated)>0)
	<div class="col-sm-offset-1 col-md-10">
		<div class="panel panel-default">
			<div class="panel-heading">Comments</div>
			{!! $post->comments_paginated->render() !!}
			<div class="panel-body">
				@foreach ($post->comments_paginated as $comment)
					@if(!Auth::guest() && (Auth::user()->id === $comment->user->id or Auth::user()->admin))
							{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmscomment.del', $comment->id), 'style' => 'display:inline;')) !!}
						<input type="image" src="{{ asset('AngkorCMS/News/circle_close_delete-128.png') }}" onClick="return confirm('Are you sure you want to delete this comment ?')" style="max-width:10px;" alt="Submit">
							{!! Form::close() !!}
					@endif
					{{ $comment->user->name }} ({{ $comment->created_at->format('d-m-Y h:i:s') }}) : <br>
					{!! $comment->content !!}
				@endforeach
				</div>
			{!! $post->comments_paginated->render() !!}
		</div>
	</div>
@endif