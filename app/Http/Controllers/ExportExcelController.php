<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatlab\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AllStudentsExport;
use App\personal_info;


class ExportExcelController extends Controller
{

    public function allStudents(){
    	return Excel::download(new AllStudentsExport, 'Students.xlsx');
    }
}