<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\personal_info;
use App\Financials;
use App\Discipline;

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
        return view('dashboard.dashboard');
    }

    public function students_show()
    {
        $students = personal_info::all(); 
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
            'reg_no' => 'required',
            'student_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_of_admission' => 'required',
            'course' => 'required',
            'parent_name' => 'required',
            'parent_phone' => 'required'
        ]);
 
        $personal_info = new personal_info;

        $personal_info->reg_no = $request->input('reg_no');
        $personal_info->student_name = $request->input('student_name');
        $personal_info->gender = $request->input('gender');
        $personal_info->date_of_birth = $request->input('date_of_birth');
        $personal_info->date_of_admission = $request->input('date_of_admission');
        $personal_info->course = $request->input('course');
        $personal_info->parent_name = $request->input('parent_name');
        $personal_info->parent_phone = $request->input('parent_phone');

        $personal_info->save();
        return redirect('dashboard')->with('success', 'Student added successfully');
    }

    public function student_edit($id)
    {
        $student = personal_info::findOrFail($id);
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

        $personal_info = personal_info::find($id);

        $personal_info->reg_no = $request->input('reg_no');
        $personal_info->student_name = $request->input('student_name');
        $personal_info->gender = $request->input('gender');
        $personal_info->date_of_birth = $request->input('date_of_birth');
        $personal_info->date_of_admission = $request->input('date_of_admission');
        $personal_info->course = $request->input('course');
        $personal_info->parent_name = $request->input('parent_name');
        $personal_info->parent_phone = $request->input('parent_phone');

        $personal_info->save();
        return redirect('student')->with('success', 'Student personal information updated successfully');
    }

    public function financials_show(){
        $financials = Financials::all();
        return view('dashboard.financials_show')->with('financials', $financials);
    }

    public function financials_add(){
        $students = personal_info::all();
        return view('dashboard.financials_add')->with('students', $students);
    }

    public function financials_edit(Request $request, $id){
        $financial = Financials::findOrFail($id);
        return view('dashboard.financials_edit')->with('financials', $financial);
    }

    public function financials_update(Request $request, $id){
        $this->validate($request, [
            'amount_to_be_paid' => 'required',
            'amount_paid' => 'required'
        ]);

        $financial = new Financials;
        $financial->amount_to_be_paid = $request->input('amount_to_be_paid');
        $financial->amount_paid = $request->input('amount_paid');
        $financial->balance = $financial->amount_to_be_paid - $financial->amount_paid;
        $financial->save();

        return redirect('/financials_show')->with('success', 'Financials successfully updated');
    }

    public function discipline_update(){
        //
    }
    public function discipline_show(){
        $discipline = Discipline::all();
        return view('dashboard.discipline_show')->with('discipline', $discipline);
    }

    public function test(){
        $financial = Financials::findorfail(2);
        dd($financial)->student;
        return view('dashboard.test');
    }
}
