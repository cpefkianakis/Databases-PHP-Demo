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
            <a class="navbar-brand" id="nav-bar-text">Databases PHP Demo - Grades Page</a>
            <a id="navbar-items" href="/Databases-PHP-Demo/dbdemo/">
                <i class="fa fa-home "></i> Landing
            </a>
        </div>
    </nav>

    <div class="container">
    <div class="row" id="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="student-form" method="POST">
                <div class="form-group col-sm-3 mb-3">
                    <label class = "form-label">Name</label>
                    <input class = "form-control", placeholder="Enter name", name="name">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label class = "form-label">Surname</label>
                    <input class = "form-control", placeholder="Enter surname", name="surname">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label class = "form-label">Email address</label>
                    <input class = "form-control", placeholder="e.g. you@example.com", name="email">
                </div>
                <button class = "btn btn-primary btn-submit-custom" type="submit" name="submit_creds">Submit</button>
                <button class = "btn btn-primary btn-submit-custom" formaction="index.php">Back</button>
            </form>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <?php
                include 'db_connection.php';
                $conn = OpenCon();
                if(isset($_POST['submit_creds'])){
                    $name = $_POST['name'];
                    $surname = $_POST['surname'];
                    $email = $_POST['email'];

                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        echo '<hr>Invalid email format, please try again';
                    }
                    else{
                        $query = "INSERT INTO students (name, surname, email)
                                VALUES ('$name', '$surname', '$email')";
                        if (mysqli_query($conn, $query)) {
                            //echo "New record created successfully";
                            header("Location: ./students.php");
                            exit();
                        }
                        else{
                            echo "Error while creating record: <br>" . mysqli_error($conn) . "<br>";
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
