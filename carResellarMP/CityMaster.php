<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Master</title>
    <link rel="stylesheet" href="main.css">

</head>

<body>

    <?php
    include "adminNavbar.php";
    ?>
    <?php
    $cityId = "";
    $cityName = "";
    $state = "";
    $updateMode = false;

    require_once 'DbConn.php';
    $obj = new DbCon();
    $conn = $obj->connect();
    $sql = "select * from city";
    $result = $conn->query($sql);
    if (isset($_GET["btnSubmit"])) {
        $cityName = $_GET["txtCityName"];
        $state = $_GET["txtState"];
        $sql1 = "INSERT INTO city (Name, State) VALUES ('$cityName','$state')";
        // echo($sql1);
        if ($conn->query($sql1)) {
            echo "Insert Successfully";
            echo ("<script> window.location.href='/carresellarMP/cityMaster.php';</script>");
        } else {
            echo "Error in saving data";
        }
    }
    if (isset($_GET["edit"])) {
        $updateMode = true;
        $editId = $_GET["edit"];
        $sql = "select * from City where CityId=$editId";
        $editResult = $conn->query($sql);
        $editRow = $editResult->fetch_assoc();
        $cityId = $editRow["CityId"];
        $cityName = $editRow["Name"];
        $state = $editRow["State"];
    }
    if (isset($_GET["btnUpdate"])) {
        $cityId = $_GET["txtCityId"];
        $cityName = $_GET["txtCityName"];
        $state = $_GET["txtState"];
        $sql = "UPDATE city SET Name = '$cityName', State='$state' WHERE CityId=$cityId";
        if ($conn->query($sql)) {
            echo "<script>alert('Updated Successfully')</script>";
            echo "<script>window.location.href='/carresellarMP/cityMaster.php'</script>;";
        }
    }
    if(isset($_GET["del"])){
        $cityId = $_GET["del"];
        $sql = "DELETE FROM city WHERE CityId=$cityId";
        if($conn->query(($sql))){
            echo "<script>window.location.href='/carresellarMP/cityMaster.php'</script>;";
        }
    }

    ?>
    <div class="container">
        <div class="admin-wrapper">
            <?php
            include "adminSidebar.php";
            ?>
            <div class="admin-maincontent">
                <h1>City Master</h1>
                <div class="admin-form">
                    <form action="CityMaster.php" method="GET">
                        <div class="form-row">
                            <label for="">City id</label><br>
                            <input type="text" name="txtCityId" value="<?php echo $cityId; ?>" >
                        </div>
                        <div class="form-row">
                            <label for="">City Name</label><br>
                            <input type="text" name="txtCityName" value="<?php echo $cityName; ?>">
                        </div>
                        <div class="form-row">
                            <label for="">State</label><br>
                            <input type="text" name="txtState" value="<?php echo $state; ?>">
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
                            <th>City Id</th>
                            <th>Name</th>
                            <th>State</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>";
                            echo $row["CityId"];
                            echo "</td>";

                            echo "<td>";
                            echo $row["Name"];
                            echo "</td>";

                            echo "<td>";
                            echo $row["State"];
                            echo "</td>";

                            echo "<td>";
                            echo "<a href=/carresellarmp/CityMaster.php?edit=" . $row["CityId"] . ">Edit</a>";
                            echo "</td>";

                            echo "<td>";
                            echo "<a href=javascript:del(" .$row["CityId"].")>Delete</a>";
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

    <script>
        function reload(){
            window.location.href='/carresellarMP/cityMaster.php';
        }
        function del(id){
            if(confirm("Are you sure, you want to delete the record?")){
                window.location.href = "/carresellarmp/citymaster.php?del="+id;
            }
        }

    </script>

</body>

</html>