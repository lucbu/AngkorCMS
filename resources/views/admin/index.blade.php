@extends('admin/admin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Administration</div>

				<div class="panel-body">
					@foreach($pages as $page)
					{!! link_to_route('angkorcmspages.edit', $page->name, array($page->id)) !!}
					(Theme :
					{!! link_to_route('angkorcmstemplates.edit', $page->theme->template->name, array($page->theme->template->id)) !!} /
					{!! link_to_route('angkorcmstemplates.angkorcmsthemes.edit', $page->theme->name, array($page->theme->template->id, $page->theme->id)) !!})
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
						<p>Infos :
							<ul>
								<li>DEBUG 		: {{ env('APP_DEBUG') }}</li>
								<li>HOST 		: {{ env('DB_HOST') }}</li>
								<li>DATABASE 	: {{ env('DB_DATABASE') }}</li>
							</ul>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection