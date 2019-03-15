<?php

$email = $_POST['email'];
$password = $_POST['pass'];

$dbc = mysqli_connect('localhost','root','root', 'school') or die ('Error connecting.');
$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysqli_real_escape_string($dbc, $email);
$password = mysqli_real_escape_string($dbc, $password);

$query = "select * from login where email = '$email' and password = '$password'";


$result = mysqli_query($dbc, $query) or die ("Failed to query database");
$row = mysqli_fetch_array($result);
if ($row['email'] == $email && $row['password'] == $password){
    echo "Login succses!! Welkom". $row['email'];
} else {
    echo "Failed to login!";
}


