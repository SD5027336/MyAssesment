<?php
	require('connection.php');
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$query = "SELECT `id`,`email` FROM `user` WHERE `email` = '$email'";
		$sql = mysqli_query($db,$query);
		$fetch = mysqli_fetch_assoc($sql);
		$row = mysqli_num_rows($sql);
		if($row > 0){
			$id = $fetch['id'];
			echo "<script>alert('You are visitor number ".$id."')</script>";
		}
		else{
			$q = "INSERT INTO `user` (email) VALUES ('$email')";
			$s = mysqli_query($db,$q);
			$result = "SELECT `id`,`email` FROM `user` WHERE `email` = '$email'";
			$output = mysqli_query($db,$result);
			$fetch1 = mysqli_fetch_assoc($output);
			$id = $fetch1['id'];
			echo "<script>alert('You are visitor number ".$id."')</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="email">
		<input type="submit" name="submit">
	</form>
</body>
</html>