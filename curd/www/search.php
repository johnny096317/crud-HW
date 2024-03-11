<?php
include "connMySQL.php";

$memberID = $_GET['id'];

$sql_getDataQuery = "SELECT member.name, orders.id AS orders_id, orders.amount FROM member JOIN orders ON member.id = orders.member_id WHERE member.id = $memberID";
$result = mysqli_query($conn, $sql_getDataQuery);
$total = mysqli_num_rows($result);

?>

<html>
  <head>
    <meta charset="UTF-8" />
  </head>
  <body>
    <h1>訂單</h1>
    <p><a href='create_order.php?id=<?php echo $memberID ?>'>新增訂單</a></p>

    <?php
    if ($total > 0) {
      echo "<table border='1'>";
      echo "<th>訂單編號</th>";
      echo "<th>金額</th>";
      while ($row_result = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>". $row_result['orders_id'] ."</td>";
        echo "<td>". $row_result['amount'] ."</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "<p>暫無訂單資料</p>";
    }
    ?>

    <p><a href='index.php'>返回會員清單</a></p>
  </body>
</html>

