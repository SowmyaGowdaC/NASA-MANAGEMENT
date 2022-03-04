<?php
		include "connect.php";
		
		if(isset($_POST['btn-login']))
		{		
			$Aun =$_POST['Ausername'];
			$Apw =$_POST['Apassword'];
			session_start();
				$_SESSION["username"]=$Aun;
				$_SESSION["password"]=$Aun;


					$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from admin where Ausername='$Aun' and Apassword='$Apw'")));
					if($one=='1')
					{ 
						echo "<script>
						window.alert('WELCOME $Aun');
						window.location.href='admin.php';
						</script>";
						//header("Location: admin.php");
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
<title>adminlogin
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
<br>


		
					<!--<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Back</a></p> -->
						<center><h1 style="color:black;"style="font-size:300%;">Admin Login</h1>
					
						<form class="form" action="" method="post">
						<fieldset style="float:center;width:200;height:200;"><br><br>
							<input class="name" type="text" placeholder="User Name" name="Ausername" required><br><br>
							<input class="pass" type="Password" placeholder="Password" name="Apassword" required><br><br><br>
							<input class="submit-btn" type="submit" value="SUBMIT" name="btn-login">
							</fieldset>
						</form>
					</center>
				
			
</body>
</html>
</html>