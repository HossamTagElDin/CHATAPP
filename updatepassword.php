

<!doctype html>
<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="chathos";
$mobile="";

 


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


try{
	$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("error in connecting");
}

function getData()
{
	$data = array();
	$data[1]=$_POST['username'];
		

	$data[2]=$_POST['password'];
		

	$data[5]=$_POST['verify'];
		

	return $data;
}
 

 

if(isset($_POST['update'])){
	$info = getData();
		if (strlen($info[2]) >= 8){

		$select_query="SELECT * FROM `user` WHERE `verify` = '$info[5]'";
		$res = mysqli_query($conn, $select_query);
	if ( isset($res)){
	$update_query="UPDATE `user` SET `password`='$info[2]' WHERE username = '$info[1]'";
	try{
		$update_result=mysqli_query($conn, $update_query);
		if($update_result){
			if(mysqli_affected_rows($conn)>0){
				?>
		<script> alert ( " data updated ")</script>
		<?php
				
			}else{
								?>
		<script> alert ( " data not updated ")</script>
		<?php

				
			}
		}
	}catch(Exception $ex){
		echo("error in update".$ex->getMessage());
	}
}}
else
	{
		
	?>
	<script> alert ("error ! choose at least 8 characters password") </script>
	<?php
	}
}

?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<br><br><br><br><br><br><br><br><br><br>
<h1><center>Restore password </center></h1>
<form method="POST" autocomplete="off" align="center">
	<table border="0" width="30%" align="center">
	<tr>	<input type="text" name="verify" placeholder="verify" value="<?php echo("");?>"><br><br>
	</tr>
	<tr>	<input type="text" name="username" placeholder="user name" value="<?php echo("");?>"><br><br>
	</tr>
	<tr>	<input type="text" name="password" placeholder="new password" value="<?php echo("");?>"><br><br>
	</tr>
 
	
	 
	<div>
		
		
		<tr><input type="submit" name="update" value="update password"><br><br>
		</tr>
	</div>
	</table>
</form>

</body>
</html>
 
