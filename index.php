<?php

session_start();

$errors  = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$active_form = $_SESSION['active_form'] ?? 'login'; // determine which form is active

session_unset(); // Clear session variables after using them

function showError($error) {
    return !empty($error) ? "<p  class='error-message'>$error</p>" : '';
}

function isActiveForm ($formName, $active_form) {
    return $formName === $active_form ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-box <?= isActiveForm('login', $active_form); ?>" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']) ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="checkbox" onclick="myFunction">Show Password
                <button type="submit"name ="login" >Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form')" >Register</a></p>
            </form>
        </div>

        <div class="form-box <?= isActiveForm('register', $active_form); ?>" id="register-form">
            <form action="login_register.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']) ?>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="city"required>
                    <option value="">City</option>
                    <option value="new-york">New York</option>
                    <option value="los-angeles">Los Angeles</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')" >Login</a></p>
            </form>
        </div>
        <footer>abcs</footer>
    </div>
    
    <script src="script.js"></script>
</body>
</html>