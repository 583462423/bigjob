<?php
  //首先获取值

  $userid = $_GET["id"];

  //获取链接

  require("../php/conn.php");

  //插入操作，首先插入账号，密码，之后获取插入的账号密码的id

  $del_user = "delete from user where Id = '$userid'";
  $result = mysqli_query($conn,$del_user);
  if(!$result){
    //删除失败
    echo 0;
    exit;
  }

  $del_tea_manager = "delete from tea_manager where userid = '$userid'";
  $resutl = mysqli_query($conn,$del_tea_manager);
  if(!$result) {echo 0; exit;}

  //运行到这，说明删除成功，返回1就行
  echo 1;
 ?>
