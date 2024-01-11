@extends('layouts.master')

@section('title')
    Projects deatils
@endsection

@section('content')
  <h1>{{$project->ProjectName}}</h1>
  <hr>
  <ul id="myPL">
  <li><b style="color:rgb(70, 127, 233);">Major: </b>{{$project->Major}}</li>
  <li><b style="color:rgb(70, 127, 233);">Description: </b>{{$project->Description}}</li>
  <li><b style="color:rgb(70, 127, 233);">Number Of Students Required: </b>{{$project->NoStudentNeed}}</li>
  <li><b style="color:rgb(70, 127, 233);">Students Assigned: </b>
    @foreach($student as $students)
    <a href="{{url("justification/$students->Student_id")}}">{{$students->FirstName}} {{$students->LastName}}</a>
    @endforeach</li>
  <li>
    @foreach ($industry as $industry)
    <b style="color:rgb(70, 127, 233);">Project Created By:  </b>{{$industry->CompanyName}}
    @endforeach
  </li>
  </ul>
  <hr>
  <div class="btns">
  <a class="btnd" href="{{url("delete_project/$project->Project_id")}}">DELETE PROJECT</a>
  <a class="btne" href="{{url("update_project/$project->Project_id")}}">EDIT PROJECT</a>
  <a class="btna" href="{{url("apply_project/$project->Project_id")}}">APPLY FOR PROJECT</a><br></div>
@endsection
