<?php
  //首先获取值

  $userid = $_GET["id"];

  //获取链接

  require("../php/conn.php");

  //插入操作，首先插入账号，密码，之后获取插入的账号密码的id

  $del_user = "delete from xisuo where Id = '$userid'";
  $result = mysqli_query($conn,$del_user);
  if(!$result){
    //删除失败
    echo '<script>alert("删除失败");location.href="../php/manager/index.php";</script>';
    exit;
  }

  //运行到这，说明删除成功，返回1就行
  echo '<script>alert("删除成功");location.href="../php/manager/index.php";</script>';

 ?>
