@extends('admin/admin')

@section('content')
  <div class="col-md-offset-1 col-md-10">
	<h1>
		Post's list
	  		<div class="btn-group pull-right">
		  		{!! link_to_route('angkorcmsnews.create', 'Add a post', [],array('class' => 'btn btn-info')) !!}
	  		</div>
	</h1>
	@foreach($posts as $post)
	  	{!! View::make('angkorcms/news/post')->with(array('post' => $post, 'full' => false)) !!}
	@endforeach
	{!! $posts->render() !!}
	</div>
@stop