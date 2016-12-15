
<?php
  //添加的专业名
  $id = $_GET["id"];
  $cplanid = $_GET["cplanid"];
  $teaid = $_GET["teaid"];
  $classid = $_GET["classid"];
  $max = $_GET["max"];

  $cnt = count($classid);

  $classids = $classid[0];
  for($i=1;$i<$cnt;$i++){
    $classids = $classids . "," . $classid[$i];
  }

  require("../php/conn.php");

  $sql = "update cdata set cplanid = '$cplanid',teaid = '$teaid',classid = '$classids',max = '$max' where Id = '$id'";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo '<script>alert("修改失败");location.href="../php/tea_manager/index.php?id=4";</script>';
    exit;
  }
  echo '<script>alert("修改成功");location.href="../php/tea_manager/index.php?id=4";</script>';
 ?>
