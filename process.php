<?php 
  // Get values passed from form in login.php
  $username = $_POST['user'];
  $password = $_POST['pass'];

  //To prevent mysql injection
  $username = stripcslashes($username);
  $password = stripcslashes($password);
  $username = mysqli_real_escape_string($connect, $_POST['username']);
  $password = mysqli_real_escape_string($connect, $_POST['password']);

  //connect to server and select database
  mysqli_connect("localhost", "root", "");
  mysqli_select_db($conn ,$login);

  //Query Database for user
  $result = mysqli_query ($connection,$query, "SELECT * FROM users WHERE username = '$username' AND pass = '$password'")
                      or die("Failed to query database".mysqli_error($connection));
  $row = mysqli_fetch_array($result);
  if ($row['username'] == $username && $row['password'] == $password) {
      echo "Login Succesfully!!! Welcome".$row['username'];
  }
  else {
      echo "Failed to login";
  }
?>