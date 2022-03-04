<?php
		include "connect.php";
		
		if(isset($_POST['btn-login']))
{		
		$Emailid=$_POST['Emailid'];
		session_start();
					$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from visitors where Emailid='$Emailid'")));
					if($one=='1')
					{
						$query = "select Name,Emailid from visitors where Emailid='$Emailid'";
						$result = mysqli_query($mysqli, $query);
						$row = mysqli_fetch_array($result);
						$a=$row['Name'];
						$b=$row['Emailid'];
						$_SESSION["Vname"]=$a;
						$_SESSION["VEmailid"]=$b;
							echo "<script>
								window.alert('$a - WELCOME TO NASA');
								window.location.href='index.php';
								</script>";
						//header("Location:index.php");
					}
					else
					{
						echo '<script language="javascript">';
								echo 'alert("Your Login Name Not exsist. Click on Sign-In")';
								echo '</script>';
						$err ='Your Login Name Not exsist. Click on ---><a href="Visitors.php">Sign-In</a>';
					}
}
?>
				
<html> 
<head>
<title>visitors login	
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
	<section style="position: absolute; width: 100%; height: 365px; margin-top: 0px; left: 0; margin-top: -830px;">
		<center><h1 style="color:black;"style="font-size:300%;">Visitor Login</h1>				
	<form class="form" action="" method="post">
	<fieldset style="float:center;width:200;height:200;"><br><br>
							<center><font size="3"><?php echo @$err;?></font></center>
						<form class="form" action="" method="post">
							<input class="name" type="email" placeholder="Email id" name="Emailid" required><br><br><br><br>
							<input class="submit-btn" type="submit" value="SUBMIT" name="btn-login">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!-- end of contact section -->
</body>
</html>