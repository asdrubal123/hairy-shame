<?php

class Icons {


	public static function displayClass($icons) {
		if ($icons == 'ThinClient') {
			echo "fa-train";
		} else if ($icons == 'Laptop') {
			echo "fa-laptop";
		} else if ($icons == 'Desktop') {
			echo "fa-desktop";
		} else if ($icons == 'Monitor') {
			echo "fa-desktop";
		} else if ($icons == 'Smartphone') {
			echo "fa-mobile";
		} else if ($icons == 'Tablet') {
			echo "fa-tablet";
		} else if ($icons == 'Deskphone') {
			echo "fa-phone";
		}
	}
}
