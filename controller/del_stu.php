<?php
  //首先获取值

  $id = $_GET["id"];

  //获取链接

  require("../php/conn.php");

  //插入操作，首先插入账号，密码，之后获取插入的账号密码的id
  $userSql = "select * from stu where Id = '$id'";
  $row = mysqli_fetch_array(mysqli_query($conn,$userSql),MYSQLI_ASSOC);
  $userid = $row["userid"];

  $sql = "delete from stu where Id = '$id'";
  $result = mysqli_query($conn,$sql);

  if(!mysqli_query($conn,"delete from user where Id = '$userid'")){
    //删除失败
    echo '<script>alert("删除失败");location.href="../php/tea_manager/index.php";</script>';
    exit;
  }

  //运行到这，说明删除成功，返回1就行
  echo '<script>alert("删除成功");location.href="../php/tea_manager/index.php";</script>';

 ?>
