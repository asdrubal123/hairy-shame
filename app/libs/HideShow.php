<?php

class HideShow {


	public static function displayClass($team_id) {
		if ($team_id == 9) {
			echo "hide";
		} else {
			echo "#";
		} 
	}

	
	public static function displayClass($level2_team_id) {
		if ($level2_team_id == 9) {
			echo "hide";
		} else {
			echo "#";
		} 
	}
}