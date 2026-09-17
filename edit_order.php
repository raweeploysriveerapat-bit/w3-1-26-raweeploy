<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// Report all PHP errors
error_reporting(E_ALL);

// Force errors to be displayed on the screen
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$id = $_GET["id"];

include "action/connect.php";

$sql = "SELECT * FROM orders WHERE orders_id = '$id' ";

$result = mysqli_query($con,$sql);

$order = mysqli_fetch_assoc($result);


?>

    <form action="action/update_order.php" method="post">


        <label for="">ชื่อผู้เข้าพัก</label>
        <input type="text" name="name" value="<?= $order["name"] ?>"> <br>

        <label for="">การจ่ายเงิน</label>
        <input type="text" name="payment" value="<?= $order["payment"] ?>"> <br>


        <label for="">ประเภทการใช้งาน</label>
        <input type="text" name="usage_type" value="<?= $order["usage_type"] ?>"> <br>


        <label for="">ภาพผู้เข้าพัก</label>
        <input type="text" name="image" value="<?= $order["image"] ?>"> <br>


       <?php
  
        include "action/connect.php";
        $sql = "SELECT * FROM rooms";
        $result = mysqli_query($con,$sql)
       ?>
       
       <label for="">เลือกห้องพัก</label>
       <select name="room_id" id="">

       <?php

       foreach ($result as $room){
        ?>
        <option value="<?=$room["room_id"]?>"
            <?= $order['room_id'] == $room['room_id'] ? 'selected' : '' ?>
            >
            <?=$room["room_id"] . "-" . $room["price"] . "บาท" ?>
        </option>
        <?php
       }
       ?>
       </select>

       <input type="hidden" name="order_id" value="<?= $order['orders_id'] ?>">

       <br>
       <button> บันทึก </button>

    </form>
</body>
</html>