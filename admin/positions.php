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
  <div id="topbar">    
    <div id="loginpanel">
      <ul>
        <li class="right"><a>Log Out</a></li>
        <li class="left">Hi, Renjith</li>        
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
      <li><a href="index.php">Home</a></li>
      <li><a href="poll.php">New Poll</a></li> 
      <li class="active"><a href="positions.php">Positions</a>
        <ul>
            <li><a href="#" onclick="changePage('addposition')">Add New Position</a></li>
            <li><a href="#" onclick="changePage('updateposition')">Update Position</a></li>
            <li class="last"><a href="#" onclick="changePage('deleteposition')">Delete Position</a></li>
        </ul>
        </li>
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
    <div id="container" style="margin-top: 5px;">
    <div id="hpage">
      <h1 style="font-family: cursive; font-weight: bold; font-size: 28px;"><u>New Position</u></h1>
      <div class="form-style-5">
        <form>
          <fieldset>
              <legend><span class="number">1</span> Position Details</legend>
              <select id="poll_id" placeholder="Select Poll">
                <?php
                  require_once('../const.php');
                  require_once(ROOT . '/model/poll_details.php');
                  $poll_details = new poll_details();
                  $poll_list = $poll_details->getPollDetails();
                  var_dump($poll_list);
                  foreach($poll_list as $poll) {
                ?>
                  <option value=<?php echo $poll['poll_id']?>><?php echo $poll['poll_head'] ?></option>
                  <?php } ?>
              </select>
  
                 
              <div class="inline" style="display: inline;">
                  <input type="text" id="position" style="width: 85%" name="position" placeholder="Position *">
                  <input type="button" value="Add" class="small-button" onclick="newElement()">
              </div>
              <ul id="position_list">
                  
              </ul>
          </fieldset>
          <input type="submit" value="Save Poll" />
        </form>
      </div>
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

<script type="text/javascript" src="../js/positions.js"></script>
</body>
</html>