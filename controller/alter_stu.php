
<?php
  //添加的专业名
  $id = $_POST["id"];
  $sid = $_POST["sid"];
  $name = $_POST["name"];
  $sex = $_POST["sex"];
  $classid = $_POST["classid"];
  $date = $_POST["date"];
  $pwd = $_POST["pwd"];


  require("../php/conn.php");
    //首先取得userid

  $row = mysqli_fetch_array(mysqli_query($conn,"select * from stu where Id = '$id'"),MYSQLI_ASSOC);
  $userid = $row["userid"];

  $userSql = "update user set user = '$sid',pwd = '$pwd' ,type=2 where Id = '$userid'";
  mysqli_query($conn,$userSql);

  $sql = "update stu set sid ='$sid',name='$name',sex='$sex',classid='$classid',date='$date' where Id = '$id'";
  if(!mysqli_query($conn,$sql)){
    echo '<script>alert("修改失败");location.href="../php/tea_manager/index.php";</script>';
    exit;
  }
  echo '<script>alert("修改成功");location.href="../php/tea_manager/index.php";</script>';
 ?>
