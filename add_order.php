<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* ตั้งค่าพื้นฐานและการจัดวางกึ่งกลาง */
        body {
            font-family: 'Sarabun', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* ตกแต่งการ์ดฟอร์ม */
        form {
            background-color: #ffffff;
            padding: 30px 35px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 450px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        /* จัดข้อความคำอธิบาย (Label) */
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #2c3e50;
            font-size: 14px;
        }

        /* ตกแต่งช่องกรอกข้อมูลและ Dropdown */
        input[type="text"],
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            background-color: #fff;
        }

        /* เอฟเฟกต์ตอนกดพิมพ์ หรือเลือก */
        input[type="text"]:focus,
        select:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        /* ตกแต่งปุ่มบันทึก */
        button {
            width: 100%;
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.2s, transform 0.1s;
        }

        button:hover {
            background-color: #27ae60;
            transform: translateY(-1px);
        }

        button:active {
            transform: translateY(0);
        }

        /* ตกแต่งลิงก์ย้อนกลับด้านล่าง */
        a {
            display: inline-block;
            text-decoration: none;
            color: #7f8c8d;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 6px;
            transition: color 0.2s, background-color 0.2s;
        }

        a:hover {
            color: #2c3e50;
            background-color: #e2e8f0;
        }
    </style>
</head>
<body>
    <form action="action/insert_order.php" method="post">
        <label for="">ชื่อผู้เข้าพัก</label>
        <input type="text" name="name"><br>

        <label for="">การใช้เงิน</label>
        <input type="text" name="payment"><br>

        <label for="">ประเภคการใช้งาน</label>
        <input type="text" name="usage_type"><br>

        <label for="ชื่อผู้เข้าพัก">ภาพผู้เข้าพัก</label>
        <input type="text" name="image"><br>


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
                    <?= $room["room_id"]."_". $room["price"] . "บาท"?>
            
            </option>
                <?php
            }
            
            ?>
        </select>
        <br>
        <button>บันทึก</button>
    </form>
     <a href="index.php">กลับหน้าindex</a>
</body>
</html>