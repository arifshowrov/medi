<?php

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";


date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$_SESSION["date"]=$date;



if($_POST){

    

    $_SESSION["personal"]=array(
        'fname'=>$_POST['fname'],
        'lname'=>$_POST['lname'],
        'address'=>$_POST['address'],
        'nic'=>$_POST['nic'],
        'dob'=>$_POST['dob']
    );


    print_r($_SESSION["personal"]);
    header("location: create-account.php");




}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <title>Sign Up</title>

</head>

<body>
    <?php require 'partials/_nav.php'?>
    <hr>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70 vh">


        <form class="border shadow rounded p-3" style="width:300" action="" method="POST">
            <center>
                <h3 class="text-center p-3">Register as Patient</h3>
                <p>Add your personal details here</p>

                <div class="form-group">

                    <div class="form-group">
                        <label for="name" class="form-label">Name: </label>
                        <input type="text" name="fname" class="input-text" placeholder="First Name" required>
                        <input type="text" name="lname" class="input-text" placeholder="Last Name" required>
                    </div>


                    <div class="form-group">

                        <label for="address" class="form-label">Address: </label>
                        <input type="text" name="address" class="input-text" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <label for="nic" class="form-label">NIC: </label>
                        <input type="text" name="nic" class="input-text" placeholder="NIC Number" required>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="form-label">Date of Birth: </label>
                        <input type="date" name="dob" class="input-text" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="reset" value="Reset" class="login-btn btn-primary btn">
                        <input type="submit" value="Next" class="login-btn btn-primary btn">
                    </div>
                    <br>
                    <div>
                        <label for="" class="sub-text" style="font-weight: 280;">Already have an
                            account? >
                        </label>
                        <a href="login.php">Login</a>
                        <br>
                    </div>

                </div>
            </center>
        </form>
    </div>

</body>

</html>