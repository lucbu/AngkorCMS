<tr id="ModuleRow{{$module->id}}" idModule="{{$module->id}}">
	<td>{{ $module->id }}</td>
	<td>{{ $module->module->name }}</td>
	<td>
		@if($module->module->lang == NULL)
			NULL
		@elseif($module->module->lang->image != null)
			<img style="max-height:80px;max-width=80px;" src="{{ $module->module->lang->image->url() }}" title="{{$module->module->lang->image->name}}" alt="{{$module->module->lang->image->name}}"/>
		@else
			{{$module->module->lang->code}}
		@endif
	</td>
	<td>{{ $module->module->nature }}</td>
	<td>
		@if(!$module->module->unique)
		<a href="{{route('angkorcmsmodules.edit', $module->module->id)}}"><button type="button" class="btn btn-warning">Edit module</button></a>
		@endif
	</td>
	<td>
		<button type="button" class="btn btn-danger" onClick="delModule({{$module->id}}, '{{route('angkorcmsgroupsmodules.delModule.ajax', $module->id)}}');">Delete</button>
	</td>
</tr>