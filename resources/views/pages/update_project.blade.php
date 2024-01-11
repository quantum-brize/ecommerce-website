@extends('layouts.master')

@section('title')
    Edit Project
@endsection

@section('content')
<h1>Edit Project</h1><hr>
<form method="post" action="{{url("edit_project_action")}}">
    {{csrf_field()}}
    <input type="hidden" name="projectid" value="{{$project->Project_id}}">
    <p>
        <label>Project Name</label>
        <input type="text" name="projectname" value="{{$project->ProjectName}}">
    </p>
    <p>
        <label>Number of Student Required</label>
        <input type="text" name="numberofstudent" value="{{$project->NoStudentNeed}}">
    </p>
    <p>
        <label>Major</label>
        <input type="text" name="major" value="{{$project->Major}}">
    </p>
    <p>
       <lable>Description</lable>
       <textarea type="text" name="description" >{{$project->Description}}</textarea>
    </p>
    <hr>
    <input type="submit" value="Update item">
    </form>
@endsection