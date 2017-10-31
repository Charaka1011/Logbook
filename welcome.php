<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/welcome.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Team 21: Logbook</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
      </ul>
      <button class="btn btn-danger navbar-btn">Add Log</button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href=""><?php echo date("Y/m/d") ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="page-header">
      <h1>Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to our site.</h1>
  </div>
  <div class="container">
    <h1>Team 21 - Tangible Data Logbook</h1>

    <div class="form-group pull-right">
      <input type="text" class="search form-control" placeholder="What you looking for?">
  </div>
  <span class="counter pull-right"></span>
  <table class="table table-hover table-bordered results" id="myTable">
    <thead>
      <tr>
        <th onclick="sortTable(0)">Username</th>
        <th onclick="sortTable(1)">Date of Entry</th>
        <th>Log</th>
      </tr>
      <tr class="warning no-result">
        <td colspan="4"><i class="fa fa-warning"></i> No result</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Vatanay</td>
        <td>18/09/2017</td>
        <td>I added salt to the app, someone ate my pie</td>
        <td>
        <a href="#" class="btn btn-danger btn-sm gliph">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        </a>
        <a href="#" class="btn btn-danger btn-sm gliph">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </a>
        </td>
      </tr>
      <tr>
        <td>Burak</td>
        <td>05/10/2017</td>
        <td>Nuclear Reactor buzzes loudly occassionally, check what 'Fire Alarm' means</td>
        <td>
        <a href="#" class="btn btn-danger btn-sm gliph">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        </a>
        <a href="#" class="btn btn-danger btn-sm gliph">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </a>
        </td>
      </tr>
      <tr>
        <td>Egemen</td>
        <td>27/10/2017</td>
        <td>I ate Vatanay's pie</td>
        <td>
        <a href="#" class="btn btn-danger btn-sm gliph">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        </a>
        <a href="#" class="btn btn-danger btn-sm gliph">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </a>
        </td>
      </tr>
      <tr>
        <td>Engin</td>
        <td>30/10/2017</td>
        <td>I lost the source code</td>
        <td>
        <a href="#" class="btn btn-danger btn-sm gliph">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        </a>
        <a href="#" class="btn btn-danger btn-sm gliph">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</body>

<script src="js/search.js"></script>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
</html>
