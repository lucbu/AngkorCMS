@foreach($posts as $post)
	{!! View::make('angkorcms/news/modules/post')->with(array('post' => $post, 'full' => false)) !!}
@endforeach
{!! $posts->render() !!}