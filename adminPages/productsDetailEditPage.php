<?php
    include '../connection.php';
    session_start();
    $uid = $_SESSION['uid'];
    // $Eid = $_SESSION['Eid'];
    if(isset($_GET['editDetail'])){
        $Eid = $_GET['editDetail'];
      }

    $sqlEditProductDetails = "select * from products where id = $Eid";
    $resultEditProductDetails = mysqli_query($connection,$sqlEditProductDetails);
    $rowEditProductDetails = mysqli_fetch_assoc($resultEditProductDetails);
    if(isset($_GET['deleteProduct'])){
        $pid = $_GET['deleteProduct'];
        $sqlDelete = "DELETE FROM products WHERE id = '$pid' ";
        $resultDelete = mysqli_query($connection,$sqlDelete);
        //$rowDelete = mysqli_fetch_assoc($resultDelete);
        if(!$resultDelete){
            echo "<script>alert('Delete successfully.')</script>";
        }
        else{
            echo "<script>alert('Unable to Delete.')</script>";
        }
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
    <link rel="stylesheet" href="../style/navbarstyle.css">
    <link rel="stylesheet" href="../style/footerstyle.css">
</head>
<body>
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <a class="navbar-brand " href="adminIndex.php">TINY Elc</a>
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
                    <li><a class="dropdown-item" href="adminProductPage.php?category='laptop'">Laptops</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="adminProductPage.php?category='mobile'">Mobile phones</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="adminProductPage.php?category='smart watch'">Smart watches</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="adminProductPage.php?category='tv'">Television</a></li>
                    <li><a class="dropdown-item" id="alldropdownitem" href="adminProductPage.php?category='camara'">Camaras</a></li>
                  </ul>            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminProductPage.php">Products</a>
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
            <a class="btn" type="button" id="login" href="usersDetails.php "></i>Users</a>
            <a class="btn" type="button" id="login" href="productAddPage.php"><i class="fa-solid fa-plus fa-lg"></i>products</a>
            <a class="btn" href="adminDetails.php" type="button" id="user"><i class="fa-solid fa-user fa-2xl"></i></a>
            <a href="../logout.php" class="btn" id="logout" type="button"><i class="fa-solid fa-right-from-bracket fa-2xl"></i></a>
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
                            <p>Product Name</p>
                            <input type="text" class="form-outline mx-3 w-50" name="productName" value="<?php echo $rowEditProductDetails['model'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_productName" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Category</p>
                            <input type="text" class="form-outline mx-3 w-50" name="category" value="<?php echo $rowEditProductDetails['category'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_category" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Price</p>
                            <input type="text" class="form-outline mx-3 w-50" name="Price" value="<?php echo $rowEditProductDetails['price'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_price" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Image(url)</p>
                            <input type="text" class="form-outline mx-3 w-50" name="image" value="<?php echo $rowEditProductDetails['image'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_image" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Delivery Charge</p>
                            <input type="text" class="form-outline mx-3 w-50" name="deliveryCharge" value="<?php echo $rowEditProductDetails['deliveryCharge'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_deliveryCharge" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Brand</p>
                            <input type="text" class="form-outline mx-3 w-50" name="brand" value="<?php echo $rowEditProductDetails['brand'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_brand" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Discounts</p>
                            <input type="text" class="form-outline mx-3 w-50" name="discounts" value="<?php echo $rowEditProductDetails['discounts'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_discounts" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Count</p>
                            <input type="text" class="form-outline mx-3 w-50" name="count" value="<?php echo $rowEditProductDetails['count'];?>">
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_count" value="save">
                        </form>
                        <form class="form m-2" method="post" action="">
                            <p>Details</p>
                            <textarea type="text" class="form-outline mx-3 w-50" cols="30" rows="10" name="details"><?php echo $rowEditProductDetails['details'];?></textarea>
                            <input type="submit" class="btn bg-primary" style="color:white;" name="submit_details" value="save">
                        </form>
                        <a href="productsDetailEditPage.php?deleteProduct= <?php echo $pid ?>" class="btn btn-danger">Delete Product</a>
                </div>
                <?php 
                if(isset($_POST['submit_productName'])){
                  $new_name = $_POST['productName'];
                  if($new_name != $rowEditProductDetails['model']){
                      if($new_name != ''){ 
                          $sql = "UPDATE products SET name='$new_name' WHERE id='$Eid'";
                          $result = mysqli_query($connection,$sql);
                          if($result){
                              echo "<script>alert('Details updated successfully')</script>";
                              echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                          }
                          else{
                              echo "<script>alert('Unable to update details.')</script>";
                              echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                          }
                      }
                      else{
                          echo "<script>alert('Invalid input')</script>";
                          echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                      }
                  }
              }
              if(isset($_POST['submit_category'])){
                $new_category = $_POST['category'];
                if($new_category != $rowEditProductDetails['category']){
                    if($new_category != ''){
                        $sql = "UPDATE products SET `category`='$new_category' WHERE id='$Eid'";
                        $result = mysqli_query($connection,$sql);
                        if($result){
                            echo "<script>alert('Details updated successfully')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                    }
                }
            }
                    if(isset($_POST['submit_price'])){
                        $new_Price = $_POST['Price'];
                        if($new_Price != $rowEditProductDetails['Price']){
                            if($new_Price != ''){
                                $sql = "UPDATE products SET `price`='$new_Price' WHERE id='$Eid'";
                                $result = mysqli_query($connection,$sql);
                                if($result){
                                    echo "<script>alert('Details updated successfully')</script>";
                                    echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                                }
                                else{
                                    echo "<script>alert('Unable to update details.')</script>";
                                    echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                                }
                            }
                            else{
                                echo "<script>alert('Invalid input')</script>";
                                echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                            }
                        }
                    }
            if(isset($_POST['submit_image'])){
                $new_image = $_POST['image'];
                if($new_image != $rowEditProductDetails['image']){
                    if($new_image != ''){
                        $sql = "UPDATE products SET `image`='$new_image' WHERE id='$Eid'";
                        $result = mysqli_query($connection,$sql);
                        if($result){
                            echo "<script>alert('Details updated successfully')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                    }
                }
            }
            if(isset($_POST['submit_deliveryCharge'])){
                $new_deliveryCharge = $_POST['deliveryCharge'];
                if($new_deliveryCharge != $rowEditProductDetails['deliveryCharge']){
                    if($new_deliveryCharge != ''){
                        $sql = "UPDATE products SET `deliveryCharge`='$new_deliveryCharge' WHERE id='$Eid'";
                        $result = mysqli_query($connection,$sql);
                        if($result){
                            echo "<script>alert('Details updated successfully')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                    }
                }
            }
            if(isset($_POST['submit_brand'])){
                $new_brand = $_POST['brand'];
                if($new_brand != $rowEditProductDetails['brand']){
                    if($new_brand != ''){
                        $sql = "UPDATE products SET `brand`='$new_brand' WHERE id='$Eid'";
                        $result = mysqli_query($connection,$sql);
                        if($result){
                            echo "<script>alert('Details updated successfully')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                    }
                }
            }
            if(isset($_POST['submit_discounts'])){
                $new_discounts = $_POST['discounts'];
                if($new_discounts != $rowEditProductDetails['discounts']){
                    if($new_discounts != ''){
                        $sql = "UPDATE products SET `discounts`='$new_discounts' WHERE id='$Eid'";
                        $result = mysqli_query($connection,$sql);
                        if($result){
                            echo "<script>alert('Details updated successfully')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                    }
                }
            }
            if(isset($_POST['submit_count'])){
                $new_count = $_POST['count'];
                if($new_count != $rowEditProductDetails['count']){
                    if($new_count != ''){
                        $sql = "UPDATE products SET `count`='$new_count' WHERE id='$Eid'";
                        $result = mysqli_query($connection,$sql);
                        if($result){
                            echo "<script>alert('Details updated successfully')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                    }
                }
            }
            if(isset($_POST['submit_details'])){
                $new_details = $_POST['details'];
                if($new_details != $rowEditProductDetails['details']){
                    if($new_details != ''){
                        $sql = "UPDATE products SET `details`='$new_details' WHERE id='$Eid'";
                        $result = mysqli_query($connection,$sql);
                        if($result){
                            echo "<script>alert('Details updated successfully')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to update details.')</script>";
                            echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invalid input')</script>";
                        echo "<script>window.open('productsDetailEditPage.php?editdetail','_self')</script>";
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