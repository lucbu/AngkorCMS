<div id="block{{$block->id}}" style="display: inline-block;margin:0px 2px;padding:2px;border-radius:10%;border: 1px solid black;">
	{{$block->name}}
	<a onClick='delBlock({{$block->id}},"{{route("angkorcmsblocks.delBlock.ajax", $block->id)}}")'><i class="glyphicon glyphicon-remove-sign glyphicon-black" style="cursor: pointer;"></i></a>
</div>