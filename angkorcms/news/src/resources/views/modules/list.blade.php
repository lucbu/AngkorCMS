@foreach($posts as $post)
	{!! View::make('angkorcms/news/modules/post')->with(array('post' => $post, 'full' => $full, "parameters" => $parameters)) !!}
@endforeach
{!! $posts->render() !!}