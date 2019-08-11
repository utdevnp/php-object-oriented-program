<?php

class Number{
	
	function returnNepaliNum($num){

		$result = str_replace('1', '१', $num);
		$result = str_replace('2','२', $result);
		$result = str_replace('3','३', $result);
		$result = str_replace('4','४', $result);
		$result = str_replace('5','५', $result);
		$result = str_replace('6','६', $result);
		$result = str_replace('7','७', $result);
		$result = str_replace('8','८', $result);
		$result = str_replace('9','९', $result);
		$result = str_replace('0','०', $result);
		return $result;	
	}	
}

$Number = new Number;

?>