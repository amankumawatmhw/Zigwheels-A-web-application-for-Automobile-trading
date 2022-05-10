<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Master</title>
    <link rel="stylesheet" href="main.css">

</head>

<body>
    <?php
    include "adminNavbar.php";
    ?>
    <?php
  
    require_once "DbConn.php";
    $updateMode = false;
    $carId = "";
    $name = "";
    $model = "";
    $description = "";
    $engine = "";
    $price = "";
    $mileage = "";
    $fuel = "";
    $expertview = "";
    $status = "";
    $obj = new DbCon();
    $conn = $obj->connect();
    $sql = "select * from car";
    $result = $conn->query($sql);

    if (isset($_POST["btnSubmit"])) {
        $name = $_POST["txtName"];
        $model = $_POST["txtModel"];
        $description = $_POST["txtDescription"];
        $engine = $_POST["txtEngine"];
        $price = $_POST["txtPrice"];
        $mileage = $_POST["txtMileage"];
        $fuel = $_POST["txtFuelType"];
        $expertview = $_POST["txtExpertView"];
        $status = $_POST["ddlStatus"];
        $sql = "INSERT INTO car(Name, Model, Description, Engine, Price, Mileage, FuelType, ExpertView, Status) VALUES ('$name','$model','$description','$engine','$price','$mileage','$fuel','$expertview','$status')";

        if ($conn->query($sql)) {
            if ($_FILES["fldcarImage"]["name"]) {
                $sql1 = "select max(CarId) as CarId from car";
                $result = $conn->query($sql1);

                $row = $result->fetch_assoc();

                $idNew = $row["CarId"];

                $targetDirectory = "img/product/";
                $ext = pathinfo($_FILES["fldcarImage"]["name"], PATHINFO_EXTENSION);

                if ($ext != "jpg") {
                    echo "<script>alert('Only JPG Format Acceptable')</script>";
                    die;
                }

                $targetLocation = $targetDirectory . $idNew . "." . $ext;

                try {
                    move_uploaded_file($_FILES["fldcarImage"]["tmp_name"], $targetLocation);
                    clearstatcache();
                } catch (Throwable $th) {
                    echo "<script>alert('" . $th . "')</script>";
                }
            }
            echo "<script>window.location.href='/carresellarMP/carMaster.php'</script>";
        }
    }
    if (isset($_GET["edit"])) {
        $updateMode = true;
        $carId = $_GET["edit"];
        $sql = "select * from car where CarId=$carId";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $name = $row["Name"];
        $model = $row["Model"];
        $description = $row["Description"];
        $engine = $row["Engine"];
        $price = $row["Price"];
        $mileage = $row["Mileage"];
        $fuel = $row["FuelType"];
        $expertview = $row["ExpertView"];
        $status = $row["Status"];
    }

    if(isset($_POST["btnUpdate"])){
        $carId = $_POST["txtCarId"];
        $name = $_POST["txtName"];
        $model = $_POST["txtModel"];
        $description = $_POST["txtDescription"];
        $engine = $_POST["txtEngine"];
        $price = $_POST["txtPrice"];
        $mileage = $_POST["txtMileage"];
        $fuel = $_POST["txtFuelType"];
        $expertview = $_POST["txtExpertView"];
        $status = $_POST["ddlStatus"];
        $sql = "UPDATE car SET Name='$name',Model='$model',Description='$description',Engine='$engine',Price='$price',Mileage='$mileage',FuelType='$fuel',ExpertView='$expertview',Status='$status' WHERE CarId=$carId";
        if($conn->query($sql)){
        $name = $_POST["txtName"];
        $model = $_POST["txtModel"];
        $description = $_POST["txtDescription"];
        $engine = $_POST["txtEngine"];
        $price = $_POST["txtPrice"];
        $mileage = $_POST["txtMileage"];
        $fuel = $_POST["txtFuelType"];
        $expertview = $_POST["txtExpertView"];
        $status = $_POST["ddlStatus"];
        $sql = "INSERT INTO car(Name, Model, Description, Engine, Price, Mileage, FuelType, ExpertView, Status) VALUES ('$name','$model','$description','$engine','$price','$mileage','$fuel','$expertview','$status')";

        if ($conn->query($sql)) {
            if ($_FILES["fldcarImage"]["name"]) {
               
                $idNew = $carId;

                $targetDirectory = "img/product/";
                $ext = pathinfo($_FILES["fldcarImage"]["name"], PATHINFO_EXTENSION);

                if ($ext != "jpg") {
                    echo "<script>alert('Only JPG Format Acceptable')</script>";
                    die;
                }

                $targetLocation = $targetDirectory . $idNew . "." . $ext;

                try {
                    move_uploaded_file($_FILES["fldcarImage"]["tmp_name"], $targetLocation);
                    clearstatcache();
                } catch (Throwable $th) {
                    echo "<script>alert('" . $th . "')</script>";
                }
            }
            echo "<script>window.location.href='/carresellarMP/carMaster.php'</script>";
        }
        }
    }
    if(isset($_GET["del"])){
        $carId = $_GET["del"]; 
        $sql = "DELETE FROM car WHERE CarId=$carId";
        if($conn->query($sql)){
            // $file_pointer = "img/product/".$carId.".jpg";
            // if (!unlink($file_pointer)) { 
            //     echo ("$file_pointer cannot be deleted due to an error"); 
            // } 
            // else { 
            //     echo ("$file_pointer has been deleted"); 
            // } 
            echo "<script>window.location.href='/carresellarMP/carMaster.php'</script>";
        }
    }

    ?>
    <div class="container">
        <div class="admin-wrapper">
            <?php
            include "adminSidebar.php";
            ?>
            <div class="admin-maincontent">
                <h1>Car Master</h1>
                <form action="carMaster.php" method="POST" enctype="multipart/form-data">
                    <div style="display: flex;">
                        <div class="admin-form">
                            <div class="form-row">
                                <label for="">Car id</label><br>
                                <input class="form-element" type="text" name="txtCarId" value="<?php echo $carId;?>">
                            </div>
                            <div class="form-row">
                                <label for="">Name</label><br>
                                <input class="form-element" type="text" name="txtName" value="<?php echo $name; ?>">
                            </div>
                            <div class="form-row">
                                <label for="">Model</label><br>
                                <input class="form-element" type="text" name="txtModel" value="<?php echo $model; ?>">
                            </div>
                            <div class="form-row">
                                <label for="">Description</label><br>
                                <textarea name="txtDescription" class="form-element" cols="30" rows="10" ><?php echo $description; ?></textarea>
                            </div>
                            <div class="form-row">
                                <label for="">Engine</label><br>
                                <input class="form-element" type="text" name="txtEngine" value="<?php echo $engine; ?>">
                            </div>
                            <div class="form-row">
                                <label for="">Price</label><br>
                                <input class="form-element" type="text" name="txtPrice" value="<?php echo $price; ?>">
                            </div>

                            <div class="form-row">
                                <label for="">Mileage</label><br>
                                <input class="form-element" type="text" name="txtMileage" value="<?php echo $mileage; ?>">
                            </div>
                            <div class="form-row">
                                <label for="">Fuel Type</label><br>
                                <input class="form-element" type="text" name="txtFuelType" value="<?php echo $fuel; ?>">
                            </div>
                            <div class="form-row">
                                <label for="">Expert View</label><br>
                                <textarea name="txtExpertView" id="" cols="30" rows="10" ><?php echo $expertview; ?></textarea>
                            </div>
                            <div class="form-row">
                                <label for="">Status</label><br>
                                <select name="ddlStatus" class="form-element" value="<?php echo $status ?>">
                                    <option value="Available">Available</option>
                                    <option value="Booked">Booked</option>
                                    <option value="Sold">Sold</option>
                                </select>
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
                        <div class="signup-image">
                            <div class="car-image">
                                <img src="<?php echo "img/product/". $carId . ".jpg" ?>" alt="" width="100%" height="230px">
                            </div>
                            <div class="gap"></div>
                            <input type="file" name="fldcarImage">
                        </div>
                </form>
            </div>

            <div class="admin-table">
                <table>
                    <tr>
                        <th>Car Id</th>
                        <th>Name</th>
                        <th>Model</th>
                        <th>Engine</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>";
                        echo $row["CarId"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["Name"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["Model"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["Engine"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["Price"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["Status"];
                        echo "</td>";

                        echo "<td>";
                        echo "<a href=/carresellarmp/carMaster.php?edit=" . $row["CarId"] . ">Edit</a>";
                        echo "</td>";

                        echo "<td>";
                        echo "<a href=javascript:del(" . $row["CarId"] . ")>Delete</a>";
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
        function reload() {
            window.location.href = '/carresellarMP/carMaster.php';
        }

        function del(id) {
            if (confirm("Are you sure, you want to delete the record?")) {
                window.location.href = "/carresellarmp/carMaster.php?del=" + id;
            }
        }
    </script>
</body>

</html>