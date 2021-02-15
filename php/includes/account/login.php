<?php 

require_once '../../core/init.php'; 

$username = sanitizeInput($_POST['loginUsername']);
$password = sanitizeInput($_POST['loginPass']);

if (isset($username) || isset($password) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($username)) {
        echo 'Username is required';

    } else if(empty($password)) {
        echo 'Password is required';

    } else if($stmt = $conn->prepare('SELECT id, name, age, password, role, registered, latest, logins FROM dateApp WHERE username = ?')) {
        
        $stmt -> bind_param('s', $username);
        $stmt -> execute();
        $stmt -> store_result();

        if ($stmt -> num_rows > 0) {
            $stmt -> bind_result($id, $name, $age, $hash, $role, $registered, $latest, $logins);
            $stmt -> fetch();

            if (password_verify($password, $hash)) {

                $conn->query("UPDATE dateApp SET latest = now(), logins = logins + 1 WHERE id = '$id'"); # Updates latest login and login counter
                
                $_SESSION['loggedin']   = TRUE;
                $_SESSION['username']   = $username;
                $_SESSION['name']       = $name;
                $_SESSION['age']        = $age;
                $_SESSION['id']         = $id;
                $_SESSION['registered'] = $registered;
                $_SESSION['latest']     = $latest;
                $_SESSION['logins']     = $logins;
                $_SESSION['role']       = $role;

                header('location: ../../../pages/profile');

            } else {
                echo 'Invalid credentials';
            }

        } else {
            echo 'Invalid credentials';
        }

    } else {
        echo 'Invalid credentials';
    }

} else {
    echo "Something bad is going on. Can't send via POST";
}

$conn->close();

?>