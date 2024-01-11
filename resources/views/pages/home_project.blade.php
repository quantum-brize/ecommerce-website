@extends('layouts.master')

@section('title')
    HOME
@endsection

@section('content')
  <h1>Available Projects</h1><hr>
  @foreach ($projects as $project)
    <ul id="myUL">
      <li><a href="{{url("project_details/$project->Project_id")}}">{{$project->ProjectName}} <div>CREATED BY:{{$project->CompanyName}}</div></a></li>
    </ul> {{-- url give absoulte address --}}
    @endforeach
    
@endsection