
<?php
  //添加的专业名
  $id = $_GET["id"];
  $cid = $_GET["cid"];
  $name = $_GET["name"];
  $ctypeid = $_GET["ctypeid"];
  $xueshi = $_GET["xueshi"];
  $xuefen = $_GET["xuefen"];
  $year = $_GET["year"];


  require("../php/conn.php");

  $sql = "update cplan set cid = '$cid',name = '$name',ctypeid = '$ctypeid',xueshi = '$xueshi',xuefen = '$xuefen',year = '$year' where Id = '$id'";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo '<script>alert("修改失败");location.href="../php/tea_manager/index.php?id=3";</script>';
    exit;
  }
  echo '<script>alert("修改成功");location.href="../php/tea_manager/index.php?id=3";</script>';
 ?>
