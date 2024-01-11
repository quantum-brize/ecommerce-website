<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>  <!--ADD TITLE-->
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{{asset('../resources/css/wp.css')}}">
</head>
<body>
    <div class="topnav">
      <a href="{{url("/")}}" class="split">WIL</a>
      <div href="" class="splits">WorkIntegeratedLearning</div>
      <a href="{{url("/documentation")}}" >Documentation</a>
      <a href="{{url("/top_company")}}" >Top 3</a>
      <a href="{{url("/student_list")}}" >List of students</a>
      <a href="{{url("/advertise_project")}}" >Create Project?</a>
    </div> <!--HEADER NAVBAR-->
    <div class="content">
      @yield('content') <!--ADD CONTENT-->
    </div>
    <hr>
    <footer>
      <div class="footer">
        <p>Made by: Anuj Khurana s5281041</p>
      </div>
    </footer>
</body>
</html>