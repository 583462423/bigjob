
<?php
  //消除cookie，并且跳转
  setcookie("user");
  setcookie("type");

  header("location:../index.php");
 ?>
