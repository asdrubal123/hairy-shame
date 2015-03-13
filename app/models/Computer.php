<?php

class Computer extends Eloquent {

	protected $fillable = array('sn', 'cgito', 'other', 'make', 'model', 'ownership', 'comments');

	public static $rules = array(
		'sn'=>'required',
		'cgito'=>'',
        'other' => '',
		'make'=>'required',
		'model'=>'required',
		'ownership'=>'required|integer',
		'user_id'=>'',
		'comments' => '');



    protected $ownerships = array(
        '0' => 'Capgemini',
        '1' => 'Schneider'
    );
    public function getOwnershipAttribute($value)
    {
        return $this->ownerships[$value];
    }
    public function user() {
		return $this->belongsTo('User');
	}
    public function setUserIdAttribute($value) {
        $this->attributes['user_id'] = $value ? $value : null;
    }


    public function maker() {
        return $this->belongsTo('Maker');
    }

    public function model() {
        return $this->belongsTo('Model');
    }
}