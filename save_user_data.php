<?php
	require_once 'connect.php';
	

		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];

		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$username = $email;
		$user_role = "admin";

		$q_checkemail = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'") or die(mysqli_error());
		$v_checkemail = $q_checkemail->num_rows;
		if($v_checkemail == 1)
			{
				echo '
					<script type = "text/javascript">
						alert("Email already used");
						window.location = "index.php";
					</script>
				';
			}
		else
			{
				$q_insertuser = "INSERT INTO `users` VALUES(NULL, '$firstname', '$middlename', '$lastname', '$email', '$gender', '$dob')";
				
				if (mysqli_query($conn, $q_insertuser)) 
				{
					$last_id = mysqli_insert_id($conn);	
					$q_insertlogin = $conn->query("INSERT INTO `user_login` VALUES(NULL, '$last_id', '$username', '$password', '$user_role')") or die(mysqli_error());			
					$q_insertorganisation = $conn->query("INSERT INTO `organisation`(admin_id) VALUES('$last_id')") or die(mysqli_error());			
					session_start();
					$_SESSION['admin_id'] = $last_id;
				}

				

				echo '
					<script type = "text/javascript">
						alert("Saved Record");
						window.location = "admin/index.php";
					</script>
				';
			}
		
