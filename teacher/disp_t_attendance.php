<?php
    session_start();
    if (!$_SESSION["LoginTeacher"])
    {
      header('location:../login/teacher-login.php');
    }
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);
    
    if(!$con)
    {
        die("connection to this database failed due to " . mysqli_connect_error());
    }

    $tid=11;//$_SESSION['LoginTeacher']
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
    <link rel="stylesheet" href="teacher.css">
    <title>Attendance</title>
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
    background-color: darkgreen;
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
    background-color: darkgreen;
    }
    
nav{
  position: sticky; 
     padding: 20px;
    background-color: darkgreen;
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
        <li><a href="teacher.php"><img src="logo.png"></a></li> 
            <li><a href="../login/logout.php"> <button type="button" class="btn btn-danger">Logout</button></a></li>
           
        </nav>
</div>
</div>


<div class="sidebar">
         <a href="teacher.php">Dashboard</a>
         <a href="grading.php">Grading</a>
         <a href="disp_t_attendance.php">Your attendance</a>
         <a href="mark_s_attendance.php">Mark attendance</a>
         <a href="ta request.php">General Queries</a>

      </div>
     
      br><br>
    <div class="grid text-center">
    <div class="g-col-6 g-col-md-4"> 
    <H2>Your attendance</H2>
    <table class="center">
        <tr>
          <th>Teacher ID</th>
          <th>Present</th>
          <th>Absent</th>
          <th>Percentage</th>
        </tr>
        <?php 
			$query="select count(id) as count,sum(attendance) as attendance,T_id, date from eims.teacher_attendance where T_id='$tid'";
			$run=mysqli_query($con,$query);
	        while ($row1=mysqli_fetch_array($run)) { ?>
				<tr>
				<td><?php echo $tid ?></td>
				<td><?php echo $row1['attendance'] ? $row1['attendance'] : "0" ?></td>
			    <td><?php echo $row1['count']-$row1['attendance']?></td>
				<?php if($row1['count'] > 0)
                        {
                            $percent = round(($row1['attendance']*100)/$row1['count'])."%";
                        }
                        else
                        {
                            $percent = "0%";
                        } ?>
				<td> <?php echo $percent; } ?> </td>
				</tr>
      </table> 
<br><br><br>
      

<table class="center ">
        <tr>
            <th>Attendance</th>
            <th>Date</th>
        </tr>
        
            <?php
            $sql = "Select attendance, date from eims.teacher_attendance where T_id = $tid;";
            $run1=mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($run1)) { 
            ?>
            <tr><td><?php
            if($row['attendance'] == '1')
            {
                echo "Present";
            }
            else
            {
                echo "Absent";
            }
            ?></td>
            <td><?php echo $row['date'];}?></td>
            
        </tr>
      </table>
        </div>
        </div>


</body>
</html>