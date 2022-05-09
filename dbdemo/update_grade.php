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
            <a class="navbar-brand" id="nav-bar-text">Databases PHP Demo - Update Grade Page</a>
            <a id="navbar-items" href="/Databases-PHP-Demo/dbdemo/">
                <i class="fa fa-home "></i> Landing
            </a>
        </div>
    </nav>

    <div class="container">
    <div class="row" id="row">
        <div class="col-md-12">
            <?php

                include 'db_connection.php';
                $conn = OpenCon();
                $id = $_GET['id'];
                $grade_id = $_GET['grade_id'];
                $query = "SELECT g.course_name, g.grade, s.name, s.surname
                        FROM grades as g, students as s 
                        WHERE s.id = $id AND g.id = $grade_id";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_row($result);

                echo '<div class="form-group col-sm-3 mb-3">';
                    echo '<label class = "form-label" >Change <b>' . $row[0] . ' </b>(' . $row[1] . ') grade for student: <br><b>' . $row[2] . ' ' . $row[3] . '</b></label>';
                    
                echo '<hr ></div>';
            
                
                
            ?>
            <form class="form-horizontal" name="student-form" method="POST">
                
                <div class="form-group col-sm-3 mb-3">
                    <label class = "form-label">New Grade</label>
                    <input class = "form-control", name="grade", placeholder="e.g. 85">
                </div>
                <button class = "btn btn-primary btn-submit-custom" type = "submit" name="submit_upd">Submit</button>
                <button class = "btn btn-primary btn-submit-custom" formaction="grades.php">Back</button>

            </form>
    </div>
    </div>
</div>

    <?php
        
        if(isset($_POST['submit_upd'])){
                    
            $grade = $_POST['grade'];
            $query = "UPDATE grades 
                    SET grade = '$grade'
                    WHERE id = $grade_id";
            if (mysqli_query($conn, $query)) {
                //echo "Record updated successfully";
                header("Location: ./grades.php");
                exit();
            }
            else{
                echo "Error while updating record: <br>" . mysqli_error($conn) . "<br>";
            }
        }
        
    ?>


    <script src = "{{ url_for('static', filename = 'bootstrap/js/bootstrap.min.js') }}"></script>
    
</body>

</html>