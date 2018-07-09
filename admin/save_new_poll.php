<?php
    require_once '../connect.php';
    session_start();
	

		$poll_head = $_POST['poll_head'];
        $descri = $_POST['description'];
        
		$start_date = $_POST['start_time'];
        $end_date = $_POST['end_time'];
        
        $user_id = $_SESSION['admin_id'];
        echo $user_id,$poll_head,$descri,$start_date,$end_date;

		
        $conn->query("INSERT INTO `poll_details` VALUES(NULL, '$user_id', '$poll_head', '$descri', '$start_date', '$end_date')") or die(mysqli_error());	
        
       
        echo '
            <script type = "text/javascript">
                alert("Saved Record");
                window.location = "index.php";
            </script>
        ';
	
		
