<?php
		include "connect.php";
		
		if(isset($_POST['btn-login']))
{		
		
		$Emailid =$_POST['Emailid'];
		session_start();
					$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from visitors where Emailid='$Emailid'")));
					if($one=='0')
					{
						$Name =$_POST['Name'];
						$Phoneno =$_POST['Phoneno'];
						$Adhar =$_POST['Adhar'];	
						$Address =$_POST['Address'];
						$Occupation =$_POST['Occupation'];
						$Purpose =$_POST['Purpose'];
						$Admin_ID = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select ID from admin where Ausername='admin' and Apassword='admin'")));
						
						if ($mysqli->query("INSERT into visitors(Name,Phoneno,Adhar,Emailid,Address,Occupation,Purpose,Admin_ID) values ('$Name','$Phoneno','$Adhar','$Emailid','$Address','$Occupation','$Purpose','$Admin_ID')") === TRUE)
						{
							$_SESSION["Vname"]=$Name;
							$_SESSION["VEmailid"]=$Emailid;
							echo "<script>
								window.alert('$Name - WELCOME TO NASA');
								window.location.href='index.php';
								</script>";
							//header("Location: index.php");
						}
						else{
								echo '<script language="javascript">';
								echo 'alert("Error to Connect please Try after sometime")';
								echo '</script>';
						
							$err = "Error to Connect please Try after sometime";
						}
					}
					else
					{
						echo '<script language="javascript">';
						echo 'alert("Your Login Name exsist. Click on Log In")';
						echo '</script>';
						$err = 'Your Login Name exsist. Click on --><a href="VisitorLogin.php">Log In</a>';
					}
}
?>


<html> 
<head>
<style>
body{
 background-color: #3a9dca;
}
</style>
</head>
<body>
<?php
//Turn off
error_reporting(0);
  include "Break.php";
  ?>
<!-- contact section starts here -->
	<section style="position: absolute; width: 100%; height: 790px; margin-top: 0px; left: 0; margin-top: -830px;" id="visitor">
	<center><h1 style="color:black;"style="font-size:100%;">Visitor Sign In</h1>				
	<form class="form" action="" method="post">
	
						
					
							<center><font size="3"><?php echo @$err;?></font></center>
						<form class="form" action="" method="post">
						<fieldset style="float:center;width:400;height:500;"><br><br>
							<input class="name" type="text" placeholder="Name" name="Name" required><br><br>
							<input class="phone" type="number" placeholder="Phone Number" name="Phoneno" required><br><br>
							<input class="Adhar" type="text" placeholder="Adhar/Passport Number" name="Adhar" required><br><br>
							<input class="email" type="email" placeholder="Email" name="Emailid" required><br><br>
							<textarea class="address" id="message" cols="30" rows="10" placeholder="Address" name="Address" required></textarea><br><br>
							<input class="Occupation" type="text" placeholder="Occupation" name="Occupation" required><br><br>
							<input class="Purpose" type="text" placeholder="Purpose" name="Purpose" required><br><br><br>
							<input class="submit-btn" type="submit" value="SUBMIT" name="btn-login">
							</fieldset>
						</form>
						</form>
						</form>	
	</section>
<!-- end of contact section -->
<?php
 include "Footer.php";
 ?>
</body>
</html>