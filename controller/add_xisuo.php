
<?php
  $name = $_GET["name"];
  require("../php/conn.php");

  $inser_xisuo = "insert into xisuo(name) values('$name')";
  $result = mysqli_query($conn,$inser_xisuo);
  if(!$result){

    echo '<script>alert("����ʧ��");location.href="../php/manager/index.php?id=2";</script>';
    exit;
  }
  echo '<script>alert("����ɹ�");location.href="../php/manager/index.php?id=2";</script>';
 ?>
