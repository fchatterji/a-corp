<?php

function isValidDay($day) {
	$dateTimeObject = DateTime::createFromFormat("Y-m-d", $day);
	return $dateTimeObject !== false && !array_sum($dateTimeObject->getLastErrors());	
}


?>