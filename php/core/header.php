<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DateApp</title>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    
    <script src="https://kit.fontawesome.com/e17aad6c5d.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="../../styles/css/main.css">

    <script scr="../../scripts/config.js"></script>
    <script src="../../scripts/card-options.js"></script>
    <script src="../../scripts/swipe.js"></script>
    <script src="../../scripts/tooltip.js"></script>
    <script src="../../scripts/map.js"></script>
</head>

<header>
    <nav class="navbar">
        <div class="navbar__content">
            <a href="../../pages/frontpage"><div class="navbar__logo"></div></a>
            <ul class="navbar__menu">
                <li><a href="../../pages/frontpage">Frontpage</a></li>
    
                <?php 
                    if(isset($_SESSION['loggedin'])) {
                        echo '
                        <li><a href="../../pages/profile">Profile</a></li>
                        <li><a href="../../php/includes/account/logout.php">Logout</a></li>';
                        
                    } else {
                        echo '            
                        <li><a href="../../pages/login">Login</a></li>
                        <li><a href="../../pages/signup">Sign up</a></li>';
                    }
                ?>
            </ul>
        </div>

        <div class="navbar__options">
            <div class="navbar__options-content">
                <select name="seeking" id="options__seeking">
                    <option value="male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Both">Both</option>
                    <option value="Other">Other</option>
                    <option value="All">All</option>
                </select>
    
                <select name="salary" id="options__salary"></select>
    
                <select name="options__currency" id="options__currency"></select>
            </div>

            <div class="navbar__options-btn"></div>
        </div>
    </nav>
</header>