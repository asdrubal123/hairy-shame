<?php
class Maker extends Eloquent {

public function models(){
	return $this->hasMany('Model');
}
}
