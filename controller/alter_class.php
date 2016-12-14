<?php
  //首先获取值

  $name = $_GET["name"];
  $id = $_GET["id"];
  $zhuanyeid = $_GET["zhuanyeid"];
  $inyear = $_GET["inyear"];

  //获取链接

  require("../php/conn.php");

  //插入操作，首先插入账号，密码，之后获取插入的账号密码的id

  $sql = "update class set name='$name',zhuanyeid = '$zhuanyeid',inyear = '$inyear' where Id = '$id'";

  if(!mysqli_query($conn,$sql)){
    //修改失败
    echo '<script>alert("修改失败");location.href="../php/manager/index.php?id=4";</script>';
    exit;
  }

  echo '<script>alert("修改成功");location.href="../php/manager/index.php?id=4";</script>';
 ?>
