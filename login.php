<?php
include 'connection.php';
if(isset($_POST['submit'])){
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "select * from userdetails where mail = '$username'";
    $sqlSuperAdmin = "select * from superadminabcistore where username = '$username'";
    $sqlAdmin = "select * from adminabcistore where username = '$username'";

    

    $result = mysqli_query($connection,$sql);
    // $resultSuperAdmin = mysqli_query($connection,$sqlSuperAdmin);
    // $resultAdmin = mysqli_query($connection,$sqlAdmin);
    
    $row = mysqli_fetch_assoc($result);
    // $rowSuperAdmin = mysqli_fetch_assoc($resultSuperAdmin);
    // $rowAdmin = mysqli_fetch_assoc($resultAdmin);


    // if(mysqli_num_rows($resultSuperAdmin) > 0){
    //     if($password == $rowSuperAdmin["password"]){
    //         header("location:indexSuperAdmin.php");
    //     }
    //     else{
    //         echo
    //         "<script>alert('something went to wrong...')</script>";
    //     }
    // }   
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $id = $row["id"];
            //$_SESSION['username'] = $fetch["username"];
            $_SESSION["id"] = $id;

            header("location:index.php");
        }
        else{
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login" style="background: linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.7)),url(media/register.jpg) ;background-size: cover;background-position: center;">
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
                            <a href="" class="text-decoration-none text-reset"><img src="Media/google.png" alt=""></a>
                            <a href="" class="text-decoration-none text-reset"><img src="Media/facebook.png" alt=""></a>
                            <a href="" class="text-decoration-none text-reset"><img src="Media/apple-logo.png" alt=""></i></a>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="Js/registration.js"></script>
    
</body>
</html>