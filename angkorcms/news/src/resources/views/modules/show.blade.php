<h1><a href="{{$parameters['url_base']}}">Blog</a></h1>
@if($mode == 'list')
	@if(isset($tag))
		<div class="alert alert-default">{{ Lang::get("angkorcmsnewsmodule.tag", ["tag" => $tag]) }}</div>
	@endif
	{!! View::make('angkorcms/news/modules/list')->with(array('posts' => $posts, "full" => isset($attr['news-list-full']) ? $attr['news-list-full'] : false, "parameters" => $parameters)) !!}
@elseif($mode == 'read')
	{!! View::make('angkorcms/news/modules/read')->with(array('post' => $post, 'full' => true, "parameters" => $parameters)) !!}
@endif