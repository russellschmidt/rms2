<?php
session_start();
if($_SESSION['user'])
{
 //something
} else {
 header("location:index.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{

 $details = mysql_real_escape_string($_POST['details']); //copy text to local var
 $time = strftime("%X"); //current system time
 $date = strftime("%B %d, %Y"); //current system month (B) day (d) year (Y)
 $decision = "no";

 mysql_connect("localhost","unkle6969rusty","69babezBootieBurglar") or die(mysql_error());
 mysql_select_db("rsblog1mysql.russellschmidt.net") or die("Cannot connect to db at this time");
 //the foreach goes through each checkbox and stores them as an array $each_check
 foreach($_POST['public'] as $each_check) //goes through the posts specifically the 'public' field
 {
  if($each_check != null) { //if checked, its not null, so set the $decision variable to yes
   $decision = "yes"; 
  }
 }

 mysql_query("INSERT INTO list (details, date_posted, time_posted, public) VALUES ('$details', '$date', '$time', '$decision')");
 header("location:home.php");
} else {
 header("location:home.php");
}
?>