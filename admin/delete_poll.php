<?php
    require_once "../connect.php";
    $q_poll_head = $conn->query("SELECT poll_head FROM `poll_details`") or die(mysqli_error());
?>
<div id="hpage">
      <h1 style="font-family: cursive; font-weight: bold; font-size: 28px;"><u>Delete Polling</u></h1>
      <div class="form-style-5">
        <form>
          <fieldset>
              <legend><span class="number">1</span> Polling Details</legend>
              <select id="head" onchange = "pollDetails()">
                <option>Select Poll Head..</option>
                  <?php
                  while($f_poll_head = $q_poll_head->fetch_array()){
                  ?>
                          <option><?php echo $f_poll_head['poll_head'] ?></option>
                  <?php
                  }
                  ?>
              </select>
          </fieldset>
          <input type="submit" value="Delete" />
        </form>
      </div>
    </div>