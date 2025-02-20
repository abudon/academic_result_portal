<?php
include("connect.php");
$sql = "select * from students where reg_num = '$_SESSION[login_user]'";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);
if($count == 1){
    while ($row = $result->fetch_assoc()){
        $file_path =$row['result_path'];

    }
}

?>




<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1E9C43; color: white;">

  <a class="navbar-brand" href="login.php">Results</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="backend/result/download.php?result=<?php echo urlencode($file_path); ?>" >Download Result Here</a>
      </li>
      <!-- <li class="nav-item">
        <button class="nav-link" onclick="savePDF()" >Generate PDF</button>        
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="login.php">Log Out</a>
      </li>
    </ul>
  </div>

</nav>
