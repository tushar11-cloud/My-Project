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
            <h1 style="text-align: center;"><?php echo $_GET['food'] ?><i class="ml-2" style=" color: red; font-size: 26px;">Price:<?php echo $_GET['price']?>TK</i></h1>
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
            <form method="POST" style="width: 50%;margin: auto;">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="available now" name="available[]">
                    <label class="form-check-label" for="inlineCheckbox1">Aavailable now</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="not available now" name="available[]">
                    <label class="form-check-label" for="inlineCheckbox2">Aavailable not now</label>
                </div>
                <button type="submit" class="btn btn-success p-1" name="availablesub">Add Now</button>
                <a href="food_order.php" class="btn btn-primary">Update it</a>
            </form>
        </div>
    </div>
    <br><br><br>
    <div class="operation" style="display: flex;    justify-content: center;">
        <a href="food_delete.php?food_id=<?php echo $_GET['food_id']; ?>" class="btn btn-danger mr-2">Delete</a>
        <a href="food_update.php?food_id=<?php echo $_GET['food_id']; ?>&&food=<?php echo $_GET['food']; ?>&&avatar=<?php echo $_GET['avatar']; ?>&&available=<?php echo $_GET['available']; ?>&&price=<?php echo $_GET['price']; ?>&&category=<?php echo $_GET['category']; ?>" class="btn btn-success">Update</a>
    </div>
</body>

</html>