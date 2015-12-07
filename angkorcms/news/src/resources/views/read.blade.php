@extends('admin/admin')

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<h1><a href="{{ route('angkorcmsnews.index') }}"></a></h1>
		{!! View::make('angkorcms/news/post')->with('post', $post) !!}
	</div>
	<br>

	@if(count($comments)>0)
		<div class="col-sm-offset-1 col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">Comments</div>
				{!! $comments->render() !!}
				<div class="panel-body">
					@foreach ($comments as $comment)
						<p>
							<a href="{{ route('angkorcmscomment.del', array($comment->id)) }}">
								<img src="{{ asset('AngkorCMS/News/circle_close_delete-128.png') }}" width="10px">
							</a>
							{{ $comment->user->name }} ({{ $comment->created_at->format('d-m-Y h:i:s') }}) : <br>
							{{ $comment->content }}
						</p>
					@endforeach
					</div>
				{!! $comments->render() !!}
			</div>
		</div>
	@endif
@stop