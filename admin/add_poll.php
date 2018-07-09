<div id="hpage">
    <h1 style="font-family: cursive; font-weight: bold; font-size: 28px;"><u>New Polling</u></h1>
    <div class="form-style-5">
      <form method="POST" action="save_new_poll.php">
        <fieldset>
            <legend><span class="number">1</span> Polling Details</legend>
            <input type="text" name="poll_head" placeholder="Poll Head *" required pattern="^[ A-Za-z]+$" title="Only Strings">
            <textarea name="description" placeholder="Description" required></textarea>   
            
        </fieldset>
        <fieldset>
            <legend><span class="number">2</span> Polling Schedule</legend>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="datetime-local" name="start_time" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="datetime-local" name="end_time" required>
            </div>
        </fieldset>
        <input type="submit" value="Add Poll" />
      </form>
    </div>
  </div>