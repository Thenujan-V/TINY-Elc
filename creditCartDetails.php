<?php
    session_start();
    include 'connection.php';
    $uid = $_SESSION['uid'];
    $pid = $_SESSION['pid'];

    $sqlDetails = "select * from products where id = '$pid'" ;
    $rowDetails = mysqli_query($connection, $sqlDetails);
    $resultDetails = mysqli_fetch_assoc($rowDetails);

    $stockProductCount = $resultDetails['count'];

    $price =  $resultDetails['price'];
    $discount = $resultDetails['discounts']; 
    $deliverycharge =  $resultDetails['deliveryCharge'];

    $sqluser = "select * from userdetails where id = $uid";
    $resultuser = mysqli_query($connection,$sqluser);
    $rowuser = mysqli_fetch_assoc($resultuser);

    $sqlBuyProduct = "select * from buyproductsdetails where uid = $uid and pid = $pid";
    $resultBuyProduct = mysqli_query($connection,$sqlBuyProduct);
    $rowBuyProduct = mysqli_fetch_assoc($resultBuyProduct);

    $productCount = $rowBuyProduct['count'];

    if(isset($_GET['productPayment'])){
        $pid = $_GET['productPayment'];
        $sqlBuyProduct = "insert into buyproductsdetails (uid,pid,count) values ('$uid','$pid','1')";
        $resultBuyProduct = mysqli_query($connection, $sqlBuyProduct);
  
        $stockProductCount = $resultDetails['count'];
        $stockProductCount--;
        $sqlProductCount ="UPDATE products SET count='$stockProductCount' WHERE id='$pid'";
        $rowProductCount = mysqli_query($connection, $sqlProductCount);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/buyNowstyle.css">
    <link rel="stylesheet" href="style/navbarstyle.css">
    <link rel="stylesheet" href="style/footerstyle.css">
    <style>
        .inlineimage{
            max-width:470px;margin-right: 8px;margin-left: 10px
        }
        .images{
            display: inline-block;max-width: 98%;height: auto;width: 22%;margin: 1%;left:20px;text-align: center
        }
    </style>
</head>
<body>
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <a class="navbar-brand " href="userIndex.php">TINY Elc</a>
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
            <a href="logout.php" class="btn" id="logout" type="button"><i class="fa-solid fa-right-from-bracket fa-xl"></i></a>
            <a class="btn" href="userdetails.php" type="button" id="user"><i class="fa-solid fa-user fa-2xl"></i></a>
              
          </form>
        </div>
      </nav>
      <section id="buyProduct">
        <div class="paymentMethod">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-md-offset-4">
                        <div class="panel panel-default" style="margin-left: 8vw;">
                            <div class="panel-heading">
                                <div class="row">
                                    <h2 class="text-center">Payment Details</h2>
                                    <div class="inlineimage"> 
                                    <img class="img-responsive images" src="https://cdn.vox-cdn.com/thumbor/zqrc6MN4NHTgAEU03-zuXiUBEYw=/0x248:1000x772/fit-in/1200x630/cdn.vox-cdn.com/uploads/chorus_asset/file/13674554/Mastercard_logo.jpg"> 
                                    <img class="img-responsive images" src="https://s3.amazonaws.com/bizenglish/wp-content/uploads/2023/06/28152051/Visa-logo.jpg"> 
                                    <img class="img-responsive images" src="https://i.pcmag.com/imagery/reviews/068BjcjwBw0snwHIq0KNo5m-15.fit_lim.size_1050x591.v1602794215.png"> 
                                </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group"> <label>CARD NUMBER</label>
                                                <div class="input-group"> <input type="tel" class="form-control" placeholder="Valid Card Number" /> <span class="input-group-addon"><span class="fa fa-credit-card"></span></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group"> <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline"></span> DATE</label> <input type="tel" class="form-control" placeholder="MM / YY" /> </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="form-group"> <label>CV CODE</label> <input type="tel" class="form-control" placeholder="CVC" /> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group"> <label>CARD OWNER</label> <input type="text" class="form-control" placeholder="Card Owner Name" /> </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-12"> <a href="creditCartDetails.php?productPayment=<?php echo $pid ?>" class="btn btn-success btn-lg btn-block">Confirm Payment</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="details">
            <div class="userDetails">
            <h2>User Details</h2>
                <div class="itemCount">
                    <form class="form m-2 form-group" method="post" action="">
                        <label for="name">product Count</label>
                        <input type="number" class="form-outline mx-3 w-50 form-control" name="count" value="<?php echo $rowBuyProduct['count'];?>">
                        <input type="submit" class="btn " style="color:082032;background-color:#ff4c29;position:relative; bottom:2.5vw; left:22vw;" name="submit_count" value="save">
                    </form>
                </div>
                <div class="username" style="margin-top: -2.5vw;">
                    <form class="form m-2 form-group" method="post" action="">
                        <label for="name">Username</label>
                        <input type="text" class="form-outline mx-3 w-50 form-control" name="name" value="<?php echo $rowuser['name'];?>">
                        <input type="submit" class="btn " style="color:082032;background-color:#ff4c29;position:relative; bottom:2.5vw; left:22vw;" name="submit_name" value="save">
                    </form>
                </div>
                <div class="phoneNo" style="margin-top: -2.5vw;">
                    <form class="form m-2 form-group" method="post" action="">
                        <label for="name">Mobile number</label>
                        <input type="text" class="form-outline mx-3 w-50 form-control" name="phone" value="<?php echo $rowuser['phoneno'];?>">
                        <input type="submit" class="btn " style="color:082032;background-color:#ff4c29;position:relative; bottom:2.5vw; left:22vw;" name="submit_phone" value="save">
                    </form>
                </div>
                <div class="address" style="margin-top: -2.5vw;">
                    <form class="form m-2 form-group" method="post" action="">
                        <label for="name">Address</label>
                        <input type="text" class="form-outline mx-3 w-50 form-control" name="address" value="<?php echo $rowuser['address'];?>">
                        <input type="submit" class="btn" style="color:082032;background-color:#ff4c29;position:relative; bottom:2.5vw; left:22vw;" name="submit_address" value="save">
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
                              echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
                          }
                          else{
                              echo "<script>alert('Unable to update details.')</script>";
                              echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
                          }
                      }
                      else{
                          echo "<script>alert('Invalid input')</script>";
                          echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
                      }
                  }
              }
              if(isset($_POST['submit_count'])){
                $new_count = $_POST['count'];
                if($new_count != $rowBuyProduct['count']){
                    if($new_count != ''){
                        $sql = "UPDATE buyproductsdetails SET count='$new_count' WHERE uid='$uid' and pid='$pid'";
                        $result = mysqli_query($connection,$sql);
                        $stockProductCount = $stockProductCount - $new_count;
                        $sqlProductCount ="UPDATE products SET count='$stockProductCount' WHERE id='$pid'";
                        $rowProductCount = mysqli_query($connection, $sqlProductCount);
                        if($result){
                            echo "<script>alert('Details updated successfully')</script>";
                            echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
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
                            echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
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
                            echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('creditCartDetails.php?editdetail','_self')</script>";
                    }
                }
            }
              ?>
            </div>
            <div class="summary mt-5">
                <h2>Payment Summary</h2>
                <div class="mt-3">
                    <div id="cartamounts" class="row">
                        <h5 class="col-8">Subtotal (<?php echo $rowBuyProduct['count'] ?> item)</h5>
                        <p class="col-4"><?php echo $price * $productCount ?></p>
                    </div>
                    <div id="cartamounts" class="row">
                        <h5 class="col-8">Shipping Fee</h5>
                        <p class="col-4"><?php echo $deliverycharge?></p>
                    </div>
                    <div id="cartamounts" class="row">
                        <h5 class="col-8">Discount (<?php echo $discount ?>%)</h5>
                        <p class="col-4"><?php echo $productCount * $price * $discount/100 ?></p>
                    </div>
                    <hr>
                    <div id="cartamounts" class="row">
                        <h5 class="col-8">Total Amount</h5>
                        <p class="col-4"><?php echo $price + $deliverycharge - ($productCount * $price * $discount/100); ?></p>
                    </div> 
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
                    <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="Media/facebook.png" alt="facebook-logo"><span>Like us on Facebook</span></i></a>
                    <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2 "><img src="Media/instagram.png" alt="instragram-logo"><span>Follow us on Instragram</span></i></a>
                    <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="Media/youtube.png" alt="youtube-logo"><span>Subscribe our channel</span></a>
                    <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="Media/twitter.png" alt="twitter-logo"><span>Follow us on twitter</span></a>
                    <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="Media/linkedin.png" alt="linkedin-logo"><span>Add us on Linkedin</span></a>
                </div>
                <div class="col-lg-4 col-md-6 col-6" id="footright">
                    <h5>Tiny Elc</h5>
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