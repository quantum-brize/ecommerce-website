@extends('layouts.master')

@section('title')
    Student Projects
@endsection


@section('content')
<h1>{{$StudentName->FirstName}} {{$StudentName->LastName}}</h1>
<p>Working on the following projects:</p><hr>
    @foreach ($student_project as $student_projects)
    <ul id="myPL">
        <li>Project Name: {{$student_projects->ProjectName}}</li>
        <li>Created by : {{$student_projects->CompanyName}}</li><br><br>
    </ul>
    @endforeach

@endsection