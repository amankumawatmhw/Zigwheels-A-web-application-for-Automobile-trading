<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <?php
      include "navbar.php";
    ?>
    <?php
       require_once "DbConn.php";
       $obj = new DbCon();
       $conn = $obj->connect();
       $sql = "SELECT * FROM car WHERE Status != 'Sold'";
       $result = $conn->query($sql);

    ?>
    <div class="container">
        <div class="cover">
            <input type="text">
            <input type="button" value="search">
        </div>
        <div class="main-content">
            <h2 style="text-align: center; margin: 10px;">Available Cars</h2>
                <div class="car-view">
                    
                    <?php
                        while($row = $result->fetch_assoc()){
                            echo '<div class="item">';
                            echo '<a href="productDetails.php?id='.$row["CarId"].'">';
                            echo '<img src="img/product/'.$row["CarId"].'.jpg" alt="">';
                            echo '<h2>' .$row["Name"]. '</h2>';
                            echo '<h2>' .$row["Price"]. '</h2>';
                            echo '</a>';
                            echo '</div>';
                        }
                    ?>  
                    <!-- <div class="item">
                        <a href="productDetails.html"></a>
                        <img src="img/car.jpg" alt="">
                        <h2>Lexus Ls</h2>
                        <h2>28.5 lakhs</h2>
                    </div> -->
                </div>
            </div>
        <div>
    </div>
    
    <?php
       include "footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>