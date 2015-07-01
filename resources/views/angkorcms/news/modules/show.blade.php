@if($mode == 'list')
	{!! View::make('angkorcms/news/modules/list')->with(array('posts' => $posts, "full" => isset($attr['news-list-full']) ? $attr['news-list-full'] : false, "parameters" => $parameters, "unique_id" => $unique_id, 'attr' => $attr, 'parameters' => $parameters, 'attributes' => $attributes, 'tag' => $tag)) !!}

@elseif($mode == 'read')

<?php
$data = array('post' => $post, "full" => isset($attr['news-list-full']) ? $attr['news-list-full'] : false, "parameters" => $parameters, "unique_id" => $unique_id . '_' . $post->id, 'attr' => $attr, 'parameters' => $parameters, 'attributes' => $attributes, 'post' => $post);
?>
	{!! AngkorBlade::createViewAsModule('angkorcms/news/modules/read', $attributes, $data) !!}
@endif