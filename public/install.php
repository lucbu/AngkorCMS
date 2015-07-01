<?php
	set_time_limit (300);
	$test = array();
	$num;
	exec('php ..\artisan angkorcms:install', $test, $num);
	set_time_limit (30);
	if($num == 0) {
		echo 'AngkorCMS has been migrated in database';
	} else if($num == 1){
		echo 'Whoops something wrong happened';
	}
	
?>