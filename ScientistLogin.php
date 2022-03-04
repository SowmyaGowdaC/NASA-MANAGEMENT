<?php
		include "connect.php";
		
		if(isset($_POST['btn-login']))
{		
		$un =$_POST['Usernameorid'];
		$pw =$_POST['Password'];
		session_start();
		
					$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from scientist where Usernameorid='$un' and Password='$pw'")));
					if($one=='1')
					{
						$query = "select Fname,Lname from scientist where Usernameorid='$un'";
						 $result = mysqli_query($mysqli, $query);
						 $row = mysqli_fetch_array($result);
							$a = $row['Fname'];
							$b = $row['Lname'];
							$_SESSION["SFname"]=$a;
							$_SESSION["SLname"]=$b;
							echo "<script>
							window.alert('WELCOME $a $b');
							window.location.href='Scientist.php';
							</script>";
					}
					else
					{
						echo '<script language="javascript">';
						echo 'alert("Invalid Username or Password")';
						echo '</script>';
					}
}
?>
				

<html> 
<head>
<title>scientist login
</title>		
</head>
<style>
body{
 background-color: #3a9dca;
}
 </style>
<body>
<br>
<br>
<br>
<br>
<?php
//Turn off
error_reporting(0);
  //include "Header.php";
  include "Break.php";
  ?>
	<!-- contact section starts here -->
	<section style="position: absolute; width: 100%; height: 410px; margin-top: 0px; left: 0; margin-top: -830px;">	
	<center><h1 style="color:black;"style="font-size:600%;">Scientist Login</h1>				
	<form class="form" action="" method="post">
	<fieldset style="float:center;width:200;height:200;"><br><br>
					
					
							<center><font size="3"><?php echo @$err;?></font></center>
						<form class="form" action="" method="post">
							<input class="name" type="text" placeholder="User Name" name="Usernameorid" required><br><br>
							<input class="pass" type="Password" placeholder="Password" name="Password" required><br><br><br>
							<input class="submit-btn" type="submit" value="SUBMIT" name="btn-login">
						</form>
					</fieldset>
					</center>
				
	</section><!-- end of contact section -->
</body>
</html>