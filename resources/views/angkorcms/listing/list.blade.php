@if(count($listing->items)>0)
	<ul class='@if(isset($attr['list-class'])){{$attr['list-class']}} @endif'>
		@if(isset($attr['list-item-add']))
			{!!$attr['list-item-add']!!}
		@endif
		@foreach($listing->items as $item)
			<li class='@if(isset($attr['list-item-class'])){{$attr['list-item-class']}} @endif'>
				@if($item->url != '')
					<a href="{{ url($item->url) }}">{{$item->text}}</a>
				@else
					{{$item->text}}
				@endif
			</li>
		@endforeach
	</ul>
@endif