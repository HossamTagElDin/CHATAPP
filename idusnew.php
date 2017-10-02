

<!doctype html>
<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="chathos";
$mobile="";
$verify= rand();
 


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
	$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("error in connecting");
}
function getData()
{
	$data = array();
	$data[4]=$_POST['mobile'];
	
	
	
	return $data;
}
 

 
if(isset($_POST['update'])){
	$info = getData();
	$update_query="UPDATE `user` SET `verify`='$verify' WHERE mobile = '$info[4]'";
	try{
		$update_result=mysqli_query($conn, $update_query);
		if($update_result){
			if(mysqli_affected_rows($conn)>0){
				echo("the verfication code supposed to be sent in the real life is : ");
				echo ($verify);
				echo nl2br (" \n copy it ,please \n ");
				echo ( " loading the new password page ...."); 
				?>
				
	 <meta http-equiv="refresh" content="20; url=http://localhost/updatepassword.php"/> 	<?php
			
			}else{
				
				?>
	<script> alert ("code did not send ") </script>
	<?php
			}
		}
	}catch(Exception $ex){
		echo("error in update".$ex->getMessage());
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
<h1><center>Forget password </center></h1>
<form method="POST" autocomplete="off"  align="center">
	<table border="0" action="updatepassword.php" width="30%" align="center">
 
	<tr><input type="number" name="mobile" placeholder="mobile" value="<?php echo($mobile);?>"><br><br>
	</tr>
	 
	<div>
		
		
		<tr><input type="submit"  name="update" value="send"><br><br>
		</tr>
	 
	</div>
	</table>
</form>

</body>
</html>
 
