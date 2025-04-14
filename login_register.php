<?php

session_start();
require_once 'config.php';

if (isset($_POST['register'])) {//check if the variable is set
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $city = $_POST['city'];


$checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'"); //check if the email already exists in the database
if ($checkEmail-> num_rows > 0 ){
    $_SESSION['register_error'] = "Email already exists!";
    $_SESSION['active_form'] = 'register';
} else{
    $conn->query("INSERT INTO users (name, email, password, city) VALUES ('$name', '$email', '$password', '$city')");
}

header("Location: index.php");
exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");

    if ($result->num_rows > 0) { // Check if the email exists in the database
        $user = $result->fetch_assoc(); // Fetch the user data
        if (password_verify($password, $user['password'])) {
           $_SESSION['name'] = $user['name']; //store the name in session
            $_SESSION['email'] = $user['email'];

            //header("Location: index.php");
            exit();
        }
    } 
    $_SESSION['login_error'] = "Invalid email or password!";
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
}
?>




