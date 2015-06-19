@if(count($slideshow->slides)>0)
<div id="carousel-{{$unique_id}}" style="
	@if(isset($attr['slideshow-height'])) height:{{$attr['slideshow-height']}}; @else height:500px; @endif
	@if(isset($attr['slideshow-width'])) width:{{$attr['slideshow-width']}};@endif"
	class="carousel slide" data-ride="carousel"@if(isset($attr['slideshow-interval'])) data-interval="{{$attr['slideshow-interval']}}" @endif >

	@if(!isset($attr['slideshow-indicator']) OR $attr['slideshow-indicator'] == true)
	<!-- Indicators -->
	<ol class="carousel-indicators">
		@for ($i = 0; $i < count($slideshow->slides); $i++)
			<li data-target="#carousel-{{$unique_id}}" data-slide-to="{{$i}}" @if($i==0) class="active" @endif></li>
		@endfor
	</ol>
	@endif
	<!-- Wrapper for slides -->
	<div class="carousel-inner" style="height:100%" role="listbox">
		{{--*/ $i = 0 /*--}}
		@foreach($slideshow->slides as $slide)
			<div class="item @if($i==0) active @endif" style="height:100%">
				@if(isset($slide->url) && $slide->url != '')
					<a href="{{$slide->url}}">
				@endif
					@if(isset($slide->image))
					<div style="text-align:center;" class="slider-size">
						<img src="{{ $slide->image->url() }}" style="
							@if(isset($attr['slideshow-height'])) max-height:{{$attr['slideshow-height']}}; @else max-height:500px; @endif
							width:auto;
							@if(isset($attr['slideshow-width'])) max-width:{{$attr['slideshow-width']}}; @else max-width:100%; @endif
						" alt="{{ $slide->image->name }}"/>
					@endif
						<div class="carousel-caption">
							@if($slide->title)<h3>{{$slide->title}}</h3> @endif
							@if($slide->description)<p>{{$slide->description}}</p> @endif
						</div>
					</div>
				@if(isset($slide->url) && $slide->url != '')
					</a>
				@endif
			</div>
			{{--*/ $i = $i+1 /*--}}
		@endforeach
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-{{$unique_id}}" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-{{$unique_id}}" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
@endif