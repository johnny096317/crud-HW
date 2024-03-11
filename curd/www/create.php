<?php
if (isset($_POST["action"])&&($_POST["action"] == "add")) {
    include("connMySQL.php");
    $name = $_POST["name"];
    $phone = $_POST['phone'];
    $sql_query = "INSERT INTO member (name, phone) VALUES ('$name', '$phone')";
    mysqli_query($conn,$sql_query);
    header("Location: index.php");
}
?>
<html>
<body>
<h1> 新增會員</h1>
<form action="" method="post" name="formAdd" id="formAdd">
  請輸入名稱：<input type="text" name="name" id="name"><br/>
  請輸入電話：<input type="text" name="phone" id="phone"><br/>
<input type="hidden" name="action" value="add">
<input type="submit" name="button" value="送出">
<input type="reset" name="button2" value="清除">
</form>
<p><a href='index.php'>返回會員清單</a></br></br>
</body>
</html>
