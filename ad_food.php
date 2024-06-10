<?php
    session_start();
?>
<?php
    
    include 'part/conn/conn.php';
    if(isset($_POST['done'])){
      $food = $_POST['food'];
      $cat = $_POST['cat'];
      $price = $_POST['price'];
      $offer = $_POST['offer'];
      $offer_des = $_POST['des'];
      $aa = $cat[0];
      $avatar_name = $_FILES["avatar"]["name"];
      $avatar_tmpName = $_FILES["avatar"]["tmp_name"];
      $location = "avatar/";
      $nameForDB = uniqid().$avatar_name;
      move_uploaded_file($avatar_tmpName, $location."$nameForDB");

      $sql = "INSERT INTO `food`(`food`, `avatar`, `cat`, `price`, `offer`, `offer_des`) VALUES ('$food','$nameForDB','$aa',$price,'$offer','$offer_des')";
        $result = mysqli_query($conn, $sql);
        if($result){
          echo "inserted";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Sweet_11</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="img\logo\logo.png" style="height: 93px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link btn btn-danger text-white" href="logout.php">Logout</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

      
    <h1 class="text-center mt-4">Add food <?php  echo $_SESSION['name']?></h1>
    <div class="m-auto col-6">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Food name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="food" value="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Food Image</label>
          <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="avatar" value="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"><h4>Category</h4></label> <br>
          breakfast : <input type="checkbox" name="cat[]" value="breakfast"> <br>
          launch : <input type="checkbox" name="cat[]" value="launch"> <br>
          dinner : <input type="checkbox" name="cat[]" value="dinner"> <br>
          fastfood : <input type="checkbox" name="cat[]" value="fastfood"> <br> <br> <br>
        </div>
        

        <div class="form-group">
          <label for="exampleInputPassword1">Price</label>
          <input type="number" class="form-control" id="exampleInputPassword1" name="price" value="">
        </div>

        Add offer : <input type="checkbox" name="offer" value="offer" value="0">
  
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Order description" name="des" value=""></textarea> <br>
        <button type="submit" class="btn btn-primary" name="done">Submit</button>
      </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>