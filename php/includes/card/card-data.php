<?php require_once '../../php/core/init.php';
    $users       = 'SELECT * FROM dateApp ORDER BY RAND() LIMIT 3';
    $usersResult = $conn->query($users);

    if($usersResult->num_rows > 0) {
        while($row = $usersResult->fetch_assoc()) {
            $username     = $row['username'];
            $fullName     = $row['name'];
            $age          = $row['age'];
            $email        = $row['email'];
            $postalCode   = $row['postalCode'];
            $about        = $row['about'];
            $salary       = $row['salary'];
            $seeking      = $row['seeking'];

            switch ($seeking) {
                case 0:
                    $seeking = "Male";
                break;
        
                case 1:
                    $seeking = "Female";
                break;
        
                case 2:
                    $seeking = "Both";
                break;
        
                case 3: 
                    $seeking = "Other";
                break;
        
                case 4:
                    $seeking = "All";
                break;
            }
        }

    } else {
        echo '<p>No posts to show...</p>';
    }
?>