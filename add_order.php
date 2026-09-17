<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="action/insret_order.php" method="post">
        <label for="">ชื่อผู้เข้าพัก</label>
        <input type="text" name="name"> <br> 

        <label for="">การจ่ายเงิน</label>
        <input type="text" name="payment"> <br>

        <label for="">ประเภทการใช้งาน</label>
        <input type="text" name="usage_type"> <br>

        <label for="">ภาพผู้เข้าพัก</label>
        <input type="text" name="image"> <br>

        <?php 
        include "action/connect.php";
        //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "SELECT * FROM rooms";
        //                      db.  คำสั่ง
        $result = mysqli_query($con, $sql);
        ?>

        <label for="">เลือกห้อง</label>
        <select name="room_id" id="">
            <?php 
                foreach ($result as $room) {
                  ?> 
                  <option value="<?= $room["room_id"] ?>"> 
                    <?= $room["room_id"] . " - " . $room["price"] . "บาท" ?>
                    </option>
                    <?php
                }
                ?>
            
        </select>

        <br>
        <button>บันทึก</button>

    </form>

</body>
</html>