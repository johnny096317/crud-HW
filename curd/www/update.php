<?php
  include "connMySQL.php";

  $memberID = $_GET['id'];
  $sql_getDataQuery = "SELECT * FROM member WHERE id = $memberID";
  $result = mysqli_query($conn, $sql_getDataQuery);

  $row_result = mysqli_fetch_assoc($result);
  $id = $row_result['id'];
  $name = $row_result['name'];
  $phone = $row_result['phone'];

  if (isset($_POST["action"]) && $_POST["action"] == 'update') {

    $newName = $_POST['name'];
    $newphone = $_POST['phone'];

    $sql_query = "UPDATE member SET name = '$newName', phone = '$newphone' WHERE id = $memberID";
    mysqli_query($conn,$sql_query);
    $conn->close();

      header('Location: index.php');
  }
?>
<html>

  <head>
    <meta charset="UTF-8" />
    <title>修改會員資料</title>
  </head>
<body>
  <h1>修改資料</h1>
  <form action="" method="post" name="formAdd" id="formAdd">
      
    請輸入姓名：<input type="text" name="name" id="name" value="<?php echo $name ?>"><br/>
    請輸入電話：<input type="text" name="phone" id="phone" value="<?php echo $phone ?>"><br/>
    <input type="hidden" name="action" value="update">
    <input type="submit" name="button" value="修改資料">
  </form>
  <p><a href='index.php'>返回會員清單</a>
 </body>
 </html>
