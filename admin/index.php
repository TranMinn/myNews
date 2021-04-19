
<?php
  if(isset($_POST['submit'])){
    require "dashboard.php";
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
  <form action="#" method="POST" class="signupForm" name="signupform">
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
        <input type="submit" id="join-btn" name="submit" alt="Join" value="Login">
      </li>
    </ul>
  </form>
</div>

</body>
</html>