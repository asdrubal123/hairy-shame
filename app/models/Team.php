<?php


	class Team extends Eloquent {




    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

	protected $fillable = array(
				'name',	
				'status', 
				'description', 
				'servicelevel', 
				'customer', 
				'timetable', 
				'phone', 
				'email', 
				'free1',  
				'e1_tl',
				'e1_phone',
				'e1_mobile',
				'e1_email1',
				'e1_email2',
				'e1_comments',
				'e2_tl',
				'e2_phone',
				'e2_mobile',
				'e2_email1',
				'e2_email2',
				'e2_comments',
				'e3_tl',
				'e3_phone',
				'e3_mobile',
				'e3_email1',
				'e3_email2',
				'e3_comments',
				'global_comment'
	);

	public static $rules = array(
				'name'=>'required|min:3',	
				'status'=>'integer', 
				'description'=>'', 
				'servicelevel'=>'', 
				'customer'=>'', 
				'timetable'=>'', 
				'phone'=>'numeric', 
				'email'=>'email', 
				'free1'=>'',  
				'e1_tl'=>'',
				'e1_phone'=>'numeric',
				'e1_mobile'=>'numeric',
				'e1_email1'=>'email',
				'e1_email2'=>'email',
				'e1_comments'=>'',
				'e2_tl'=>'',
				'e2_phone'=>'numeric',
				'e2_mobile'=>'numeric',
				'e2_email1'=>'email',
				'e2_email2'=>'email',
				'e2_comments'=>'',
				'e3_tl'=>'',
				'e3_phone'=>'numeric',
				'e3_mobile'=>'numeric',
				'e3_email1'=>'email',
				'e3_email2'=>'email',
				'e3_comments'=>'',
				'global_comment'


	);	

	public function applications() {
			return $this->hasMany('Application');
	}

	public function assets() {
			return $this->hasMany('Asset');
	}

	public function usercreated() {
			return $this->belongsTo('User', 'created_by');
	}
	public function userupdated() {
			return $this->belongsTo('User', 'updated_by');
	}
	public static function boot() {
		parent::boot();

		static::creating(function($team)
		{
			$team->created_by = Auth::id();
			$team->updated_by = Auth::id();
		});
		static::updating(function($team)
		{
			$team->updated_by = Auth::id();
		});
	}

}