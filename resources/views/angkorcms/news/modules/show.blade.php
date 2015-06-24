<h1>Blog</h1>
@if($mode == 'list')
	{!! View::make('angkorcms/news/modules/list')->with(array('posts' => $posts)) !!}
@elseif($mode == 'read')
	{!! View::make('angkorcms/news/modules/read')->with(array('post' => $post, 'full' => true)) !!}
@endif