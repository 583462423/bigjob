
<?php
  //添加的专业名
  $name = $_GET["name"];
  $zhuanyeid = $_GET["zhuanyeid"];
  $inyear = $_GET["inyear"];

  require("../php/conn.php");

  $sql = "insert into class(name,zhuanyeid,inyear) values('$name','$zhuanyeid','$inyear')";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo '<script>alert("添加失败");location.href="../php/manager/index.php?id=4";</script>';
    exit;
  }
  echo '<script>alert("添加成功");location.href="../php/manager/index.php?id=4";</script>';
 ?>
