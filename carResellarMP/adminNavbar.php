<?php

session_start();

if (!isset($_SESSION["admin"])) {
    echo ("<script> window.location.href='/carresellarMP/adminlogin';</script>");
}

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
        <?php
        if (isset($_SESSION["admin"])) {
        ?>
        <p>
            <h3>Welcome</h3><br>
            <?php echo $_SESSION["admin"]["Name"] ?>
            <form action="navbar.php" method="POST">
                <input type="submit" name="btnLogout" value="Logout">
            </form>

            </p>
        <?php
        }
        ?>

    </div>
</div>