<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



</head>

<body>
    <?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    
    include("../connection.php");
    $userrow = $database->query("select * from patient where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];

    ?>


<!-- navv -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand" href="/Medi"> <img class="logo" src="../img/medisheba logo clr 1.png" alt=""> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="doctors.php">All Doctors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="schedule.php">Scheduled Sessions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="appointment.php">My Bookings</a>
        </li>
      </ul>
      <div class="profile-container d-flex align-items-center">
        <div class="profile-info ml-2">
          <p class="profile-title"><?php echo substr($username, 0, 13) ?>..</p>
          <p class="profile-subtitle"><?php echo substr($useremail, 0, 22) ?></p>
        </div>
        <a href="../logout.php" class="ml-3">
          <button class="btn btn-primary">Log Out</button>
        </a>
      </div>
    </div>
  </div>
</nav>



<!--nave-->
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                
                            </tr>
                        </table>
                    </td>
                </tr>
                
      


    </table>
    </div>
    <div class="dash-body" style="margin-top: 15px; background: #58fff2" >
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">

            <tr>

                <td colspan="1" class="nav-bar">
                    <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Home</p>

                </td>
                <td width="25%">

                </td>
                <td width="15%">
                    <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                        Today's Date
                    </p>
                    <p class="heading-sub12" style="padding: 0;margin: 0;">
                        <?php 
                                date_default_timezone_set('Asia/Kolkata');
        
                                $today = date('Y-m-d');
                                echo $today;


                                $patientrow = $database->query("select  * from  patient;");
                                $doctorrow = $database->query("select  * from  doctor;");
                                $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                                $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");


                                ?>
                    </p>
                </td>


            </tr>
            <tr>
                <td colspan="4">

                    <center>
                        <table class="filter-container doctor-header patient-header" style="border: none;width:95%"
                            border="0">
                            <tr>
                                <td>
                                    <h3>Welcome!</h3>
                                    <h1><?php echo $username  ?>.</h1>
                                    <p>How is health today? Please check out
                                        <a href="doctors.php" class="non-style-link"><b>"All Doctors"</b></a> section or
                                        <a href="schedule.php" class="non-style-link"><b>"Sessions"</b> </a><br>
                                    </p>

                                    <h3>Channel a Doctor Here</h3>
                                    <form action="schedule.php" method="post" style="display: flex">

                                        <input type="search" name="search" class="input-text "
                                            placeholder="Search Doctor and We will Find The Session Available"
                                            list="doctors" style="width:45%;">

                                        <?php
                                    echo '<datalist id="doctors">';
                                    $list11 = $database->query("select  docname,docemail from  doctor;");
    
                                    for ($y=0;$y<$list11->num_rows;$y++){
                                        $row00=$list11->fetch_assoc();
                                        $d=$row00["docname"];
                                        
                                        echo "<option value='$d'><br/>";
                                        
                                    };
    
                                echo ' </datalist>';
    ?>


                                        <input type="Submit" value="Search" class="login-btn btn-primary btn"
                                            style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                                        <br>
                                        <br>

                                </td>
                            </tr>
                        </table>
                    </center>

                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table border="0" width="100%"">
                            <tr>
                                <td width=" 50%">






                        <center>
                            <table class="filter-container" style="border: none;" border="0">
                                <tr>
                                    <td colspan="4">
                                        <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">
                                        <div class="dashboard-items"
                                            style="padding:20px;margin:auto;width:95%;display: flex">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $doctorrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    All Doctors
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons"
                                                style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                        </div>
                                    </td>
                                    <td style="width: 25%;">
                                        <div class="dashboard-items"
                                            style="padding:20px;margin:auto;width:95%;display: flex;">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $patientrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    All Patients
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">
                                        <div class="dashboard-items"
                                            style="padding:20px;margin:auto;width:95%;display: flex; ">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $appointmentrow ->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    NewBooking
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons"
                                                style="margin-left: 0px;background-image: url('../img/icons/book-hover.svg');">
                                            </div>
                                        </div>

                                    </td>

                                    <td style="width: 25%;">
                                        <div class="dashboard-items"
                                            style="padding:20px;margin:auto;width:95%;display: flex;padding-top:21px;padding-bottom:21px;">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $schedulerow ->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px">
                                                    Today Sessions
                                                </div>
                                            </div>

                                        </div>
                                    </td>

                                </tr>
                            </table>
                        </center>








                </td>
                <td>



                    <p style="font-size: 20px;font-weight:600;padding-left: 40px;" class="anime">Your Upcoming Booking
                    </p>
                    <center>
                        <div class="abc scroll" style="height: 250px;padding: 0;margin: 0;">
                            <table width="85%" class="sub-table scrolldown" border="0">
                                <thead>

                                    <tr>
                                        <th class="table-headin">


                                            Appoint. Number

                                        </th>
                                        <th class="table-headin">


                                            Session Title

                                        </th>

                                        <th class="table-headin">
                                            Doctor
                                        </th>
                                        <th class="table-headin">

                                            Scheduled Date & Time

                                        </th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                            $nextweek=date("Y-m-d",strtotime("+1 week"));
                                                $sqlmain= "select * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join doctor on schedule.docid=doctor.docid  where  patient.pid=$userid  and schedule.scheduledate>='$today' order by schedule.scheduledate asc";
                                                //echo $sqlmain;
                                                $result= $database->query($sqlmain);
                
                                                if($result->num_rows==0){
                                                    echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Nothing to show here!</p>
                                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Channel a Doctor &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                    
                                                }
                                                else{
                                                for ( $x=0; $x<$result->num_rows;$x++){
                                                    $row=$result->fetch_assoc();
                                                    $scheduleid=$row["scheduleid"];
                                                    $title=$row["title"];
                                                    $apponum=$row["apponum"];
                                                    $docname=$row["docname"];
                                                    $scheduledate=$row["scheduledate"];
                                                    $scheduletime=$row["scheduletime"];
                                                   
                                                    echo '<tr>
                                                        <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;'.
                                                        $apponum
                                                        .'</td>
                                                        <td style="padding:20px;"> &nbsp;'.
                                                        substr($title,0,30)
                                                        .'</td>
                                                        <td>
                                                        '.substr($docname,0,20).'
                                                        </td>
                                                        <td style="text-align:center;">
                                                            '.substr($scheduledate,0,10).' '.substr($scheduletime,0,5).'
                                                        </td>

                
                                                       
                                                    </tr>';
                                                    
                                                }
                                            }
                                                 
                                            ?>

                                </tbody>

                            </table>
                        </div>
                    </center>







                </td>
            </tr>
        </table>
        </td>
        <tr>
            </table>
    </div>
    </div>


    <?php require '../partials/footer.php'?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>