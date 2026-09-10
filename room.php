<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    /* ดึงฟอนต์ Kanit จาก Google Fonts มาใช้เพิ่มความสวยงาม */
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap');

    body {
        font-family: 'Kanit', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 40px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #2b2d42;
    }

    /* ปรับแต่งตารางและล้างขอบ border=1 เดิม */
    table {
        border-collapse: collapse !important;
        border: none !important;
        width: 100%;
        max-width: 850px;
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        margin-bottom: 24px;
    }

    /* หัวข้อตาราง */
    thead {
        background-color: #4a90e2;
    }

    th {
        color: #ffffff;
        font-weight: 500;
        padding: 16px;
        text-align: center;
        font-size: 16px;
        letter-spacing: 0.5px;
        border: none !important;
    }

    /* เนื้อหาในตาราง */
    td {
        padding: 14px 16px;
        text-align: center;
        border-bottom: 1px solid #edf2f7 !important;
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        font-size: 15px;
        color: #4a5568;
    }

    /* สลับสีแถวให้ดูง่ายขึ้น (Zebra Striping) */
    tr:nth-child(even) {
        background-color: #f8fafc;
    }

    /* เอฟเฟกต์เมื่อวางเมาส์เหนือแถว */
    tr:hover {
        background-color: #eef6ff;
        transition: background-color 0.2s ease;
    }

    /* ตกแต่งปุ่มลิงก์ย้อนกลับ */
    a {
        display: inline-block;
        text-decoration: none;
        background-color: #6c757d;
        color: #ffffff;
        padding: 10px 22px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 400;
        transition: all 0.25s ease;
        box-shadow: 0 4px 6px rgba(108, 117, 125, 0.2);
    }

    a:hover {
        background-color: #495057;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(108, 117, 125, 0.3);
    }
</style>

</head>
<body>

<?php
        include "action/connect.php";

        //      ดึง    ทั้งหมด จาก  ตารางorders
        $sql = "SELECT * FROM rooms";
                //              db.   คำสั่ง
        $result = mysqli_query($con, $sql);
        //ทดสอบ
        //var_dump($result);
    ?>

    <table border=1>
        <thead>
            <th>รหัสรายการ</th>
            <th>สูบบุหรี่ได้มั้ย</th>
            <th>ขนาดอ่าง</th>
            <th>ราคา</th>

        </thead>

        <?php
            foreach($result as $rooms){
                ?>  
                    <tr>
                        <td><?=$rooms["room_id"] ?></td>
                        <td><?=$rooms["smcke"] ?></td>
                        <td><?=$rooms["bathtub"] ?></td>
                        <td><?=$rooms["price"] ?></td>
                    </tr>
                <?php

            }
        ?>
    </table>    
    <a href="index.php">กลับหน้าorders</a>
    
</body>
</html>