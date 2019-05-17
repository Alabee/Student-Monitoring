<?php

namespace App;
<<<<<<< HEAD
=======
use App\personal_info;
>>>>>>> e3299ad02a3880388dee18cd590bcab572dc7c92

use Illuminate\Database\Eloquent\Model;

class Financials extends Model
{
<<<<<<< HEAD
    public function student(){
    	$this->belongsTo('App\Students', 'local_key', 'reg_no');
    }
=======
	public function student(){
		return $this->belongsTo('App\personal_info');
	}

	public function populate(){
		$students = personal_info::all();
		$financial = new Financials;

		foreach($students as $student){
			$financial->reg_no = $student->reg_no;
			$financial->student_name = $student->student_name;
			$financial->save();
		}

		return $financial;
	}
>>>>>>> e3299ad02a3880388dee18cd590bcab572dc7c92
}
