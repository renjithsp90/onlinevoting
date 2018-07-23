<?php
    session_start();
    /*
    require_once 'connect.php';
    */
    if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'voter')
        {
            echo '
                    <script type = "text/javascript">
                        alert("Login as Voter to access the page");
                        window.location.href = "../index.php";
					</script>
				';
           //header('location: ../index.php');
        }
    else
        {
            /*$q_adminname = $conn->query("SELECT * FROM `users` WHERE `user_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
            $f_adminname = $q_adminname->fetch_array();*/
            $voter_name = $_SESSION['name'];//$f_adminname['f_name']." ".$f_adminname['m_name']." ".$f_adminname['l_name'];
        }