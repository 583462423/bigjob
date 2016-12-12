<!--连接数据库的配置-->

<?php
  $conn = mysqli_connect("localhost","root","","bigjob");
  if(!$conn){
    die("连接数据库失败，请检查数据库配置是否正确");
  }
 ?>
