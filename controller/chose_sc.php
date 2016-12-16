<?php
  //首先获取值

  $stuid = $_GET["stuid"];
  $cplanid = $_GET["cplanid"];

  //获取链接

  require("../php/conn.php");

  //插入操作

  $sql = "insert into sc(stuid,cplanid) values('$stuid','$cplanid')";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    //选课失败
    echo '<script>alert("选课失败");location.href="../php/student/index.php?id=4";</script>';
    exit;
  }

  //运行到这，说明选课成功，返回1就行
  echo '<script>alert("选课成功");location.href="../php/student/index.php?id=4";</script>';

 ?>
