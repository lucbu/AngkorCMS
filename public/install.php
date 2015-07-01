<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Install AngkorCMS</title>
	<body>
		<form  action="create-env.php" method="post" id="envForm">

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

foreach ($env as $key => $value) {

	echo '<tr><td>' . $key . '</td>
					<td>:</td>
					<td><input type="text" name="' . $key . '" value="' . $value . '"/></td></tr>';
}

?>

			</table>
		<button type="submit" value="Submit">Submit</button>
		</form>
	</body>
</html>