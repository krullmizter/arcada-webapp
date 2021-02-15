<?php  
    require_once '../../php/core/init.php';
    require_once '../../php/core/header.php'; 
?>

<body>
    
<div class="content --center-align">
    <div>
        <h3>Login</h3>
        <form action="../../php/includes/account/login.php" method="POST">
            <input type="text" name="loginUsername" id="loginUsername" placeholder="Email / Username" required>
            <input type="password" name="loginPass" id="loginPass" placeholder="Password" required>
            <input type="submit" value="Login" class="btn">
        </form>
    </div>
</div>

<?php require_once '../../php/core/footer.php'; ?>