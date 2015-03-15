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
    /**
    
    public static $rules = [
    'create' => [
        'sn'=>'required|unique:computers',
        'cgito'=>'unique:computers',
        'other' => '',
        'make'=>'required',
        'model'=>'required',
        'ownership'=>'required|integer',
        'user_id'=>'',
        'comments' => ''
    ],
    'update' => [
        'sn'=>'required|unique:computers,sn,:id',
        'cgito'=>'unique:computers,cgito,:id',
        'other' => '',
        'make'=>'required',
        'model'=>'required',
        'ownership'=>'required|integer',
        'user_id'=>'',
        'comments' => ''
    ]
    ];

    
    public static function rules ($id=0, $merge=[]) {
        return array_merge(
        [
        'sn'=>'required|unique:computers,id,' . $id,
        'cgito'=>'',
        'other' => '',
        'make'=>'required',
        'model'=>'required',
        'ownership'=>'required|integer',
        'user_id'=>'',
        'comments' => ''
        ], 
        $merge);
    }
    


    protected $ownerships = array(
        '0' => 'Capgemini',
        '1' => 'Schneider'
    );
    public function getOwnershipAttribute($value)
    {
        return $this->ownerships[$value];
    }
    **/
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