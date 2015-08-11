<!DOCTYPE html>

<!-- Simple FTP Test -- Created by Jereme Hancock -->

<html lang="en">
<head>
  <title>FTP Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="jumbotron" style="margin-top:20px;padding:20px;">
  <h2>FTP Test</h2>
  <form class="form-horizontal" role="form" action="ftp.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="server">FTP Server:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="server" name="server" placeholder="Enter FTP Server" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="user">FTP User:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="user" name="user" placeholder="Enter FTP User" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>

<?php
if (!empty($_POST)) {
  
$ftp_server = $_POST["server"];
$ftp_user = $_POST["user"];
$ftp_pass = $_POST["password"];

// set up a connection or die
$conn_id = ftp_connect($ftp_server) or die('<div class="alert alert-danger" role="alert">Could not connect to ' .$ftp_server.''); 


// try to login
if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
    echo '<div class="alert alert-success" role="alert">Connected as ' .$ftp_user.'@'.$ftp_server. '</div>';
} else {
    echo '<div class="alert alert-danger" role="alert">Could not connect as ' .$ftp_user. '</div>';
}

}
// close the connection
ftp_close($conn_id);  
?>

</div>
</div>

</body>
</html>
