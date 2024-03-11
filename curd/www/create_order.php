<?php
 include "connMySQL.php";
 $memberID = $_GET['id'];

if (isset($_POST["action"])&&($_POST["action"] == "add")) {
    include("connMySQL.php");
    $amount = $_POST["amount"];
    $sql_query = "INSERT INTO orders (amount,member_id) VALUES ($amount,$memberID)";
    mysqli_query($conn,$sql_query);
    header("Location: search.php?id=$memberID");
}
?>
<html>
<body>
<h1> 新增訂單</h1>
<form action="" method="post" name="formAdd" id="formAdd">
  請輸入金額：<input type="text" name="amount" id="amount"><br/>
<input type="hidden" name="action" value="add">
<input type="submit" name="button" value="送出">
<input type="reset" name="button2" value="清除">
</form>
<p><a href='search.php?id=<?php echo $memberID ?>'>返回上一頁</a>
</body>
</html>
