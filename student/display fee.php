<?php
session_start();
if (!$_SESSION["LoginStudent"])
{
  header('location:../login/student-login.php');
}
    
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password);

if(!$con)
{
    die("connection to this database failed due to " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="student.css">
    <title>Fee</title>
    <link rel="shortcut icon" href="../Images/fast.png" type="image/x-icon">
</head>

<body>
<style>
 
 /* body{
    color:lightskyblue;
 } */

 sidebar {
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
  }
  
  /* Sidebar links */
  .sidebar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
  }
  
  /* Active/current link */
  .sidebar a.active {
    background-color: #04AA6D;
    color: white;
  }
  
  /* Links on mouse-over */
  .sidebar a:hover:not(.active) {
    background-color: rgb(90, 62, 14);
    color: white;
  }   

  .center {
  margin-left: auto;
  margin-right: auto;
  padding: 10px;
  background-color: lightgray ;
  width: 60%;
}

nav li{
     width: 20%;
     display: inline-block;
     font-size: 24px;
     text-align: center;
 }


nav li a{
     text-decoration: none;
     color: #4b4b4b;
 
 }


nav li a:hover{
    text-decoration: underline;
    background-color: rgb(90, 62, 14);
    }
    
nav{
  position: sticky; 
     padding: 20px;
    background-color: rgb(90, 62, 14);
}

img{
        max-width: 90%;
    }

.main-nav{ 
  display: flex;
   justify-content:right; 
} 


</style>

<nav class="main-nav">
<div class="nav text-center">
        <div class="g-col-6 g-col-md-4">
        <li><a href="student.php"><img src="logo.png"></a></li> 
                <li><a href="../login/logout.php"> <button type="button" class="btn btn-danger">Logout</button></a></li>
           
        </nav>
</div>
</div>

<div class="sidebar">
        <a href="student.php">Dashboard</a>
        <a href="display marks.php">Marks</a>
        <a href="disp_s_attendance.php">Attendance</a>
         <a href="transcript.php">Transcript</a>
         <a href="register course.php">Register course</a>
         <a href="withdraw course.php">Withdraw course</a>
         <a href="display fee.php">Display Fee</a>
         <a href="coursefeedback.php">Send feedback</a>
         <!-- <a href="verifytransaction.php">Verify payment</a> -->
      </div>


    <br>

    <div class="grid text-center">
    <div class="g-col-6 g-col-md-4"> 
    <h3>Your Voucher</h3> 
    <br>
    <table class="center"> 
        <tr>
        <th>Voucher number</th>
        <th>Student ID</th>
        <th>Fee Amount</th>
        </tr>
        <?php
            $sql2 = "select voucher_no,roll_no,fees from eims.voucher;";
            $run1=mysqli_query($con,$sql2);
			while($row1=mysqli_fetch_array($run1)) 
            {
				echo "<tr>";
                echo "<td>".$row1['voucher_no']."</td>";
                echo "<td>".$row1['roll_no']."</td>";
                echo "<td>".$row1['fees']."</td>";
				echo "</tr>";
			}
		?>
    </table>
    <br>
    <br>
    <a href=verifytransaction.php><input class= "btn btn-success" type="submit" value='Verify Fee Transaction'></a>
    <!-- <input class= "btn btn-danger" type="submit"  value="Delete" name="save3" > -->
      </div>
      </div>
  

</body>

</html>