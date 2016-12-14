
<?php
  //添加的专业名
  $name = $_GET["name"];
  $xisuoid = $_GET["xisuoid"];
  require("../php/conn.php");

  $insert_zhuanye = "insert into zhuanye(name,xisuoid) values('$name','$xisuoid')";
  $result = mysqli_query($conn,$insert_zhuanye);
  if(!$result){
    echo '<script>alert("添加失败");location.href="../php/manager/index.php?id=3";</script>';
    exit;
  }
  echo '<script>alert("添加成功");location.href="../php/manager/index.php?id=3";</script>';
 ?>
