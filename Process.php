<?php

include 'ProcessingFunction.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['password'];

return Register($firstname, $lastname, $gender, $dob, $email, $password);

return LogIn($email, $password);

?>