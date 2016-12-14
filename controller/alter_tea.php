
<?php
  //添加的专业名
  $id = $_POST["id"];
  $tid = $_POST["tid"];
  $name = $_POST["name"];
  $zhuanyeid = $_POST["zhuanyeid"];
  $pwd = $_POST["pwd"];


  require("../php/conn.php");
    //首先取得userid

  $row = mysqli_fetch_array(mysqli_query($conn,"select * from tea where Id = '$id'"),MYSQLI_ASSOC);
  $userid = $row["userid"];

  $userSql = "update user set user = '$tid',pwd = '$pwd' ,type=3 where Id = '$userid'";
  mysqli_query($conn,$userSql);

  $sql = "update tea set tid ='$tid',name='$name',zhuanyeid='$zhuanyeid' where Id = '$id'";
  if(!mysqli_query($conn,$sql)){
    echo '<script>alert("修改失败");location.href="../php/tea_manager/index.php?id=2";</script>';
    exit;
  }
  echo '<script>alert("修改成功");location.href="../php/tea_manager/index.php?id=2";</script>';
 ?>
