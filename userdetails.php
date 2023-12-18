<?php
    include 'connection.php';
    session_start();
    $uid = $_SESSION['id'];

    $sqluser = "select * from userdetails where id = $uid";
    $resultuser = mysqli_query($connection,$sqluser);
    $rowuser = mysqli_fetch_assoc($resultuser);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/navbarstyle.css">
    <link rel="stylesheet" href="style/footerstyle.css">

    
</head>
<body>
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <a class="navbar-brand " href="index.php">TINY Elc</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-5" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    All
                </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="product.php?category='mobile'">Laptops</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="product.php?category='mobile'">Mobile phones</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="product.php?category='smart watch'">Smart watches</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="product.php?category='tv'">Television</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="product.php?category='camara'">Camaras</a></li>
                  </ul>            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aboutpage.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contactpage.php" >Customer service</a>
            </li>
            
            
          </ul>
          <form class="form-inline" id="search">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
          <form class="form-inline" id="account">
            <a href="cart.php" class="btn mr-3" type="button" id="cart"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>
            <a class="btn" type="button" id="Register" href="register.php">Register</a>
            <a class="btn" type="button" id="login" href="login.php">Login</a>
            <a class="btn" href="userdetails.php" type="button" id="user"><i class="fa-solid fa-user fa-2xl"></i></a>
              
          </form>
        </div>
      </nav>
    <section>
    <div class="signup" style="background: linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.7)),url(ìmages\login.jpg) ;background-size: cover;background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-11" id="register">
                        <h1>User Profile</h1>
                        <form class="form m-2" method="post" action="">
                            <p>UserName</p>
                            <input type="text" class="form-outline mx-3 w-50" name="name" value="<?php echo $rowuser['name'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_name" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Email</p>
                            <input type="email" class="form-outline mx-3 w-50" name="email" value="<?php echo $rowuser['mail'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_email" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Phone</p>
                            <input type="text" class="form-outline mx-3 w-50" name="phone" value="<?php echo $rowuser['phoneno'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_phone" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Address</p>
                            <input type="text" class="form-outline mx-3 w-50" name="address" value="<?php echo $rowuser['address'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_address" value="save">
                        </form>
                </div>
                <?php 
                if(isset($_POST['submit_name'])){
                  $new_name = $_POST['name'];
                  if($new_name != $rowuser['name']){
                      if($new_name != ''){
                          $sql = "UPDATE userdetails SET name='$new_name' WHERE id='$uid'";
                          $result = mysqli_query($connection,$sql);
                          if($result){
                              echo "<script>alert('Details updated successfully')</script>";
                              echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                          }
                          else{
                              echo "<script>alert('Unable to update details.')</script>";
                              echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                          }
                      }
                      else{
                          echo "<script>alert('Invalid input')</script>";
                          echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                      }
                  }
              }
              if(isset($_POST['submit_email'])){
                $new_email = $_POST['email'];
                if($new_email != $rowuser['mail']){
                    if($new_email!= '' && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $new_email)){
                        $sql_check ="SELECT * FROM userdetails WHERE mail='$new_email'";
                        $result_check = mysqli_query($connection,$sql_check);
                        if(mysqli_num_rows($result_check) == 0){
                            $sql = "UPDATE userdetails SET mail='$new_email' WHERE id='$uid'";
                            $result = mysqli_query($connection,$sql);
                            if($result){
                                echo "<script>alert('Details updated successfully')</script>";
                                echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                            }
                            else{
                                echo "<script>alert('Unable to update details.')</script>";
                                echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                            }
                        }
                        else{
                            echo "<script>alert('Given Email already exist.')</script>";
                            echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                    }
                }
            }
            if(isset($_POST['submit_phone'])){
                $new_phone = $_POST['phone'];
                if($new_phone != $rowuser['phoneno']){
                    if($new_phone != '' && preg_match("/^\d{10}$/", $new_phone)){
                        $sql = "UPDATE userdetails SET phoneno='$new_phone' WHERE id='$uid'";
                        $result = mysqli_query($connection,$sql);
                        if($result){
                            echo "<script>alert('Details updated successfully')</script>";
                            echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                    }
                }
            }
            if(isset($_POST['submit_address'])){
                $new_address = $_POST['address'];
                if($new_address != $rowuser['address']){
                    if($new_address != ''){
                        $sql = "UPDATE userdetails SET `address`='$new_address' WHERE id='$uid'";
                        $result = mysqli_query($connection,$sql);
                        if($result){
                            echo "<script>alert('Details updated successfully')</script>";
                            echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('userdetails.php?editdetail','_self')</script>";
                    }
                }
            }
              ?>
            </div>
        </div>
    </div>
    </section>
    <div id="footer">
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
      </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>