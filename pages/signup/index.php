<?php 
    require_once '../../php/core/init.php';
    require_once '../../php/core/header.php';  
?>

<body>

<div class="content --center-align">
    <div>
        <h3>Sign up</h3>
        <form action="../../php/includes/account/signup.php" method="POST">
            <input type="text" name="signupUsername" placeholder="Username *" required>
            <input type="text" name="signupName" placeholder="Name *" required>
            <input type="number" name="signupAge" placeholder="Age *" required>
            <input type="email" name="signupEmail" placeholder="Email *" required>
            <input type="password" name="signupPass" placeholder="Password *" required>
            <input type="text" name="signupPostal" placeholder="Postal code *" required>
            <textarea name="signupAbout" cols="30" rows="5" maxlength="50" placeholder="About *" required></textarea>
            <select name="signupCurrency" placeholder="Currency *" required>
                <option value="eur">EUR</option>
                <option value="usd">USD</option>
                <option value="gbp">GBP</option>
            </select>
            <input type="number" name="signupSalary" placeholder="Monthly salary *" required>    
            <select name="signupSeeking" placeholder="Seeking *" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="both">Both</option>
                <option value="other">Other</option>
                <option value="all">All</option>
            </select>
            <input type="submit" value="Sign up" class="btn">
        </form>
    </div>
</div>

<?php require_once '../../php/core/footer.php'; ?>