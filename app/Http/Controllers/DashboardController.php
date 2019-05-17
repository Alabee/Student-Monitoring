<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Students;

use App\Financials;

use DB;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard. 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Students::all(); 

        $statistics = array(
            'in_session' => 1,
            'suspended' => 5,
            'expelled' => 6

             );

        return view('dashboard.dashboard')->with('students', $students)->with('statistics', $statistics);
    }

    public function students_show()
    {
        $students = Students::all(); 
        return view('dashboard.students_show')->with('students', $students);
    }

    public function student_add()
    {
        return view('dashboard.student_add');
    }

    public function student_store(Request $request)
    {
        //validate that every field is filled before submitting
        $this->validate($request,[
            'reg_no' => 'required|unique:students',
            'student_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_of_admission' => 'required',
            'course' => 'required',
            'parent_name' => 'required',
            'parent_phone' => 'required'
        ]);

        $student = new Students;

        $student->reg_no = $request->input('reg_no');
        $student->student_name = $request->input('student_name');
        $student->gender = $request->input('gender');
        $student->date_of_birth = $request->input('date_of_birth');
        $student->date_of_admission = $request->input('date_of_admission');
        $student->course = $request->input('course');
        $student->parent_name = $request->input('parent_name');
        $student->parent_phone = $request->input('parent_phone');


        $student->save();




        return redirect('dashboard')->with('success', 'Student added successfully');
    }

    public function restrictDuplicate(Request $request){
        $q = $request->input('q');

        $reg_no = str_replace('-', '/', $q);
        $students = Students::all();

        foreach ($students as $student) {
            if ($student->reg_no == $reg_no){
                return "Registration number already exists";
                break;

            }
        }
    }

    public function student_edit($id)
    {

        $student = Students::findOrFail($id);

        return view('dashboard.student_edit')->with('student', $student);
    }

    public function student_update(Request $request, $id)
    {
        //validate that every field is filled before submitting
        $this->validate($request,[
            'reg_no' => 'required',
            'student_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_of_admission' => 'required',
            'course' => 'required',
            'parent_name' => 'required',
            'parent_phone' => 'required'
        ]);


        $Students = Students::find($id);

        $Students->reg_no = $request->input('reg_no');
        $Students->student_name = $request->input('student_name');
        $Students->gender = $request->input('gender');
        $Students->date_of_birth = $request->input('date_of_birth');
        $Students->date_of_admission = $request->input('date_of_admission');
        $Students->course = $request->input('course');
        $Students->parent_name = $request->input('parent_name');
        $Students->parent_phone = $request->input('parent_phone');

        $Students->save();

        return redirect('student')->with('success', 'Student personal information updated successfully');
    }

    public function student_search(Request $request){

        $Students = Students::all();

        foreach ($Students as $student) {

            if ($request->input('search-item') == $student->reg_no){
                return view('dashboard.student_search')->with('student', $student);
            }
        }
    }


}
