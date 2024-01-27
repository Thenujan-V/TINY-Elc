<?php
include 'connection.php';
if(isset($_POST['submit'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "select * from userdetails where mail = '$username'";
    $sqlSuperAdmin = "select * from superadmindetails where email = '$username'";
    $sqlAdmin = "select * from adminabcistore where username = '$username'";

    

    $result = mysqli_query($connection,$sql);
    $resultSuperAdmin = mysqli_query($connection,$sqlSuperAdmin);
    // $resultAdmin = mysqli_query($connection,$sqlAdmin);
    
    $row = mysqli_fetch_assoc($result);
    $rowSuperAdmin = mysqli_fetch_assoc($resultSuperAdmin);
    // $rowAdmin = mysqli_fetch_assoc($resultAdmin);


    if(mysqli_num_rows($resultSuperAdmin) > 0){
        if($password == $rowSuperAdmin["password"]){
            $uid = $row["id"];
            session_start();
            $_SESSION["uid"] = $uid;
            header("location:superAdminPages\superIndex.php");
        }
        else{
            echo
            "<script>alert('something went to wrong...')</script>";
        }
    }   

    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $uid = $row["id"];
            session_start();
            $_SESSION["uid"] = $uid;
            header("location:userIndex.php");
        }
        else{
            session_start();
            $_SESSION["uid"] = null;
            echo
            "<script>alert('something went to wrong...')</script>";
        }
    }
    // elseif(mysqli_num_rows($resultAdmin) > 0){
    //     if($password == $rowAdmin["password"]){
    //         header("location:indexAdmin.php");
    //     }
    //     else{
    //         echo
    //         "<script>alert('something went to wrong...')</script>";
    //     }
    // }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC mobiles</title>
    <link rel="stylesheet" href="style/loginStyle.css">
    <link rel="stylesheet" href="style/footerstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-lg-6 col-md-8 col-10" id="details">
                    <div class="top">
                        <h2>ABC mobiles</h2>
                        <h5>Hi there,</h5>
                    </div>
                    <h1>login</h1>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <input type="text" id="username" name="username" placeholder="username or email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder="password" class="form-control ">
                            <a href="#" class="text-decoration-none">forgotten password</a>
                        </div>
                        <input type="submit" id="btn" class="form-control" name="submit">
                    </form>
                    <div class="connect">
                        <div class="connectwith">
                            <div class="line"></div>
                            <h5 class="text-center my-3">or login with</h5>
                            <div class="line"></div>
                        </div>
                        <div class="brands text-center">
                            <a href="" class="text-decoration-none text-reset"><img src="ìmages\apple.png" alt=""></a>
                            <a href="" class="text-decoration-none text-reset"><img src="ìmages\facebook.png" alt=""></a>
                            <a href="" class="text-decoration-none text-reset"><img src="ìmages\search.png" alt=""></i></a>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="footer">
        <div class="container footbox">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12" id="footleft">
                    <h2>Sign up for updates</h2>
                    <h6>Subscribe to our newsletter to receive news, our new products, special offers and informations about Spices</h6>
                    <div class="input-group">
                        <input type="text" placeholder="Email Address" class="form-control">
                        <button class="btn">Get started</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6" id="social">
                    <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="ìmages\facebook.png" alt="facebook-logo"><span>Like us on Facebook</span></i></a>
                    <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2 "><img src="ìmages\instagram.png" alt="instragram-logo"><span>Follow us on Instragram</span></i></a>
                    <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="ìmages\youtube.png" alt="youtube-logo"><span>Subscribe our channel</span></a>
                    <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="ìmages\twitter.png" alt="twitter-logo"><span>Follow us on twitter</span></a>
                    <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="ìmages\linkedin.png" alt="linkedin-logo"><span>Add us on Linkedin</span></a>
                </div>
                <div class="col-lg-4 col-md-6 col-6" id="footright">
                    <h5>Spices</h5>
                    <div>
                        <address class="px-sm-5">999 BB Avenue<br>
                                Chunnakam,Jaffna 40000<br>
                                Srilanka.<a href="Map.html" id="map" class="text-decoration-none text-reset">  Map<i class="fa-solid fa-location-dot"></i></a><br>
                                
                        </address>
                        <div id="con-us">
                            <a href="tel:0705050564" class="text-decoration-none text-reset"><i class="fa-solid fa-mobile-screen-button"></i> Call (+94)70-5050-564</a>
                        </div>
                        <div id="con-us">
                            <a href="mailto:spices.organic@gmail.com" class="text-decoration-none text-reset">spices.organic@gmail.com</a>
                        </div>
                        <div id="con-us">
                            <a href="#" class="text-decoration-none text-reset">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </section>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="Js/registration.js"></script>
    
</body>
</html>