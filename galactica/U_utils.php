<?php
function get_second():float {
	$starttime = microtime(true);
	$endtime = microtime(true);
	return $endtime - $starttime;

		
}

?>