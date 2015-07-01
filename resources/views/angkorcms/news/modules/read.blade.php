
<h1><a href="{{$parameters['url_base']}}">News</a></h1>

{!! View::make('angkorcms/news/modules/post')->with(array('post' => $post, 'full' => $full, "parameters" => $parameters)) !!}
<br>
@if(count($post->comments_paginated)>0)
	<div class="{{ isset($attr['news-panel-class']) ? $attr['news-panel-class'] : 'panel panel-default' }}">
		<div class="{{ isset($attr['news-panel-heading-class']) ? $attr['news-panel-heading-class'] : 'panel-heading' }}">
			<h3 class="{{ isset($attr['news-panel-title-class']) ? $attr['news-panel-title-class'] : 'panel-title' }}">{{ Lang::get('angkorcmsnewsmodule.comments')}}</h3>
		</div>
		{!! $post->comments_paginated->render() !!}
		<div class="{{ isset($attr['news-panel-body-class']) ? $attr['news-panel-body-class'] : 'panel-body' }}">
			@foreach ($post->comments_paginated as $comment)
				<div class="{{ isset($attr['news-comment-class']) ? $attr['news-comment-class'] : '' }}">
					@if(!Auth::guest() && (Auth::user()->id === $comment->user->id or Auth::user()->admin))
							{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmscomment.del', $comment->id), 'style' => 'display:inline;')) !!}
							<input type="image" src="{{ asset('AngkorCMS/News/circle_close_delete-128.png') }}" onClick="return confirm('{{ Lang::get('angkorcmsnewsmodule.delete')}}')" style="max-width:10px;" alt="Submit">
							{!! Form::close() !!}
					@endif
					{{ $comment->user->name }} ({{ $comment->created_at->format('d-m-Y h:i:s') }}) : <br>
					{{ $comment->content }}<br><br>
				</div>
			@endforeach
			</div>
		{!! $post->comments_paginated->render() !!}
	</div>
@endif

@if(Auth::check())
	<div class="{{ isset($attr['news-panel-class']) ? $attr['news-panel-class'] : 'panel panel-default' }}">
		<div class="{{ isset($attr['news-panel-heading-class']) ? $attr['news-panel-heading-class'] : 'panel-heading' }}">
			<h3 class="{{ isset($attr['news-panel-title-class']) ? $attr['news-panel-title-class'] : 'panel-title' }}">{{ Lang::get('angkorcmsnewsmodule.addcomment')}}</h3>
		</div>
		<div class="{{ isset($attr['news-panel-body-class']) ? $attr['news-panel-body-class'] : 'panel-body' }}">
			{!! Form::open(array('route' => array('angkorcmscomment.add', $post->id), 'method' => 'post')) !!}
			<small class="text-danger">{{ $errors->first('content') }}</small>
			<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
			{!! Form::textarea ('content', null, array('class' =>  isset($attr['news-form-control-class']) ? $attr['news-form-control-class'] : 'form-control' )) !!}
			</div>
			{!! Form::submit(Lang::get('angkorcmsnewsmodule.send'), array('class' => 'btn btn-info pull-right')) !!}
			{!! Form::close() !!}
		</div>
	</div>
@endif