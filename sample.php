<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.slidepanel.setup.js"></script>
    <script type="text/javascript" src="js/jquery.ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.tabs.setup.js"></script>
    <script type="text/javascript" src="js/loadpage.js" ></script>
<div class="inline" style="display: inline;">
<input type="text" id="txt" name="txt">
                  <input type="text" id="position" style="width: 85%" name="position" placeholder="Position *">
                  <input type="button" value="Add" class="small-button" onclick="newElement()">
              </div>
              <ul id="position_list">
                  
              </ul>
          </fieldset>
          <input type="submit" id="submit" value="Save Poll" />

<script>
$(document).ready(function(){
    $('#submit').click(function(){
        var list = [];
        $('ul li').each(function(i)
        {
            var x = $(this);
            list.push(x.text().slice(0, -1));
        });
        var txt = $('#txt').val();
        $.ajax({
            type: "GET",
            url: "sample_submit.php",
            data: {"text": txt, "list": list},
            success: function(data) {
                alert((data));
            }
        });
    });
});
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
  li.setAttribute("id", "id");
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
      div.remove();//.style.display = "none";
    }
  }
}
</script>