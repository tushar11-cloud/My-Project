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

<body>
  <?php include 'part/login/login.php' ?>
  <?php include 'part/login/singup.php' ?>
  <!-- navbar -->
  <?php include 'part/navbar/navbar.php' ?>
  <h1 class="text-center mt-4 mb-4">Food</h1>

  <div class="container m-auto col-8">
    <div class="nav" style="    padding: 14px 0px 14px 0px;  background: whitesmoke;">
      <div class="nav_link" style="background: black; margin:auto">
        <?php
        include 'part/conn/conn.php';
        $sql = "SELECT DISTINCT  `cat` FROM `food`";
        $sql_s = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($sql_s)) {
          echo '<a href="'.$row['cat'].'.php" style="text-decoration: none;color: white;font-size: 22px;margin-right: 10px;" class="mr-4">'.$row['cat'].'</a>';
        }
        ?>
      </div>
    </div>




    <div class="row">

      <?php
      include 'part/conn/conn.php';
      $sql = "SELECT * FROM `food`";
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
  </div>
  <?php include 'part/footer/footer.php' ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>