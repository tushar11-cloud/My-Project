<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Online Sweet Shop</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body style="margin-bottom: 0px;">
  <?php include 'part/login/login.php' ?>
  <?php include 'part/login/singup.php' ?>
  <!-- navbar -->
  <?php include 'part/navbar/navbar.php' ?>



  <!-- Carousel -->
  <section class=" slider_section position-relative">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="slider_item-box">
            <div class="slider_item-container">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="slider_item-detail">
                      <div>
                        <h1>
                          Welcome to <br />
                          Our Sweets Shop
                        </h1>
                        <p>
                          There are many types of Bangladeshi Sweet available here. Hopefully you enjoy with it. Let's
                          Buy!
                        </p>
                        <div class="d-flex">
                          <a href="" class="text-uppercase custom_orange-btn mr-3">
                            Shop Now
                          </a>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="slider_img-box">
                      <div>
                        <img src="images/slide-img 1.png" alt="" class="" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="slider_item-box">
            <div class="slider_item-container">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="slider_item-detail">
                      <div>
                        <h1>
                          Welcome to <br />
                          Our Sweets Shop
                        </h1>
                        <p>
                          There are many types of Bangladeshi Sweet available here. Hopefully you enjoy with it. Let's
                          Buy!
                        </p>
                        <div class="d-flex">
                          <a href="" class="text-uppercase custom_orange-btn mr-3">
                            Shop Now
                          </a>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="slider_img-box">
                      <div>
                        <img src="images/slide-img 1.png" alt="" class="" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="slider_item-box">
            <div class="slider_item-container">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="slider_item-detail">
                      <div>
                        <h1>
                          Welcome to <br />
                          Our Sweets Shop
                        </h1>
                        <p>
                          There are many types of Bangladeshi Sweet available here. Hopefully you enjoy with it. Let's
                          Buy!
                        </p>
                        <div class="d-flex">
                          <a href="" class="text-uppercase custom_orange-btn mr-3">
                            Shop Now
                          </a>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="slider_img-box">
                      <div>
                        <img src="images/slide-img 1.png" alt="" class="" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>




  <br><br>


      <h2 class="custom_heading">Our Best Items</h2>
      <p class="custom_heading-text">
        There are many variations of Sweet available.

      </p>
  <div class="container m-auto col-8">

    <div class="row">

      <?php
      include 'part/conn/conn.php';
      $sql = "SELECT * FROM `food` WHERE `best` = 1";
      $sql_s = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($sql_s)) {
        echo '<div class="col-4 mt-4">
              <div class="card" style="width: 100%;">
                <img src="avatar/' . $row['avatar'] . '" class="card-img-top" alt="..." style="height: 289px;width: 100%;">
                <div class="card-body">';
        if ($row['offer'] == 0) {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] . 'TK</i></h5><br>';
        } else {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] * $row['offer'] . 'TK</i> <i style=" color: green; font-weight: bolder; float: right;">' . $row['offer'] * 100 . '% off</i></h5><br>';
        }

        if ($row['availability'] == 'available now') {
          echo '<a><h6> <span class="badge badge-success">' . $row['availability'] . '</span></h6></a>';
        } else {
          echo '<a><h6> <span class="badge badge-danger">' . $row['availability'] . '</span></h6></a>';
        };
        if ($row['availability'] == 'available now') {
          echo '<a href="order.php?food_id=' . $row['id'] . '&&food=' . $row['food'] . '&&avatar=' . $row['avatar'] . '&&price=' . $row['price'] . '&&offer=' . $row['offer'] . '" class="btn btn-success mr-4" >Order</a>
              <a href="cart.php?food_id=' . $row['id'] . '&&food=' . $row['food'] . '&&avatar=' . $row['avatar'] . '&&price=' . $row['price'] . '&&offer=' . $row['offer'] . '"> <img src="img/cart/cart.png" style="    border-style: none;  height: 36px;  float: right;  background: yellow;"></a>
              </div>
              </div>
            </div>';
        } else {
          echo '</div>
        </div>
      </div>';
        }
        // include 'part/order/order.php';
      }
      ?>

    </div>

    <br><br>
    <!-- tasty section -->
    <section class="tasty_section">
      <div class="container_fluid">
        <h2>
          Very tasty Sweets
        </h2>
      </div>
    </section>

    <!-- end tasty section -->

    <!-- client section -->

    <section class="client_section layout_padding">
      <div class="container">
        <h2 class="custom_heading">Remarks</h2>
        <p class="custom_heading-text">
          There are many types of Bangladeshi Sweet available here. Hopefully you enjoy with it.
        </p>
        <div>
          <div id="carouselExampleControls-2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="client_container layout_padding2">
                  <div class="client_img-box">
                    <img src="images/pronoy.jpg" alt="" />
                  </div>
                  <div class="client_detail">
                    <h3>
                      Pronoy Shutrodhor
                    </h3>
                    <p class="custom_heading-text">
                      This is best online sweet shop i have ever seen & Food Quality, Item also.
                    </p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="client_container layout_padding2">
                  <div class="client_img-box">
                    <img src="images/pronoy.jpg" alt="" />
                  </div>
                  <div class="client_detail">
                    <h3>
                      Pronoy Shutrodhor
                    </h3>
                    <p class="custom_heading-text">
                      This is best online sweet shop i have ever seen & Food Quality, Item also.
                    </p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="client_container layout_padding2">
                  <div class="client_img-box">
                    <img src="images/pronoy.jpg" alt="" />
                  </div>
                  <div class="client_detail">
                    <h3>
                      Pronoy Shutrodhor
                    </h3>
                    <p class="custom_heading-text">
                      This is best online sweet shop i have ever seen & Food Quality, Item also.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end client section -->

    <!-- contact section -->
    <section class="contact_section layout_padding">
      <div class="container">
        <h2 class="font-weight-bold">
          Contact Us
        </h2>
        <div class="row">
          <div class="col-md-8 mr-auto">
            <form action="">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Name">
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number">
                  </div>
                  <div>
                    <input type="email" placeholder="Email">
                  </div>

                  <div class="mt-5">
                    <input type="text" placeholder="Message">
                  </div>
                  <div class="mt-5">
                    <button type="submit">
                      send
                    </button>
                  </div>
                </div>

              </div>

            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- end contact section -->

    <section class="info_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h5>
              Sweets
            </h5>
            <ul>
              <li>
                RASGULLA
              </li>
              <li>
                RASMALAI
              </li>
              <li>
                DOI
              </li>
              <li>
                SANDESH
              </li>
              <li>
                CAKE
              </li>

            </ul>
          </div>
          <div class="col-md-3">
            <h5>
              Feedback
            </h5>
            <ul>
              <li>
                Best
              </li>
              <li>
                Sweet
              </li>
              <li>
                Online Shop
              </li>

            </ul>
          </div>
          <div class="col-md-3">

          </div>
          <div class="col-md-3">
            <div class="social_container">
              <h5>
                Follow Us
              </h5>
              <div class="social-box">
                <a href="">
                  <img src="images/fb.png" alt="">
                </a>

                <a href="">
                  <img src="images/twitter.png" alt="">
                </a>
                <a href="">
                  <img src="images/linkedin.png" alt="">
                </a>
                <a href="">
                  <img src="images/instagram.png" alt="">
                </a>
              </div>
            </div>
            <div class="subscribe_container">
              <h5>
                Subscribe Now
              </h5>
              <div class="form_container">
                <form action="">
                  <input type="email">
                  <button type="submit">
                    Subscribe
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include 'part/footer/footer.php' ?>


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>