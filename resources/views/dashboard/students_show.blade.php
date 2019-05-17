@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<h1>Students</h1>
   		<a href="/print/allStudents" class="btn btn-info ml-auto" style="padding-top: 12px; color: white;margin-right: 15px; margin-bottom: 5px"> <i class="fa fa-arrow-circle-down"></i>  Print</a>
	</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a href="/student/add"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Add student</button></a>
     </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="student/search" method="post">
    	{{ csrf_field() }}
      <input class="form-control mr-sm-2" type="search" placeholder="Search for student" aria-label="Search" name="search-item">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

	<table class="table table-striped">
	    <tr>
<<<<<<< HEAD
	    	<th>Reg No.</th>
=======
	    	<th>Registration</th>
>>>>>>> e3299ad02a3880388dee18cd590bcab572dc7c92
	        <th>Student name</th>
	        <th>Gender</th>
	        <th>Date of Birth</th>
	        <th>Date of Adm</th>
	        <th>Course</th>
	        <th>Parent name</th>
	        <th>Parent phone</th>
	        <th></th>
	    </tr>
		@if(count($students)>0)
			@foreach($students as $student)
				<tr>
					<td>{{$student->reg_no}}</td>
					<td>{{$student->student_name}}</td>
					<td>{{$student->gender}}</td>
					<td>{{$student->date_of_birth}}</td>
					<td>{{$student->date_of_admission}}</td>
					<td>{{$student->course}}</td>
					<td>{{$student->parent_name}}</td>
					<td>{{$student->parent_phone}}</td>
					<td><a class="btn btn-primary" href="/student/{{$student->id}}/edit">Edit</a></td>
				</tr>
			@endforeach
		@endif
	</table>
</div>

@endsection