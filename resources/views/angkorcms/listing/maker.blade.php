<h3> Editing the list : </h3>
<p>(You can change the position of each by dragging and dropping)</p>
<table class="table" id="listListItems" idList="{{ $list->id }}">
    <thead><tr class="nodrop nodrag"><th>#</th><th>Text</th><th>URL</th><th>Delete</th></tr></thead>
    <tbody>
	@foreach ($list->items as $item)
		{!! View::make('angkorcms/listing/makerListItemRow')->with('list_item', $item) !!}
	@endforeach
	</tbody>
</table>
<h3> Add a list Item : </h3>
<div id="formAddListItem">
	<small class="text-danger"><div id='formAddListItemError'></div></small>
	{!! Form::open(array('url' => route("angkorcmslistings.addListItem.ajax"), 'method' => 'post', 'class' => 'form-horizontal panel', 'id' => 'addListItem')) !!}
		{!! Form::hidden('list_id', $list->id) !!}
		Text :
		<small class="text-danger text-danger-text"></small>
		<div class="form-group form-group-text">
			{!! Form::text('text', null, array('class' => 'form-control', 'placeholder' => 'Text')) !!}
		</div>
		URL :
		<small class="text-danger text-danger-url"></small>
		<div class="form-group form-group-url">
			{!! Form::text('url', null, array('class' => 'form-control', 'placeholder' => 'url')) !!}
		</div>
		{!! Form::submit('Add list item.', array('class' => 'btn btn-primary pull-right')) !!}
	{!! Form::close() !!}
</div>

{!! View::make('angkorcms/listing/makerScript') !!}