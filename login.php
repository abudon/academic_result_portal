<?php
require 'connect.php';
session_start();
$error="";

if(isset($_POST['submit']))
{ 
    $sql = "SELECT * FROM students WHERE reg_num='$_POST[reg_num]' AND  password = '$_POST[password]'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        $_SESSION['login_user'] = $_POST['reg_num'];
      header("location: index.php?reg_num=" . $_POST['reg_num']);
    }
    else{
      $error = "Account not found. Please try again.";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--main css-->
  <link rel="stylesheet" href="main.css">

  <title>My Results</title>
</head>

<body>
  <section class="login">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6 left">
                    <img src="">
                    <p class="heading">My Results</p>
                    <p class="sub-heading ">Enter your Registration Number and Password to find out your result.</p>
                </div>
                <div class="col-md-6 right">
                    <div class="login_card">
                        <form method="post" action="">
                          <div class="form-row">
                            <h3>Results Login</h3>
                          </div>
                          <div class="form-row">
                            <label>Enter Reg Number</label>
                            <input name="reg_num"  class="form-control"  type="text"  />
                              <label>Enter Password</label>
                              <input name="password"  class="form-control"  type="password"  />
                            <small class="text-danger" style="padding-top: 0.5em"><?php echo $error?></small>
                          </div>
                          <div class="form-row">
                            <button name="submit" type="submit">LOGIN</button>
                          </div>
                            </form>
                        <div class="form-row">
                            <button onclick="redirect()">TEACHERS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <!-- Optional JavaScript -->
  <script>
      function redirect() {
            window.location.assign('backend/login.php');
      }
  </script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>