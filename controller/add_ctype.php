
<?php
  //添加的专业名
  $name = $_GET["name"];

  require("../php/conn.php");

  $sql = "insert into ctype(name) values('$name')";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo '<script>alert("添加失败");location.href="../php/manager/index.php?id=5";</script>';
    exit;
  }
  echo '<script>alert("添加成功");location.href="../php/manager/index.php?id=5";</script>';
 ?>
