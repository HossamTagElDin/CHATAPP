<!DOCTYPE html>
<html>
<head>
<title>ChatApp</title>
<style type="text/css">
.container{
	margin-top: 200px;
}
</style>
</head>
<body>
<div class="container">	
<h1><center>ChatApp</center></h1>
<form method="POST" autocomplete="off" action="login.php">
	<table border="0" width="30%" align="center">
		<tr>
				<td>User Name</td>
 				<td><input type="text" name="username"><td>
 		</tr>
 		<tr>
 			<td>Password</td>
 			<td><input type="password" name="password"></td>
 		</tr>
 		<tr>
 			<td></td>			
 			<td><input type="submit" value="Login"></td>
 		</tr>
 		<tr>
 			<td></td>
 			<td></td>
 		</tr>
 		<tr>
 			<td></td>
			<td><a href="idusnew.php">Forget Password? </a></td>
 		</tr>
 		<tr>
 			<td></td>
 			<td><a href="register.php">Sign Up </a></td>
 		</tr>	
			
			

 	</table>	
 
</form><br>
</div>
<?php
	session_start();
	if (isset($_SESSION['message'])){
	echo $_SESSION['message'];
	unset ($_SESSION['message']);
	}
?>
</body>
</html>