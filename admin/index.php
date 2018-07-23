<?php
	require 'account.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#000000">
  
    <link rel="manifest" href="../manifest.json">
    <link rel="shortcut icon" href="../images/favicon.png">
 

    <link rel="stylesheet" href="../css/layout.css" type="text/css" />
    <link rel="stylesheet" href="../css/form.css" type="text/css" />


    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.slidepanel.setup.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.min.js"></script>
    <script type="text/javascript" src="../js/jquery.tabs.setup.js"></script>
    <script type="text/javascript" src="../js/loadpage.js" ></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body>
<div class="wrapper col0">
<input type="text" style="display: none" value='<?php echo $_SESSION["user_id"]?>' id="txtUserID" >
<input type="text" style="display: none" value='<?php echo $_SESSION["role"]?>' id="txtRole" >
  <div id="topbar">    
    <div id="loginpanel">
      <ul>
        <li class="right"><a href="../logout.php">/<b> Log Out</b></a></li>
        <li class="left">Hi, <?php echo $admin_name; ?> </li>        
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
        <h1><img src="../images/logo_online_voting.png" /></h1>
    </div>
    <div class="fl_right">      
      <p>Tel: 022 526 3841 | Mail: info@onlinevoting.com</p>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topnav">
    <ul>
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="poll.php">New Poll</a></li> 
      <li><a href="positions.php">Positions</a></li>
      <li><a href="candidates.php">Candidates</a></li> 
      <li><a href="voters.php">Voters</a></li> 
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<!--<div class="wrapper col3">
  <div id="featured_slide">
    <div id="featured_wrap">      
      
    </div>
  </div>
</div>-->
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="container" style="margin-top: 5px">
    <div id="hpage">
    <h1 style="font-family: cursive; font-weight: bold; font-size: 28px;"><u>Active Polls</u></h1>
    <table class="table" id="tbl-polls" data-for='admin'>
    <thead>
      <tr>
          <th>ID</th>
          <th>Poll Head</th>
          <th>Description</th>
          <th>Start Date</th>
          <th>End Date</th>

      </tr>
    </thead>
  </table>
      <br class="clear" />
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="footer">
    
    <div class="footbox">
      <h2>About</h2>
      <ul>
        <li><a href="#">Company Profile</a></li>
        <li><a href="#">About Us</a></li
      </ul>
    </div>
    <div class="footbox">
      <h2>Support</h2>
      <ul>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
    <div class="footbox">
        <h2>Connect</h2>
        <ul>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Our Clients</a></li>
        </ul>
    </div>
    <div class="footbox">
        <h2>Get Social With us!</h2>
        
          <a href="#"><img src="../images/facebook.png" width="40px" height="40px"></a>
          <a href="#"><img src="../images/twitter.png" width="40px" height="40px"></a>
        
    </div>
    
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col6">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <br class="clear" />
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2html/1.2.0/json2html.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.json2html/1.2.0/jquery.json2html.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="../js/loadPolls.js" type="module"></script>
</body>
</html>