@extends('layouts.master')

@section('title')
    Student lists
@endsection 

@section('content')
    <h1>List of students</h1><hr>
    @foreach ($studentlist as $studentlists)
    <ul id="myLS">
    <li><a href="{{url("student_project_details/$studentlists->Student_id")}}">{{$studentlists->FirstName}} {{$studentlists->LastName}}</a></li>
    </ul>
    @endforeach
@endsection