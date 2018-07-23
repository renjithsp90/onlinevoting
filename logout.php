<?php
	session_start();
	session_unset('user_id');
	session_unset('name');
	session_unset('role');
	header('location:index.php');