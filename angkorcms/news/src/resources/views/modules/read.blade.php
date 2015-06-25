{!! View::make('angkorcms/news/modules/post')->with(array('post' => $post, 'full' => $full, "parameters" => $parameters)) !!}
<br>
@if(count($post->comments_paginated)>0)
	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title">{{ Lang::get('angkorcmsnewsmodule.comments')}}</h3></div>
		{!! $post->comments_paginated->render() !!}
		<div class="panel-body">
			@foreach ($post->comments_paginated as $comment)
				<p>
					@if(!Auth::guest() && (Auth::user()->id === $comment->user->id or Auth::user()->admin))
							{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmscomment.del', $comment->id), 'style' => 'display:inline;')) !!}
						<input type="image" src="{{ asset('AngkorCMS/News/circle_close_delete-128.png') }}" onClick="return confirm('{{ Lang::get('angkorcmsnewsmodule.delete')}}')" style="max-width:10px;" alt="Submit">
							{!! Form::close() !!}
					@endif
					{{ $comment->user->name }} ({{ $comment->created_at->format('d-m-Y h:i:s') }}) : <br>
					{{ $comment->content }}
				</p>
			@endforeach
			</div>
		{!! $post->comments_paginated->render() !!}
	</div>
@endif

@if(Auth::check())
	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title">{{ Lang::get('angkorcmsnewsmodule.addcomment')}}</h3></div>
		<div class="panel-body">
			{!! Form::open(array('route' => array('angkorcmscomment.add', $post->id), 'method' => 'post')) !!}
			<small class="text-danger">{{ $errors->first('content') }}</small>
			<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
				{!! Form::textarea ('content', null, array('class' => 'form-control')) !!}
			</div>
			{!! Form::submit(Lang::get('angkorcmsnewsmodule.send'), array('class' => 'btn btn-info pull-right')) !!}
			{!! Form::close() !!}
		</div>
	</div>
@endif