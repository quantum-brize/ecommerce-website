<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/


// route to get projects list
Route::get("/", function(){
  $sql = "select project.Project_id, project.ProjectName, industry.companyName from project, industry where project.Industry_id=industry.Industry_id";
  $projects = DB::select($sql);
  // $count = max_company();
  // dd($count);
  return view("pages.home_project")->with("projects", $projects);
});

// route to get project details with industry and students
Route::get("project_details/{Project_id}", function($project_id){
  $project = get_project($project_id);
  $industry =  get_industry($project_id);
  $student = get_student($project_id);
  // $count = count_student($project_id);
  // dd($count);
  return view("pages.project_details")->with("project", $project)->with("industry",$industry)->with("student",$student);
});

// route to view documentation pg 
Route::get("documentation",function(){
  return view("pages.documentation");
});

// route to view top3 pg 
Route::get("top_company",function(){
  $com = max_company();
  return view("pages.top_company")->with('com',$com);
});

// route to view project advertise form 
Route::get("advertise_project",function(){
  return view("pages.advertise_project");
});

// route of submit project advertise form
Route::post("add_project_action",function(){
  $projectname = request('projectname');
  $companyname = request('companyname');
  $numberofstudent = request('numberofstudent');
  $major = request('major');
  $description = request('description');
  $location = request("location");
  // session to remember company name and location
  Session::put('companyname',$companyname);
  Session::put('location',$location);
  // check for vaild input and give back error msg
  $check_input=check_input($projectname,$companyname,$major,$location,$description,$numberofstudent);
  // check for vaild input and give back error msg
  if ($check_input){
    return Redirect::back()->withErrors($check_input);
  }
  $iid = add_industry($companyname,$location);
  $pid = add_project($projectname,$numberofstudent,$major,$description);
  update_project($iid,$pid);
  if ($pid){
    return redirect("project_details/$pid");
  }
  else {
    die("something is wrong");
  }
});

// route to view edit project form
Route::get("update_project/{Project_id}",function($project_id){
  $project = get_project($project_id);
  //dd($projects);
  return view("pages.update_project")->with("project", $project);
});

// route to submit edit project form
Route::post("edit_project_action",function(){
  $id = request('projectid');
  $projectname = request('projectname');
  $numberofstudent = request('numberofstudent');
  $major = request('major');
  $description = request('description');
  edit_project($id, $projectname,$numberofstudent,$major,$description);
  return redirect("project_details/$id");
});

// // route to delete project
Route::get("delete_project/{Project_id}",function($project_id){
  // $project = get_project($project_id);
  delete_project($project_id);
  delete_application($project_id);
  return redirect("/");
});

// route to view apply project form 
Route::get("apply_project/{Project_id}",function($project_id){
  // dd($project_id);
  return view("pages.apply_project")->with('project_id',$project_id);
});

// route to submit apply project form
Route::post("apply_project_action",function(){
  $firstname = request('firstname');
  $lastname = request('lastname');
  $justification = request('justification');
  $project_id = request('projectid');
  $check = check_student($firstname,$lastname,$justification);
  if ($check){
    return Redirect::back()->withErrors($check);
  }
  $record = check_record($firstname,$lastname);
  if ($record){
    $error = 'Student already applied';
    return Redirect::back()->withErrors($error);
  }
  // dd($record);
  $a = add_student($firstname,$lastname);
  add_justification($a,$project_id,$justification);
  return redirect("project_details/$project_id");
});


// route to justification
Route::get("justification/{Student_id}",function($student_id){
  $justification = get_justification($student_id);
  // dd($justification);
  return view('pages.justification')->with("justification",$justification);
});

// route to get student lists 
Route::get("student_list",function(){
  $studentlist = get_student_list();
  // dd($studentlist);
  return view("pages.student_list")->with("studentlist",$studentlist);
});

// route to get student list project
Route::get("student_project_details/{Student_id}", function($Student_id){
  $student_project = student_project($Student_id);
  $sql = "select * from student where Student_id=?";
  $studentname = DB::select($sql,array($Student_id));
  $StudentName = $studentname[0];
  // dd($StudentName);
  return view("pages.student_project_details")->with("student_project", $student_project)->with("StudentName",$StudentName);
});


/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
*/


// funtion to add project data and get project id
function add_project($projectname,$numberofstudent,$major,$description){
  $sql = "insert into project (projectname,nostudentneed,major,description) values (?,?,?,?)";
  DB::insert($sql,array($projectname,$numberofstudent,$major,$description));
  $id = DB::getPdo()->lastInsertId();
  return($id);
  //dd($id);
};

// funtion to add industry data
function add_industry($comapnyname,$location){
  $sql = "insert into industry values (null,?,?)";
  DB::insert($sql,array($comapnyname,$location,));
  $id = DB::getPdo()->lastInsertId();
  return($id);
};

// funtion to update project to link industry and project
function update_project($iid,$pid){
  $sql = "update project set Industry_id=? where Project_id=?";
  DB::update($sql,array($iid,$pid));
};

// funtion to edit project
function edit_project($id, $projectname,$numberofstudent,$major,$description) { 
  $sql = "update project set projectname=?, Nostudentneed=?, major=?, description=? where Project_id=? ";   
  DB::update($sql, array($projectname,$numberofstudent,$major,$description,$id));
  };

// funtion to get project 
function get_project($id){
  $sql = "select * from project where project_id=?";
  $projects = DB::select($sql, array($id));
  if (count($projects) != 1){
    die("something is wrong");
  }
  $project = $projects[0]; 
  return $project;
};

// funtion to get industry 
function get_industry($id){
  $sql = "select industry.companyName from industry, project where project_id=? and project.industry_id=industry.industry_id";
  $industry = DB::select($sql, array($id));
  return $industry;
};

// funtion to get students
function get_student($id){
  $sql = "select student.FirstName, student.lastname, student.student_id from student, Papplication
  where Papplication.project_id=? and student.student_id=Papplication.student_id";
  $student = DB::select($sql, array($id));
  return $student;
};

// funtion to count students
function count_student(){
  $sql = "select project.projectname, count(Papplication.Project_id) from student, Papplication, project
  where Papplication.project_id=project.Project_id and student.student_id=Papplication.student_id group by project.project_id";
  $count = DB::select($sql);
  return $count;
};


// funtion to delete project
function delete_project($id) { 
  $sql = "delete from project where Project_id = ?"; 
  DB::delete($sql, array($id)); 
};

// funtion to delete application
function delete_application($id) { 
  $sql = "delete from Papplication where Project_id = ?"; 
  DB::delete($sql, array($id)); 
};


// funtion to add industry data
function add_student($firstname,$lastname){
  $sql = "insert into student values (null,?,?)";
  DB::insert($sql,array($firstname,$lastname));
  $id = DB::getPdo()->lastInsertId();
  return($id);
};

// insert justification 
function add_justification($student_id,$project_id,$justification,){
  $sql = "insert into Papplication values (?,?,?)";
  DB::insert($sql,array($student_id,$project_id,$justification));
};


// funtion to get jutification text 
function get_justification($id){
  $sql = "select Papplication.justification, student.firstname, student.lastname from Papplication, student where Papplication.student_id=?";
  $justification = DB::select($sql, array($id));
  return $justification[0];
};

// funtion to get student list
function get_student_list(){
  $sql = "select student.firstname, student.lastname, Papplication.Student_id from student, Papplication where student.Student_id=Papplication.Student_id";
  $studentlist = DB::select($sql);
  return $studentlist;
};

// funtion to get student_project id
function student_project($id){
  $sql = "select project.ProjectName, industry.CompanyName from project,industry,Papplication 
  where Papplication.Project_id=Project.Project_id and project.Industry_id = industry.Industry_id and Papplication.Student_id=?";
  $studentprojects = DB::select($sql, array($id));
  return $studentprojects;
};

// function to check input validation for creating project and return error
function check_input($projectname,$companyname,$location,$major,$description,$numberofstudent){
  if (empty($projectname)) {
    $error = 'Project Name Cannot be empty';
    return $error;
  }
  if (empty($companyname)) {
    $error = 'Company Name Cannot be empty';
    return $error;
  }
  if ($numberofstudent < 3 or $numberofstudent > 8){
    $error = 'Number of Student between 3-8 only.';
    return $error;
  }
};

// function to check student Apply page input vaildity
function check_student($firstname,$lastname,$justification){
  if(empty($firstname)){
    $error = 'First Name Cannot be empty';
    return $error;
  }
  if(strlen($firstname)<3){
    $error = 'First Name too short';
    return $error;
  }
  if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstname)){
    $error = 'Name Cannot contain special characters';
    return $error;
  }
  if (is_numeric($firstname)){
    $error = 'Name Cannot be numeric';
    return $error; 
  }
  if(empty($lastname)){
    $error = 'Last Name Cannot be empty';
    return $error;
  }
  if(strlen($lastname)<3){
    $error = 'last Name too short';
    return $error;
  }
  if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastname)){
    $error = 'Name Cannot contain special characters';
    return $error;
  }
  if (is_numeric($lastname)){
    $error = 'Name Cannot be numeric';
    return $error; 
  }
  if(empty($justification)){
    $error = 'justification Cannot empty';
    return $error;
  }
  if(str_word_count($justification)<5){
    $error = 'justification Cannot be less than 5 words';
    return $error;
  }
};

// function to check record for same student in project
function check_record($firstname,$lastname){
  $sql = "Select * from student where EXISTS (SELECT * FROM student WHERE FirstName = ? and LastName = ? )";
  $record=DB::select($sql, array($firstname,$lastname));
  return $record[0];
};

// function to max company
function max_company(){
  $sql = "select industry.CompanyName, count(project.Industry_id) as count from project, industry 
  where project.Industry_id = industry.Industry_id
  group by industry.CompanyName
  order by count(project.Industry_id) desc
  limit 3";
  $record=DB::select($sql);
  return $record;
};