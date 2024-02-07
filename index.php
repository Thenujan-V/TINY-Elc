<?php
  include 'connection.php' ;
  session_start();
  $_SESSION['uid'] = 0;
  $sql = "select * from products where discounts > 0";
  $result = mysqli_query($connection,$sql);
  $sqlFree = "select * from products where deliveryCharge = 0";
  $resultFree = mysqli_query($connection,$sqlFree);
  $sqlTrend = "select * from products";
  $resultTrend = mysqli_query($connection,$sqlTrend);
  $sqlBrand = "select * from brands";
  $resultBrand = mysqli_query($connection,$sqlBrand);
  $sqlProducts = "select * from products";
  $resultProducts = mysqli_query($connection,$sqlProducts);

  if(isset($_GET['products'])){
    $_SESSION['pid'] = $_GET['products'];
    header('Location:productsDetailPage.php');
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
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/navbarstyle.css">
</head>
<body>
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <a class="navbar-brand " href="#">TINY Elc</a>
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
                    <li><a class="dropdown-item" href="./Guest/guestProductPage.php?category='laptop'">Laptops</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="./Guest/guestProductPage.php?category='mobile'">Mobile phones</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="./Guest/guestProductPage.php?category='smart watch'">Smart watches</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="./Guest/guestProductPage.php?category='tv'">Television</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="./Guest/guestProductPage.php?category='camara'">Camaras</a></li>
                  </ul>            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contactus.html" >Customer service</a>
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
            <!-- <a class="btn" href="userdetails.php" type="button" id="user"><i class="fa-solid fa-user fa-2xl"></i></a>
            <a href="logout.php" class="btn" id="logout" type="button"><i class="fa-solid fa-right-from-bracket fa-2xl"></i></a> -->
              
          </form>
        </div>
      </nav>
      <!---- Home-->
      <section id="homepage">
        <div>
          <div id="home">
            <h1>TINY Electronics</h1>
            <p>"Unleash the future with our electronic shop's curated selection of top-notch gadgets and tech essentials"</p>
          </div>
          <div class="container">
            <div id="catogaries" class="row pt-2" >
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="./Guest/guestProductPage.php?category='monitor'"><img src="ìmages\monitor.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="./Guest/guestProductPage.php?category='monitor'" >Monitors</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="./Guest/guestProductPage.php?category='mobileacc'"><img src="ìmages\mobileacc.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="./Guest/guestProductPage.php?category='mobileacc'" >Mobile Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6" >
                <a href="./Guest/guestProductPage.php?category='storage'"><img src="ìmages\storage.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="./Guest/guestProductPage.php?category='storage'" >Storage devices</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="./Guest/guestProductPage.php?category='pc'"><img src="ìmages\pcacc.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="./Guest/guestProductPage.php?category='pc'" >Pc Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="./Guest/guestProductPage.php?category='game'"><img src="ìmages\gaming.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="./Guest/guestProductPage.php?category='game'" >Gaming Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="./Guest/guestProductPage.php?category='speakers'"><img src="ìmages\speakers.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="./Guest/guestProductPage.php?category='speakers'" >Speakers</a>
              </div>
            </div>
          </div>
        </div>
      </section >
          
      <section id="discount">
        <div class="container-fluid" >  
        <div id='exclusive'>
            <h1 class="ml-5 pt-3">Exclusive Offers</h1>    
            <div>   
            <div class="row " >
              <!-- <div id="arrow" class="ml-5"><i class="fa-solid fa-chevron-left fa-4x"></i></div> -->
                <?php
                  $countProducts = 0;
                  while($rows = mysqli_fetch_assoc($result)){
                    $countProducts++;
                    $price =  $rows['price'];
                    $image = $rows['image'];
                    $model =  $rows['model'];
                    // $details =  $rows['details'];
                    $discount =  $rows['discounts'];
                    if($countProducts > 6){
                      break;
                    }
                ?>
                <div class="col-2 pt-5">
                <div class="card"> 
                  <div class="image">
                    <img src="<?php echo $image ?>"/>
                  </div>
                  <div class="details">
                    <div class="center">
                      <h6><?php echo $model ?><br></h6>
                    </div>
                    <p><s><?php echo $price ?></s> <span><?php echo $price ?></span></p>
                    <p><?php echo $discount ?></p>
                  </div>
                </div>
                </div>
                <?php } ?>
                </div> 
                <a href="product.php?discounts=0" style="color:#FF4C29">see more deals</a>
                 
            </div>
          </div>
              <hr>
              <div id="trendbox">
              <div class="row">
              <div class="col-6">
              <h1 class="text-center">Trending Sales</h1>
              <div>
                <div class="row">
                
                <?php 
                  for($i=0;$i<4;$i++){
                    $rowsTrend = mysqli_fetch_assoc($resultTrend);
                      $imageTrend = $rowsTrend['image'];   
                 
                ?>
                  <div class="col-6 d-flex justify-content-center""><img class="img-fluid mt-5" src="<?php echo $imageTrend   ?>" alt="" width="248px" height="248px"></div>
                
                <?php }?>
                </div>
               
                <a href="" class="d-flex justify-content-end" style="color:#FF4C29">see more deals</a>
              </div>
            </div>
            <div class="col-6">

              <h1 class="text-center">Free delivery</h1>
              <div>
                <div class="row">
                <?php 
                  $countProducts = 0;
                  while($rowsFree = mysqli_fetch_assoc($resultFree)){
                    $countProducts++;
                    $imageFree = $rowsFree['image'];   
                    if($countProducts > 4){
                      break;
                    }
                ?>
                  <div class="col-6 d-flex justify-content-center"><img class="img-fluid mt-5" src="<?php echo $imageFree   ?>" alt="" width="248px" height="248px"></div>
                  <!-- <div class="col-6"><img class="img-fluid" src="ìmages\game.jpg" alt="" width="230px" height="150px"></div> -->
                <?php }?>
                </div>
                <a href="product.php?deliveryCharge=0" class="d-flex justify-content-end" style="color:#FF4C29">see more deals</a>
              </div>
            </div>
          </div> 
        </div> 
        </div>
        <hr>
        <div id="brands">
          	<h2 class="ml-5">Brands</h2>
            <div class=" d-flex justify-content-center flex-wrap">
              <?php 
                while($rowsBrand = mysqli_fetch_assoc($resultBrand)){
                    $image = $rowsBrand['image'];
                    $name =  $rowsBrand['name'];
              ?>
              <div class="col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center" >
                <a href="./Guest/guestProductPage.php?brand=<?php echo $name?>" class="text-decoration-none">
                  <img src="<?php echo $image ?>"  alt="" width="160vw" height="160vh">
                  <h5 class="text-center  p-2"><?php echo $name ?></h5>
                </a>
              </div>
              <?php } ?>
            </div>
        </div>
      </section>
      <section id="products">
      <div class="" id="productcard">
          <center>
            <h1 class="title">Products</h1>
          </center>
          <div class="row" id="details">
            <?php 
              $countProducts = 0;
              while($rowsproducts = mysqli_fetch_assoc($resultProducts)){
                $countProducts++;
                $pid = $rowsproducts['id'];
                $price =  $rowsproducts['price'];
                $image = $rowsproducts['image'];
                $model =  $rowsproducts['model'];
                $details =  $rowsproducts['details'];
                $discount = $rowsproducts['discounts']; 
                $deliverycharge =  $rowsproducts['deliveryCharge'];

                if($countProducts > 5){
                  break;
                }
            ?>
            <div class="column">
              <div class="card" id="card">
                <div class="content">
                <form action="{$_SERVER['REQUEST_URI']}" method="post">
                  <div class="front">
                    <img class="profile" width="100%" src="<?php echo $image ?>" alt="product">
                    <h4><?php echo $model ?></h4>
                  </div>
                  <div class="back from-left">
                      <h2>LKR <?php echo $price ?></h2>
                      <h6>Discount <span><?php echo $discount ?>%</span></h6>
                    <a href="index.php?products= <?php echo $pid ?>" class="btn d-flex justify-content-center mb-3" type="submit" id="buybutton" name="addcart">Buy</a>
                    <a href="login.php" class="btn d-flex justify-content-center" type="submit" id="cartbutton" name="buy">Add to cart</a>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <a class="d-flex justify-content-center mt-3" href="#">See more deals</a>
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
http://localhost/projects/Travel%20web%20page/Travel--Tour-website/