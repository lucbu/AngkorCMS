@extends('install/master')

@section('content')
		<form  action="{{route('create-env')}}" method="post" id="envForm">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<table>
			<?php
$env = [
	'APP_ENV' => 'local',
	'APP_DEBUG' => 'true',
	'APP_KEY' => 'SomeRandomString',
	'DB_HOST' => 'localhost',
	'DB_DATABASE' => 'homestead',
	'DB_USERNAME' => 'homestead',
	'DB_PASSWORD' => 'secret',
	'CACHE_DRIVER' => 'file',
	'SESSION_DRIVER' => 'file',
	'QUEUE_DRIVER' => 'sync',
	'MAIL_DRIVER' => 'smtp',
	'MAIL_HOST' => 'mailtrap.io',
	'MAIL_PORT' => '2525',
	'MAIL_USERNAME' => 'null',
	'MAIL_PASSWORD' => 'null',
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
		$env[trim($var[0])] = $value;
	}
}
fclose($envfile);

foreach ($env as $key => $value) {
	if ($key != '' & $key != ' ') {
		echo '<tr><td>' . $key . '</td>';
		echo '<td>:</td>';
		echo '<td><input type="text" name="' . $key . '" value="' . $value . '"/></td></tr>';
	}
}

?>

			</table>
		<button type="submit" value="Submit">Submit</button>
		</form>
@endsection