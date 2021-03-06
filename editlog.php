<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}
?>

<?php
  require 'config.php';
  parse_str($_SERVER['QUERY_STRING']);
  $sql = "SELECT * FROM entries WHERE id = $id LIMIT 1";

  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $username = $row['username'];
  $date = $row['date'];
  $text = $row['text']; 

  mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit log</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/addlog.css">
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
        <li><a href="welcome.php">Home</a></li>
      </ul>
      <a href = "addlog.php"> <button class="btn btn-danger navbar-btn">Add Log</button> </a>
      <ul class="nav navbar-nav navbar-right">
        <li><a href=""><?php echo date("Y/m/d") ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="page-header">
      <h1>Edit Log</h1>
  </div>

  <div class="container">
<form action="editprocess.php" method="post">
    <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username ?>" disabled>
    </div>
    <div class="form-group">
        <input type="text" name="date" class="form-control" value="<?php echo $date ?>" disabled>
    </div>
    <div class="form-group">
      <textarea name="text" class="form-control" cols="56" rows ="15" ><?php echo $text ?></textarea>
      <span class="help-block"></span>
    </div>
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        <input type="submit" class="btn btn-lg btn-danger btn-block" value="Submit">
    </div>
    <div class="form-group">
        <input type="reset" class="btn btn-lg btn-default btn-block" value="Reset">
    </div>
</form>
</div>


</body>

</html>