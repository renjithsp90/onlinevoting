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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src="https://unpkg.com/react@16.0.0/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@16.0.0/umd/react-dom.development.js"></script>

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.slidepanel.setup.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.min.js"></script>
    <script type="text/javascript" src="../js/jquery.tabs.setup.js"></script>
    <script type="text/javascript" src="../js/loadpage.js" ></script>
    
    <title>Online Voting</title>
  </head>
  <body>
<div class="wrapper col0">
<input type="text" style="display: none" value='<?php echo $_SESSION["user_id"]?>' id="txtUserID" >
<input type="text" style="display: none" value='<?php echo $_SESSION["role"]?>' id="txtRole" >
  <div id="topbar">    
    <div id="loginpanel">
      <ul>
        <li class="right"><a href="../logout.php">Log Out</a></li>
        <li class="left">Hi, <?php echo $voter_name; ?></li>        
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
      <li><a href="index.html">Home</a></li>
      <li><a href="poll.html">New Poll</a></li> 
      <li><a href="positions.html">Positions</a></li>
      <li  class="active"><a href="candidates.html">Candidates</a>
        <ul>
          <li><a href="#" onclick="changePage('addcandidate')">Add Candidate</a></li>
          <li><a href="update_candidate.php">Update Candidate</a></li>
          <li class="last"><a href="#" onclick="changePage('deletecandidate')">Delete Candidate</a></li>
        </ul>
      </li> 
      <li><a href="voters.html">Voters</a></li> 
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
    <div id="container" style="margin-top: 5px;">
        <h1 style="font-family: cursive; font-weight: bold; font-size: 28px;"><u>Polls</u></h1>
        <div id="hpage">
            <div class="form-style-5">
            <fieldset id="fld-pollingDetails">
                <legend><span class="number">1</span> Polling Details</legend>
                <select name="dd-positions" id="dd-positions">
                    <option>Select Position</option>
                </select>  
            </fieldset>   
            </div>
            <table class="table" id="tbl-candidate">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
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