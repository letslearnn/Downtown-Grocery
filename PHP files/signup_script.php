<?php

require("includes/common.php");

  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['e-mail'];
  $email = mysqli_real_escape_string($con, $email);

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);


  $contact = $_POST['contact'];
  $contact = mysqli_real_escape_string($con, $contact);

  $city = $_POST['city'];
  $city = mysqli_real_escape_string($con, $city);

  $address = $_POST['address'];
  $address = mysqli_real_escape_string($con, $address);

  $regex_email = "/^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A_Za-z0-9-]+)*(\.[A-Za-z]{2,3})$/";
  $regex_num = "/^[6789][0-9]{9}$/";

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
  $num = mysqli_num_rows($result);
 

  if ($num != 0) 
  {
    $m1 = "<span class='red'>Already existing Email</span>";
    header('location: signup.php?m1=' . $m1);
  } 
  else if (!preg_match($regex_email, $email)) 
  {
    $m2 = "<span class='red'>Email ID not valid</span>";
    header('location: signup.php?m2=' . $m2);
  } 
  else if (!preg_match($regex_num, $contact)) 
  {
    $m3 = "<span class='red'>Phone number not valid</span>";
    header('location: signup.php?m3=' . $m3);
  } else {
    
    $query = "INSERT INTO users(name, email, password, contact, city, address)VALUES('" . $name . "','" . $email . "','" . $password . "','" . $contact . "','" . $city . "','" . $address . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    header('location: products.php');
  }
?>
