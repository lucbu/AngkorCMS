@extends('install/master')

@section('content')
<?php

set_time_limit(300);
$test = array();
$num;
exec('php ..\artisan angkorcms:install', $test, $num);
set_time_limit(30);
if ($num == 0) {
	echo 'AngkorCMS has been migrated in database :<br/>';
} else if ($num == 1) {
	echo 'Whoops something wrong happened :<br>';
	echo '<div style="background-color:black;color:white;font-family:monospace;display:inline-block;padding:20px;">';
	foreach ($test as $key => $value) {
		echo $value . '<br/>';
	}
	echo '</div>';
}

?>
<p>
	Admin : <a href="{{route('admin.index')}}">Admin Panel</a>
</p>
@endsection