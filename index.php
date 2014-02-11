<?php
	include("./proper_nouns.php");
	
	$nouns = array();
	
	$handle = fopen("harrypotter-clean.txt", "r");
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			//create instance
			$pn = new proper_nouns();
			//$pn->set_conjunctions(array(''), 'middle');

			$arr = $pn->get($line);
			
			foreach ($arr as $item) {
				//echo '<span style="background:red;">'.$item.'</span>';
				if (!array_key_exists($item, $nouns)) $nouns[$item]=1;
				else $nouns[$item]++;
				
				$line = str_replace($item, '<span style="background:red;">'.$item.'</span>', $line);
			}
			echo '<pre>'.$line.'</pre>';
		}
	} else {
		// error opening the file.
	}
	
	arsort($nouns);
	echo '<pre><code>';
	print_r($nouns);
	echo '</pre></code>';
?>
