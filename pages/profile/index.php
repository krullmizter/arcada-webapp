<?php
    require_once '../../php/core/init.php';
    require_once '../../php/core/header.php';  
?>

<body>

<div class="content">
    <div class="profile">
        <div>
            <h3><?php echo $_SESSION['name']; ?></h3>
            <h5><?php echo $_SESSION['username'];?></h5>
            <h6>Basic Information</h6>
    
            <table>
                <tr>
                    <th>Name</th>
                    <td><?php echo $_SESSION['name']; ?></td>
                </tr>
    
                <tr>
                    <th>Age</th>
                    <td><?php echo $_SESSION['age']; ?></td>
                </tr>
    
                <tr>
                    <th>Username</th>
                    <td><?php echo $_SESSION['username']; ?></td>
                </tr>
            </table>

            <form action="../../php/includes/account/edit-profile.php" method="POST">
                <input type="text" name="signupUsername" placeholder="Username">
                <input type="text" name="signupName" placeholder="Name">
                <input type="number" name="signupAge" placeholder="Age">
                <input type="email" name="signupEmail" placeholder="Email">
                <input type="password" name="signupPass" placeholder="Password">
                <input type="text" name="signupPostal" placeholder="Postal code">
                <textarea name="signupAbout" cols="30" rows="5" maxlength="50" placeholder="About *"></textarea>
                <select name="signupCurrency" placeholder="Currency">
                    <option value="eur">EUR</option>
                    <option value="usd">USD</option>
                    <option value="gbp">GBP</option>
                </select>
                <input type="number" name="signupSalary" placeholder="Monthly salary">    
                <select name="signupSeeking" placeholder="Seeking">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="both">Both</option>
                    <option value="other">Other</option>
                    <option value="all">All</option>
                </select>
                <input type="submit" value="submit" class="btn">
            </form>
        </div>
    </div>
</div>

<?php require_once '../../php/core/footer.php'; ?>