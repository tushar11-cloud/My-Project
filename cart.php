<?php
session_start();
include 'part/conn/conn.php';

$select = "DELETE FROM `cart` WHERE `food_id`= '' ";
$select_run = mysqli_query($conn, $select);

?>
<?php
$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if ($pageWasRefreshed) {
    //do something because page was refreshed;
} else {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    } else {
        $loggedin = false;
    }
    if ($loggedin) {
        include 'part/conn/conn.php';
        $id = $_GET['food_id'];
        $food = $_GET['food'];
        $user = $_SESSION['email'];
        $select = "INSERT INTO `cart`( `food_id`, `food_name`, `user_id`) VALUES ('$id','$food','$user')";
        $select_run = mysqli_query($conn, $select);
        if ($select_run) {
            // echo 'inserted';
        }
    }
}



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
  
    <br><br>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    } else {
        $loggedin = false;
    }
    if ($loggedin == true) {
        $user = $_SESSION['email'];
        $select = "SELECT DISTINCT  food.food, food.price,food.avatar,food.id,food.offer  FROM food INNER JOIN cart ON food.id=cart.food_id AND cart.user_id = '$user'";
        $select_run = mysqli_query($conn, $select);
        while ($row = mysqli_fetch_assoc($select_run)) {

            echo ' <div class="container mb-3">
                <div class="media" style=" background: whitesmoke;  padding: 21px;">
                    <img src="avatar/' . $row['avatar'] . '" class="mr-3" alt="..." style="  height: 83px;">
                    <div class="media-body">
                        <h5 class="mt-0"style=" font-size: 29px;">Name : ' . $row['food'] . '';
                        if($row['offer'] == 0){
                            echo '|| Price : ' . $row['price']. ' <a href="order.php?food_id=' . $row['id'] . '&&food=' . $row['food'] . '&&avatar=' . $row['avatar'] . '" style="float: right;" class="btn btn-success">Order</a><a href="delete_cart.php?id=' . $row['id'] . '" style="float: right;" class="btn btn-danger mr-2">Delete Cart</a></h5>';
                        }else{
                            echo '|| Price : ' . $row['price'] * $row['offer'] . ' <a href="order.php?food_id=' . $row['id'] . '&&food=' . $row['food'] . '&&avatar=' . $row['avatar'] . '" style="float: right;" class="btn btn-success">Order</a><a href="delete_cart.php?id=' . $row['id'] . '" style="float: right;" class="btn btn-danger mr-2">Delete Cart</a></h5>';
                        }
                   echo '</div>
                </div>
            </div>';
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Please Login First to Cart Food Item!</h4>

            </div>';
    }

    ?>
    <br><br><br><br>
    <?php include 'part/footer/footer.php' ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>