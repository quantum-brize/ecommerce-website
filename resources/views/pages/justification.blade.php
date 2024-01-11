@extends('layouts.master')

@section('title')
    Student Project Justification
@endsection

@section('content')
<div class="jus">
    <h1>{{$justification->FirstName}} {{$justification->LastName}}</h1>
    <p>Justification: {{$justification->Justification}}</p>
</div>
@endsection