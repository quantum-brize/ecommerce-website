@extends('layouts.master')

@section('title')
    Documentation
@endsection

@section('content')
<h1>Documentation</h1><hr>
    <h2>ER diagram</h2>
      <img src={{asset('/../resources/images/1.png')}} alt="Logo" height="60%" width="60%">
    <h2>Tasks Completed</h2>
    <p> Completed Tasks are in Green color</p>
    <ul id="myTL">
        <li><a>Task 1</li>
        <li><a>Task 2</li>
        <li><a>Task 3</li>
        <li><a>Task 4</li>
        <li><a>Task 5</li>
        <li><a>Task 6</li>
        <li><a>Task 7</li>
        <li><a>Task 8</li>
        <li><a>Task 9</li>
        <li><a>Task 10</li>
        <li><a>Task 11</li>
        <li>Task 12</li>
        <li><a>Task 13</li>
        <li><a>Task 14</li>
        <li>Task 15</li>
        <li><a>Addtional Tasks(7005ICT)</li>
    </ul>
    <div class="myref">
    <h2>Reflection</h2>
    <p style="line-height:1.4;">I began the project by making a database design and a database file from it. I then added data and connected SQLite to Larval to carry out the project. I went on to the tasks one at a time and tried to finish them while moving. It was a headache to erase and re-enter data into the system when my initial data wasn't enough to create results. The project was interesting and difficult; I couldn’t finish everything, but I learned a lot in the process. I started the project late, which has been a big disadvantage for me because I find it difficult to understand new concepts like Larvel/PHP sessions that weren't addressed in lectures. This is the first website that I have written from scratch, and I'm extremely happy with it. Every time I figure out a problem, I feel delighted when I see the solutions on screen. For me, this job was both challenging and enjoyable, and I relished each task I completed well. I used dd() to double-check my codes' functionality practically at every stage to ensure everything was running well. I regret not doing appropriate planning or time management for this task, and I will absolutely do so for my next one and start the project with enough data.<p>
    </div>
@endsection