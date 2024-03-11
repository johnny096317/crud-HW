<?php
include("/var/www/html/connMySQL.php");
if (isset($_GET["action"])) {
    $memberId = $_GET['action'];
    $sql_query = "DELETE FROM member WHERE id = $memberId";
    mysqli_query($conn, $sql_query);
}

$sql_query = "SELECT * FROM member ORDER BY id ASC";
$result = mysqli_query($conn, $sql_query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
</head>
<body>
    <h1>會員資料</h1>
    <p><a href='create.php'>新增會員</a>  <a href='order.php'>訂單確認</a></p>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>電話</th>
            <th>更新</th>
            <th>刪除</th>
        </tr>
        <?php
        while($row_result = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row_result['id']."</td>";
            echo "<td><a href='search.php?id=".$row_result['id']."'>$row_result[name]</a></td>";
            echo "<td>".$row_result['phone']."</td>";
            echo "<td><a href='update.php?id=".$row_result['id']."'>更新</a></td>";
            echo "<td><form method='get'><input type='hidden' name='action' value='".$row_result['id']."'><input type='submit' name='button' value='刪除'></form></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
