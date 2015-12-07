@if(count($langs)>0)
	<div class="@if(isset($attr['lang-class'])){{$attr['lang-class']}} @endif">
		@foreach($langs as $lang)
			<a href="{{ route('changelang', $lang->code) }}">
				@if(isset($lang->image) && (!isset($attr['lang-img']) or $attr['lang-img'] == true))
					<img src="{{$lang->image->url()}}" alt="{{ $lang->code }}"/>
				@else
					{{ $lang->code }}
				@endif
			</a>
		@endforeach
	</div>
@endif