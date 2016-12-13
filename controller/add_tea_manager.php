<?php
  //首先获取值

  $user = $_POST["user"];
  $pwd = $_POST["pwd"];
  $name = $_POST["name"];
  $age = $_POST["age"];
  $sex = $_POST["sex"];

  //获取链接

  require("../php/conn.php");

  //插入操作，首先插入账号，密码，之后获取插入的账号密码的id

  $insert_user = "insert into user(user,pwd,type) values('$user','$pwd',1)";
  $result = mysqli_query($conn,$insert_user);
  if(!$result){
    //插入失败
    echo 0;
    exit;
  }

  $userid = mysqli_insert_id($conn);
  //接着插入教务管理员
  $insert_tea_manager = "insert into tea_manager(userid,name,sex,age) values('$userid','$name','$sex','$age')";
  $resutl = mysqli_query($conn,$insert_tea_manager);
  if(!$result) {echo 0; exit;}

//运行到这，说明插入成功，返回1就行
  echo 1;
 ?>
