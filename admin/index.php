<?php
      
    include '../consume.php';

    session_start();

    if(isset($_POST['login'])){
      

      // Resource Address
      $url = "http://localhost:8088/myNews/api/admin/read.php";

      $data = consume($url);

            // User input
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($data[0]['username'] == $username && $data[0]['password'] == $password){
              // echo "<script>alert('Right Password');</script>";
              $_SESSION['login'] = $username;
              echo "<script type='text/javascript'> window.location.href = 'dashboard.php'; </script>";
            }else{
              echo "<script>alert('Wrong Password');</script>";
            }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>

    <link rel="stylesheet" href="assets/css/login.css">

    <script src = "login.js"></script>
</head>

<body>
<div class="signupSection">
  <div class="info">
    <h2>Halo Admin!</h2>
    <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
    <p>Welcome back</p>
  </div>
  <form method="POST" class="signinForm" name="signinform">
    <h2>Admin Login</h2>
    <ul class="noBullet">
      <li>
        <label for="username"></label>
        <input type="text" class="inputFields" id="username" name="username" placeholder="Username" required/>
      </li>
      <li>
        <label for="password"></label>
        <input type="password" class="inputFields" id="password" name="password" placeholder="Password" required/>
      </li>

      <li id="center-btn">
        <input type="submit" id="join-btn" name="login" alt="Login" value="Login">
      </li>
    </ul>
  </form>
</div>

</body>
</html>