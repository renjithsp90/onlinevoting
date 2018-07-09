<?php
require_once "../connect.php";
    $q_poll_head = $conn->query("SELECT poll_head FROM `poll_details`") or die(mysqli_error());
if(isset($_GET['data']))
{
$head = $_GET['data'];
$q_poll_details = $conn->query("SELECT * FROM `poll_details` WHERE `poll_head` = '$head'") or die(mysqli_error());
$f_poll_details = $q_poll_details->fetch_array();
?>
    <div id="hpage">
      <h1 style="font-family: cursive; font-weight: bold; font-size: 28px;"><u>Update Polling</u></h1>
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
            <input type="text" name="poll_head2" value = "<?php echo $f_poll_details['poll_head']; ?>" required 
            pattern="^[ A-Za-z]+$" title="Only Strings" >
            <textarea name="description"  required><?php echo $f_poll_details['poll_description']; ?></textarea>   
          </fieldset>
          <fieldset>
              <legend><span class="number">2</span> Polling Schedule</legend>
              <div class="form-group">
                  <label for="start_time">Start Time</label>
                  <?php echo (new DateTime($f_poll_details['start_date']))->format('c'); ?>
                  <input type="datetime-local" name="start_time"  value = "<?php echo (new DateTime($f_poll_details['start_date']))->format('c'); ?>" required>
              </div>
              <div class="form-group">
                  <label for="end_time">End Time</label>
                  <input type="datetime-local" name="end_time" value = "<?php echo $f_poll_details['end_date']; ?>" required>
              </div>
          </fieldset>
          <input type="submit" value="Update" />
        </form>
      </div>
    </div>
<?php
}
else
{
?>
    <div id="hpage">
      <h1 style="font-family: cursive; font-weight: bold; font-size: 28px;"><u>Update Polling</u></h1>
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
             
          <input type="submit" value="Update" />
        </form>
      </div>
    </div>
<?php
}
?>