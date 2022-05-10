<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Master</title>
    <link rel="stylesheet" href="main.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">; -->


</head>

<body>
    <?php
    include "adminNavbar.php";
    ?>
    <?php
    $customerId = "";
    $name = "";
    $dob = "";
    $email = "";
    $address = "";
    $city = "";
    $contactNo = "";
    $updateMode = false;

    require_once 'DbConn.php';
    $obj = new DbCon();
    $conn = $obj->connect();
    $sql = "select * from customer";
    $result = $conn->query($sql);
    if(isset($_POST["btnSubmit"])){
        $name = $_POST["txtName"];
        $dob = $_POST["txtDOB"];
        $email = $_POST["txtEmail"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $contactNo = $_POST["txtContactNo"];
        $sql = "INSERT INTO customer(Name, Dob, Email, Address, City, ContactNo) VALUES ('$name','$dob','$email','$address','$city','$contactNo')";
        if($conn->query($sql)){
            echo "<script>window.location.href='/carresellarMP/userMaster.php'</script>";
        }
    }
    if(isset($_GET["edit"])){
        $updateMode = true;
        $customerId = $_GET["edit"];
        $sql = "select * from customer where CustomerId = $customerId";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $name = $row["Name"];
        $dob = $row["Dob"];
        $email = $row["Email"];
        $address = $row["Address"];
        $city = $row["City"];
        $contactNo = $row["ContactNo"];
    }
    if(isset($_POST["btnUpdate"])){
        $customerId = $_POST["txtCustomerId"];
        $name = $_POST["txtName"];
        $dob = $_POST["txtDOB"];
        $email = $_POST["txtEmail"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $contactNo = $_POST["txtContactNo"];

        $sql = "UPDATE customer SET Name='$name',Dob='$dob',Email='$email',Address='$address',City='$city',ContactNo='$contactNo' WHERE CustomerId = $customerId";
        if($conn->query($sql)){
            $updateMode = false;
            echo "<script>window.location.href='/carresellarMP/userMaster.php';</script>";
        }
    }
    if(isset($_GET["del"])){
        $customerId = $_GET["del"];
        $sql = "DELETE FROM customer WHERE CustomerId=$customerId";
        if($conn->query($sql)){
            echo "<script>window.location.href='/carresellarMP/userMaster.php';</script>";
        }
    }
    ?>
    <div class="container">
        <div class="admin-wrapper">
            <?php
            include "adminSidebar.php";
            ?>
            <div class="admin-maincontent">
                <h1>User Master</h1>
                <form action="UserMaster.php" method="POST">
                    <div class="admin-form">
                        <div class="form-row">
                            <label for="">Customer id</label><br>
                            <input class="form-element" type="text"  name="txtCustomerId" value="<?php echo $customerId?>" readonly>
                        </div>
                        <div class="form-row">
                            <label for="">Name</label><br>
                            <input class="form-element" type="text" name="txtName" value="<?php echo $name?>">
                        </div>
                        <div class="form-row">
                            <label for="">DOB</label><br>
                            <input class="form-element" type="date" name="txtDOB" value="<?php echo $dob?>">
                        </div>
                        <div class="form-row">
                            <label for="">Email</label><br>
                            <input class="form-element" type="text" name="txtEmail" value="<?php echo $email?>">
                        </div>
                        <div class="form-row">
                            <label for="">Address</label><br>
                            <textarea class="form-element" name="txtAddress" id="" cols="30" rows="10" ><?php echo $address?></textarea>
                        </div>
                        <div class="form-row">
                            <label for="">City</label><br>
                            <input class="form-element" type="text" name="txtCity" value="<?php echo $city?>">
                        </div>
                        <div class="form-row">
                            <label for="">Contact No.</label><br>
                            <input class="form-element" type="text" name="txtContactNo" value="<?php echo $contactNo?>">
                        </div>
                        <div class="form-row text-center button-hover">
                            <?php if ($updateMode == false) : ?>
                                <input type="submit" name="btnSubmit" value="Save">
                            <?php else : ?>
                                <input type="submit" name="btnUpdate" value="Update">
                            <?php endif ?>
                            <input type="reset" onclick="reload()" name="btnReset">
                        </div>
                </form>
            </div>
            <div class="admin-table">
                <table>
                    <tr>
                        <th>Customer Id</th>
                        <th>Name</th>
                        <th>Dob</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>ContactNo</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>";
                        echo $row["CustomerId"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["Name"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["Dob"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["Email"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["City"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["ContactNo"];
                        echo "</td>";

                        echo "<td>";
                        echo "<a href=/carresellarmp/UserMaster.php?edit=" . $row["CustomerId"] . ">Edit</a>";
                        echo "</td>";

                        echo "<td>";
                        echo "<a href=javascript:del(".$row["CustomerId"].")>Delete</a>";
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
            window.location.href='/carresellarMP/userMaster.php';
        }
        function del(id){
            if(confirm("Are you sure, you want to delete the record?")){
                window.location.href = "/carresellarmp/usermaster.php?del="+id;
            }
        }
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> -->

</body>

</html>