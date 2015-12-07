@extends('admin/admin')

@section('content')
<div class="col-sm-offset-4 col-sm-4">
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">Group's edit</div>
        <div class="panel-body">
                <div class="col-sm-12">
                {!! Form::open(array('url' => route('angkorcmsgroups.update', array($group->id)), 'method' => 'put', 'class' => 'form-horizontal panel')) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
                <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                    {!! Form::text('name', $group->name, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
                </div>
                <small class="text-danger">{{ $errors->first('group_parent_id') }}</small>
                <div class="form-group {{ $errors->has('group_parent_id') ? 'has-error has-feedback' : '' }}">
                    {!! Form::select('group_parent_id', ['' => 'Not in a group'] + $groups, $group->group_parent_id) !!}
                </div>
                {!! Form::submit('Send', array('class' => 'btn btn-primary pull-right')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
</div>
@stop
