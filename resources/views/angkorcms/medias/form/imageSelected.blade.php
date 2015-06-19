<div class="col-md-2 col-md-offset-0" id="image{{ $image->id }}">
	<input type="hidden" name="imageSelected[]" value="{{ $image->id }}" />
	<span class="glyphicon glyphicon-remove btn btn-xs" onclick="this.parentNode.remove();"></span>
	<img src="{{ $image->url() }}" style="max-height:80px;max-width=80px;" id="{{ $image->id }}"/>
</div>