<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Verification Master</title>
    <link rel="stylesheet" href="main.css">

</head>

<body>
    <?php
    include "adminNavbar.php";
    ?>
    <?php
    require_once 'DbConn.php';
    $obj = new DbCon();
    $conn = $obj->connect();
    $sql = "select * from booking";
    $result = $conn->query($sql);
    $bookingId = "";
    $carId = "";
    $customerId = "";
    $carName = "";
    $customerName = "";
    $contactNo = "";
    $price = "";
    $modelYear = "";
    $status = "";
    if (isset($_GET["edit"])) {
        $bookingId = $_GET["edit"];
        $sql = "SELECT * FROM booking where BookingId=$bookingId";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $carId = $row["CarId"];
        $customerId = $row["CustomerId"];
        $status = $row["Status"];

        $sql = "SELECT * from customer where CustomerId=$customerId";
        $result = $conn->query($sql);
        $customerData = $result->fetch_assoc();

        $sql = "SELECT * from car where CarId=$carId";
        $result = $conn->query($sql);
        $carData = $result->fetch_assoc();

        $carName = $carData["Name"];
        $customerName = $customerData["Name"];
        $contactNo = $customerData["ContactNo"];
        $price = $carData["Price"];
        $modelYear = $carData["Model"];
        $status = $carData["Status"];
    }
    if (isset($_POST["btnSubmit"])) {
        $bookingId = $_POST["txtBookingId"];
        $status = $_POST["txtStatus"];
        $sql = "UPDATE booking SET Status='$status' WHERE BookingId = $bookingId";
        if ($conn->query($sql)) {
            echo "<script>window.location.href='/carresellarMP/bookingMaster.php'</script>;";
        }
    }
    ?>
    <div class="container">
        <div class="admin-wrapper">
            <?php
            include "adminSidebar.php";
            ?>
            <div class="admin-maincontent">
                <h1>Booking Verification</h1>
                <form action="bookingMaster.php" method="POST">
                    <div class="admin-form">
                        <div class="form-row">
                            <label for="">Booking ID</label><br>
                            <input class="form-element" type="text" name="txtBookingId" value="<?php echo $bookingId; ?>" readonly>
                        </div>
                        <div class="form-row">
                            <label for="">Car Name</label><br>
                            <input class="form-element" type="text" name="txtCarName" value="<?php echo $carName ?> " readonly>
                        </div>
                        <div class="form-row">
                            <label for="">Customer Name</label><br>
                            <input class="form-element" type="text" name="txtCustomerName" value="<?php echo $customerName ?>" readonly>
                        </div>
                        <div class="form-row">
                            <label for="">Price</label><br>
                            <input class="form-element" type="text" name="txtPrice" value="<?php echo $price ?>" readonly>
                        </div>
                        <div class="form-row">
                            <label for="">Contact No.</label><br>
                            <input class="form-element" type="text" name="txtContactNo" value="<?php echo $contactNo ?>" readonly>
                        </div>
                        <div class="form-row">
                            <label for="">Model Year</label><br>
                            <input class="form-element" type="text" name="txtModelYear" value="<?php echo $modelYear ?>" readonly>
                        </div>
                        <div class="form-row">
                            <label for="">Status</label><br>
                            <input class="form-element" type="text" name="txtStatus" value="<?php echo $status ?>">
                        </div>
                        <div class="form-row text-center button-hover">
                            <input type="submit" name="btnSubmit">
                            <input type="reset" name="btnReset">
                        </div>

                    </div>
                </form>
                <div class="admin-table">
                    <table>
                        <tr>
                            <th>Booking Id</th>
                            <th>Car Id</th>
                            <th>Customer Id</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>";
                            echo $row["BookingId"];
                            echo "</td>";

                            echo "<td>";
                            echo $row["CarId"];
                            echo "</td>";

                            echo "<td>";
                            echo $row["CustomerId"];
                            echo "</td>";

                            echo "<td>";
                            echo $row["Date"];
                            echo "</td>";

                            echo "<td>";
                            echo $row["Status"];
                            echo "</td>";

                            echo "<td>";
                            echo "<a href=/carresellarmp/bookingMaster.php?edit=" . $row["BookingId"] . ">Edit</a>";
                            echo "</td>";

                            echo "<td>";
                            echo "<a href=javascript:del(" . $row["BookingId"] . ")>Delete</a>";
                            echo "</td>";

                            echo "<tr>";
                        }
                        ?>


                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>