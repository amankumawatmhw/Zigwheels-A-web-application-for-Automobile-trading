<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selling Records Master</title>
    <link rel="stylesheet" href="main.css">

</head>

<body>
    <?php
    include "adminNavbar.php";
    ?>
     <?php
     
     $SalesId = "";
     $carID = "";
     $customerId = "";
     $price="";
     $dateOfSale = "";
     $adminID = "";
     $paperwork = "";

     require_once "DbConn.php";
     $obj = new DbCon();
     $conn = $obj->connect();

     $sql = "Select * from finalsale";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();

     $SalesId = $row["SalesId"];;
     $carID = $row["CarId"];;
     $customerId = $row["CustomerId"];
     $price = $row["Price"];
     $dateOfSale = $row["DateOfSale"];
     $adminID = $row["AdminId"];
     $paperwork = $row["PaperWork"];

    ?>
   

    <div class="container">
        <div class="admin-wrapper">
            <?php
            include "adminSidebar.php";
            ?>
            <div class="admin-maincontent">
                <h1>Selling Records</h1>
                <div class="admin-form">
                    <div class="form-row">
                        <label for="">Sales id</label><br>
                        <input class="form-element" type="text" name="txtSalesId">
                    </div>
                    <div class="form-row">
                        <label for="">Car Id</label><br>
                        <input class="form-element" type="text" name="txtCarId">
                    </div>
                    <div class="form-row">
                        <label for="">Car Name</label><br>
                        <input class="form-element" type="text" name="txtCarName">
                    </div>
                    <div class="form-row">
                        <label for="">Model</label><br>
                        <input class="form-element" type="text" name="txtModel">
                    </div>
                    <div class="form-row">
                        <label for="">CustomerID</label><br>
                        <input class="form-element" type="date" name="txtCustomerId">
                    </div>
                    <div class="form-row">
                        <label for="">Customer Name</label><br>
                        <input class="form-element" type="date" name="txtCustomerName">
                    </div>
                    <div class="form-row">
                        <label for="">Final Price</label><br>
                        <input class="form-element" type="text" name="txtFinalPrice">
                    </div>
                    <div class="form-row">
                        <label for="">Date Of Sale</label><br>
                        <input class="form-element" type="date" name="txtDate">
                    </div>
                    <div class="form-row">
                        <label for="">Admin Id</label><br>
                        <input class="form-element" type="text" name="txtAdminId">
                    </div>
                    <div class="form-row">
                        <label for="">Paper Work</label><br>
                        <input class="form-element" type="text" name="txtPaperWork">
                    </div>

                    <div class="form-row text-center button-hover">
                        <input type="submit" name="btnSubmit">
                        <input type="reset" name="btnReset">
                    </div>
                </div>
                <div class="admin-table">
                    <table>
                        <tr>
                            <th>Sales Id</th>
                            <th>Car Name</th>
                            <th>Customer Name</th>
                            <th>Final Price</th>
                            <th>Date Of Sale</th>
                            <th>Employee ID</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                       
                            echo "<tr>";

                            echo "<td>";
                            echo $SalesId;
                            echo "</td>";

                            echo "<td>";
                            echo $carID;
                            echo "</td>";

                            echo "<td>";
                            echo $customerId;
                            echo "</td>";

                            echo "<td>";
                            echo $price;
                            echo "</td>";

                            echo "<td>";
                            echo $dateOfSale;
                            echo "</td>";

                            echo "<td>";
                            echo $dateOfSale;
                            echo "</td>";

                            echo "<td>";
                            echo $adminID;
                            echo "</td>";

                            echo "<td>";
                            echo $paperwork;
                            echo "</td>";

                            echo "</tr>";

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