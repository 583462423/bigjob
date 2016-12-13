<?php
  //首先获取值

  require("../php/conn.php");
  $userid = $_GET["id"];

  $getUser = "select * from user where Id = '$userid'";
  $getTeaManager = "select * from tea_manager where userid = '$userid'";

  $userResult = mysqli_query($conn,$getUser);
  $user = mysqli_fetch_array($userResult,MYSQLI_ASSOC);

  $teaManagerResult = mysqli_query($conn,$getTeaManager);
  $teaManager = mysqli_fetch_array($teaManagerResult,MYSQLI_ASSOC);

  //取得值后，将值放入一个数组中


  $result["user"] = $user["user"];
  $result["pwd"] = $user["pwd"];
  $result["name"] = $teaManager["name"];
  $result["sex"] = $teaManager["sex"];
  $result["age"] = $teaManager["age"];
  $result["userid"] = $userid;

  echo json_encode($result);
 ?>
