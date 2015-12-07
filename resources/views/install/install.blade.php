@extends('install/master')

@section('content')
		<form  action="{{route('create-env')}}" method="post" id="envForm">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<table>
			<?php
$env = [
	'APP_ENV' => ['value' => 'local', 'info' => 'Name of the environment'],
	'APP_DEBUG' => ['value' => 'false', 'info' => 'Boolean if you wants to activate debug mode'],
	'APP_KEY' => ['value' => 'SomeRandomString', 'info' => ''],
	'DB_HOST' => ['value' => 'localhost', 'info' => 'adress to the database'],
	'DB_DATABASE' => ['value' => 'homestead', 'info' => 'name of the database'],
	'DB_USERNAME' => ['value' => 'homestead', 'info' => 'user name to manage database'],
	'DB_PASSWORD' => ['value' => 'secret', 'info' => 'password to manage database'],
	'CACHE_DRIVER' => ['value' => 'file', 'info' => ''],
	'SESSION_DRIVER' => ['value' => 'file', 'info' => ''],
	'QUEUE_DRIVER' => ['value' => 'sync', 'info' => ''],
	'MAIL_DRIVER' => ['value' => 'smtp', 'info' => ''],
	'MAIL_HOST' => ['value' => 'mailtrap.io', 'info' => ''],
	'MAIL_PORT' => ['value' => '2525', 'info' => ''],
	'MAIL_USERNAME' => ['value' => 'null', 'info' => ''],
	'MAIL_PASSWORD' => ['value' => 'null', 'info' => ''],
];

$envfile = fopen("..\.env", "r") or die("Unable to open file!");
// Output one line until end-of-file
while (!feof($envfile)) {
	$line = fgets($envfile);
	if (strpos($line, '=') !== false) {
		$var = explode("=", $line);
		$value = '';
		if (isset($var[1])) {
			$value = trim($var[1]);
		}
		$env[trim($var[0])]['value'] = $value;
	}
}
fclose($envfile);

foreach ($env as $key => $value) {
	if ($key != '' & $key != ' ') {
		echo '<tr><td>' . $key . '</td>';
		echo '<td>:</td>';
		echo '<td><input type="text" name="' . $key . '" value="' . $value['value'] . '"/></td>';
		echo '<td>' . $value['info'] . '</td></tr>';
	}
}

?>

			</table>
		<button type="submit" value="Submit">Submit</button>
		</form>
@endsection