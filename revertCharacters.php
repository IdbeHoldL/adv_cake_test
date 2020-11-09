<?php

function revertCharacters($inputString) {
	
	$resultString = $inputString;
	$inputCharSets = preg_split('/(\!|\.|\,|\?| )/mu', $inputString);
	
	foreach ($inputCharSets as $inputCharSet){
		
		$lastCharIndex = mb_strlen($inputCharSet) -1;
		$revertedCharSet = '';
		
		for ($i = $lastCharIndex; $i>=0; $i--) {
			
			$currentChar = mb_substr($inputCharSet, $i, 1);
			$mirroredChar = mb_substr($inputCharSet, $lastCharIndex - $i, 1);
			$revertedCharSet .= IntlChar::isUUppercase($mirroredChar) ? mb_strtoupper($currentChar) : mb_strtolower($currentChar);
		}
		$resultString = str_replace($inputCharSet, $revertedCharSet, $resultString);
	}
	
	return $resultString;
	
}