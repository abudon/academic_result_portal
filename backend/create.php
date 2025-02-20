<?php

require "connect.php";
session_start();
$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "insert into teachers(username, password) values ('$username', '$password')";
    if ($conn->query($sql) === true) {
        $msg= 'User created successfully';
    } else {
       $msg= 'Error creating user: ' . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<style>
    .heading {
        font-size: 22px;
    }

    .row {
        padding-top: 20px;
        padding-bottom: 20px;
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

    <title>Results</title>
</head>

<body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<?php include 'header.php' ?>

<div class="container" style="margin-top:50px;">
    <p class="heading" style="margin:0 auto;"><?php echo $msg; ?></p>
    <p class="heading">Add Teacher</p>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
            </div>
            <div class="col-md-6">
                <label for="name">Password</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Password" name="password">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                </div>
        </div>
    </form>
</div>
