<?php 
  session_start();
  $uid = $_SESSION['uid'];
  include '../connection.php';
  // $sqlProducts = "select * from products";
  // $resultProducts = mysqli_query($connection,$sqlProducts);
  // if($_SESSION['uid'] == null){
  //   header('Location:../Guest\guestProductPage.php');
  // }
  


  if(isset($_GET['cart'])){
    $pid = $_GET['cart'];
    // $_SESSION['pid'] = $pid;
    $select_sql = "SELECT * FROM usercart WHERE uid='$uid' AND pid='$pid'";
    $select_result = mysqli_query($connection,$select_sql);
    
    if(mysqli_num_rows($select_result) == 0){
        $insert_sql = "INSERT INTO usercart VALUES('$uid','$pid',1)";
        $insert_result = mysqli_query($connection,$insert_sql); 
        if($insert_result){
            echo "<script>alert('Book added to cart successfully.')</script>";
            echo "<script>window.open('product.php','_self')</script>";
        }
        else{
            echo "<script>alert('Some thing wrong. Failed to add to cart.')</script>";
            echo "<script>window.open('product.php','_self')</script>";
        }
    }
    else{
        echo "<script>alert('Book is already added to cart.')</script>";
        echo "<script>window.open('product.php','_self')</script>";
    }
  }
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
    <link rel="stylesheet" href="../style/footerstyle.css">
    <link rel="stylesheet" href="../style/navbarstyle.css">
    <link rel="stylesheet" href="../style/index.css">
  </head>
<body>
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <a class="navbar-brand " href="superIndex.php">TINY Elc</a>
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
                    <li><a class="dropdown-item" href="superProductPage.php?category='mobile'">Laptops</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="superProductPage.php?category='mobile'">Mobile phones</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="superProductPage.php?category='smart watch'">Smart watches</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="superProductPage.php?category='tv'">Television</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="superProductPage.php?category='camara'">Camaras</a></li>
                  </ul>            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../contactus.html" >Customer service</a>
            </li>
            
            
          </ul>
          <form class="form-inline" id="search">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
          <form class="form-inline" id="account">
            <a class="btn" type="button" id="login" href="usersDetails.php"></i>Users</a>
            <a class="btn" type="button" id="login" href="adminDetails.php"></i>Admins</a>
            <a class="btn" type="button" id="Register" href="adminAddPage.php"><i class="fa-solid fa-plus fa-lg"></i>admin</a>
            <a class="btn" type="button" id="login" href="productAddPage.php"><i class="fa-solid fa-plus fa-lg"></i>products</a>
            <a class="btn" href="superAdminDetails.php" type="button" id="user"><i class="fa-solid fa-user fa-2xl"></i></a>
            <a href="../logout.php" class="btn" id="logout" type="button"><i class="fa-solid fa-right-from-bracket fa-2xl"></i></a>
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
                <a href="product.php?category='monitor'"><img src="../ìmages\monitor.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='monitor'" >Monitors</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="product.php?category='mobileacc'"><img src="../ìmages\mobileacc.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='mobileacc'" >Mobile Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6" >
                <a href="product.php?category='storage'"><img src="../ìmages\storage.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='storage'" >Storage devices</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="product.php?category='pc'"><img src="../ìmages\pcacc.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='pc'" >Pc Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="product.php?category='game'"><img src="../ìmages\gaming.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="product.php?category='game'" >Gaming Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="product.php?category='speakers'"><img src="../ìmages\speakers.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
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
                  $discount = $rowsproducts['discounts']; 
                  $count = $rowsproducts['count']; 
                  $deliverycharge =  $rowsproducts['deliveryCharge'];
              ?>
              <div class="column">
                <div class="card" id="card">
                  <div class="content">
                  
                    <div class="front">
                      <img class="profile" width="100%" src="<?php echo $image ?>" alt="product">
                      <h4><?php echo $model ?></h4>
                    </div>
                    <div class="back from-left">
                      <h2>LKR <?php echo $price ?></h2>
                      <h6>Discount <span><?php echo $discount ?>%</span></h6>
                      <?php 
                        if($count == 0){ ?>
                          <h6 style="background-color: red;">Out of Stock</h6>
                       <?php } ?>
                      <a href="superIndex.php?editDetail=<?php echo $pid ?>" class="btn d-flex justify-content-center" type="submit" id="cartbutton" name="buy">Edit details</a>
                    </div>
                  </div>  
                </div>
              </div>
              <?php } ?>
               <div class="column">
                <div class="card" id="card">
                  <div class="content">
                    <div class="front">
                      <a href="productAddPage.php"><img  width="100%" src="../ìmages/add.png" alt="add"></a>
                      <h2>Add products</h2>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
              

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
                $discount = $rowsproducts['discounts']; 
                  $count = $rowsproducts['count']; 
                  $deliverycharge =  $rowsproducts['deliveryCharge'];
              ?>
              <div class="column">
                <div class="card" id="card">
                  <div class="content">
                  
                    <div class="front">
                      <img class="profile" width="100%" src="<?php echo $image ?>" alt="product">
                      <h4><?php echo $model ?></h4>
                    </div>
                    <div class="back from-left">
                    <h2>LKR <?php echo $price ?></h2>
                      <h6>Discount <span><?php echo $discount ?>%</span></h6>
                      <?php 
                        if($count == 0){ ?>
                          <h6 style="background-color: red;">Out of Stock</h6>
                       <?php } ?>
                      <a href="" class="btn d-flex justify-content-center mb-3" type="submit" id="buybutton" name="addcart">Buy</a>
                      <a href="product.php?cart= <?php echo $pid ?>" class="btn d-flex justify-content-center" type="submit" id="cartbutton" name="buy">Add to cart</a>
                    </div>
                  </div>  
                </div>
              </div>
              <?php } ?>
               <div class="column">
                <div class="card" id="card">
                  <div class="content">
                    <div class="front">
                      <a href="productAddPage.php"><img  width="100%" src="../ìmages/add.png" alt="add"></a>
                      <h2>Add products</h2>
                    </div>
                  </div>
                </div>
              </div>
            <?php } }?>
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
                <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="../ìmages\facebook.png" alt="facebook-logo"><span>Like us on Facebook</span></i></a>
                <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2 "><img src="../ìmages\instagram.png" alt="instragram-logo"><span>Follow us on Instragram</span></i></a>
                <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="../ìmages\youtube.png" alt="youtube-logo"><span>Subscribe our channel</span></a>
                <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="../ìmages\twitter.png" alt="twitter-logo"><span>Follow us on twitter</span></a>
                <a href="" class="text-decoration-none text-reset px-lg-5 px-md-2"><img src="../ìmages\linkedin.png" alt="linkedin-logo"><span>Add us on Linkedin</span></a>
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
