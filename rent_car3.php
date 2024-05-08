<?php session_start(); 
include 'availablecarstorent3.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;
    0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <style>
        body{
            background-color:   rgb(253, 153, 119);
        }
        .main_container{
            padding: 3rem;
            margin:auto;
            width: 50%;
            background-color: antiquewhite;
        }

        @media (max-width:854px) {
            .main_container{
            width: 100%;
        }
        }
    </style>
</head>
<body>
<?php
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "customer"){
        // echo "<h3>Rent Car</h3>";
        // echo "<form action='rent_car.php' method='post'>";
        // echo "<label for='days'>Number of Days:</label>";
        // echo "<select name='days' id='days'>";
        // echo "<option value='1'>1 Day</option>";
        // echo "<option value='2'>2 Days</option>";
        // // Add more options as needed
        // echo "</select><br><br>";
        // echo "<label for='start_date'>Start Date:</label>";
        // echo "<input type='date' name='start_date' id='start_date' required><br><br>";
        // echo "<input type='submit' value='Rent Car'>";
        // echo "</form>";
        echo "<div class='text-center text text-light p-2 '><a class='bg-warning p-2 text text-light' href='formtorent.php' 
        name='rent'>Rent Car</a></div>";
    }
       else if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "agency"){ 
        echo "<div class='text-center text text-light p-2 fs-4'>Sorry! Agency members are not allowed to Rent Car.</div>";
       
    }else{
         echo "<div class='text-center text text-light p-2'><button class='btn btn-warning '><a class='text text-light text-decoration-none' href='login_customer.php'>Rent Car</a></button></div>";
         echo "<div class='text-center text text-light fs-4'>Please <a class='text text-light text-decoration-none' href='login_customer.php'>Login</a> to rent a car.</div>";
    }
    ?>
</body>
</html>