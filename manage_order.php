<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
    /* ดึงฟอนต์ Kanit จาก Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap');

    body {
        font-family: 'Kanit', sans-serif;
        background-color: #f8f9fa;
        color: #2b2d42;
        max-width: 1100px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    /* ------------------ เมนูปุ่มกดด้านบน ------------------ */
    a[href="add_order.php"],
    a[href="index.php"] {
        display: inline-block;
        padding: 10px 22px;
        margin-bottom: 20px;
        margin-right: 8px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 400;
        color: #ffffff;
        transition: all 0.25s ease;
    }

    /* ปุ่มเพิ่มข้อมูล (สีเขียว) */
    a[href="add_order.php"] {
        background-color: #2ec4b6;
        box-shadow: 0 4px 6px rgba(46, 196, 182, 0.2);
    }

    a[href="add_order.php"]:hover {
        background-color: #259d92;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(46, 196, 182, 0.3);
    }

    /* ปุ่มกลับหน้าหลัก (สีเทา) */
    a[href="index.php"] {
        background-color: #6c757d;
        box-shadow: 0 4px 6px rgba(108, 117, 125, 0.2);
    }

    a[href="index.php"]:hover {
        background-color: #495057;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(108, 117, 125, 0.3);
    }

    /* ------------------ ตารางข้อมูล ------------------ */
    table {
        border-collapse: collapse !important;
        border: none !important;
        width: 100%;
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    }

    /* หัวตาราง */
    thead {
        background-color: #4a90e2;
    }

    th {
        color: #ffffff;
        font-weight: 500;
        padding: 16px;
        text-align: center;
        font-size: 16px;
        border: none !important;
    }

    /* เนื้อหาในตาราง */
    td {
        padding: 12px 16px;
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid #edf2f7 !important;
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        font-size: 15px;
        color: #4a5568;
    }

    /* สีสลับแถว */
    tr:nth-child(even) {
        background-color: #f8fafc;
    }

    tr:hover {
        background-color: #eef6ff;
        transition: background-color 0.2s ease;
    }

    /* ปรับขนาดรูปภาพในตาราง */
    td img {
        max-width: 130px !important;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        object-fit: cover;
    }

    /* ------------------ ปุ่มจัดการในตาราง (แก้ไข / ลบ) ------------------ */
    a[href*="edit_order.php"],
    a[href*="delete_order.php"] {
        display: inline-block;
        padding: 7px 16px;
        margin: 3px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 400;
        color: #ffffff;
        transition: all 0.2s ease;
    }

    /* ปุ่มแก้ไข (สีส้ม) */
    a[href*="edit_order.php"] {
        background-color: #ff9f1c;
        box-shadow: 0 2px 5px rgba(255, 159, 28, 0.2);
    }

    a[href*="edit_order.php"]:hover {
        background-color: #e08810;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 159, 28, 0.3);
    }

    /* ปุ่มลบ (สีแดง) */
    a[href*="delete_order.php"] {
        background-color: #e63946;
        box-shadow: 0 2px 5px rgba(230, 57, 70, 0.2);
    }

    a[href*="delete_order.php"]:hover {
        background-color: #d62828;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(230, 57, 70, 0.3);
    }
</style>  

</head>
<body>

<?php
include "action/connect.php";
$sql = "SELECT * FROM orders";
$result = mysqli_query($con, $sql);
?>
<a href="add_order.php">เพิ่ม</a>
<a href="index.php">กลับหน้าindex</a>
<table border=1>
<thead>
<th>รหัสรายการ</th>
<th>ชื่อผู้เข้าพัก</th>
<th>ชำระเงิน</th>
<th>ประเภท</th>
<th>ห้อง</th>
<th>ภาพ</th>
<th> จัดกสร  </th>
</thead>

<?php
foreach($result as $order){
?>
<tr>
<td><?= $order["orders_id"] ?></td>
<td><?= $order["name"] ?></td>
<td><?= $order["payment"] ?></td>
<td><?= $order["usage_type"] ?></td>
<td><?= $order["room_id"] ?></td>
<td>
<img
src="<?= $order["image"] ?>"
style="width:200px">
</td>

<td>
    <a href="edit_order.php?id=<?= $order["orders_id"] ?>">แก้ไข้</a>
        <a href="action/delete_order.php?id=<?= $order["orders_id"] ?>">ลบ</a>
</td>
</tr>
<?php
}
?>
</table>

</body>
</html>