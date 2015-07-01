@if(isset($tag))
	<div style="text-align:center"><h1>{{ Lang::get("angkorcmsnewsmodule.tag", ["tag" => $tag]) }}</h1></div>
@endif

@foreach($posts as $post)
	<?php
$data = array('posts' => $posts, "full" => isset($attr['news-list-full']) ? $attr['news-list-full'] : false, "parameters" => $parameters, "unique_id" => $unique_id . '_' . $post->id, 'attr' => $attr, 'parameters' => $parameters, 'attributes' => $attributes, 'post' => $post, 'full' => $full);
?>
	{!! AngkorBlade::createViewAsModule('angkorcms/news/modules/post', $attributes, $data) !!}
@endforeach

<div style="text-align:center">{!! $posts->render() !!}</div>