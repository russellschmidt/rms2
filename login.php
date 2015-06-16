<!DOCTYPE html>
<html>
<head>
 <title>Rs Login</title>
 <!-- standard browser window css -->

 <link rel="stylesheet" href="style/steez.css" type="text/css"> 

</head>
<body>
 <div>
  <header>
   <h6><span>Russell Schmidt<span></h6>
  </header>
 </div>

 <div id="loginForm">
  <h2>Log In</h2>
  <a href="index.php">Click here to go back</a>
  <form action="checklogin.php" method="POST">
    <p>
      <label>Username</label>
      <input type="text" name="username" required="required" placeholder="Sally123"/>
    </p>
    <p>
      <label>Password</label>
      <input type="password" name="password" required="required" placeholder="MySecret" />
    </p>
    <p>
      <input type="submit" value="Login" />
    </p>
  </form>

 </div>

</body>
</html>