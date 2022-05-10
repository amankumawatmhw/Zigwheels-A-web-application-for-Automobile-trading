<?php
session_start();
if (isset($_POST["btnLogout"])) {
    session_unset();
    session_destroy();
    echo ("<script> window.location.href='/carresellarMP/';</script>");
}

?>

<div class="navbar">
    <div class="logo">
        <h2>ZigWheels</h2>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Requesttosell.php">Sell</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>
            
            <?php
            if (isset($_SESSION["User"])) {
            ?>
                <li>
                    <form action="navbar.php" method="POST">
                        <input type="submit" name="btnLogout" value="Logout">
                    </form>
                </li>
                <h6>Welcome</h6><br>
                <?php echo $_SESSION["User"]["Name"] ?>
            <?php
            }
            ?>
        </ul>
    </div>
</div>