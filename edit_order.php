<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   <?php
       $id = $_GET["id"];

      include "action/connect.php";

       $sql = "SELECT * FROM orders WHERE orders_id ='$id' ";

       $result = mysqli_query($con, $sql);

       $order = mysqli_fetch_assoc($result);

       //var_dump($order);
   ?>


    <form action="action/update_order.php" method="post">
        <label for="">ชื่อผู้เข้าพัก</label>
        <input type="text" name="name" value="<?= $order["name"]?>">  <br>

        <label for="">การใช้เงิน</label>
        <input type="text" name="payment"  value="<?= $order["payment"]?>"> <br>

        <label for="">ประเภคการใช้งาน</label>
        <input type="text" name="usage_type"  value="<?= $order["usage_type"]?>"> <br>

        <label for="ชื่อผู้เข้าพัก">ภาพผู้เข้าพัก</label>
        <input type="text" name="image"  value="<?= $order["image"]?>"> <br>


        <?php
        include "action/connect.php";
        //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "SELECT * FROM rooms";
        //                      db.  คำสั่ง
        $result = mysqli_query($con, $sql);
        // ทดสอบตัวแปร
        // var_dump($result);
        
        ?>
        <label for="">เลือกห้องพัก</label>
        <select name="room_id" id="">
            <?php 
            
            foreach($result as $room){
                ?>
                <option value="<?= $room["room_id"]?>">
                    <?=$order["room_id"] == $room['room_id'] ? 'selected' : ''?>
                    <?= $room["room_id"]."_". $room["price"] . "บาท"?>
            
            </option>
                <?php
            }
            
            ?>
        </select>
    <input type="hidden" name="orders_id" value="<?= $order['orders_id']?>">
        <br>
        <button>บันทึก</button>
    </form>
     <a href="index.php">กลับหน้าindex</a>
</body>
</html>
<