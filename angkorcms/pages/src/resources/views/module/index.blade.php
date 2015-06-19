@extends('admin/admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Modules</div>
				<div class="panel-body">
		  			<div class="btn-group pull-right">
						<p>
							{!! link_to_route('angkorcmsmodules.create', 'New module', null, array('class' => 'btn btn-primary btn-block')) !!}
						</p>
					</div>
					<div id="filtre">
						{!! Form::open(array('route' => array('angkorcmsmodules.index'), 'method' => 'get', 'class' => 'form-horizontal panel', 'id' => 'modules_filters')) !!}
							{!! Form::hidden('order_by', Input::get('order_by'), array('id' => 'order_by')) !!}
							{!! Form::hidden('ordering', Input::get('ordering'), array('id' => 'ordering')) !!}
							<div style="display:inline-block">
								<label for="filter_nature"> - Nature :</label>
								{!! Form::select('filter_nature', array_merge(array('null' => 'All'), $natures), Input::get('filter_nature')) !!}
							</div>
							<div style="display:inline-block">
								<label for="filter_lang"> - Lang :</label>
								<select id="selectLang" name="filter_lang">
									<option value='null'>All</option>
									@foreach($langs as $lang)
										<option value='{{ $lang->id }}' @if(intval(Input::get('filter_lang')) == $lang->id) selected @endif >
											{{ $lang->description }}
										</option>
									@endforeach
								</select>
							</div>
							<div style="display:inline-block">
								<label for="items_per_page"> - Items per page :</label>
								{!! Form::number('items_per_page', Input::get('items_per_page'), array('min' => '1', 'placeholder' => '10')) !!}
							</div>
					{!! Form::submit('Filter') !!}
					{!! Form::close() !!}
					</div>
					<a href="#" onClick="document.getElementById('ordering').value = @if(Input::get('ordering')=="DESC")'ASC' @else 'DESC' @endif;document.getElementById('modules_filters').submit();">Reverse Order</a>
					<table class="table">
						<tr>
							<th><a href="#" onClick="document.getElementById('order_by').value = 'id';document.getElementById('modules_filters').submit();">#</a></th>
							<th><a href="#" onClick="document.getElementById('order_by').value = 'name';document.getElementById('modules_filters').submit();">Name</a></th>
							<th><a href="#" onClick="document.getElementById('order_by').value = 'nature';document.getElementById('modules_filters').submit();">Nature</a></th>
							<th><a href="#" onClick="document.getElementById('order_by').value = 'lang';document.getElementById('modules_filters').submit();">Lang</a></th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						@foreach ($modules as $module)
							<tr class="slideLine {{ $module->lang->code }}">
								<td>{{ $module->id }}</td>
								<td>{{ $module->name }}</td>
								<td>@if($module->nature!=NULL){{ $module->nature }}@else null @endif</td>
								<td>
								@if(!isset($module->lang))
									NULL
								@elseif(isset($module->lang->image))
									<img style="max-height:80px;max-width=80px;" src="{{ $module->lang->image->url() }}" title="{{$module->lang->image->name}}" alt="{{$module->lang->image->name}}"/>
								@endif</td>
								<td>{!! link_to_route('angkorcmsmodules.edit', 'Edit', array($module->id), array('class' => 'btn btn-warning btn-block')) !!}</td>
								<td>
									{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmsmodules.destroy', $module->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Are you sure you want to delete this module ?\')')) !!}
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
					</table>
					{!! $modules->appends(['filter_nature' => Input::get('filter_nature'), 'filter_lang' => Input::get('filter_lang'), 'items_per_page' => Input::get('items_per_page'), 'order_by' => Input::get('order_by')])->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop