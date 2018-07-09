<?php
    require_once 'connect.php';
    
	$username = $_POST['loginusername'];
	$password = $_POST['loginpassword'];
	$q_login = $conn->query("SELECT * FROM `user_login` WHERE `username` = '$username' && `password` = '$password'") or die(msqli_error());
	$f_login = $q_login->fetch_array();
	$v_login = $q_login->num_rows;
	if($v_login > 0){
		session_start();
        $_SESSION['admin_id'] = $f_login['user_id'];
		echo '
                    <script type = "text/javascript">
						window.location = "admin/index.php";
					</script>
				';
    }
    else{
        echo '
                    <script type = "text/javascript">
                        alert("Invalid Username and Password");
						window.location = "index.php";
					</script>
				';
    }