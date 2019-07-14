<?php
if (PHP_SAPI !== 'cli') exit("Not allowed here..");

$hour 	= date("H");

echo "Light |State|Sec\n";
while(true){
	// 6am to 11pm
	if($hour >= 6 && $hour < 23){
		$j = 30;
		for ($i=0; $i < $j; $i++) { 
			output("green","on",$i+1);
		}
		$j = 5;
		for ($i=0; $i < $j; $i++) { 
			$ltcol = $i%2 ? "green" : "yellow";
			output($ltcol,"on",$i+1);
		}
		$j = 40;
		for ($i=0; $i < $j; $i++) { 
			output("red","on",$i+1);
		}
	}
	// 11pm to 6am
	if($hour < 6 || $hour >= 23){
		$j = 2;
		for ($i=0; $i < $j; $i++) { 
			output("yellow","off",$i+1);
		}
		$j = 1;
		for ($i=0; $i < $j; $i++) { 
			output("yellow","on",$i+1);
		}
	}
}

function output($light,$state,$sec){
	$str = str_pad($light, 6, ' ', STR_PAD_RIGHT).' '.str_pad($state, 5, ' ', STR_PAD_RIGHT).' '.str_pad($sec, 2, ' ', STR_PAD_RIGHT);
	echo "\033[16D";
	echo $str;
	sleep(1);
}

