<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatlab\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AllStudentsExport;
use App\Exports\AcademicReports;
use App\Exports\InSessionReport;
<<<<<<< HEAD
use App\Students;
=======
use App\personal_info;
>>>>>>> e3299ad02a3880388dee18cd590bcab572dc7c92


class ExportExcelController extends Controller
{

    public function allStudents(){
    	return Excel::download(new AllStudentsExport, 'Students.xlsx');
    }

    public function academicReports(){
    	return Excel::download(new AcademicReports, 'Exam.xlsx');
    }

    public function inSession(){
    	return Excel::download(new InSessionReport, 'InSessionReport.xlsx');
    }
}
