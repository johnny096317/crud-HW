<?php
include("/var/www/html/connMySQL.php");

// 如果收到 action 參數，表示有要刪除訂單的請求
if (isset($_GET["action"])) {
    $orderId = $_GET['action'];
    // 創建 SQL 查詢語句來刪除訂單
    $sql_query = "DELETE FROM orders WHERE id = $orderId";
    // 執行 SQL 查詢
    mysqli_query($conn, $sql_query);
}

// 查詢訂單和相關的會員資料
$sql_query = "SELECT member.id, member.name, member.phone, orders.id AS orders_id, orders.amount  
              FROM member 
              JOIN orders ON member.id = orders.member_id";
$result = mysqli_query($conn, $sql_query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
</head>
<body>
    <h1>訂單</h1>
    <table border="1">
        <tr>
            <th>訂單編號</th>
            <th>價格</th>
            <th>會員ID</th>
            <th>會員名稱</th>
            <th>會員電話</th>
            <th>刪除</th>
        </tr>
        <?php
        while($row_result = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row_result['orders_id']."</td>";
            echo "<td>".$row_result['amount']."</td>";
            echo "<td>".$row_result['id']."</td>";
            echo "<td>".$row_result['name']."</td>";
            echo "<td>".$row_result['phone']."</td>";
            echo "<td><form method='get'><input type='hidden' name='action' value='".$row_result['orders_id']."'><input type='submit' name='button' value='刪除'></form></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <p><a href='index.php'>返回會員清單</a></p>
</body>
</html>
