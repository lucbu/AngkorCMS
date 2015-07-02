@extends('install/master')

@section('content')
		<?php

$envfile = fopen("..\.env", "w") or die("Unable to open file!");
foreach ($_POST as $key => $value) {
	if ($key != '_token') {
		$line = $key . '=' . $value . "\n";
		fwrite($envfile, $line);
	}
}
fclose($envfile);

?>

	<p>
		The .env file has been created.
	</p>

	<a href="{{route('install-db')}}">
		Click to install database
	</a>
@endsection