<?php

session_start();

$username = $phonenumber = $email = $address = $event = $msg ="";
$result = 0;  //initialize variable

$db = mysqli_connect('localhost', 'root', '', 'mydb'); // connect to the database

// Check connection
if ($db->connect_error) {
    die("Connection Failed: " . $db->connect_error);
}

if (isset($_POST['submit'])) 
{
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['name']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $event = mysqli_real_escape_string($db, $_POST['event']);

    $query = "INSERT INTO userinfo (UserName, UserPhone, UserEmail, UserAddress, UserEvent) 
              VALUES('$username', '$phonenumber', '$email', '$address', '$event' )"; 
    
    if (!mysqli_query($db,$query)) {
      die('Error: '.mysqli_error($db));
    }
    echo "1 record added";
    mysqli_close($db); 
  
}
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Contact us form validation Using Javascript</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="scripts.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <h1 class="register">Register</h1>
      <div id="error_message"></div>
      <form id="myform" onsubmit="return validate();" action="index.php" method="POST">
        <div class="input_field">
          <input type="text" placeholder="Name" id="name" name="name" />
        </div>
        <div class="input_field">
          <input type="text" placeholder="Phone" id="phone" name="phone" />
        </div>
        <div class="input_field">
          <input type="text" placeholder="Email" id="email" name="email" />
        </div>
        <div class="input_field">
          <textarea placeholder="Address" id="message" name="address"></textarea>
        </div>
        <div class="input_field">
          <input type="text" placeholder="Event Name" id="subject" name="event" />
        </div>
        <div class="btn">
          <input type="submit" name="submit" />
        </div>
      </form>
    </div>
  </body>
</html>
