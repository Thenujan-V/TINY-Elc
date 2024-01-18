<?php
    include '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/footerstyle.css">
    <link rel="stylesheet" href="../style/navbarstyle.css">
    <link rel="stylesheet" href="../style/productstyle.css">
</head>
<body>
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <a class="navbar-brand " href="../index.php">TINY Elc</a>
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
                    <li><a class="dropdown-item" href="guestProductPage.php?category='mobile'">Laptops</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="guestProductPage.php?category='mobile'">Mobile phones</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="guestProductPage.php?category='smart watch'">Smart watches</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="guestProductPage.php?category='tv'">Television</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="guestProductPage.php?category='camara'">Camaras</a></li>
                  </ul>            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../aboutpage.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="guestProductPage.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../contactpage.php" >Customer service</a>
            </li>
            
            
          </ul>
          <form class="form-inline" id="search">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
          <form class="form-inline" id="account">
            <a href="../cart.php" class="btn mr-3" type="button" id="cart"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>
            <a class="btn" type="button" id="Register" href="../register.php">Register</a>
            <a class="btn" type="button" id="login" href="../login.php">Login</a>
            <a class="btn" href="../userdetails.php" type="button" id="user"><i class="fa-solid fa-user fa-2xl"></i></a>
            <a href="logout.php" class="btn" id="../logout" type="button"><i class="fa-solid fa-right-from-bracket fa-xl"></i></a>
              
          </form>
        </div>
      </nav>
      <section id="homepage">
        <div>
          <div id="home">
            <h1>TINY Electronics</h1>
            <p>"Unleash the future with our electronic shop's curated selection of top-notch gadgets and tech essentials"</p>
          </div>
          <div class="container">
            <div id="catogaries" class="row pt-2" >
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="product.php?category='monitors'"><img src="../ìmages\game.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='monitors'" >Monitors</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="product.php?category='mobileaccessories'"><img src="../ìmages\game.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='mobileaccessories'" >Mobile Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6" >
                <a href="product.php?category='storagedevice'"><img src="../ìmages\game.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='storagedevice'" >Storage devices</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="product.php?category='pcaccessories'"><img src="../ìmages\game.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='pcaccessories'" >Pc Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="product.php?category='gaming'"><img src="../ìmages\game.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='gaming'" >Gaming Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="product.php?category='speakers'"><img src="../ìmages\game.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='speakers'" >Speakers</a>
              </div>
          </div>
          </div>
        </div>
      </section >
      <section id="products">
        <div class="" id="productcard">
            <center>
              <h1 class="title">Products</h1>
            </center>
            <div class="row" id="details">
              <?php 
              if(!isset($_GET['category'])){
                $sqlProducts = "select * from products";
                $resultProducts = mysqli_query($connection,$sqlProducts);
                
                while($rowsproducts = mysqli_fetch_assoc($resultProducts)){
                  $pid = $rowsproducts['id'];
                  $price =  $rowsproducts['price'];
                  $image = $rowsproducts['image'];
                  $model =  $rowsproducts['model'];
                  $details =  $rowsproducts['details'];
                  $deliverycharge =  $rowsproducts['deliveryCharge'];
              ?>
              <div class="column">
                <div class="card" id="card">
                  <div class="content">
                  
                    <div class="front">
                      <img class="profile" width="100%" src="<?php echo $image ?>" alt="product">
                      <h2><?php echo $model ?></h2>
                    </div>
                    <div class="back from-left">
                      <h2><?php echo $price ?></h2>
                      <h3><?php echo $deliverycharge ?></h3>
                      <h3><?php echo $details ?></h3>
                      
                      <a href="" class="btn d-flex justify-content-center mb-3" type="submit" id="buybutton" name="addcart">Buy</a>
                      <a href="product.php?cart= <?php echo $pid ?>" class="btn d-flex justify-content-center" type="submit" id="cartbutton" name="buy">Add to cart</a>
                    </div>
                  </div>  
                </div>
              </div>
              <?php } }?>

              <?php 
              if(isset($_GET['category'])){
                $category = $_GET['category'];
                $sqlProducts = "select * from products where category = $category";
                $resultProducts = mysqli_query($connection,$sqlProducts);
                if(mysqli_num_rows($resultProducts) == 0){
                  echo 'no products';
                }
                else{
                while($rowsproducts = mysqli_fetch_assoc($resultProducts)){
                  $pid = $rowsproducts['id'];
                  $price =  $rowsproducts['price'];
                  $image = $rowsproducts['image'];
                  $model =  $rowsproducts['model'];
                  $details =  $rowsproducts['details'];
                  $deliverycharge =  $rowsproducts['deliveryCharge'];
              ?>
              <div class="column">
                <div class="card" id="card">
                  <div class="content">
                  
                    <div class="front">
                      <img class="profile" width="100%" src="<?php echo $image ?>" alt="product">
                      <h2><?php echo $model ?></h2>
                    </div>
                    <div class="back from-left">
                      <h2><?php echo $price ?></h2>
                      <h3><?php echo $deliverycharge ?></h3>
                      <h3><?php echo $details ?></h3>
                      
                      <a href="" class="btn d-flex justify-content-center mb-3" type="submit" id="buybutton" name="addcart">Buy</a>
                      <a href="product.php?cart= <?php echo $pid ?>" class="btn d-flex justify-content-center" type="submit" id="cartbutton" name="buy">Add to cart</a>
                    </div>
                  </div>  
                </div>
              </div>
              <?php } } }?>
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