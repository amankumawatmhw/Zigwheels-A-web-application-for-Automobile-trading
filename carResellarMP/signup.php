<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <?php
    if (isset($_POST["btnSubmit"])) {
        require_once "DbConn.php";
        $obj = new DbCon();
        $conn = $obj->connect();
        $name = $_POST["txtName"];
        $dob = $_POST["txtDob"];
        $email = $_POST["txtEmail"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $contactNo = $_POST["txtContactno"];
        $password = $_POST["txtPassword"];
        $sql = "INSERT INTO customer(Name, Dob, Email, Address, City, ContactNo,password) VALUES ('$name','$dob','$email','$address','$city','$contactNo','$password')";
        if($conn->query($sql)){
            echo "<script>alert('You Are Registered Successfully')</script>";
            echo "<script>window.location.href='/carresellarMP/';</script>";
        }
    }

    ?>
    <div class="container">
        <div class="signup-main" style="size: 80%;">
            <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif; margin-top: 10px; background-color: lightgreen;">Customer Registration</h1>
            <form action="signup.php" method="POST">
                <div class="form-row">
                    <label for="">Name</label><br>
                    <input type="text" name="txtName" class="form-element" required>
                </div>
                <div class="form-row">
                    <label for="">Date of birth</label><br>
                    <input type="date" name="txtDob" class="form-element" required>
                </div>
                <div class="form-row">
                    <label for="">Email Id</label><br>
                    <input type="text" name="txtEmail" class="form-element" required>
                </div>
                <div class="form-row">
                    <label for="">Address</label><br>
                    <textarea name="txtAddress"></textarea>>
                </div>
                <div class="form-row">
                    <label for="">City</label><br>
                    <input type="text" name="txtCity" class="form-element">
                </div>
                <div class="form-row">
                    <label for="">Contact No.</label><br>
                    <input type="text" name="txtContactno" class="form-element" required>
                </div>
                <div class="form-row">
                    <label for="">Password</label><br>
                    <input type="password" name="txtPassword" class="form-element">
                </div>
                <div class="form-row">
                    <label for="">Retype passowrd</label><br>
                    <input type="password" name="txtPassword" class="form-element">
                </div>

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="form-row text-center button-hover">
                    <input type="submit" name="btnSubmit">
                    <input type="reset" name="btnReset">
                </div>
            </form>

        </div>
    </div>
    <?php
    include "footer.php";
    ?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> -->

</body>

</html>