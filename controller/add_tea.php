
<?php
  //添加的教师名
  $tid = $_POST["tid"];
  $name = $_POST["name"];
  $zhuanyeid = $_POST["zhuanyeid"];
  $pwd = $_POST["pwd"];


  require("../php/conn.php");
  //首先要把该账号密码存到user中
  $userSql = "insert into user(user,pwd,type) values('$tid','$pwd',3)";
  mysqli_query($conn,$userSql);
  //然后取得id
  $userid = mysqli_insert_id($conn);
  $sql = "insert into tea(name,zhuanyeid,userid,tid) values('$name','$zhuanyeid','$userid','$tid')";

  if(!mysqli_query($conn,$sql)){
    echo '<script>alert("添加失败");location.href="../php/tea_manager/index.php?id=2";</script>';
    exit;
  }
  echo '<script>alert("添加成功");location.href="../php/tea_manager/index.php?id=2";</script>';
 ?>
