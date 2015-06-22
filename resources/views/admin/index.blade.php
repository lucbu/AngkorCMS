@extends('admin/admin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Administration</div>

				<div class="panel-body">
					@foreach($pages as $page)
						{{ $page->name }}
						<ul style="padding-left:5em">
						@foreach($page->translations as $trans)
							 <li>/{{ $trans->slug }} ({{ $trans->lang->code }})
							{!! link_to_route('angkorcmspages.angkorcmspagestrans.edit', 'Edit', array($page->id, $trans->id)) !!}
							{!! link_to('/'.$trans->lang->code.'/'.$trans->slug, "Visit", array()) !!}

							<ul style="padding-left:5em">
							@foreach($trans->blocks as $block)
								<li>{{ $block->block->name }}
								<ul>
								@foreach($block->modules as $module)
									<li>
									@if(!$module->module->unique)
										<a href="{{route('angkorcmsmodules.edit', $module->module->id)}}">{{ $module->module->name }}</a>
									@else
										{{ $module->module->name }}
									@endif
									</li>
								@endforeach
								</ul></li>
							@endforeach
							</ul></li>
						@endforeach
						</ul>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection