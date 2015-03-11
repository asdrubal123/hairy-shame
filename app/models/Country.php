<?php

class Country extends Eloquent {
	
	protected $fillable = array('name');

	public static $rules = array('name'=>'required|min:3');
	
	public function applications() {
		return $this->hasMany('Application');
	}

	public function assets() {
		return $this->hasMany('Asset');
	}
}