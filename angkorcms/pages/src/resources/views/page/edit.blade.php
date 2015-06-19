@extends('admin/admin')

@section('content')
<div class="col-sm-offset-1 col-sm-10">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Editing a page</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => array('angkorcmspages.update', $page->id), 'method' => 'put', 'class' => 'form-horizontal panel')) !!}
				Name :
				<small class="text-danger">{{ $errors->first('name') }}</small>
				<div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('name', $page->name, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
				</div>

				Theme :
				<small class="text-danger">{{ $errors->first('theme_id') }}</small>
				<div class="form-group {{ $errors->has('theme_id') ? 'has-error has-feedback' : '' }}">
					<select id="selectTheme" name="theme_id" class="form-control col-xs-2">
						@foreach($themes as $theme)
						<option value='{{ $theme->id }}'
							@if($theme->id == $page->theme_id)
							selected
							@endif
						>
							{{ $theme->name }}
						</option>
						@endforeach
					</select>
				</div>

				<small class="text-danger">{{ $errors->first('accessible') }}</small>
				<div class="form-group {{ $errors->has('accessible') ? 'has-error has-feedback' : '' }}">
					{!! Form::checkbox('accessible', 1, $page->accessible) !!}
					This page will be accessible.
				</div>
				{!! Form::submit('Edit', array('class' => 'btn btn-primary pull-right')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">Translations</div>
		<div class="panel-body">
			<div class="btn-group pull-right">
				@if(intval($nb_langs) > count($page->translations))
				<p>
					{!! link_to_route('angkorcmspages.angkorcmspagestrans.create', 'New translation', array($page->id), array('class' => 'btn btn-primary btn-block')) !!}
				</p>
				@endif
			</div>
			<div class="col-sm-12">
				<table class="table">
					<tr><th>#</th><th>Title</th><th>Slug</th><th>Language</th><th>Edit</th><th>Delete</th></tr>
					@foreach ($page->translations as $translation)
					<tr>
						<td>{{ $translation->id }}</td>
						<td>{{ $translation->title }}</td>
						<td>{{ $translation->slug }}</td>
						<td>
							@if(isset($translation->lang->image))
							<img style="max-height:80px;max-width=80px;" src="{{ $translation->lang->image->url() }}" title="{{$translation->lang->image->name}}" alt="{{$translation->lang->image->code}}"/>
							@else
							{{ $translation->lang->code }}
							@endif
						</td>
						<td>
							{!! link_to_route('angkorcmspages.angkorcmspagestrans.edit', 'Edit', array($page->id, $translation->id), array('class' => 'btn btn-warning btn-block')) !!}
						</td>
						<td>
							{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmspages.angkorcmspagestrans.destroy', $page->id, $translation->id))) !!}
							{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Are you sure you want to delete this translations ?\')')) !!}
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
	{!! link_to_route('angkorcmspages.index', 'Go back to page', null, array('class' => 'btn btn-primary btn-small')) !!}
</div>
@stop