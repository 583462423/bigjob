
<?php
  //添加的专业名
  $cplanid = $_GET["cplanid"];
  $teaid = $_GET["teaid"];
  $classid = null;
  if(isset($_GET["classid"])){
    $classid = $_GET["classid"];
  }
  $max = $_GET["max"];
  $classids = "";
  if($classid != null){
      $cnt = count($classid);
      $classids = $classid[0];
      for($i=1;$i<$cnt;$i++){
        $classids = $classids . "," . $classid[$i];
      }
  }


  require("../php/conn.php");

  $sql = "insert into cdata(cplanid,teaid,classid,max) values('$cplanid','$teaid','$classids','$max')";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo '<script>alert("添加失败");location.href="../php/tea_manager/index.php?id=4";</script>';
    exit;
  }
  echo '<script>alert("添加成功");location.href="../php/tea_manager/index.php?id=4";</script>';
 ?>
