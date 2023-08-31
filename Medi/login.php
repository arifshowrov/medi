<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Login</title>



</head>

<body>
    <?php require 'partials/_nav.php'?>
    <?php

   
    session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
    

   
    include("connection.php");

    



    if($_POST){

        $email=$_POST['useremail'];
        $password=$_POST['userpassword'];
        
        $error='<label for="promter" class="form-label"></label>';

        $result= $database->query("select * from webuser where email='$email'");
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='p'){
                $checker = $database->query("select * from patient where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows==1){


                    
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='p';
                    
                    header('location: patient/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }elseif($utype=='a'){
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


                   
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }


            }elseif($utype=='d'){
                $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
                if ($checker->num_rows==1){


                 
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='d';
                    header('location: doctor/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }
            
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
        }






        
    }else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>






    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh">

        <center>
            <h2>Welcome Back!</h2>

            <div class="form-body">
                <p class="sub-text">Login with your details to continue</p>
                <form class="border shadow rounded p-3" style="width:300" action="" method="POST">
                    <div class="form-group">

                        <label for="useremail" class="form-label">Email: </label>
                        <input type="email" name="useremail" class="input-text" placeholder="Email Address" required>

                    </div>


                    <div class="form-group">
                        <label for="userpassword" class="form-label">Password: </label>
                        <input type="Password" name="userpassword" class="input-text" placeholder="Password" required>

                    </div>
                    <?php echo $error ?>

                    <input type="submit" value="Login" class="login-btn btn-primary btn">
                </form>
            </div>
            <div>
                <label for="" class="sub-text" style="font-weight: 280;">Don't have an account&#63; </label>
                <a href="signup.php" class="login-btn btn-primary btn">Sign Up</a>
                <br>




            </div>
        </center>
    </div>
</body>

</html>