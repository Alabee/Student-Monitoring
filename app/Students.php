<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
	protected $primaryKey = 'reg_no';
	public $incrementing = false;
	protected $keyType = 'string';

    public function financial(){
    	return $this->hasOne('App\Financials', 'foreign_key', 'reg_no');
    }
}
