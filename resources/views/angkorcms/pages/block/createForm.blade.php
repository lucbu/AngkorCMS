<div class="col-sm-3">
	<div id="formAddBlock">
		<small class="text-danger"><div id='formAddBlockError'></div></small>
	{!! Form::open(array('url' => '', 'method' => 'post', 'class' => 'form-horizontal panel', 'id' => 'addBlock')) !!}
		{!! Form::hidden('template_id', $template_id)!!}
		Name :
		<small class="text-danger text-danger-name"></small>
		<div class="form-group form-group-name">
			{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
		</div>
	{!! Form::submit('Create', array('class' => 'btn btn-primary pull-right')) !!}
	{!! Form::close() !!}
	</div>
</div>