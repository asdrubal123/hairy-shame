<?php

class OwnershipColor {


	public static function displayClass($owner) {
		if ($owner == 'Capgemini') {
			echo "owner0";
		} else if ($owner == 'Schneider') {
			echo "owner1";
		} 
	
}
}