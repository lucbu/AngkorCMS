@extends('admin/admin')

@section('content')
<div class="col-sm-offset-1 col-sm-10">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Editing a page translation (for page {{$page->name}}) in {{$page_trans->lang->code}}
		<img style="max-height:80px;max-width=80px;" src="{{$page_trans->lang->image->url()}}" title="{{$page_trans->lang->image->name}}" alt="{{$page_trans->lang->image->name}}"/>
		</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => array('angkorcmspages.angkorcmspagestrans.update', $page->id, $page_trans->id), 'method' => 'put', 'class' => 'form-horizontal panel')) !!}
				{!! Form::hidden('page_id', $page_trans->page->id) !!}
				Slug :
				<small class="text-danger">{{ $errors->first('slug') }}</small>
				<div class="form-group {{ $errors->has('slug') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('slug', $page_trans->slug, array('class' => 'form-control', 'placeholder' => 'Slug')) !!}
				</div>
				Title :
				<small class="text-danger">{{ $errors->first('title') }}</small>
				<div class="form-group {{ $errors->has('title') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('title', $page_trans->title, array('class' => 'form-control', 'placeholder' => 'Title')) !!}
				</div>
				{!! Form::submit('Edit', array('class' => 'btn btn-primary pull-right')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">Module's list :</div>
		<div class="panel-body">
			<div id="listBlockTable" class="col-sm-12">
				@foreach($page_trans->blocks as $block)
					{!! View::make('angkorcms/pages/page_trans/blockTable')->with(array('block' => $block)) !!}
				@endforeach
			</div>
			<h3> Add a module : </h3>
			<div id="formAddModule">
				<small class="text-danger"><div id='formAddModuleError'></div></small>
				{!! Form::open(array('url' => route('angkorcmspagestrans.addModule.ajax'), 'method' => 'post', 'class' => 'form-horizontal panel', 'id' => 'addModule')) !!}
					{!! Form::hidden('page_trans_id', $page_trans->id) !!}
					Block :
					<small class="text-danger text-danger-block_id"></small>
					<div class="form-group form-group-block_id">
						<select id="selectBlock" name="block_id" class="form-control col-xs-2">
							@foreach($blocks as $block)
								<option value='{{ $block->id }}'>
									{{ $block->name }}
								</option>
							@endforeach
						</select>
					</div>

					Module :
					<small class="text-danger text-danger-module_id"></small>
					<div class="form-group form-group-module_id">
						<select id="selectModule" name="module_id" class="form-control col-xs-2">
							@foreach($modules as $module)
								<option value='{{ $module->id }}'>
									{{ $module->name }} - {{ $module->nature }}
									@if(isset($module->lang))
										({{ $module->lang->description }})
									@endif
								</option>
							@endforeach
						</select>
					</div>
					{!! Form::submit('Add module', array('class' => 'btn btn-primary pull-right')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	{!! link_to_route('angkorcmspages.edit', 'Go back to page', array($page->id), array('class' => 'btn btn-primary btn-small')) !!}
</div>
@stop

@section('script')
	{!! View::make('angkorcms/pages/page_trans/scriptPageTrans') !!}
@stop
