<tr id="ListItemRow{{$list_item->id}}" idListItem="{{$list_item->id}}">
	<td>{{ $list_item->id }}</td>
	<td>{{ $list_item->text }}</td>
	<td>
		@if($list_item->url != '')
			{!!link_to($list_item->url, 'link')!!}
		@endif
	</td>
	<td>
		<button type="button" class="btn btn-danger" onClick="delListItem({{$list_item->id}}, '{{route('angkorcmslistings.delListItem.ajax', $list_item->id)}}');">Delete</button>
	</td>
</tr>