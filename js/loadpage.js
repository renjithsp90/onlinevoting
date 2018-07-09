function changePage(x) {
    var value = x;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("container").innerHTML = this.responseText;
      }
    };
    if(value == 'addpoll')
      {
          xhttp.open("GET", "add_poll.php", true);
      }
    else if(value == 'updatepoll')
      {
      xhttp.open("GET", "update_poll.php", true);
      }
    else if(value == 'deletepoll')
      {
      xhttp.open("GET", "delete_poll.php", true);
      }
    else if(value == 'addposition')
      {
      xhttp.open("GET", "add_position.php", true);
      }
    else if(value == 'updateposition')
      {
      xhttp.open("GET", "update_position.php", true);
      }
    else if(value == 'deleteposition')
      {
      xhttp.open("GET", "delete_position.php", true);
      }
    else if(value == 'addcandidate')
      {
      xhttp.open("GET", "add_candidate.php", true);
      }
    else if(value == 'updatecandidate')
      {
      xhttp.open("GET", "update_candidate.php", true);
      }
    else if(value == 'deletecandidate')
      {
      xhttp.open("GET", "delete_candidate.php", true);
      }
    else if(value == 'addvoters')
      {
      xhttp.open("GET", "add_voters.php", true);
      }
    else if(value == 'updatevoters')
      {
      xhttp.open("GET", "update_voters.php", true);
      }
    else if(value == 'deletevoters')
      {
      xhttp.open("GET", "delete_voters.php", true);
      }
    xhttp.send();
  }


