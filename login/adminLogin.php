<?php
session_start();
include('../init/db.php');
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con,$_POST['uemail']);
    $psw = mysqli_real_escape_string($con,$_POST['psw']);
    // check email is already in db or not
    $checkEmailSelect = "select * from adminlogindb where email = '$email'";
    $CheckEmailQuery = mysqli_query($con,$checkEmailSelect);
    $row = mysqli_num_rows($CheckEmailQuery);
    if($row > 0){ 
        $fetch = mysqli_fetch_assoc($CheckEmailQuery);
        $pass = $fetch['password'];
        $boolPass = password_verify($psw,$pass);
        if($boolPass){
             $_SESSION['Username'] =  $fetch['userName'];
             $_SESSION['email'] =  $fetch['email'];
             $_SESSION['id'] =  $fetch['id'];
            ?>
             <script>window.location.href='../admin/admin-dashboard.php';</script>           
            <?php
        }else{
            ?> <script>alert('Something goes wrong')</script>           
            <?php
        }

    }else{
        ?> <script>alert('No data found')</script>           
        <?php
    }

}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login || RushDrive Service</title>
   <link rel="stylesheet" href="./css/adminLogin.css">
</head>

<body>
    <div class="container">
        <div class="firstHalf"></div>
        <div class="secondHalf">
            <form action="#" method="post">           

                <div class="container1">
                    <h1>Admin Panel</h1><br>
                    <label for="uemail"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="uemail" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <button type="submit" name="submit">Login</button>                    
                </div>                
            </form>

        </div>
    </div>
</body>

</html>