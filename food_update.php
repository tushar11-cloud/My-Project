<?php
include 'part/conn/conn.php';
if (isset($_POST['availablesub'])) {
    $available = $_POST['available'];
    $avail =  $available[0];
    $id = $_GET['food_id'];
    $select = "UPDATE `food` SET `availability`='$avail' WHERE `id`='$id'";
    $select_run = mysqli_query($conn, $select);
}
?>
<?php
include 'part/conn/conn.php';
$isSingUp = false;
if (isset($_POST['addFood'])) {
    $id = $_GET['food_id'];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $category = $_POST["food"][0];
    $avatar_name = $_FILES["avatar"]["name"];
    $avatar_tmpName = $_FILES["avatar"]["tmp_name"];
    $location = "avatar/";
    $nameForDB = uniqid() . $avatar_name;
    move_uploaded_file($avatar_tmpName, $location . "$nameForDB");


    $sql = "UPDATE `food` SET `food`='$name',`avatar`='$nameForDB',`cat`='$category',`price`='$price' WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'updated';
        header("location:food_order.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Active status</h1>
        <hr>
        <hr>
        <div class="contain">
            <center><img src="avatar/<?php echo $_GET['avatar'] ?>" alt="" srcset="" style=" height: 400px; width: 50%;"></center>
            <h1 style="text-align: center;"><?php echo $_GET['food'] ?><i class="ml-2" style=" color: red; font-size: 26px;">Price:<?php echo $_GET['price'] ?>TK</i></h1>
            <h2 style="text-align: center;">Category : <?php echo $_GET['category']; ?></h2>
            <?php
            include 'part/conn/conn.php';
            $id = $_GET['food_id'];
            $sql = "SELECT * FROM `food` WHERE `id`='$id'";
            $sql_s = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($sql_s)) {
                if ($row['availability'] == 'available now') {
                    echo '<a><h4 style="text-align: center;"> <span class="badge badge-success">' . $row['availability'] . '</span></h4></a>';
                } else {
                    echo '<a><h4 style="text-align: center;"> <span class="badge badge-danger">' . $row['availability'] . '</span></h4></a>';
                };
            }
            ?>

        </div>
    </div>
    <br><br>
    <h1 style="text-align: center;">Edit Food</h1>
    <div class="container m-auto col-6">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name" value="<?php echo $_GET['food'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price" name="price" value="<?php echo $_GET['price'] ?>">
            </div>

            <label for="exampleInputEmail1">Category</label> <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="breakfast" name="food[]" required>
                <label class="form-check-label" for="inlineCheckbox1">Breakfast</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="launch" name="food[]" required>
                <label class="form-check-label" for="inlineCheckbox2">Launch</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="dinner" name="food[]" required>
                <label class="form-check-label" for="inlineCheckbox2">Dinner</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="fastfood" name="food[]" required>
                <label class="form-check-label" for="inlineCheckbox2">Fastfood</label>
            </div>
            <br> <br>
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Upload your pic" name="avatar">
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="addFood">Login</button>
        </form>
    </div>
</body>

</html>