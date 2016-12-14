
<?php
  //添加的专业名
  $sid = $_POST["sid"];
  $name = $_POST["name"];
  $sex = $_POST["sex"];
  $classid = $_POST["classid"];
  $date = $_POST["date"];
  $pwd = $_POST["pwd"];


  require("../php/conn.php");
  //首先要把该账号密码存到user中
  $userSql = "insert into user(user,pwd,type) values('$sid','$pwd',2)";
  mysqli_query($conn,$userSql);
  //然后取得id
  $userid = mysqli_insert_id($conn);
  $sql = "insert into stu(sid,name,sex,classid,date,userid) values('$sid','$name','$sex','$classid','$date','$userid')";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo '<script>alert("添加失败");location.href="../php/tea_manager/index.php";</script>';
    exit;
  }
  echo '<script>alert("添加成功");location.href="../php/tea_manager/index.php";</script>';
 ?>
