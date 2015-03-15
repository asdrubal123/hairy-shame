<?php

class Owner {

	public static function display($owner) {
		if ($owner == 0) {
			echo "Capgemini";
		} else if ($owner == 1) {
			echo "Schneider";
		}
	}
}