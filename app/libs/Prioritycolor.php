<?php

class Prioritycolor {


	public static function displayClass($criticality) {
		if ($criticality == 0) {
			echo "criticality0";
		} else if ($criticality == 1) {
			echo "criticality1";
		} else if ($criticality == 2) {
			echo "criticality2";
		} else if ($criticality == 3) {
			echo "criticality3";
		}
	}
}