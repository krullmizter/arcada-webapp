<?php require_once '../../core/init.php';

    $username = sanitizeInput($_POST['signupUsername']);
    $name     = sanitizeInput($_POST['signupName']);
    $id       = $_SESSION['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $stmt = $conn->prepare("UPDATE dateApp SET username = ?, name = ? WHERE id = ?");
        $stmt->bind_param('ssi', $username, $name, $id);

        $stmt->execute();
        header('location: ../../../pages/profile');

    } else {
        echo "Something bad is going on. Can't send via POST";
    }

?>