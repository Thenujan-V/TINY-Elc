<?php
  include '../connection.php' ;
  session_start();
  $sql = "select * from discounts";
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
  if(isset($_GET['editDetail'])){
    $_SESSION['Eid'] = $_GET['editDetail'];
    header('Location:productsDetailEditPage.php');
  }

  // if(isset($_POST['addcart'])){
  //   if(isset($_SESSION['cart'])){

  //   }
  // }
  // else{
  //   $item = array(
  //     'id' => $_POST['id'],
  //     'image' => $_POST['image'],
  //     'price' => $_POST['price'],
  //     'deliverycharge' => $_POST['deliverycharge'],
  //     'details' => $_POST['details'],
  //   );
  //   $_SESSION["cart"][0] = $item;
  //   echo "<script>alert product added</script>";
  // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/navbarstyle.css">
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
                    <li><a class="dropdown-item" href="superProductPage.php?category='mobile'">Laptops</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="superProductPage.php?category='mobile'">Mobile phones</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="superProductPage.php?category='smart watch'">Smart watches</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="superProductPage.php?category='tv'">Television</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="superProductPage.php?category='camara'">Camaras</a></li>
                  </ul>            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../aboutpage.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="superProductPage.php">Products</a>
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
          <a class="btn" type="button" id="login" href="../adminPages\usersDetails.php"></i>Users</a>
            <a class="btn" type="button" id="Register" href="adminAddPage.php"><i class="fa-solid fa-plus fa-lg"></i>admin</a>
            <a class="btn" type="button" id="login" href="productAddPage.php"><i class="fa-solid fa-plus fa-lg"></i>products</a>
            <a class="btn" href="superAdminDetails.php" type="button" id="user"><i class="fa-solid fa-user fa-2xl"></i></a>
            <a href="../logout.php" class="btn" id="logout" type="button"><i class="fa-solid fa-right-from-bracket fa-2xl"></i></a>
              
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
                <a href="superProductPage.php?category='monitor'"><img src="../ìmages\monitor.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="superProductPage.php?category='monitor'" >Monitors</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="superProductPage.php?category='mobileacc'"><img src="../ìmages\mobileacc.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="superProductPage.php?category='mobileacc'" >Mobile Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6" >
                <a href="superProductPage.php?category='storage'"><img src="../ìmages\storage.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="superProductPage.php?category='storage'" >Storage devices</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="superProductPage.php?category='pc'"><img src="../ìmages\pcacc.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="superProductPage.php?category='pc'" >Pc Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="superProductPage.php?category='game'"><img src="../ìmages\gaming.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="superProductPage.php?category='game'" >Gaming Accessories</a>
              </div>
              <div class="gadgets col-xl-2 col-md-4 col-sm-6">
                <a href="superProductPage.php?category='speakers'"><img src="../ìmages\speakers.jpg" alt="" height="170px" width="170px" style="border-radius: 50%;"></a>
                <a href="superProductPage.php?category='speakers'" >Speakers</a>
              </div>
            </div>
          </div>
        </div>
      </section >
          
      <section id="discount">
        <div class="container-fluid" >  
          <h2 class="ml-5 pt-3">Exclusive Offers</h2>         
            <div class="row ">
              <!-- <div id="arrow" class="ml-5"><i class="fa-solid fa-chevron-left fa-4x"></i></div> -->
                <?php
                  while($rows = mysqli_fetch_assoc($result)){
                    $price =  $rows['price'];
                    $image = $rows['image'];
                    $model =  $rows['model'];
                    $details =  $rows['details'];
                    $discount =  $rows['discount'];
                ?>
                <div class="col-3 pl-5">
                <div class="card">
                  <div class="image">
                    <img src="<?php echo $image ?>"/>
                  </div>
                  <div class="details">
                    <div class="center">
                      <h1><?php echo $model ?><br><span><?php echo $details ?></span></h1>
                    </div>
                    <p class="pt-2"><s><?php echo $price ?></s> <span><?php echo $price ?></span></p>
                    <p><?php echo $discount ?></p>
                  </div>
                </div>
                </div>
                <?php } ?>
                <!-- <div id="arrow"><i class="fa-solid fa-chevron-right fa-4x"></i></div> -->
            </div>
              <hr>
          <div class="row">
            <div class="col-6" id="trendbox" >
              <h2 class="text-center">Trending Sales</h2>
              <div>
                <div class="row">
                
                <?php 
                  for($i=0;$i<4;$i++){
                    $rowsTrend = mysqli_fetch_assoc($resultTrend);
                      $imageTrend = $rowsTrend['image'];   
                 
                ?>
                  <div class="col-6 "><img class="img-fluid" src="<?php echo $imageTrend   ?>" alt="" width="248px" height="248px"></div>
                  <!-- <div class="col-6"><img class="img-fluid" src="ìmages\game.jpg" alt="" width="230px" height="150px"></div> -->
                
                <?php }?>
                </div>
               
                <a href="" class="d-flex justify-content-end">see more deals</a>
              </div>
            </div>
            <div class="col-6">

              <h2 class="text-center">Free delivery</h2>
              <div>
                <div class="row">
                <?php 
                  for($i=0;$i<4;$i++){
                    $rowsFree = mysqli_fetch_assoc($resultFree);
                      $imageFree = $rowsFree['image'];
                ?>
                  <div class="col-6"><img class="img-fluid" src="<?php echo $imageFree   ?>" alt="" width="248px" height="248px"></div>
                  <!-- <div class="col-6"><img class="img-fluid" src="ìmages\game.jpg" alt="" width="230px" height="150px"></div> -->
                <?php }?>
                </div>
                
                <a href="" class="d-flex justify-content-end">see more deals</a>
              </div>
            </div>
          </div> 
        </div>
        <hr>
        <div id="brands">
          	<h2 class="ml-5">Brands</h2>
            <div class=" d-flex justify-content-center">
              <?php 
                while($rowsBrand = mysqli_fetch_assoc($resultBrand)){
                    $image = $rowsBrand['image'];
                    $name =  $rowsBrand['name'];
              ?>
              <div class="col-lg-2">
                <div>
                  <img src="<?php echo $image ?>" class="img-fluid" alt="" width="180px" height="30px">
                  <h5 class="text-center"><?php echo $name ?></h5>
                </div>
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
                <form action="{$_SERVER['REQUEST_URI']}" method="post">
                  <div class="front">
                    <img class="profile" width="100%" src="<?php echo $image ?>" alt="product">
                    <h2><?php echo $model ?></h2>
                  </div>
                  <div class="back from-left">
                    <h2><?php echo $price ?></h2>
                    <h3><?php echo $deliverycharge ?></h3>
                    <a href="product.php?products= <?php echo $pid ?>" ><?php echo $details ?></a>
                    

                    <a href="" class="btn d-flex justify-content-center mb-3" type="submit" id="buybutton" name="addcart">Buy</a>
                    <a href="superIndex.php?editDetail=<?php echo $pid ?>" class="btn d-flex justify-content-center" type="submit" id="cartbutton" name="buy">Edit details</a>
                  </div>
                </form>
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
