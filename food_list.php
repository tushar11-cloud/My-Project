<?php
include 'part/conn/conn.php';
if (isset($_POST['doneS'])) {
  $food = $_GET['food'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $number = $_POST['number'];
  $sql = "INSERT INTO `food_order`(`name`, `address`, `number`, `food`) VALUES ('$name','$address',$number,'$food')";
  $select_run = mysqli_query($conn, $sql);
  if ($select_run) {
    echo 'Insert successfully';
  }
}
?>
<?php
include 'part/conn/conn.php';
$isSingUp = false;
if (isset($_POST['addFood'])) {
  $name = $_POST["name"];
  $price = $_POST["price"];
  $category = $_POST["food"][0];
  $avatar_name = $_FILES["avatar"]["name"];
  $avatar_tmpName = $_FILES["avatar"]["tmp_name"];
  $location = "avatar/";
  $nameForDB = uniqid() . $avatar_name;
  move_uploaded_file($avatar_tmpName, $location . "$nameForDB");


  $sql = "INSERT INTO `food`(`food`, `avatar`, `cat`, `price`, `availability`) VALUES ('$name','$nameForDB','$category','$price','available now')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    // echo 'inserted';
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="img\logo\logos.png" style="height: 156px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-danger text-white" href="logout.php">Logout</a>
        </li>
      </ul>

    </div>
  </nav>


<h1 class="text-center m-2">Food List</h1>



  <div class="container">
    <h1>CAKE</h1>
    <hr>
    <div class="row">

      <?php
      $sql = "SELECT * FROM `food` WHERE  `cat`='CAKE'";
      $select_run = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($select_run)) {
        echo '<div class="col-4 mt-4">
              <div class="card" style="width: 100%;">
                <img src="avatar/' . $row['avatar'] . '" class="card-img-top" alt="..." style="height: 289px;width: 100%;">
                <div class="card-body">';
        if ($row['offer'] == 0) {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] . 'TK</i></h5><br>';
        } else {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] * $row['offer'] . 'TK</i> <i style=" color: green; font-weight: bolder; float: right;">' . $row['offer'] * 100 . '% off</i></h5><br>';
        }
        echo '<p class="card-text"></p>
                  <div class="row">
                  <a href="operation_admin.php?food_id=' . $row['id'] . '&&food=' . $row['food'] . '&&avatar=' . $row['avatar'] . '&&available=' . $row['availability'] . '&&price=' . $row['price'] . '&&category=' . $row['cat'] . '" class="btn btn-primary mr-4">Operation</a>';
        if ($row['availability'] == 'available now') {
          echo '<a><h4> <span class="badge badge-success">' . $row['availability'] . '</span></h4></a>';
        } else {
          echo '<a><h4> <span class="badge badge-danger">' . $row['availability'] . '</span></h4></a>';
        };

        echo '</div>
                </div>
              </div>
            </div>';
      }
      ?>
    </div>
  </div>
  <br>

  <div class="container">
    <h1>Chocolate</h1>
    <hr>
    <div class="row">

      <?php
      $sql = "SELECT * FROM `food` WHERE  `cat`='Chocolate'";
      $select_run = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($select_run)) {
        echo '<div class="col-4 mt-4">
              <div class="card" style="width: 100%;">
                <img src="avatar/' . $row['avatar'] . '" class="card-img-top" alt="..." style="height: 289px;width: 100%;">
                <div class="card-body">';
        if ($row['offer'] == 0) {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] . 'TK</i></h5><br>';
        } else {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] * $row['offer'] . 'TK</i> <i style=" color: green; font-weight: bolder; float: right;">' . $row['offer'] * 100 . '% off</i></h5><br>';
        }
        echo '<p class="card-text"></p>
                  <div class="row">
                  <a href="operation_admin.php?food_id=' . $row['id'] . '&&food=' . $row['food'] . '&&avatar=' . $row['avatar'] . '&&available=' . $row['availability'] . '&&price=' . $row['price'] . '&&category=' . $row['cat'] . '" class="btn btn-primary mr-4">Operation</a>';
        if ($row['availability'] == 'available now') {
          echo '<a><h4> <span class="badge badge-success">' . $row['availability'] . '</span></h4></a>';
        } else {
          echo '<a><h4> <span class="badge badge-danger">' . $row['availability'] . '</span></h4></a>';
        };

        echo '</div>
                </div>
              </div>
            </div>';
      }
      ?>
    </div>
  </div>
  <br>

  <div class="container">
    <h1>DOI</h1>
    <hr>
    <div class="row">

      <?php
      $sql = "SELECT * FROM `food` WHERE  `cat`='DOI'";
      $select_run = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($select_run)) {
        echo '<div class="col-4 mt-4">
              <div class="card" style="width: 100%;">
                <img src="avatar/' . $row['avatar'] . '" class="card-img-top" alt="..." style="height: 289px;width: 100%;">
                <div class="card-body">';
        if ($row['offer'] == 0) {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] . 'TK</i></h5><br>';
        } else {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] * $row['offer'] . 'TK</i> <i style=" color: green; font-weight: bolder; float: right;">' . $row['offer'] * 100 . '% off</i></h5><br>';
        }
        echo '<p class="card-text"></p>
                  <div class="row">
                  <a href="operation_admin.php?food_id=' . $row['id'] . '&&food=' . $row['food'] . '&&avatar=' . $row['avatar'] . '&&available=' . $row['availability'] . '&&price=' . $row['price'] . '&&category=' . $row['cat'] . '" class="btn btn-primary mr-4">Operation</a>';
        if ($row['availability'] == 'available now') {
          echo '<a><h4> <span class="badge badge-success">' . $row['availability'] . '</span></h4></a>';
        } else {
          echo '<a><h4> <span class="badge badge-danger">' . $row['availability'] . '</span></h4></a>';
        };

        echo '</div>
                </div>
              </div>
            </div>';
      }
      ?>
    </div>
  </div>
  <br>

  <div class="container">
    <h1>Ghi</h1>
    <hr>
    <div class="row">

      <?php
      $sql = "SELECT * FROM `food` WHERE  `cat`='Ghi'";
      $select_run = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($select_run)) {
        echo '<div class="col-4 mt-4">
              <div class="card" style="width: 100%;">
                <img src="avatar/' . $row['avatar'] . '" class="card-img-top" alt="..." style="height: 289px;width: 100%;">
                <div class="card-body">';
        if ($row['offer'] == 0) {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] . 'TK</i></h5><br>';
        } else {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] * $row['offer'] . 'TK</i> <i style=" color: green; font-weight: bolder; float: right;">' . $row['offer'] * 100 . '% off</i></h5><br>';
        }
        echo '<p class="card-text"></p>
                  <div class="row">
                  <a href="operation_admin.php?food_id=' . $row['id'] . '&&food=' . $row['food'] . '&&avatar=' . $row['avatar'] . '&&available=' . $row['availability'] . '&&price=' . $row['price'] . '&&category=' . $row['cat'] . '" class="btn btn-primary mr-4">Operation</a>';
        if ($row['availability'] == 'available now') {
          echo '<a><h4> <span class="badge badge-success">' . $row['availability'] . '</span></h4></a>';
        } else {
          echo '<a><h4> <span class="badge badge-danger">' . $row['availability'] . '</span></h4></a>';
        };

        echo '</div>
                </div>
              </div>
            </div>';
      }
      ?>
    </div>
  </div>

  <div class="container">
    <h1>Sweets</h1>
    <hr>
    <div class="row">

      <?php
      $sql = "SELECT * FROM `food` WHERE  `cat`='Sweets'";
      $select_run = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($select_run)) {
        echo '<div class="col-4 mt-4">
              <div class="card" style="width: 100%;">
                <img src="avatar/' . $row['avatar'] . '" class="card-img-top" alt="..." style="height: 289px;width: 100%;">
                <div class="card-body">';
        if ($row['offer'] == 0) {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] . 'TK</i></h5><br>';
        } else {
          echo '<h5 class="card-title mb-0">' . $row['food'] . '<i class="ml-3" style=" background: red; font-size: 14px; padding: 4px; border-radius: 22px;color:white">Price : ' . $row['price'] * $row['offer'] . 'TK</i> <i style=" color: green; font-weight: bolder; float: right;">' . $row['offer'] * 100 . '% off</i></h5><br>';
        }
        echo '<p class="card-text"></p>
                  <div class="row">
                  <a href="operation_admin.php?food_id=' . $row['id'] . '&&food=' . $row['food'] . '&&avatar=' . $row['avatar'] . '&&available=' . $row['availability'] . '&&price=' . $row['price'] . '&&category=' . $row['cat'] . '" class="btn btn-primary mr-4">Operation</a>';
        if ($row['availability'] == 'available now') {
          echo '<a><h4> <span class="badge badge-success">' . $row['availability'] . '</span></h4></a>';
        } else {
          echo '<a><h4> <span class="badge badge-danger">' . $row['availability'] . '</span></h4></a>';
        };

        echo '</div>
                </div>
              </div>
            </div>';
      }
      ?>
    </div>
  </div>
  <br>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>