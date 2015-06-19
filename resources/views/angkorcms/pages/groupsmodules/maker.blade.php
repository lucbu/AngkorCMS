<h3> Editing the group module : </h3>
<p>(You can change the position of each by dragging and dropping)</p>
<table class="table" id="groupModules" idGroupModules="{{ $group_module->id }}">
    <thead><tr class="nodrop nodrag"><th>#</th><th>Module name</th><th>Lang</th><th>Nature</th><th>Edit</th><th>Delete</th></tr></thead>
    <tbody>
	@foreach ($group_module->modules as $module)
		{!! View::make('angkorcms/pages/groupsmodules/makerModuleRow')->with('module', $module) !!}
	@endforeach
	</tbody>
</table>
<h3> Add a module : </h3>
<div id="formAddModule">
	<small class="text-danger"><div id='formAddModuleError'></div></small>
	{!! Form::open(array('url' => route("angkorcmsgroupsmodules.addModule.ajax"), 'method' => 'post', 'class' => 'form-horizontal panel', 'id' => 'addModule')) !!}
		{!! Form::hidden('groupmodule_id', $group_module->id) !!}
		Module : (Be caution and don't create infinite loops)
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

{!! View::make('angkorcms/pages/groupsmodules/makerScript') !!}