<!DOCTYPE html>
<html>
<head>
 <title>Post edit</title>
 <!-- standard browser window css -->

 <link rel="stylesheet" href="style/steez.css" type="text/css"> 

</head>
<?php
session_start();
if($_SESSION['user']){
 //is user logged in
} else {
 header("location:index.php");
}
$user = $_SESSION['user'];
?>
<body>
 <nav>
  <div class="topnav">
   <p><a href="logout.php">Log Out</a>&nbsp;|&nbsp;<a href="home.php">Home</a></p>
  </div>
 </nav>

 <div>
  <header>
    <h6><span>Edit<span></h6>
  </header>
 </div>

 <div>
  <h2>Current Selection</h2>
  <table>
    <tr>
     <th>ID</th>
     <th>Details</th>
     <th>Post Time</th>
     <th>Edit time</th>
     <th>Public Post</th>
    </tr>
    <?php
     if(!empty($_GET['id'])) //make sure the id is NOT ! empty (execute if 'not empty' is true)
      $id = $_GET['id'];
     $_SESSION['id'] = $id;
     $id_exists = true;
     mysql_connect("localhost","unkle6969rusty","69babezBootieBurglar") or die(mysql_error());
     mysql_select_db("rsblog1mysql.russellschmidt.net") or die("Cannot connect to db at this time");
     $query = mysql_query("SELECT * from list WHERE id='$id'");
     $count = mysql_num_rows($query);
     if($count > 0) {
      while($row = mysql_fetch_array($query)) {
       // print the output
       Print "<tr>";
        Print '<td>'.$row['id']."</td>";
        Print '<td>'.$row['details']."</td>";
        Print '<td>'.$row['date_posted'].' - '.$row['time_posted']."</td>";
        Print '<td>'.$row['date_edited'].' - '.$row['time_edited']."</td>";
        Print '<td>'.$row['public']."</td>";
       Print "</tr>";
      }
     } else {
      $id_exists = false;
     }
     print "test -1 ".$id;
    ?>
  </table>
  <?php
   if($id_exists){
    Print '
     <form action="edit.php" method="POST">
      <label>Enter new detail</label>
      <input type="text" name="details" />
      
      <label>Public post?</label>
      <input type="checkbox" name="public[]" value="yes" />

      <input type="submit" value="Update Post" />
     </form>
    ';
   } else {
    Print '<h2>There is no data to be edited</h2>';
   }
   print "test 0 ".$id;
  ?>
</body>
</html>
<?php
 print "test 1 ".$id;
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
  //mysql_connect("localhost","unkle6969rusty","69babezBootieBurglar") or die(mysql_error());
  //mysql_select_db("rsblog1mysql.russellschmidt.net") or die("Cannot connect to db at this time");
  $details = mysql_real_escape_string($_POST['details']);
  $public = "no";
  $id = $_SESSION['id'];
  $time = strftime("%X");
  $date = strftime("%B %d, %Y");

  print "test 2 ".$id; //what is going on with the $id variable
     
  foreach ($_POST['public'] as $list)
   {
    if($list != null)
     {
      $public = "yes";
     }
   }
   mysql_query("UPDATE list SET details='$details', public='$public', date_edited='$date', time_edited='$time' WHERE id='$id'");     
   header("location:home.php");
 }
?>