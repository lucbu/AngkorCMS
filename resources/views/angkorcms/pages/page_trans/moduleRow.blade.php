<tr id="ModuleRow{{ $module->id }}" idModule="{{ $module->id }}">
	<td>{{ $module->id }}</td>
	<td>{{ $module->module->name }}</td>
	<td>{{ $module->module->nature }}</td>
	<td>
		@if(!$module->module->unique)
		<a href="{{route('angkorcmsmodules.edit', $module->module->id)}}"><button type="button" class="btn btn-warning">Edit module</button></a>
		@endif
	</td>
	<td>
		<button type="button" class="btn btn-danger" onClick="delModule({{$module->id}}, '{{route('angkorcmspagestrans.delModule.ajax', $module->id)}}');">Delete</button>
	</td>
</tr>