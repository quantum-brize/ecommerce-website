@extends('layouts.master')

@section('title')
    Top 3 Company
@endsection


@section('content')
<h1>TOP 3 Companies</h1>
<p>That created most projects:</p><hr>
    @foreach ($com as $coms)
    <ul id="myCL">
        <li><div style="color:rgb(70, 127, 233);"></div>{{$coms->CompanyName}}</li>
        <li style="color:rgb(41, 88, 177);"><i>Total Number Project Created : </i>{{$coms->count}}</li><br><br>
    </ul>
    @endforeach

@endsection