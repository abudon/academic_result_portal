<?php
$status="";
require 'connect.php';
session_start();
if ($_SESSION['login_user'] == null){
    header("Location: login.php");
}else {

    if (isset($_GET['reg_num'])) {
        $sql = "SELECT * FROM students WHERE reg_num='$_GET[reg_num]'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            while ($row = $result->fetch_assoc()) {
                $reg_num = $row["reg_num"];
                $name = $row["name"];
                $class_id = $row["class_id"];
                $term_id = $row["term_id"];

            }


        }
    }
}

?>

<style>
    .heading {
        font-size: 22px;
        font-weight: 600;
    }

    nav button {
        background-color: transparent;
        border: none;
        outline: none;
    }

    @media print {
        nav {
            display: none;
        }

        .res_top .row {
            background-color: transparent !important;
        }

        .student_name {
            background-color: transparent !important;
        }

        .student_details h4 {
            color: rgb(255, 255, 255) !important;
        }

        tr {
            color: black !important;
        }
    }
</style>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--FONTAWESOME CSS-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <title>Results</title>
</head>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <?php include 'header.php'; ?>
    <!---result table-->
    <section class="index" id="index">
        <div class="container" style="padding-bottom:45px;">
            <div class="row" style="padding-top:25px"></div>
            <div class="row" style="padding-top:25px">
                <div class="col-md-12 res_top" style="padding:20px; border:1px solid #1E9C43">
                    <div class="row" style="background-color:#000000 ;">
                        <div class="col-md-6 student_name"
                            style="background-color:#1E9C43;  border-right:0.5px solid #1E9C43; color: white; display:flex; align-items:center;">
                            <h3 style="color:black; font-weight:600">Student's Name: <?php echo $name; ?></h3>
                        </div>
                        <div class="col-md-6 student_details">
                            <h4 style="font-weight:600; color:rgb(255,255,255);">Registration Number: <?php echo $reg_num; ?></h4>
                            <h4 style="font-weight:600; color:rgb(255,255,255);">Class: <?php
                                require 'connect.php';
                                if(isset($_GET['reg_num']))
                                {    
                                    
                                    $sql = "SELECT * from class WHERE id='$class_id'";
                                    $result = $conn->query($sql);    
                                    $count = mysqli_num_rows($result);
                                    if($count == 1)
                                    {
                                        while($row = $result->fetch_assoc()) {
                                            $class_name=$row["class_name"];
                                            echo $class_name;
                                        }
                                    }
                                }
                            ?></h4>
                            <h4 style="font-weight:600; color:rgb(255,255,255);">Examination: <?php
                                require 'connect.php';
                                if(isset($_GET['reg_num']))
                                {    
                                    
                                    $sql = "SELECT * from term WHERE id='$term_id'";
                                    $result = $conn->query($sql);    
                                    $count = mysqli_num_rows($result);
                                    if($count == 1)
                                    {
                                        while($row = $result->fetch_assoc()) {
                                            $term_name=$row["term_name"];
                                            echo $term_name;
                                        }
                                    }
                                }
                            ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:50px;">
                <div class="col-md-12" style=" padding-left:0px; padding-right:0px;">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background-color: black; color: white;">
                                <th scope="col">Grade</th>
                                <th scope="col">Examination Term</th>
                                <th scope="col">Download File</th>
                            </tr>
                        </thead>

                    </table>
                    <?php if (isset($file_path)): ?>
                        <iframe src="<?php echo "backend/result/".$file_path; ?>" style="width: 100%; height: 1000px;" ></iframe>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row" style="padding-top:20px;">
                <div class="col-md-12">

                </div>
            </div>
            <div class="row" style="padding-top:25px"></div>

            
    </section>
</body>

</html>
