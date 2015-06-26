<div class="{{ isset($attr['news-panel-class']) ? $attr['news-panel-class'] : 'panel panel-default' }}">
	<div class="{{ isset($attr['news-panel-heading-class']) ? $attr['news-panel-heading-class'] : 'panel-heading' }}">
		<h3 class="{{ isset($attr['news-panel-title-class']) ? $attr['news-panel-title-class'] : 'panel-title' }}"><a href="{{$parameters['url_base']}}/post/{{$post->slug}}">{{$post->title}}</a></h3>
	</div>
	<div class="{{ isset($attr['news-panel-body-class']) ? $attr['news-panel-body-class'] : 'panel-body' }}">
		<div class="{{ isset($attr['news-post-class']) ? $attr['news-post-class'] : '' }}">
			@if(isset($full) && !$full)
			 <?php $mots = explode(' ', strip_tags($post->content));?>
				@if(count($mots)>20)
					@for($i = 0; $i < 20; $i++)
					{{ $mots[$i].' ' }}
					@endfor
					...
				@else
					{{strip_tags($post->content)}}
				@endif
			@else
			{!! $post->content !!}
			@endif
		</div>
		<em class="pull-right">
			{{ Lang::get('angkorcmsnewsmodule.written', ['name' => $post->user->name, "date" => $post->created_at->format('d-m-Y h:i:s')]) }}
		</em>
		<br>
		<em class="pull-left" style='display:block;'>
			{{ count($post->comments) }} {{ Lang::get('angkorcmsnewsmodule.comments')}}.
		</em>
		<br>
		<em class="pull-right">
			@foreach($post->tags as $tag)
				<a href="{{$parameters['url_base']}}/tag/{{$tag->tag_url}}"><button class="btn btn-xs btn-info">{{ $tag->tag }}</button></a>
			@endforeach
		</em>
	</div>
</div>