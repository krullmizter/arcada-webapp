<?php

    require '../../core/init.php';

    $username   = sanitizeInput($_POST['signupUsername']);
    $name       = sanitizeInput($_POST['signupName']);
    $age        = sanitizeInput($_POST['signupAge']);
    $email      = sanitizeInput($_POST['signupEmail']);
    $password   = sanitizeInput($_POST['signupPass']);
    $postal     = sanitizeInput($_POST['signupPostal']);
    $about      = sanitizeInput($_POST['signupAbout']);
    $currency   = sanitizeInput($_POST['signupCurrency']);
    $salary     = sanitizeInput($_POST['signupSalary']);
    $seeking    = sanitizeInput($_POST['signupSeeking']);
    $passRegex  = '/^(?=.*[A-Z]).{8,}$/';
    $hash       = password_hash($password, PASSWORD_DEFAULT);

    $stmtUser   = $conn->prepare('SELECT username FROM dateApp WHERE username = ?'); // Check if username is registered
    $stmtUser   -> bind_param('s', $username);
    $stmtUser   -> execute();
    $resultUser = $stmtUser->get_result();
    $result     = $resultUser->fetch_assoc();

    if ((isset($username)) || (isset($name)) || (isset($age)) || (isset($email)) || (isset($password)) || (isset($postal)) || (isset($about)) || (isset($currency)) || (isset($salary)) || (isset($seeking)) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {

        if (empty($username)) {
            echo 'Username is required';

        } else if(empty($name)) {
            echo 'Name is required';

        } else if(empty($age)) {
            echo 'Age is required';
            
        } else if(empty($email)) {
            echo 'Email is required';

        } else if(empty($password)) {
            echo 'Password is required';

        } else if(!preg_match($passRegex, $password)) {
            echo 'Password needs to contain 8 characters, and two of them to be uppercase';
        
        } else if(empty($about)) {
            echo 'An about sections is required';

        } else if(empty($salary)) {
            echo 'Yearly salary is required';
        
        } else if(mysqli_num_rows($result) > 0) {
            echo 'Sorry that username is already registered with us.';
            
        } else { 
            $stmt = $conn->prepare('INSERT INTO dateApp (username, name, age, email, password, postalCode, about, currency, salary, seeking) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt -> bind_param('ssississdi', $username, $name, $age, $email, $hash, $postal, $about, $currency, $salary, $seeking);
            $stmt -> execute();
    
            if(password_verify($password, $hash)) {
                header('location: ../../../pages/home');
    
            } else {
                echo 'Error: '.$sql.'<br>'.$conn->error;
            }
        }   

    } else {
        echo "Something bad is going on. Can't send via POST";
    }

    $conn->close();

?>