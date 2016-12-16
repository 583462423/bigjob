
<?php
  //添加的专业名
  $sid = $_GET["sid"]; //学号
  $cid = $_GET["cid"];
  $score = $_GET["score"];

  require("../php/conn.php");
  //首先要把该账号密码存到user中
  //通过sid找到stuid
  $stu = mysqli_fetch_array(mysqli_query($conn,"select * from stu where sid = '$sid'"),MYSQLI_ASSOC);
  $stuid = $stu["Id"];

  //通过cid找到cplanid

  $cplan = mysqli_fetch_array(mysqli_query($conn,"select * from cplan where cid = '$cid'"),MYSQLI_ASSOC);
  $cplanid = $cplan["Id"];


  $inScoreSql = "insert into score(stuid,cplanid,score) values('$stuid','$cplanid','$score')";
  //录入
  if(!mysqli_query($conn,$inScoreSql)){
    echo '<script>alert("录入失败");location.href="../php/teacher/index.php?id=2";</script>';
    exit;
  }
  echo '<script>alert("录入成功");location.href="../php/teacher/index.php?id=2";</script>';
 ?>
