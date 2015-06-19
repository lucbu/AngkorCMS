@foreach($groupmodules->modules as $module)
	{!! AngkorBlade::displayDryModule($unique_id.'_'.$module->id, $module->module, $parameters, $div, $attributes, $attr) !!}
@endforeach