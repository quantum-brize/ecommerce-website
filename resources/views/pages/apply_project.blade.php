@extends('layouts.master')

@section('title')
    Apply Project
@endsection

@section('content')
  <div class="container">
    <h1>Apply for Project</h1>
    <p>Please fill in this form to Create a new project</p>
    <hr>
  </div>  

  @if($errors->any())
    <div class="alert">{!! implode('', $errors->all('<div>Alert! Error: :message</div>')) !!} </div><br>
  @endif {{-- THIS IS FOR INPUT VALIDATION ERROR --}}

  <form method="post" action="{{url("apply_project_action")}}">
    {{csrf_field()}}
  <input type="hidden" name="projectid" value="{{$project_id}}"
    <p>
        <label>First Name</label>
        <input type="text" name="firstname">
    </p>
    <p>
        <label>Last Name</label>
         <input type="text" name="lastname">
    </p>
    <p>
       <lable>Justification</lable>
       <textarea type="text" name="justification"></textarea>
    </p>
    <hr>
    <input type="submit" value="APPLY"></td></tr>
  </form>
@endsection