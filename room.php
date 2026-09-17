<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fff0f5, #ffe4ec, #fcebf3);
            color: #6b5360;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: #f7b6cd;
            padding: 18px 0;
            box-shadow: 0 4px 15px rgba(190, 120, 150, 0.2);
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 0;
            padding: 0;
        }

        .navbar a {
            display: block;
            text-decoration: none;
            color: white;
            background: #e99ab7;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 3px 8px rgba(180, 100, 130, 0.2);
        }

        .navbar a:hover {
            background: #dc82a5;
            transform: translateY(-3px);
        }

        /* Table */
        table {
            width: 90%;
            margin: 40px auto 25px;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 25px rgba(190, 120, 150, 0.2);
            border: 1px solid #f5cbd9;
        }

        th {
            background: #efa9c2;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        td {
            padding: 14px;
            text-align: center;
            border: none;
            border-bottom: 1px solid #f7d9e3;
        }

        tr:nth-child(even) {
            background: #fff7fa;
        }

        tr:hover {
            background: #ffe5ee;
        }

        /* รูปภาพ */
        td img {
            width: 200px !important;
            height: 140px;
            object-fit: cover;
            border-radius: 15px;
            border: 4px solid #f8cfdd;
            box-shadow: 0 4px 10px rgba(180, 100, 130, 0.2);
        }

        /* ปุ่ม */
        form {
            text-align: center;
            margin: 25px;
        }

        input[type="submit"] {
            background: #e99ab7;
            color: white;
            border: none;
            padding: 12px 35px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(180, 100, 130, 0.2);
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #dc82a5;
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            margin-top: 40px !important;
            background: #e99ab7 !important;
            color: white !important;
            border-radius: 25px 25px 0 0;
            box-shadow: 0 -3px 15px rgba(190, 120, 150, 0.15);
        }

        /* มือถือ */
        @media (max-width: 700px) {

            .navbar ul {
                flex-direction: column;
                align-items: center;
            }

            .navbar a {
                width: 220px;
                text-align: center;
            }

            table {
                width: 95%;
                font-size: 13px;
            }

            th,
            td {
                padding: 8px;
            }

            td img {
                width: 100px !important;
                height: 80px;
            }
        }
    </style>
    </head>

    <body>
        <nav class="navbar">
        <ul>
            <li><a href="index.php">ประวัติ</a></li>
            <li><a href="manage.php">แก้ไขการจอง</a></li>
            <li><a href="room.php">ห้อง</a></li>
        </ul>
    </nav>
        
        <?php
            include "action/connect.php";
            //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "SELECT * FROM rooms";
            //                      db.  คำสั่ง
            $result = mysqli_query($con, $sql);
            // ทดสอบตัวแปร
            // var_dump($result);
        ?>

        <table border=1>
            <thead>
                <th>room</th>
                <th>smoke</th>
                <th>bathtub</th>
                <th>price</th>
                
            </thead>

            <?php
                foreach($result as $order){
                    ?>
                    <tr>
                        <td><?= $order["room_id"] ?></td>
                        <td><?= $order["smoke"] ?></td>
                        <td><?= $order["bathtub"] ?></td>
                        <td><?= $order["price"] ?></td>
                        
                        
                    </tr>
                    <?php
                }
            ?>
        </table>
        <a href="index.php">

    ⬅ กลับหน้ารายการผู้เข้าพัก

    </a>

    <footer style="
        margin-top:30px;
        padding:20px;
        background:#0b6fc2;
        color:white;
        text-align:center;
        font-size:16px;
    ">
        Raweeploy Sriveerapat BIT.2/3 NO.25
    </footer>


    </body>
    </html>