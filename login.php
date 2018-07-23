<?php
require_once('db.php');
$db = new db();
	/*require_once('../onlinevoting/const.php');
	require_once(ROOT . '/model/user_login.php');
	require_once(ROOT . '/model/user.php');
	require_once(ROOT . '/model/voter.php');

    require_once 'connect.php';
    
	$username = $_POST['loginusername'];
	$password = $_POST['loginpassword'];
	$user_login = new user_login();
	$user_login->getCandidateByUsernameAndPassword($username, $password);
	if($user_login->user_login_id != null){
		session_start();
		$_SESSION['user_id'] = $user_login->user_id;
		$_SESSION['role'] = $user_login->user_role_id;
		$user = new user();
		$user->getUserByID($user_login->user_id);
		$_SESSION['name'] = $user->f_name . " " . $user->m_name . " " . $user->l_name;
		$land_page = 'admin/index.php';
		if($user_login->user_role_id == 'voter') {
			$land_page = 'voter/index.php';
		}
		echo '
                    <script type = "text/javascript">
						window.location = "' . $land_page .'";
					</script>
				';
	} else{
        echo '
                    <script type = "text/javascript">
                        alert("Invalid Username and Password");
						window.location = "index.php";
					</script>
				';
	}*/
	$username = $_POST['loginusername'];
	$password = $_POST['loginpassword'];
	$sql = "SELECT * FROM `user_login` WHERE `username` = '$username' && `password` = '$password'";
	echo $sql;
	$q_login = mysql_query($sql) or die(msqli_error());
	$f_login = mysql_fetch_array($q_login);
	$v_login = mysql_num_rows($q_login);
	if($v_login > 0){
		session_start();
		$_SESSION['user_id'] = $f_login['user_id'];
		$_SESSION['role'] = $f_login['user_role_id'];
		$q_user_login = mysql_query("SELECT * FROM `users` WHERE `user_id` = '" . $f_login['user_id'] ."'") or die(msqli_error());
		$f_user_login = mysql_fetch_array($q_user_login);
		$v_user_login = mysql_num_rows($q_user_login);
		if($v_user_login > 0){
			$_SESSION['name'] = $f_user_login['f_name'] . " " . $f_user_login['m_name'] . " " . $f_user_login['l_name'];
		}
		$land_page = 'admin/index.php';
		if($f_login['user_role_id'] == 'voter') {
			$land_page = 'voter/index.php';
		}
		echo '
                    <script type = "text/javascript">
						window.location = "' . $land_page .'";
					</script>
				';
    }
    else{
        echo '
                    <script type = "text/javascript">
                        alert("Invalid Username or Password");
						window.location = "index.php";
					</script>
				';
    }