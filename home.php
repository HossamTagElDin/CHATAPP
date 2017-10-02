<?php
	include('conn.php');
	session_start();
	if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')) {
	header('location:index.php');
    exit();
	}
 
	$uquery=mysqli_query($conn,"select * from `user` where userid='".$_SESSION['userid']."'");
	$urow=mysqli_fetch_assoc($uquery);
?>
<!DOCTYPE html>
<html>
<head>
<title>Simple Chat using PHP/MySQLi, Ajax/JQuery</title>
</head>
<style type="text/css">
</style>
<body>
<div>
	<h4><center>Welcome, <?php echo $urow['your_name']; ?> <a href="logout.php">Logout</a></center></h4>
	<?php
		$query=mysqli_query($conn,"select * from `chat_room` ");
		while($row=mysqli_fetch_array($query)){
			?>
				<form autocomplete="off" >
				<div>
				<center><h2>Chat Room Name: <?php echo $row['chat_room_name']; ?></h2></center><br><br>
				</div>
	
				<div id="result" align="center" style="overflow-y:scroll; height:300px;"></div>
				<div id="forma">
				<form>
					<center><input type="text" id="msg"></center>
					<center><input type="hidden" value="<?php echo $row['chat_room_id']; ?>" id="id"></center>
					<center><button type="submit" id="send_msg">Send</button></center>
				</form>
				</div>
				</form>
			<?php
		}
	?>
</div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type = "text/javascript">
 
	$(document).ready(function(){
	displayResult();
	/* Send Message	*/	
 
		$('#send_msg').on('click', function(){
			if($('#msg').val() == ""){
				alert('Please write message first');
			}else{
				$msg = $('#msg').val();
				$id = $('#id').val();
				$.ajax({
					type: "POST",
					url: "send_message.php",
					data: {
						msg: $msg,
						id: $id,
					},
					success: function(){
						displayResult();
					}
				});
			}	
		});
	/*****	*****/
	});
 
	function displayResult(){
		$id = $('#id').val();
		$.ajax({
			url: 'send_message.php',
			type: 'POST',
			async: false,
			data:{
				id: $id,
				res: 1,
			},
			success: function(response){
				$('#result').html(response);
			}
		});
	}
 
</script>
</body>
</html>