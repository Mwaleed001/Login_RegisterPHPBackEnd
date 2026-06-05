<?php
    session_start();
    $errors = [
        'login' => $_SESSION['login_error'] ?? '' ,
        'register' => $_SESSION['register_error'] ??''

    ];
    $activeForm = $_SESSION['active_form'] ?? 'login';

    session_unset();

    function showError($error){
        return !empty($error) ? "<p class = 'error-message' >$error</p>" : '';
    }

    function isActiveForm($formName,$activeForm){
        return $formName === $activeForm ? 'active': '';
    }

?>


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>full_stack login and register page </title>
</head>
<body>

    <div class="container">
        <div class="form_box <?= isActiveForm('login', $activeForm); ?> " id="login_form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>

                <?= showError($errors['login']); ?>

                <input type="email" name="email" placeholder="E-MAIL" required>
                <input type="password" name="password" placeholder="PASSWORD" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account! <a href="#" onclick="showform('register_form')">REGISTER</a></p>
            </form>
        </div>


        <div class="form_box <?= isActiveForm('register', $activeForm); ?>" id="register_form">
            <form action="login_register.php" method="post">
                <h2>Register</h2>

                <?= showError($errors['register']); ?>

                <input type="text" name="name" placeholder="USERNAME" required>
                <input type="email" name="email" placeholder="E-MAIL" required>
                <input type="password" name="password" placeholder="PASSWORD" required>
                <select name="role" id="" required>
                    <option value="">--select Role</option>
                     <option value="user">--User</option>
                    <option value="admin">--Admin</option>
                   
                </select>
                <button type="submit" name="register">Register</button>
                <p>Already have an account! <a href="#" onclick="showform('login_form')">Login</a></p>
            </form>
        </div>
    </div>
     

    <script src="script.js"></script>
</body>
</html>