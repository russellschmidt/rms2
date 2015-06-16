<?php
//checklogin.php
 session_start();
 $username = mysql_real_escape_string($_POST['username']);
 $password = mysql_real_escape_string($_POST['password']);

 mysql_connect("localhost","unkle6969rusty","69babezBootieBurglar") or die(mysql_error());
 mysql_select_db("rsblog1mysql.russellschmidt.net") or die("Cannot connect to db at this time");
 $query = mysql_query("SELECT * from users WHERE username='$username'");
 $exists = mysql_num_rows($query); //holds qty of rows for username in our db (should be 1 or 0)
 $table_users = "";
 $table_password = "";

 if($exists > 0)
 {
  while($row = mysql_fetch_assoc($query)) //takes the row from SQL query and sticks into an array
  {
   $table_users = $row['username'];
   $table_password = $row['password'];
  }
  if(($username == $table_users) && ($password == $table_password)) //if we got a match...
  {
   $_SESSION['user'] = $username; //set the username in a session becoming a global variable 'user'
   header("location: home.php"); //redirects to authenticated home page
  }
  else
  {
   Print '<script>alert("password is incorrect");</script>';
   Print '<script>window.location.assign("login.php");</script>';
  }
 }
 else
 {
  Print '<script>alert("username is incorrect");</script>';
  Print '<script>window.location.assign("login.php");</script>';
 }
 ?>