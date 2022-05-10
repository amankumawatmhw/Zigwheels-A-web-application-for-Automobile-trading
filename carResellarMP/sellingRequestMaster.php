<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selling Request Master</title>
    <link rel="stylesheet" href="main.css">

</head>

<body>
    <?php
    include "adminNavbar.php";
    ?>
    <?php
     $updateMode= false;
     $requestId = "";
     $carName = "";
     $description = "";
     $modelyear = "";
     $customerId = "";
     $customerName = "";
     $price = "";
     $engine = "";

     require_once "DbConn.php";
     $obj = new DbCon();
     $conn = $obj->connect();

     $sql = "Select * from requesttosell";
     $result = $conn->query($sql);

     $sql = "Select * from requesttosell";
     $result1 = $conn->query($sql);
     $row1 = $result1->fetch_assoc();
     $sql1 = "Select CustomerID	from requesttosell where RequestId = $row1[CustomerID]";
     
     $sql2 = "Select * from customer where CustomerId = $row1[CustomerID]";
     $result2 = $conn->query($sql2);
     $row2 = $result2->fetch_assoc();
     $customerName = $row2["Name"];
    //  echo $customerName;
    if(isset($_GET["edit"])){
        $updateMode = true;
        $requestId = $_GET["edit"];
        $sql = "Select * from requesttosell where RequestId=$requestId";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $carName = $row["CarName"];
        $description = $row["Description"];
        $modelyear = $row["ModelYear"];
        $customerId = $row["CustomerID"];
        $customerName = $customerName;
        $price = $row["ExpectedPrice"];
        $engine = $row["Engine"];
    }
    if(isset($_POST["btnUpdate"])){
        $requestId= $_POST["txtRequestId"];
        $carName = $_POST["txtCarName"];
        $description = $_POST["txtDescription"];
        $modelyear = $_POST["txtModel"];
        $engine = $_POST["txtEngine"];
        $sql = "UPDATE requesttosell SET CarName='$carName',Description='$description',ModelYear=$modelyear,Engine=$engine WHERE RequestId=$requestId";
        echo $sql;
        if($conn->query($sql)){
            $updateMode = false;
            echo "<script>window.location.href='/carresellarMP/sellingrequestmaster.php';</script>";
        }
    }
   

    ?>

    <div class="container">
        <div class="admin-wrapper">
            <?php
            include "adminSidebar.php";
            ?>

            <div class="admin-maincontent">
                <h1>Selling Request</h1>
                <form action="sellingRequestMaster.php" method="POST">
                    <div class="admin-form">
                        <div class="form-row">
                            <label for="">Request ID</label><br>
                            <input class="form-element" type="text" name="txtRequestId" value="<?php echo $requestId; ?>" readonly>
                        </div>
                        <div class="form-row">
                            <label for="">Car Name</label><br>
                            <input class="form-element" type="text" name="txtCarName" value="<?php echo $carName; ?>">
                        </div>
                        <div class="form-row">
                            <label for="">Description</label><br>
                            <textarea class="form-element" name="txtDescription" cols="30" rows="10"><?php echo $description ?></textarea>
                        </div>
                        <div class="form-row">
                            <label for="">Model Year</label><br>
                            <input class="form-element" type="text" name="txtModel" value="<?php echo $modelyear; ?>">
                        </div>
                        <div class="form-row">
                            <label for="">Customer ID</label><br>
                            <input class="form-element" type="text" name="txtCustomerId" value="<?php echo $customerId ?>" readonly>
                        </div>
                        <div class="form-row">
                            <label for="">Customer Name</label><br>
                            <input class="form-element" type="text" name="txtCustomerName" value="<?php echo $customerName ?>" >
                        </div>
                        <div class="form-row">
                            <label for="">Expected Price</label><br>
                            <input class="form-element" type="text" name="txtExpectedPrice" value="<?php echo $price ?>" readonly>
                        </div>
                        <div class="form-row">
                            <label for="">Engine</label><br>
                            <input type="text" name="txtEngine" value="<?php echo $engine ?>">
                        </div>

                        <div class="form-row text-center button-hover">
                            <?php if ($updateMode == false) : ?>
                                <input type="submit" name="btnSubmit" value="Save">
                            <?php else : ?>
                                <input type="submit" name="btnUpdate" value="Update">
                            <?php endif ?>
                            <input type="reset" onclick="reload()" name="btnReset">
                        </div>
                    </div>
                </form>
                <div class="admin-table">
                    <table>
                        <tr>
                            <th>Request Id</th>
                            <th>Car Name</th>
                            <th>Customer Name</th>
                            <th>Expected Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        while ($row=$result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>";
                            echo $row["RequestId"];
                            echo "</td>";

                            echo "<td>";
                            echo $row["CarName"];
                            echo "</td>";

                            echo "<td>";
                            echo "$customerName";
                            echo "</td>";

                            echo "<td>";
                            echo $row["ExpectedPrice"];
                            echo "</td>";

                            echo "<td>";
                            echo "<a href=/carresellarmp/sellingrequestmaster.php?edit=" . $row["RequestId"] . ">Edit</a>";
                            echo "</td>";

                            echo "<td>";
                            echo "<a href=javascript:del(" . $row["RequestId"] . ")>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
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
    <script>
       function reload(){
            window.location.href='/carresellarMP/sellingrequestMaster.php';
        }
        function del(id){
            if(confirm("Are you sure, you want to delete the record?")){
                window.location.href = "/carresellarmp/sellingrequestMaster.php?del="+id;
            }
        }
    </script>
</body>

</html>