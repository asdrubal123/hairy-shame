<?php


	class Asset extends Eloquent {


    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

	protected $fillable = array(
			'name',
			'status',
			'description',
			'site',
			'country_id',
			'priority_id',
			'responsible',
			'responsible_date',
			'categorization',
			'documentation',
			'procurement',
			'procurement_ku',
			'procurement_rr',
			'procurement_er',
			'imac_services',
			'imac_ku',
			'imac_rr',
			'imac_er',
			'support_services',
			'support_ku',
			'support_rr',
			'team_id',	
			'level1_more',
			'team2_id',
			'level2_more',
			'team3_id',
			'level3_more',
			'administration',
			'administration_ku',
			'administration_rr',
			'administration_er',
			'operation_order',
			'oo_ku',
			'oo_rr',
			'oo_er',
			'small_enhancement',
			'sm_ku',
			'global_comment'

	);

	public static $rules = array(
			'name'=>'required|min:2',
			'status'=>'integer',
			'description'=>'',
			'site'=>'',
			'country_id'=>'required|integer',
			'priority_id'=>'required|integer',
			'responsible'=>'',
			'responsible_date'=>'',
			'categorization'=>'',
			'documentation'=>'',
			'procurement'=>'',
			'procurement_ku'=>'',
			'procurement_rr'=>'',
			'procurement_er'=>'',
			'imac_services'=>'',
			'imac_ku'=>'',
			'imac_rr'=>'',
			'imac_er'=>'',
			'support_services'=>'',
			'support_ku'=>'',
			'support_rr'=>'',
			'team_id'=>'integer',	
			'level1_more'=>'',
			'team2_id'=>'integer',
			'level2_more'=>'',
			'team3_id'=>'integer',
			'level3_more'=>'',
			'administration'=>'',
			'administration_ku'=>'',
			'administration_rr'=>'',
			'administration_er'=>'',
			'operation_order'=>'',
			'oo_ku'=>'',
			'oo_rr'=>'',
			'oo_er'=>'',
			'small_enhancement'=>'',
			'sm_ku'=>'',
			'global_comment'=>''

	);	
	
	public function country() {
		return $this->belongsTo('Country');
	}

	public function priority() {
		return $this->belongsTo('Priority');
	}

	public function team() {
		return $this->belongsTo('Team');
	}

	public function team2() {
		return $this->belongsTo('Team');
	}

	public function team3() {
		return $this->belongsTo('Team');
	}

	public function usercreated() {
			return $this->belongsTo('User', 'created_by');
	}
	public function userupdated() {
			return $this->belongsTo('User', 'updated_by');
	}

	public static function boot() {
		parent::boot();
		static::creating(function($asset)
		{
			$asset->created_by = Auth::id();
			$asset->updated_by = Auth::id();
		});
		static::updating(function($asset)
		{
			$asset->updated_by = Auth::id();
		});
	}



}