<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <title>Create Account</title>
    >
</head>

<body>

    <?php


session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$_SESSION["date"]=$date;


include("connection.php");





if($_POST){

    $result= $database->query("select * from webuser");

    $fname=$_SESSION['personal']['fname'];
    $lname=$_SESSION['personal']['lname'];
    $name=$fname." ".$lname;
    $address=$_SESSION['personal']['address'];
    $nic=$_SESSION['personal']['nic'];
    $dob=$_SESSION['personal']['dob'];
    $email=$_POST['newemail'];
    $tele=$_POST['tele'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    
    if ($newpassword==$cpassword){
        $result= $database->query("select * from webuser where email='$email';");
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        }else{
            
            $database->query("insert into patient(pemail,pname,ppassword, paddress, pnic,pdob,ptel) values('$email','$name','$newpassword','$address','$nic','$dob','$tele');");
            $database->query("insert into webuser values('$email','p')");

         
            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;

            header('Location: patient/index.php');
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>';
    }



    
}else{

    $error='<label for="promter" class="form-label"></label>';
}

?>


    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh">

        <center>
            <h2>Let's Get Started</h2>
            <p> Now Create User Account.</p>
            <form class="border shadow rounded p-3" style="width:300" action="" method="POST">
                <div class="form-group">
                    <label for="newemail" class="form-label">Email: </label>
                    <input type="email" name="newemail" class="input-text" placeholder="Email Address" required>
                    </div">
                    <div class="form-group">
                        <label for="tele" class="form-label">Mobile Number: </label>

                        <input type="tel" name="tele" class="input-text" placeholder="number">
                    </div>
                    <div class="form-group">
                        <label for="newpassword" class="form-label">Create Password: </label>

                        <input type="password" name="newpassword" class="input-text" placeholder="New Password"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="cpassword" class="form-label">Confirm Password: </label>
                        <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password"
                            required>
                    </div>
                    <?php echo $error ?>
                    <div>
                        <input type="reset" value="Reset" class="login-btn btn-primary btn">

                        <input type="submit" value="Sign Up" class="login-btn btn-primary btn">
                    </div>
                    <label for="" class="sub-text">Already have an account?
                    </label>
                    <a href="login.php">Login</a>
                    <br><br>

            </form>
        </center>
    </div>
</body>

</html>