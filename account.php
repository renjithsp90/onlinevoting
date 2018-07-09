<?php
    session_start();
    require_once 'connect.php';
    
    if(!ISSET($_SESSION['admin_id']))
        {
           //header('location: index.php');
        }
    else
        {
            $q_adminname = $conn->query("SELECT * FROM `users` WHERE `user_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
            $f_adminname = $q_adminname->fetch_array();
            $admin_name = $f_adminname['f_name']." ".$f_adminname['m_name']." ".$f_adminname['l_name'];
        }