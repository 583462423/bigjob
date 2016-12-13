<?php
  //首先获取值

  $user = $_POST["user"];
  $pwd = $_POST["pwd"];
  $name = $_POST["name"];
  $age = $_POST["age"];
  $sex = $_POST["sex"];
  $userid = $_POST["userid"];

  //获取链接

  require("../php/conn.php");

  //插入操作，首先插入账号，密码，之后获取插入的账号密码的id

  $update_user = "update user set user='$user',pwd = '$pwd' where Id = '$userid'";
  $update_teaManager = "update tea_manager set name='$name',age = '$age',sex = '$sex' where userid = '$userid'";

  if(!mysqli_query($conn,$update_user)){
    //修改失败
    echo 0;
    exit;
  }

  if(!mysqli_query($conn,$update_teaManager)){
    echo 0;
    exit;
  }
//运行到这，说明插入成功，返回1就行
  echo 1;
 ?>
