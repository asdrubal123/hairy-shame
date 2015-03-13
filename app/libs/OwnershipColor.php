<?php

class OwnershipColor {


	public static function displayClass($owner) {
		if ($owner == 0) {
			echo "owner0";
		} else if ($owner == 1) {
			echo "owner1";
		} 
	
}
}