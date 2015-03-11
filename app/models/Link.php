<?php


	class Link extends Eloquent {




     use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

	protected $fillable = array(
				'name',	
				'status', 
				'url', 

	);

	public static $rules = array(
				'name'=>'required|min:3',	
				'status'=>'integer', 
				'url'=>'required', 



	);	

	public function users() {
			return $this->belongsToMany('User', 'user_link');
	}

	public static function boot() {
		parent::boot();
		static::creating(function($link)
		{
			$link->created_by = Auth::id();
			$link->updated_by = Auth::id();
		});
		static::updating(function($link)
		{
			$link->updated_by = Auth::id();
		});
	}

}