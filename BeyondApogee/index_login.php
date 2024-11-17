<?php
        session_start();
        // Check if the user is logged in
        if(isset($_SESSION['user_email'])) 
        {
            $user_email = $_SESSION['user_email'];
        } 
        else 
        {
            // Redirect the user to the login page if not logged in
            header("Location: inc/header.php");
            exit;
        }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Beyond Apogee</title>
  <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

<!-- Fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Custom CSS -->
<link rel="stylesheet" href="./styles.css">

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Beyond Apogee</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#productSection">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#serviceSection">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#footer">Contact Us</a>
          </li>
          <li class="nav-item" id="right">
            <a class="nav-link" href="inc/logout.php">Logout</a>
          </li>
          <li class="nav-item" id="right">
            <?php echo"Hello! ". $user_email;?>
          </li>
          
          
</li>
  </nav>

  <a id="scrollToTop" class="btn"><i class="fas fa-caret-up"></i></a>

  <div class="container">
    <section id="homeSection">
      <div class="row homeRow">
        <div class="col-lg-6 homeTxtCol">
          <h1 class="homeHeading">तपाईको रोबोट <br> <b> साथी</b></h1>
          <br>
          <div class="homeBtnDiv">
            <a href="#productSection" class="btn btn-light homeBtn">Order Now</a>
          </div>

        </div>
        <div class="col-lg-6 homeImgCol">
          <img class="homeImg" src="./images/BeyondApogee.jpeg" alt="momos">
        </div>
      </div>

    </section>
  </div>

  <br>

  <section id="productSection">

    <div class="container">
      <h1 style="text-align: center; margin: 50px auto;"><span style="font-size: 3rem; border: 1px solid #a8763e; background-color: white; color: #6f1a07; padding: 1px 5px;"><b>PRODUCTS</b></span></h1>
      <div class="row gutters-40">
        <div class="col-lg-4 col-sm-4 col-4">
          <div class="product-box-layout4 momos">
            <div class="item-figure">
              <img src="./images/Sajilonot.jpg" alt="Product" style="width: 100%; height: 100%;">
            </div>
            <div class="item-content">
              <h2 class="card-title">SajiloBot</h2>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-sm-4 col-4">
          <div class="product-box-layout4 chinese">
            <div class="item-figure">
              <img src="./images/chinese.jpg" alt="Product" style="width: 100%; height: 100%;">
            </div>
            <div class="item-content">
              <h2 class="card-title">Chinese</h2>
            </div>
          </div>
        </div>

        
      </div>

      <!-- Menu -->
      <div class="menuDiv">

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row paymentInfoRow">
                    <div class="col paymentInfo">
                      <span class="checkIcon" style="color: green;"><i class="fas fa-check-circle"></i></span>
                      Select Menu
                    </div>
                    <div class="col paymentInfo">
                      <span class="checkIcon"><i class="fas fa-check-circle"></i></span>
                      Place order via Whatsapp
                    </div>
                    <div class="col paymentInfo">
                      <span class="checkIcon"><i class="fas fa-check-circle"></i></span>
                      Pay using Google Pay.
                    </div>
                  </div>

                  <hr style="color:black; width: 90%; margin: 15px auto;">

                  <div class="cartContentDiv">
                    <h1>Your Cart is Empty</h1>
                  </div>

                  <div class="userInfoDiv">
                    <div class="mb-3">
                      <label for="address">Address *</label> <br>
                      <textarea type="text" class="form-control" id="address"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="note">Note (optional)</label> <br>
                      <textarea type="text" class="form-control" id="note"></textarea>
                    </div>
                  </div>

                  <div class="totalAmountDiv">

                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="location.reload()">Clear Cart</button>
                <a href="tel:+919871198882" class="btn btn-secondary">Call Us</a>
                <a class="btn btn-primary" onclick="openWhatsapp()"> Order Now </a>
              </div>
            </div>
          </div>
        </div>

        <div id="momos" style="display:none;">
          <div class="row menuHeading">
            <div class="col-12">
              <h1>SajiloBot Standalone</h1>
            </div>
            <!-- Button trigger modal -->
            <span class="shoppingCart" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-shopping-cart"></i>
              <span class="shoppingCartAfter">0</span>
            </span>
          </div>
          <div class="row">
            <div class="col-sm-6 col-12">
              <div class="card">
                <h2 class="card-title">Items</h2>
                <div class="card-body">
                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>USB with 4 wires<span> <img src="./images/usb.jpg">  </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>250</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>BO motor wheel <span> <img src="./images/wheel.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>85</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Dual shaft BO motor with wires <span> <img src="./images/DualShaft.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>110</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Caster wheel <span> <img  src="./images/caster wheel.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>65</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>3.7v LiPo Battery holder<span> <img  src="./images/bcharger.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>110</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>3.7v Battery Charger <span> <img src="./images/charger.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>130</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Sevro Motor <span> <img  src="./images/servomotor.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>270</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>LDR<span> <img  src="./images/LDR.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>15</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">
                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>RGB LED<span> <img  src="./images/RGBLED.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>25</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">
                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>LED  pack <span> <img  src="./images/LedPack.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>50</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">
                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Resistor pack<span> <img  src="./images/registerpack.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>50</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">
                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Ultrasonic Sensor <span> <img  src="./images/USSensor.jpg" > </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>200</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>

                </div>
              </div>
            </div>
</div>  
          <div class="row checkOutRow">
            <button type="button" class="btn knowMoreBtn" data-toggle="modal" data-target="#exampleModal">Check Out</button>
          </div>
        </div>

        <div id="chinese" style="display:none;">
          <div class="row menuHeading">
            <div class="col-12">
              <h1> Electronics </h1>
            </div>
            <!-- Button trigger modal -->
            <span class="shoppingCart" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-shopping-cart"></i>
              <span class="shoppingCartAfter">0</span>
            </span>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="card">
                <h2 class="card-title">Rice and Noodles</h2>
                <div class="card-body">
                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Veg Hakka Noodles <span> <img class="vegIcon" src="./images/veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>200</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Chilli Garlic Noodles <span> <img class="vegIcon" src="./images/veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>210</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Steamed Rice<span> <img class="vegIcon" src="./images/veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>190</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Corn Fried Rice <span> <img class="vegIcon" src="./images/veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>230</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Chicken Hakka Noodles <span> <img class="vegIcon" src="./images/non-veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>220</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Chicken Garlic Noodles <span> <img class="vegIcon" src="./images/non-veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>230</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Chicken Fried Rice <span> <img class="vegIcon" src="./images/non-veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>230</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Mix Meat Fried Rice <span> <img class="vegIcon" src="./images/non-veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>300</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-12">
              <div class="card">
                <h2 class="card-title">Appetizers</h2>
                <div class="card-body">
                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Chilli Potato<span> <img class="vegIcon" src="./images/veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>250</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Veg Spring Roll <span> <img class="vegIcon" src="./images/veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>270</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Chilli Paneer <span> <img class="vegIcon" src="./images/veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>280</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Chicken Spring Roll <span> <img class="vegIcon" src="./images/non-veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>300</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">
                    <div class="col-9 foodItemName">
                      <p>Crispy Honey Chicken<span> <img class="vegIcon" src="./images/non-veg.jpg" alt=""> </span></p>
                      <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>350</p>
                    </div>
                    <div class="col-3 addCol">
                      <span class="menuBtn minus"><i class="fas fa-minus"></i></span>
                      <span class="quantity">0</span>
                      <span class="menuBtn plus"><i class="fas fa-plus"></i></span>
                    </div>
                  </div>
                  <hr class="foodItemHr">

                  <div class="row foodItem">

                  </div>
                </div>
              </div>
            </div>

          <div class="row checkOutRow">
            <button type="button" class="btn knowMoreBtn" data-toggle="modal" data-target="#exampleModal">Check Out</button>
          </div>

        </div>

        
        </div>

      </div>

    </div>
  </section>

  <section id="serviceSection">
    <h1 style="text-align: center; margin: 50px auto;"><span style="font-size: 3rem; border: 1px solid #a8763e; background-color: white; color: #a8763e; padding: 1px 5px;"><b>SERVICES</b></span></h1>
    <div class="container safetyMeasuresDiv">
      <p class="safetyMeasuresPara"><b>At Beyond Apogee, we are dedicated to equipping the future generation  <br>
       with the skills and knowledge necessary to thrive in the 21st century.</b></p>
    </div>
    <div class="eatSure container">
      <div class="row">
        <div class="col-sm-2 col-12">
          <img src="https://beyond-apogee.com/wp-content/uploads/2024/04/logo_circle.png" alt="">
        </div>

        <div class="col-sm-2 col-6 borderLeft">
          <div class="icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 515.556 515.556" height="512px" viewBox="0 0 515.556 515.556" width="512px">
              <g>
                <path d="m0 274.226 176.549 176.886 339.007-338.672-48.67-47.997-290.337 290-128.553-128.552z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
              </g>
            </svg>
          </div>
          <div class="text"><b>YEARLY ROBOTICS PROGRAMS</b></div>
        </div>

        <div class="col-sm-2 col-6 borderLeft">
          <div class="icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 515.556 515.556" height="512px" viewBox="0 0 515.556 515.556" width="512px">
              <g>
                <path d="m0 274.226 176.549 176.886 339.007-338.672-48.67-47.997-290.337 290-128.553-128.552z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
              </g>
            </svg>
          </div>
          <div class="text"><b>WORKSHOPS</b></div>
        </div>

        <div class="col-sm-2 col-6 borderLeft">
          <div class="icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 515.556 515.556" height="512px" viewBox="0 0 515.556 515.556" width="512px">
              <g>
                <path d="m0 274.226 176.549 176.886 339.007-338.672-48.67-47.997-290.337 290-128.553-128.552z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
              </g>
            </svg>
          </div>
          <div class="text"><b>TRAINING AND OTHER LEARNING OPPROTUNITIES</b></div>
        </div>

        <div class="col-sm-2 col-6 borderLeft">
          <div class="icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 515.556 515.556" height="512px" viewBox="0 0 515.556 515.556" width="512px">
              <g>
                <path d="m0 274.226 176.549 176.886 339.007-338.672-48.67-47.997-290.337 290-128.553-128.552z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
              </g>
            </svg>
          </div>
          <div class="text"><b>REPUTABLE PARTNERS </b> <br><br> </div>
        </div>

        <div class="col-sm-2 col-12 borderLeft">
          <a href="https://beyond-apogee.com/" target="_blank" class="btn knowMoreBtn">Know More</a>
        </div>
      </div>
    </div>

    
  </section>

  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-9 footerHeadingCol">
          <h2 style="font-family: 'Marck Script', cursive; font-weight: 600; font-size: 3rem;">Beyond Apogee</h2><br>
          <p style="text-align: left;">“ We specialize on STEM educational kits, research, development and production, but not limited to just academic knowledge.”</p>
        </div>

        <div class="col-3 socialMedia">
          <a href="https://www.facebook.com/beyondapogee/"> <span class="socialMediaIcon"><i class="fab fa-facebook-f"></i></span></a>
          <a href="https://www.youtube.com/@beyondapogee"> <span class="socialMediaIcon"><i class="fab fa-youtube"></i></span></a>
        </div>
      </div>

      <div class="row contactRow">
        <p>
         <a href=mailto:sudip@beyond-apogee.com>Email us</a> | <a href="tel:+977-9813039470">Contact Us</a>
        </p>
      </div>

      <br>

      <div class="row addressRow">
        <div class="col-auto">
          <span style="font-size: 1.6rem;"><i class="fas fa-map-marked-alt"></i></span>
        </div>
        <div class="col">
          <p>
            Golfutar,Budhanilkantha <br>
            Kathmandu, Nepal
          </p>
        </div>
      </div> 

      <div class="row copyrightRow">
        <p class="copyright">&copy; Copyright Beyond Apogee. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- #fdfefd, #0d1010, #281e16 -->

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- JQuery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Custom JS -->
  <script src="./index.js"></script>

</body>

</html>
