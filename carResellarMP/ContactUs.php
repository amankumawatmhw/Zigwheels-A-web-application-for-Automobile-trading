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
    <div class="container">
        <div class="contactusWrapper">
            <div class="contactUsMap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.412316143736!2d72.8634257147299!3d19.089559487080074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c85099bd2947%3A0x1ecc1a60c474a8ae!2sChhatrapati%20Shivaji%20Maharaj%20International%20Airport!5e0!3m2!1sen!2sus!4v1626090265566!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="contactUsAddress">
                <h2>Address</h2>
                <hr>
                <h4 style="direction:rtl; " >ALBA CARS - No.1 Used Car Showroom in Dubai, UAE</h4>
                <h5 style="direction:rtl; color:teal;">Al Asayel St Kahramana street 2 signal Enter from the service road Warehouse 17 - Dubai - United Arab Emirates</h5><hr>
                <div class="gap"></div>
                <h4 style="direction:rtl">Marylebone Car Centre - Used Cars London - Car Servicing & Mot's, UK</h4>
                <h5 style="direction:rtl; color:teal;">62a Balcombe St, London NW1 6NE, United Kingdom</h5><hr>
                <div class="gap"></div>
                <h4 style="direction:rtl; background-color:silver">Mumbai, India</h4>
                <h5 style="direction:rtl; color:teal;"> 2B/2C, Near Western Express Highway, Andheri East, Mumbai, Maharashtra and website of Chhatrapati Shivaji International Airport</h5>
                <div class="gap"></div>
            </div>
        </div>
        <hr>
        <div class="gap"></div>
        <div class="contactUsForm">
            <h2>Your Queries</h2>
            <p>If you have any query, please fill out this form our agent will contact you.</p>
            <div class="form-row" class="form-element">
                <label for="">Name</label><br>
                <input type="text" name="txtName">
            </div>
            <div class="form-row" class="form-element">
                <label for="">Message</label><br>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>
            <h5>We are glad to help you.</h3>Thanks.
                <div class="form-row text-center button-hover">
                    <input type="submit" name="btnSubmit">
                    <input type="reset" name="btnReset">
                </div>

        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>