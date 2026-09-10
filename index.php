<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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

        tr:nth-child(even) {
            background-color: #f8fafc;
        }

        tr:hover {
            background-color: #eef6ff;
            transition: background-color 0.2s ease;
        }

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
        //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "SELECT * FROM orders";
        //                      db.  คำสั่ง
        $result = mysqli_query($con, $sql);
        // ทดสอบตัวแปร
        // var_dump($result);
    ?>

    <table border=1>
        <thead>
            <th>รหัสรายการ</th>
            <th>ชื่อผู้เข้าพัก</th>
            <th>ชำระเงิน</th>
            <th>ประเภท</th>
            <th>ห้อง</th>
            <th>ภาพ</th>
        </thead>

        <?php
            foreach($result as $orders){
                ?>
                <tr>
                    <td><?= $orders["orders_id"] ?></td>
                    <td><?= $orders["name"] ?></td>
                    <td><?= $orders["payment"] ?></td>
                    <td><?= $orders["usage_type"] ?></td>
                    <td><?= $orders["room_id"] ?></td>
                    <td>
                        <img 
                            src="<?= $orders["image"] ?>"
                            style="width:200px"
                        >
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
         <a href="room.php">ไปหน้าroom</a> 
     <a href="add_order.php">เพิ่ม</a> 
      <a href="manage_order.php">ไปหน้าแก่ไข้</a> 
      <a href="room.php">ไปหน้าroom</a> 

</body>
</html>