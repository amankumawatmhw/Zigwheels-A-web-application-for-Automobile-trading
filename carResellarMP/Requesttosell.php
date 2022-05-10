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
    $customerId = "";
    if(isset($_SESSION["User"])){
        $customerId = $_SESSION["User"]["CustomerId"];
    }
    if(isset($_POST["btnSubmit"])){
        require_once "DbConn.php";
        $obj = new DbCon();
        $conn = $obj->connect();
        $carname = $_POST["txtName"];
        $description = $_POST["txtDescription"];
        $modelyear = $_POST["txtModel"];
        $engine = $_POST["txtEngine"];
        $price = $_POST["txtExpectedPrice"];
        $sql = "Select * from customer"; 

        // $sql = "INSERT INTO requesttosell(CarName, Description, ModelYear, Engine, ExpectedPrice, CustomerID) VALUES ('$carname','$description',$modelyear,$engine,$price,$customerId)";
        $sql = "INSERT INTO requesttosell (CarName, Description, ModelYear, Engine, ExpectedPrice, CustomerID) VALUES ('$carname','$description',$modelyear,$engine,$price,$customerId)";
        if($conn->query($sql)){
            echo "<script>alert('We have sent your request to our executive for sell')</script>";
            echo "<script>window.location.href='/carresellarMP/Requesttosell.php';</script>";
        }
    }
    ?>
    <div class="container">
        <div class="Selling-heading">
            <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif; margin-top: 10px; background-color: lightgreen;">Sell Your Car</h1>
            <div class="gap"></div>
            <p>Please fill this form to sell your car.</p>
            <div class="gap"></div>
            <hr>
            <hr>
            <div class="gap"></div>
        </div>

        <div class="signup-wrapper">
            
                <div class="signup-main">
                <form action="Requesttosell.php" method="post">
                    <div class="form-row">
                        <label for="">Car Name</label><br>
                        <input type="text" name="txtName" class="form-element" required>
                    </div>
                    <div class="form-row">
                        <label for="">Description</label><br>
                        <input type="text" name="txtDescription" class="form-element" required>
                    </div>
                    <div class="form-row">
                        <label for="">Model Year</label><br>
                        <input type="text" name="txtModel" class="form-element" required>
                    </div>
                    <div class="form-row">
                        <label for="">Engine</label><br>
                        <input type="text" name="txtEngine" class="form-element" required>
                    </div>
                    <div class="form-row">
                        <label for="">Expected Price</label><br>
                        <input type="text" name="txtExpectedPrice" class="form-element">
                    </div>
                    <div class="form-row text-center button-hover">
                        <input type="submit" name="btnSubmit">
                        <input type="reset" name="btnReset">
                    </div>
                 </form>

                </div>
                <div class="signup-image">
                    <div class="car-image">

                    </div>
                    <div class="gap"></div>
                    <input type="file" name="fldcarImage">
                </div>
        </div>

    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>