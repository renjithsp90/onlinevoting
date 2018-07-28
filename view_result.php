
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#000000">

    <link rel="manifest" href="manifest.json">
    <link rel="shortcut icon" href="./images/favicon.png">


    <link rel="stylesheet" href="css/layout.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.slidepanel.setup.js"></script>
    <script type="text/javascript" src="js/jquery.ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.tabs.setup.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    
    
    <title>Online Voting</title>
  </head>
  <body>
    
    <noscript>
      You need to enable JavaScript to run this app.
    </noscript>
    <div id="root"></div>
   

    <div class="wrapper col0">
        <div id="topbar">
          <div id="slidepanel">
            
            <div style="margin: 0 auto; width: 705px;">
            <div class="topbox">
              <h2>Signup here</h2>
              <form action="save_user_data.php" method="POST" name="signUp"> 
                <fieldset>
                  <legend>Signup here</legend>
                  <label for="firstname">First Name:
                    <input type="text" name="firstname" id="firstname" value="" required pattern="^[ A-Za-z]+$" title="Only Strings"/>
                    
                  </label>
                  <label for="middlename">Middle Name:
                    <input type="text" name="middlename" id="middlename" value=""   pattern="^[ A-Za-z]+$" title="Only Strings"/>
                  </label>

                  <label for="lastname">Last Name:
                    <input type="text" name="lastname" id="lastname" value=""  required pattern="^[ A-Za-z]+$" title="Only Strings"/>
                  </label>

                  <label for="dob">Date of Birth:
                    <input type="date" name="dob" id= "dob" value="" required />
                  </label>
                
                  <label for="gender">Gender:
                    <input type="radio" name="gender" id="male" value="Male" >Male
                    <input type="radio" name="gender" id="female" value="Female" >Female
                  </label>

                  <label for="email">Email ID:
                      <input type="email" name="email" id="email" value="" required 
                      pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$"
                       title="Email should be in format like abc@xyz.com"/>
                  </label> 

                  <label for="password">Password:
                    <input type="password" name="password" id="password" value="" required
                     pattern="^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{7,}$" title=""/>
                </label>            

                  <p>
                    <input type="submit" name="signuplogin" id="signuplogin" value="Login"/>
                    &nbsp;
                    <input type="reset" name="signupreset" id="signupreset" value="Reset"/>
                  </p>
                </fieldset>
              </form>
            </div>
      
            <div class="topbox" style="margin-top: 0px;">
              <h2>Login Here</h2>
              <form action="login.php" method="POST">
                <fieldset>
                  <legend>Login Form</legend>
                  <label for="username">Username:
                    <input type="email" name="loginusername" id="loginusername" value=""required 
                      pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$"
                       title="Email should be in format like abc@xyz.com"/>
                  </label>
                  <label for="loginpassword">Password:
                    <input type="password" name="loginpassword" id="loginpassword" value=""  required title="" />
                  </label>
                  
                  <p>
                    <input type="submit" name="loginsubmit" id="loginsubmit" value="Login" />
                    &nbsp;
                    <input type="reset" name="loginreset" id="loginreset" value="Reset" />
                  </p>
                </fieldset>
              </form>
            </div>
      
          </div>
            
            <br class="clear" />
          </div>
          <div id="loginpanel">
            <ul>
              <?php
                if(!ISSET($_SESSION['admin_id']))
                  {
              ?>
                  <li class="left">Log In Here &raquo;</li>
                  <li class="right" id="toggle"><a id="slideit" href="#slidepanel">Administration</a><a id="closeit" style="display: none;" href="#slidepanel">Close Panel</a></li>
              <?php
                  }
              else
                  {
              ?>
                  <li class="right"><a href="logout.php">/<b> Log Out</b></a></li>
                  <li class="left">Hi, <?php echo $admin_name; ?> </li>  
              <?php
                  }
              ?>
            </ul>
          </div>
          <br class="clear" />
        </div>
      </div>
      <!-- ####################################################################################################### -->
      <div class="wrapper col1">
        <div id="header">
          <div id="logo">      
            <h1><img src="images/logo_online_voting.png" /></h1>
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
            <li class="active"><a href="index.html">Home</a>
              
            </li>
            <li><a href="about.html">About</a>
              
            </li>
            
          </ul>
        </div>
      </div>
      <!-- ####################################################################################################### -->
      
      <!-- ####################################################################################################### -->
      <div class="wrapper col4">
        <div id="container">
          <div id="hpage">
            <u><h1 style="font-size: 26px;">Current Polling</h1></u>
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
              </form>
              </div>
            <table class="table" id="tbl-result">
              <thead>
                <tr>
                    <th>Candidate</th>
                    <th>Poll Count</th>
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
              
                <a href="#"><img src="images/facebook.png" width="40px" height="40px"></a>
                <a href="#"><img src="images/twitter.png" width="40px" height="40px"></a>
              
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
      <script src="index.js" type="module"></script>
  </body>
</html>
