<?php
	include ('conn.php');
	$key=md5 ('kjhjhggojhg');

	function enc ( $string1,$key1)
	{
		$string11 = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,$key1,$string1,MCRYPT_MODE_ECB)));
		return $string11 ;
	}
	function dec ( $string2,$key2)
	{
		$string22 = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$key2,base64_decode($string2),MCRYPT_MODE_ECB));
		return $string22 ;
	}


	session_start();
	if(isset($_POST['msg'])){		
		$msg = addslashes($_POST['msg']);
		$id = $_POST['id'];
		
		$encmsg = enc($msg,$key);

		mysqli_query($conn,"insert into `chat` (chat_room_id, chat_msg, userid, chat_date) values ('$id', '$encmsg' , '".$_SESSION['userid']."', NOW())") or die(mysqli_error());
	}
?>
<?php

	if(isset($_POST['res'])){
		$id = $_POST['id'];
	?>
	<?php
		$query=mysqli_query($conn,"select * from chat left join user on user.userid=chat.userid where chat_room_id='$id' order by chat_date DESC") or die(mysqli_error());

		while($row=mysqli_fetch_array($query)){
	?>	
		<div>
			<?php echo date('h:i A',strtotime($row['chat_date'])); ?><br>
			<?php echo $row['your_name']; ?>: <?php echo dec($row['chat_msg'],$key); ?><br>
		</div>
		<br>
	<?php
		}
	}	
?>
	 <meta http-equiv="refresh" content="30; url=http://localhost/home.php"/> 