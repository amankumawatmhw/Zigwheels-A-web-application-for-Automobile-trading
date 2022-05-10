<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <?php
     require_once "DbConn.php";
     $obj = new DbCon();
     $conn = $obj->connect();

     if(isset($_GET["id"])){
        $_SESSION["Car"] = $_GET["id"];
     }
     $carId = $_SESSION["Car"];
     
     $sql = "SELECT * FROM car WHERE CarId=$carId";
    //  echo $sql;
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();
   
    if(isset($_GET["btnBooking"])){
        $customerId = $_SESSION["User"]["CustomerId"];
        $carId = $_SESSION["Car"];
        date_default_timezone_set('Asia/Kolkata');
        $bookingDate = date("d/m/y  h:i:s");
        $sql = "INSERT INTO booking(CarId, CustomerId, Date) VALUES ($carId,$customerId,'$bookingDate')";
        // echo $sql;
        if($conn->query($sql)){
            echo "<script> alert('Your Booking is Successfully Done. Our executive will contact you in future.') </script>";
            unset($_SESSION["Car"]);
            echo "<script>window.location.href='/carresellarMP/'</script>;";
        }

    }

    ?>
    <div class="container">
        <h1 style="text-align: center; margin-top: 10px;">Product Details</h1>
        <hr>
        <div class="productDetails-main">
            <div class="productImage">
                <?php echo '<img src="img/product/' . $row["CarId"] . '.jpg" alt="">'; ?>
            </div>
            <div class="productDetail">
                <h2 style="color:teal"><?php echo $row["Name"] ?></h2>
                <h3>Model: <?php echo $row["Model"] ?></h3>
                <h3>Engine: <?php echo $row["Engine"] ?></h3>
                <h3>Price: <?php echo $row["Price"] ?></h3>
                <h3>FuelType: <?php echo $row["FuelType"] ?></h3>
                <h3>Status: <?php echo $row["Status"] ?></h3>

                <form action="productDetails.php" method="GET">
                    <input  class="btn btn-success" type="submit" name="btnBooking" value="Booknow">
                    <!-- <button type="button" class="btn btn-success"><a href="http://127.0.0.1:5000/">Predict Price</a></button> -->
                    <!-- <button type="button" class="btn btn-info" onclick="http://127.0.0.1:5000/">Predict Price</button> -->
                    <a href="http://127.0.0.1:5000/" class="btn btn-info">Predit price</a>
                </form>
            </div>
        </div>

        <hr>
        <div class="productDetail-other">
            <h3>Description</h3>
            <h5 style="color:teal"><?php echo $row["Description"] ?></h5>

        </div>
        <div class="gap">

        </div>
        <h3>Expert Reviews </h3>
        <h5 style="color:teal"><?php echo $row["ExpertView"] ?></h5>
    </div>
    <?php
    include "footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>