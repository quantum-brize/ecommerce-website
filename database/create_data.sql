drop table if exists industry;

create table industry (    
    Industry_id integer not null primary key autoincrement,    
    CompanyName varchar(10),    
    Location char(5) 
); 

drop table if exists project;

create table project (    
    Project_id integer not null primary key autoincrement,    
    ProjectName varchar(20) not null,    
    Major char(10),
    Description varchar(30),
    NoStudentNeed int not null,
    Industry_id int,
    FOREIGN KEY (Industry_id) REFERENCES industry(Industry_id)
); 

drop table if exists student;

create table student (    
    Student_id integer not null primary key autoincrement,    
    FirstName varchar(20),    
    LastName varchar(20)
); 

drop table if exists Papplication;

create table Papplication (    
    Student_id int,    
    Project_id  int,  
    Justification varchar(30),
    FOREIGN KEY (Student_id) REFERENCES student(Student_id),
    FOREIGN KEY (Project_id) REFERENCES project(Project_id)
);


INSERT INTO industry VALUES (null,"Solar Solutions AUS","QLD");
INSERT INTO industry VALUES (null,"Tickerr pvt ltd","VIC");
INSERT INTO industry VALUES (null,"Gotourism.net.au","NSW");
INSERT INTO industry VALUES (null,"Dan Murphy Pvt Ltd","QLD");
INSERT INTO industry VALUES (null,"OnTheGoDev LTD","NSW");
INSERT INTO industry VALUES (null,"Solar Solutions AUS","VIC");
INSERT INTO industry VALUES (null,"Get Set Code AUS","WAS");
INSERT INTO industry VALUES (null,"JapaniJapana Jam","NSW");

INSERT INTO student VALUES (1,"Anuj","Khurana");
INSERT INTO student VALUES (2,"Kim","Wing");
INSERT INTO student VALUES (3,"Robbert","Jam");
INSERT INTO student VALUES (4,"Dave","kholi");
INSERT INTO student VALUES (5,"Arjun","Gupta");
INSERT INTO student VALUES (6,"Bred","jam");
INSERT INTO student VALUES (7,"Frapu","kholi");
INSERT INTO student VALUES (8,"Freddy","kat");
INSERT INTO student VALUES (9,"Tom","gin");

INSERT INTO project VALUES (null,"Project121Web","Softdev","this project is to require a database manager",3,1);
INSERT INTO project VALUES (null,"PythonApp","Softdev","Lets build unique puzzle game on python",5,2);
INSERT INTO project VALUES (null,"C++game","network","need students with good knowledge of nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.etworks",6,2);
INSERT INTO project VALUES (null,"blogwebsite","cyber","this pLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.roject will make you expert in cybertech",8,3);
INSERT INTO project VALUES (null,"Databuilder","data","Who wants to deal with big data",4,4);
INSERT INTO project VALUES (null,"Content managment system","data","this project is to build a web app",2,5);
INSERT INTO project VALUES (null,"Statwards kids","data","this project is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.to build a web app",3,4);
INSERT INTO project VALUES (null,"trip on roads","other","this project is to build a web app",4,4);
INSERT INTO project VALUES (null,"blender inclusive","other","this project is to build a web app",5,5);
INSERT INTO project VALUES (null,"go golffing app","data","this pLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.roject is to build a web app",6,5);
INSERT INTO project VALUES (null,"farming sytem","network","this pLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.roject is to build a web app",6,6);
INSERT INTO project VALUES (null,"stockmarket plus","network","this project is to build a web app",7,5);
INSERT INTO project VALUES (null,"car zooms","security","this projLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.ect is to build a web app",7,7);
INSERT INTO project VALUES (null,"meeting ready","development","this project is to build a web app",7,2);
INSERT INTO project VALUES (null,"CmsCms","data","this project is to build a web appLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",8,8);
INSERT INTO project VALUES (null,"Hope project","system","this prLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.oject is to build a web app",8,7);

INSERT INTO Papplication VALUES (1,1,"This is a Justification text");
INSERT INTO Papplication VALUES (2,3,"Justification text should look like this");
INSERT INTO Papplication VALUES (3,2,"Justification text that will make me project head");
INSERT INTO Papplication VALUES (4,4,"Justification text should not be very long");
INSERT INTO Papplication VALUES (6,5,"Justification text should not be very short");
INSERT INTO Papplication VALUES (7,6,"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. useless");
INSERT INTO Papplication VALUES (8,6,"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
INSERT INTO Papplication VALUES (3,7,"wiLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.p");
INSERT INTO Papplication VALUES (2,8,"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
INSERT INTO Papplication VALUES (1,9,"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
INSERT INTO Papplication VALUES (9,10,"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
INSERT INTO Papplication VALUES (2,3,"wLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
INSERT INTO Papplication VALUES (9,5,"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
