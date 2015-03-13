<?php

class Model extends Eloquent {

public function maker(){

	return $this->belongsTo('Maker');

}

	protected $types = array(
        '0' => 'ThinClient',
        '1' => 'Laptop',
        '2' => 'Desktop',
        '3' => 'Monitor',
        '4' => 'Smartphone',
        '5' => 'Tablet', 
        '6' => 'Deskphone'
    );

    public function getTypeAttribute($value)
    {
        return $this->types[$value];
    }

} 