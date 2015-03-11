<?php

class Priority extends Eloquent {
	
	protected $fillable = array('priority');

	public static $rules = array('priority'=>'required|min:2');
	
	public function applications() {
		return $this->hasMany('Application');
	}
	public function assets() {
		return $this->hasMany('Asset');
	}

}