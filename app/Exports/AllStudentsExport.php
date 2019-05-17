<?php
namespace App\Exports;

<<<<<<< HEAD
use App\Students;
=======
use App\personal_info;
>>>>>>> e3299ad02a3880388dee18cd590bcab572dc7c92
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllStudentsExport implements FromCollection, ShouldAutoSize, WithHeadings
{
	public function headings(): array
    {
        return [
            'Registration number',
            'Student name',
            'Gender',
            'Date of birth',
            'Date of admission', 
            'Course',
            'Parent name',
            'Parent phone',
        ];
    }

    public function collection()
    {	
<<<<<<< HEAD
        return Students::all('reg_no', 'student_name','gender','date_of_birth', 'date_of_admission', 'course', 'parent_name', 'parent_phone');
=======
        return personal_info::all('reg_no', 'student_name','gender','date_of_birth', 'date_of_admission', 'course', 'parent_name', 'parent_phone');
>>>>>>> e3299ad02a3880388dee18cd590bcab572dc7c92
    }
}
