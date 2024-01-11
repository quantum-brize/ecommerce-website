@extends('layouts.master')

@section('title')
    Create Project
@endsection

@section('content')

  <form method="post" action="add_project_action">
    {{csrf_field()}}
    <div class="container">
        <h1>Create Project</h1>
        <p>Please fill in this form to Create a new project</p>
        <hr>

    @if($errors->any())
    <div class="alert">{!! implode('', $errors->all('<div>Alert! Error: :message</div>')) !!} </div>
    @endif {{-- THIS IS FOR INPUT VALIDATION ERROR --}}
    <p>
        <label>Project Name</label>
        <input type="text" name="projectname">
    </p>
    <p>
        <label>Company Name</label>
         <input type="text" name="companyname" value="{{Session::get('companyname')}}">
    </p>
    <p>
        <label>Location</label>
         <input type="text" name="location" value="{{Session::get('location')}}">
    </p>
    <p>
        <label>Number Of Student Required</label>
        <input type="text" name="numberofstudent">
    </p>
    <p>
        Major:<select name="major">
            <option value="" selected="selected">Front-end-Developer</option>
            <option value="" selected="selected">Security</option>
            <option value="" selected="selected">Database</option>
            <option value="" selected="selected">Networks</option>
            <option value="" selected="selected">other</option>
            </select>
    </p>
    <p>
            <lable>Description</lable>
            <textarea type="text" name="description" placeholder="Write something.." style="height:170px"></textarea>
    <hr>
            <p>By creating this project you are messing with our database <a href="#">NoTerms & NoPrivacy</a>.</p>
            <button class="formbtn" type="submit">Create Project</button>
    </div>
  </form>
@endsection


