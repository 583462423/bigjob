<?php
  //首先获取值

  $oldPwd = $_POST["oldPwd"];
  $newPwd = $_POST["newPwd"];

  //获取链接

  require("../php/conn.php");

  //插入操作，首先插入账号，密码，之后获取插入的账号密码的id

  $sql = "select * from user where type = 0";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

  if(!$row){
    //修改失败
    echo '<script>alert("异常");location.href="../php/manager/index.php?id=6";</script>';
    exit;
  }

  if(!$row["pwd"] == $oldPwd){
    echo '<script>alert("原密码错误,请重新输入！");location.href="../php/manager/index.php?id=6";</script>';
    exit;
  }

  //开始修改

  $updatePwd = "update user set pwd = '$newPwd' where type = 0";
  if(!mysqli_query($conn,$updatePwd)){
    echo '<script>alert("修改密码失败，请稍后重试！");location.href="../php/manager/index.php?id=6";</script>';
    exit;
  }

  echo '<script>alert("修改密码成功!");location.href="../php/manager/index.php?id=6";</script>';
 ?>
