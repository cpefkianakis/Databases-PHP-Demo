<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>
        Databases PHP Demo
    </title>
    <link rel = "stylesheet" href = "css/styles.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel = "stylesheet" href = "bootstrap/css/bootstrap.min.css">
    

</head>


<body>
    <nav class="navbar navbar-light navbar-expand-md" id="nav-bar">
        <div id="navbar-div" class="container-fluid">
            <a class="navbar-brand" id="nav-bar-text">Databases PHP Demo - Landing Page</a>
            <a id="navbar-items" href="/Databases-PHP-Demo/dbdemo/">
                <i class="fa fa-home "></i> Landing
            </a>
        </div>
    </nav>

    <div class="container" id="row-container">
        <div class="row" id="row">
            <div class="col-md-4">
                <div class="card" id="card-container-layout">
                    <div class="card-body" id="card">
                        <h4 class="card-title">View Students</h4>
                        <p class="card-text" id="paragraph">Simple Query to database to show all students</p>
                        <a class="btn btn-primary" id="show-btn" href="/Databases-PHP-Demo/dbdemo/students.php">Show</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" id="card-container-layout">
                    <div class="card-body" id="card">
                        <h4 class="card-title">View Grades</h4>
                        <p class="card-text" id="paragraph">Simple Query to database to show students' grades<br></p>
                        <a class="btn btn-primary" id="show-btn" href="/Databases-PHP-Demo/dbdemo/grades.php">Show</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" id="card-container-layout">
                    <div class="card-body" id="card">
                        <h4 class="card-title">Create Student</h4>
                        <p class="card-text" id="paragraph">Enter a new student into the database<br></p>
                        <a class="btn btn-primary" id="show-btn" href="/Databases-PHP-Demo/dbdemo/create_student.php">Create</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="row-2">
            <div class="col-md-6">
                <div class="card" id="card-container-layout">
                    <div class="card-body" id="card">
                        <h4 class="card-title">Best Dribbling Grade</h4>
                        <p class="card-text" id="paragraph">
                            <?php
                                include 'db_connection.php';
                                $conn = OpenCon();

                                $query = "SELECT g.grade, s.name, s.surname 
                                        FROM students s INNER JOIN grades g ON g.student_id = s.id 
                                        WHERE g.course_name = 'DRI' 
                                        ORDER BY g.grade DESC LIMIT 1";
                                $result = mysqli_query($conn, $query);
                                if($best_dribbling_grade = mysqli_fetch_row($result)){
                                    echo 'The best Dribbling grade is ' . $best_dribbling_grade[0] . ' and belongs to ' . $best_dribbling_grade[1] . ' ' . $best_dribbling_grade[2];
                                }
                                else{
                                    echo 'There does not exist a student with a Dribbling Grade';
                                }

                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" id="card-container-layout">
                    <div class="card-body" id="card">
                        <h4 class="card-title">Best Shooting Grade</h4>
                        <p class="card-text" id="paragraph">
                            <?php
                                
                                $query = "SELECT g.grade, s.name, s.surname FROM students s INNER JOIN grades g ON g.student_id = s.id WHERE g.course_name = 'SHO' ORDER BY g.grade DESC LIMIT 1";
                                $result = mysqli_query($conn, $query);
                                if($best_shooting_grade = mysqli_fetch_row($result)){
                                    echo 'The best Shooting grade is ' . $best_shooting_grade[0] . ' and belongs to ' . $best_shooting_grade[1] . ' ' . $best_shooting_grade[2];
                                }
                                else{
                                    echo 'There does not exist a student with a Shooting Grade';

                                }

                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src = "{{ url_for('static', filename = 'bootstrap/js/bootstrap.min.js') }}"></script>
    
</body>

</html>
