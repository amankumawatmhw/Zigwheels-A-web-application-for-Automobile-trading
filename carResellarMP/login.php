<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <?php
    // this only works only if submit button clicks
    if (isset($_POST["btnSubmit"])) {
        require "DbConn.php";
        $obj  = new DbCon();
        $conn = $obj->connect();
        // print_r($conn);
        // Code for Connectivity to database
        $email = $_POST["txtLoginId"];
        $pwd = $_POST["txtPassword"];
        $sql = "select * from customer where Email='$email' and Password='$pwd' ";
        $result = $conn->query($sql);
  
        // echo($result);
        if ($result->num_rows == 0) {
            echo ("<script> alertify.error('Invalid username or password'); </script>");
        } else {
            $row = $result->fetch_assoc();

            session_start();
            $_SESSION["User"] = $row;
            
            echo ("<script> window.location.href='/carresellarMP/';</script>");
        }
    }
    ?>
    <div class="container" style="text-align: center;">
        <div class="login-main">
            <form action="login.php" method="post">
                <h1>Customer Login</h1>
                <div class="form-row">
                    <label for="">Login id</label><br>
                    <input type="text" name="txtLoginId">
                </div>
                <div class="form-row">
                    <label for="">Password</label><br>
                    <input type="password" name="txtPassword">
                </div>
                <div class="form-row text-center button-hover">
                    <input type="submit" name="btnSubmit">
                    <input type="reset" name="btnReset">
                </div>
            </form>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
    <div class="gap"></div>
    <?php
    include "footer.php";
    ?>
</body>

</html>