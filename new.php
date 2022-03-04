<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en"> 
<head>	
<?php
//Turn off
error_reporting(0);
  include "Head.php";
  ?>
<style>
html, body{
  min-height: 100%;
}
body{
  position: relative;
	background-color: rgb(113, 113, 113);
}
.page{
	
  position: absolute;
  top: 50%;
  left: 5%;
  width: 90%;
  height: auto;
  z-index: 10;
  
	background-color:white;
}
div.gallery {
    margin: 15px;
    border: 0px solid #ccc;
    float: center;
    width: 400px;
	background-color:#2a2a2a;
}

div.gallery:hover {
    border: 3px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}



.image {
  display: block;
  width: 100%;
  height: auto;
}
.gallery{
  position: relative;
  width: 30%;
}

tr.noBorder td {
  border: 0;
}

.gallery:hover {
  opacity: 0.8;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
</style>
</head>
<body>
	
	<?php
//Turn off
error_reporting(0);
  include "AHeader.php";
  
	if(isset($_POST['search']))
	{
		$txtstartdate=$_POST['txtstartdate'];
		$txtenddate=$_POST['txtenddate'];
		$query=mysqli_query($mysqli,"Select name from visitors where datetime between '$txtstartdate' and '$txtenddate' order by datetime");
		$count=mysqli_num_rows($query);
	}	
		
  
  ?>
<br/>
<div class="container" align="center">
			<div class="row">
				<div class="contact2-caption clearfix">
					<div class="contact2-heading text-center">
						<h2>Visitor Details</h2>
						<form mehtod="post">
	
                        <input type="date" name="txtstartdate">
						<input type="date" name="txtenddate">
						<p>
						<input type="submit" name="search" value="search visitors">
						</P>
						<?php
							if($count == "0")
							{
								echo "no visitors found";
							}
							else
							{
									while($row = mysqli_fetch_array($query)){
										$result=$row['name'];
										$output="<h1>".result."</h1>";
										echo $output;
										
										
										
							}
						?>	
							
						</form>

					</div>	
				</div>
			</div>	
	<?php
//Turn off
error_reporting(0);
  include "Footer.php";
  ?>
</body>
</html>