<?php
	$handle = fopen("harrypotter-clean.txt", "r");
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			echo '<pre>'.$line.'</pre>';
		}
	} else {
		// error opening the file.
	}
?>
