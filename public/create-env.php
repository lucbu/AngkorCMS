<?php

$envfile = fopen("..\.env", "w") or die("Unable to open file!");
foreach ($_POST as $key => $value) {
	$line = $key . ':' . $value . "\n";
	fwrite($envfile, $line);
}
fclose($envfile);

?>

<p>The .env file has been created.</p>
<a href="instal-db.php">Click to install database</a>