<div id="listBlock" style="font-size:130%">
	@foreach($blocks as $block)
		{!! View::make('angkorcms/pages/block/block')->with('block', $block) !!}
	@endforeach
</div>
{!! View::make('angkorcms/pages/block/createForm')->with('template_id', $template_id) !!}

{!! View::make('angkorcms/pages/block/blockScript') !!}