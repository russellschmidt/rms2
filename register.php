<!DOCTYPE html>
<html>
<head>
 <title>RS Register</title>
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
  <h2>Register</h2>
  <a href="index.php">Click here to go back</a>
  <form action="register.php" method="POST">
    <p>
      <label>Username</label>
      <input type="text" name="username" required="required" placeholder="Sally123"/>
    </p>
    <p>
      <label>Password</label>
      <input type="password" name="password" required="required" placeholder="MySecret" />
    </p>
    <p>
      <input type="submit" value="Register" />
    </p>
  </form>
 </div>

 <?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $bool = true;

    //connect to the server
    mysql_connect("localhost","unkle6969rusty","69babezBootieBurglar") or die(mysql_error()); 

    mysql_select_db("rsblog1mysql.russellschmidt.net") or die("Cannot connect to db"); //conect to your db
    $query = mysql_query("SELECT * from users"); //query the user table 
    while($row = mysql_fetch_array($query)) //display all the rows from the query
    {
      //check the user table row by row against all the user names, alerts user if name already taken
      $table_users = $row['username']; 
      if($username == $table_users)
      {
        $bool = false;
        Print '<script>alert("That username has been taken!");</script>';
        Print '<script>window.location.assign("register.php");</script>';
      }
    }

    // checking to do
    // make sure length is <= 63 chars. make sure we hit a minimum length. encrypt the password.

    if($bool) //if the name ISNT taken, put it in your user table
    {
      mysql_query("INSERT INTO users (id, username, password) VALUES (NULL, '$username','$password')");
      Print '<script>alert("Successfully Registered!");</script>';
      Print '<script>window.location.assign("register.php");</script>';
    }
  }
 ?>

</body>
</html>