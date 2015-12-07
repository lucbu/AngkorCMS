<div id="block{{$block->id}}">
	Block "{{$block->block->name}}" :<br />
	(You can change the position of each by dragging and dropping)
	<table class="table" id="table-block{{$block->id}}" blockId="{{$block->id}}">
		<thead><tr class="nodrop nodrag"><th>#</th><th>Name</th><th>Nature</th><th>Edit</th><th>Delete</th></tr></thead>
		<tbody>
			@foreach ($block->modules as $module)
				{!! View::make('angkorcms/pages/page_trans/moduleRow')->with('module', $module) !!}
			@endforeach
		</tbody>
	</table>
</div>