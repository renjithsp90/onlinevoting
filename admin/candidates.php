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
    <div id="hpage">
      <h1 style="font-family: cursive; font-weight: bold; font-size: 28px;"><u>New Candidate</u></h1>
      <div class="form-style-5">
          <form id="form">
              <fieldset id="fld-pollingDetails">
                  <legend><span class="number">1</span> Polling Details</legend>
                  <select name="dd-polls" id="dd-polls">
                    <option>Select poll</option>
                  </select>
                  <select name="dd-positions" id="dd-positions">
                    <option>Select Position</option>
                  </select>
                  
              </fieldset>   
              <fieldset>
                <legend><span class="number">2</span> Candidate Details</legend>
  
                <!--label for="first_name">First Name</label>
                <input type="text" id="first_name" style="width: 100%" name="first_name" placeholder="First name"> 
  
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" style="width: 100%" name="last_name" placeholder="Last name">
  
                <label for="email">Email ID</label>
                <input type="text" id="email" style="width: 100%" name="email" placeholder="Email *">
  
                <label for="mobile">Mobile Number</label>
                <input type="text" id="mobile" style="width: 100%" name="mobile" placeholder="Mobile Number">
  
                <label for="image">Image</label>
                <input type="file" id="image" style="width: 100%" name="image" placeholder="Upload Your Image">
              -->
              <input type="text" style="display: none" name="user_id" id="user_id" value="" />
              <label for="firstname">First Name:</label>
                    <input type="text" name="f_name" id="f_name" value="" required pattern="^[ A-Za-z]+$" title="Only Strings"/>
   
                  <label for="middlename">Middle Name:</label>
                    <input type="text" name="m_name" id="m_name" value=""   pattern="^[ A-Za-z]+$" title="Only Strings"/>
                  

                  <label for="lastname">Last Name:</label>
                    <input type="text" name="l_name" id="l_name" value=""  required pattern="^[ A-Za-z]+$" title="Only Strings"/>
                  

                  <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" id= "dob" value="" required />
                  
                
                  <label for="gender">Gender:</label>
                    <input type="radio" name="gender" id="Male" value="Male" >Male
                    <input type="radio" name="gender" id="Female" value="Female" >Female
                  

                  <label for="email">Email ID:</label>
                      <input type="email" name="email" id="email" value="" required 
                      pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$"
                       title="Email should be in format like abc@xyz.com"/>
              
            </fieldset>            
              <input type="button" id="submit" value="Save Candidate" />
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

<script>
    // Create a "close" button and append it to each list item
    var myNodelist = document.getSelection("#position_list li");
    var i;
    for (i = 0; i < myNodelist.length; i++) {
      var span = document.createElement("SPAN");
      var txt = document.createTextNode("\u00D7");
      span.className = "close";
      span.appendChild(txt);
      myNodelist[i].appendChild(span);
    }
    
    // Click on a close button to hide the current list item
    var close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
      close[i].onclick = function() {
        var div = this.parentElement;
        div.style.display = "none";
      }
    }
    
    // Add a "checked" symbol when clicking on a list item
    var list = document.querySelector('ul');
    list.addEventListener('click', function(ev) {
      if (ev.target.tagName === 'LI') {
        ev.target.classList.toggle('checked');
      }
    }, false);
    
    // Create a new list item when clicking on the "Add" button
    function newElement() {
      var li = document.createElement("li");
      var inputValue = document.getElementById("position").value;
      var t = document.createTextNode(inputValue);
      li.appendChild(t);
      if (inputValue === '') {
        alert("You must write something!");
      } else {
        document.getElementById("position_list").appendChild(li);
      }
      document.getElementById("position").value = "";
    
      var span = document.createElement("SPAN");
      var txt = document.createTextNode("\u00D7");
      span.className = "close";
      span.appendChild(txt);
      li.appendChild(span);
    
      for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
          var div = this.parentElement;
          div.style.display = "none";
        }
      }
    }
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/loadPolls.js"></script>
    <script type="text/javascript" id="form_processor" data-type="candidate" src="../js/formProcess.js"></script>
</body>
</html>