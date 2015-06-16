<!DOCTYPE html>
<html>
<head>
 <title><?php echo $_SESSION['user']; ?></title>
 <!-- standard browser window css -->

 <link rel="stylesheet" href="style/steez.css" type="text/css"> 

</head>
<?php
session_start();
if($_SESSION['user']) //if a user is logged in
{
 // do something
} else {
 header("location: index.php"); //redirect to login
}
$user = $_SESSION['user']; //puts the username into a local variable from global 'user' session variable
?>
<body>
 <nav>
  <div class="topnav">
   <p><a href="logout.php">Log Out</a></p>
  </div>
 </nav>

 <div>
  <header>
   <h6><span><?php echo "Hello, ".$user; ?><span></h6>
  </header>
 </div>

 <div>
  <form action="add.php" method="POST">
   <label>Add More to List</label>
   <input type="text" name="details" />
   <label>Public Post?</label>
   <input type="checkbox" name="public[]" value="yes" />
   <input type="submit" value="Add to list" />
  </form>
 </div>

 <div>
  <h2>Posts</h2>
  <table>
    <tr>
     <th>ID</th>
     <th>Details</th>
     <th>Post Time</th>
     <th>Edit time</th>
     <th>Edit</th>
     <th>Delete</th>
     <th>Public Post</th>
    </tr>

    <?php
      mysql_connect("localhost","unkle6969rusty","69babezBootieBurglar") or die(mysql_error());
      mysql_select_db("rsblog1mysql.russellschmidt.net") or die("Cannot connect to db at this time");
      $query = mysql_query("SELECT * from list");
      while($row = mysql_fetch_array($query))
      {
       Print "<tr>";
        Print '<td>'.$row['id'].'</td>';
        Print '<td>'.$row['details'].'</td>';
        Print '<td>'.$row['date_posted'].'-'.$row['time_posted'].'</td>';
        Print '<td>'.$row['date_edited'].'-'.$row['time_edited'].'</td>';
        Print '<td><a href="edit.php?id='.$row['id'].'">edit</a></td>';
        Print '<td><a href="delete.php?id='.$row['id'].'">delete</a></td>';
        Print '<td>'.$row['public'].'</td>';
       Print "</tr>";
      }
      ?>

  </table>
 </div>

</body>
</html>
