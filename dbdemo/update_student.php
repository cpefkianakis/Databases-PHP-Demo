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
            <a class="navbar-brand" id="nav-bar-text">Databases PHP Demo - Update Student Page</a>
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
                $query = "SELECT s.name, s.surname, s.email FROM students as s WHERE id = $id";
                $res1 = mysqli_query($conn, $query);
                $row = mysqli_fetch_row($res1);

                echo '<div class="form-group col-sm-3 mb-3">';
                    echo '<label class = "form-label">Change information for student: <br><b>' . $row[0] . ' ' . $row[1] . '</b></label>';
                    
                echo '<hr></div>';
            
                
                
            ?>
            <form class="form-horizontal" name="student-form" method="POST">
                
                <div class="form-group col-sm-3 mb-3">
                    <label class = "form-label">New Name</label>
                    <input class = "form-control", name="name", placeholder="Name">

                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label class = "form-label">New Surname</label>
                    <input class = "form-control", name="surname", placeholder="Surname">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label class = "form-label">New Email address</label>
                    <input class = "form-control", name="email", placeholder="email@example.com">
                </div>
                <button class = "btn btn-primary btn-submit-custom" type = "submit" name="submit_upd">Submit</button>
                <button class = "btn btn-primary btn-submit-custom" formaction="students.php">Back</button>

            </form>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <?php
            
                if(isset($_POST['submit_upd'])){
                            
                    $name = $_POST['name'];
                    $surname = $_POST['surname'];
                    $email = $_POST['email'];

                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        echo '<hr>Invalid email format, please try again';
                    }
                    else{
                        $query = "UPDATE students 
                                SET name = '$name', surname = '$surname', email = '$email'
                                WHERE id = $id";
                        if (mysqli_query($conn, $query)) {
                            //echo "Record updated successfully";
                            header("Location: ./students.php");
                            exit();
                        }
                        else{
                            echo "Error while updating record: <br>" . mysqli_error($conn) . "<br>";
                        }
                    }
                    
                }
                
            ?>

        </div>
    </div>
    </div>


    <script src = "{{ url_for('static', filename = 'bootstrap/js/bootstrap.min.js') }}"></script>
    
</body>

</html>
