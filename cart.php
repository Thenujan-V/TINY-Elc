<?php
    session_start();
    include 'connection.php';
    $uid = $_SESSION['id'];
    $sqlcart = "select * from products join usercart on products.id = usercart.pid";
    $resultcart = mysqli_query($connection,$sqlcart);
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/cartstyle.css">
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
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="top">
                        <p class="d-flex justify-content-start"><input type="checkbox"> SELECT ALL(No of items)</p>
                        <a class="d-flex justify-content-" href="#"><i class="fa-regular fa-trash-can fa-lg"></i> DELETE</a>
                    </div>
                    <?php
                        while($rowcart = mysqli_fetch_assoc($resultcart)){
                            $id = $rowcart['pid'];
                            $image = $rowcart['image'];
                            $price = $rowcart['price'];
                            $model = $rowcart['model'];
                            $deliverycharge = $rowcart['deliveryCharge'];
                            $details = $rowcart['details'];
                            $quantity = $rowcart['quantity'];
                        
                    ?>
                    <div class="row mt-2" id="cartproduct">
                        <div class="col-2" id="image">
                            <img src="<?php echo $image ?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-6 text-center" id="description">
                            <p><?php echo $details ?></p>
                        </div>
                        <div class="col-2" id="prices">
                            <p><?php echo $model ?></p>
                            <p><?php echo $price ?></p>
                            <p><?php echo $deliverycharge ?></p>
                            <a href="#"><i class="fa-regular fa-trash-can fa-lg"></i></a>
                        </div>
                        <div class="col-2 d-flex" style="flex-direction:column;" id="quantity">
                            <form action="" method="post">
                                <label for="quantity">quantity</label>
                                <input type="number" value="<?php echo $quantity ?>" name="quantity" style="height:30px; width:40px;">
                                <input type="hidden" value="<?php echo $pid ?>" name="pid">
                                <input type="submit" class="btn bg-primary" style="color:white;" name="submit" value="update">
                            </form>
                            <?php 
                                if(isset($_POST['submit'])){
                                    $pid = $_POST['pid'];
                                    $new_quantity = $_POST['quantity'];
                                    if($quantity != $new_quantity){
                                    if($new_quantity != 0){
                                        $sql = "UPDATE usercart SET quantity='$new_quantity' WHERE pid='$pid' AND uid='$uid'";
                                        $result = mysqli_query($connection,$sql);
                                        if($result){
                                        echo "<script>alert('Cart updated successfully.')</script>";
                                        echo "<script>window.open('cart.php','_self')</script>";
                                        }
                                        else{
                                        echo "<script>alert('Sorry can't update cart.')</script>";
                                        echo "<script>window.open('cart.php','_self')</script>";
                                        }
                                    }
                                    else{
                                        $pid = $_POST['pid'];
                                        $sql = "DELETE FROM usercart WHERE pid='$pid' AND uid='$uid'";
                                        $result = mysqli_query($connection,$sql);
                                        if($result){
                                        echo "<script>alert('Book removed from cart successfully.')</script>";
                                        echo "<script>window.open('cart.php','_self')</script>";
                                        }
                                        else{
                                        echo "<script>alert('Sorry can't remove from cart.')</script>";
                                        echo "<script>window.open('cart.php','_self')</script>";
                                        }
                                    }
                                    }
                                }
                            ?>
                            
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-4" id="odrsum">
                    <h2>Order summary</h2>
                    <div id="cartamounts" class="row">
                        <h5 class="col-8">Subtotal(<?php echo $quantity ?>)</h5>
                        <p class="col-4"><?php echo $price ?></p>
                    </div>
                    <div id="cartamounts" class="row">
                        <h5 class="col-8">Shipping Fee</h5>
                        <p class="col-4"><?php echo $deliverycharge ?></p>
                    </div>
                    <div id="cartamounts" class="row">
                        <h5 class="col-8">Shipping Fee Discount</h5>
                        <p class="col-4"><?php echo $deliverycharge ?></p>
                    </div>
                    <hr>
                    <div id="cartamounts" class="row">
                        <h5 class="col-8">Total Amount</h5>
                        <p class="col-4"><?php echo $price + $deliverycharge; ?></p>
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