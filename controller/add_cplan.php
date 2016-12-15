
<?php
  //添加的专业名
  $cid = $_GET["cid"];
  $name = $_GET["name"];
  $ctypeid = $_GET["ctypeid"];
  $xueshi = $_GET["xueshi"];
  $xuefen = $_GET["xuefen"];
  $year = $_GET["year"];


  require("../php/conn.php");

  $sql = "insert into cplan(cid,name,ctypeid,xueshi,xuefen,year) values('$cid','$name','$ctypeid','$xueshi','$xuefen','$year')";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo '<script>alert("添加失败");location.href="../php/tea_manager/index.php?id=3";</script>';
    exit;
  }
  echo '<script>alert("添加成功");location.href="../php/tea_manager/index.php?id=3";</script>';
 ?>
