<?php

session_start();
include('conn.php');

if (isset($_POST['btn-signup'])) {
	
	$uname = mysqli_real_escape_string($conn,$_POST['username']);
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$pass  = mysqli_real_escape_string($conn,$_POST['password']);
	$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
	if (strlen($pass) >= 8){
		
		if (mysqli_query($conn,"INSERT INTO user (username,password,your_name,mobile) values ('$uname','$pass','$name','$mobile')")) 
	
	{
	?>
	<script> alert ("Successfuly registerd ") </script>
	<?php
	
	}
	else
	{
		
	?>
	<script> alert ("something wrong ! one of the user name or the mobile is already exists please try another") </script>
	<?php
	
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
	<title>Registeration </title>
	<style type="text/css">
.container{
	margin-top: 200px;
}
	</style>
</head>
<body>
	<div class="container">
	<h1><center>Registeration</center></h1>
	<form method="post" autocomplete="off" >
		<table border="0" width="50%" align="center">
			<tr>
				<td>User Name :</td>
				<td><input type="text" name ="username" required></td>
			</tr>
			<tr>
				<td> Name :</td>
				<td><input type="text" name ="name" required></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name ="password" required></td>  
			</tr>
			<tr>	
			    <td>          </td>
			<td>at least 8 characters</td> </tr>
			<tr>
				<td>Advice   :</td>
				<td> for secure and memorable password please choose a sentence of at least 4 words. it's better if it's not meaningful</td>
			</tr>
			<tr>
				<td>Mobile Number :</td>
				<td><input type="text" name ="mobile" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit"  name="btn-signup" value="register"></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="index.php">Login</a></td>
			</tr>			
		</table>
	</form>
	</div>
</body>
</html>
