<?php
  //首先进行判断是否有cookie
  if(!isset($_COOKIE["user"]) || !isset($_COOKIE["type"])){
      //未设置cookie,说明未登录，返回重新登录
      header("Location:"."../../index.php");
  }else{
    //如果设置的话，要判断type是否对应

    if($_COOKIE["type"]!=0){
      header("Location:"."../../index.php");  //同样的重新登录
    }
  }
?>


<!doctype HTML>
<html>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/manager.css">
	<head>
	</head>

	<body>


    <div class="top-panel">
    </div>

        <!-- 头部导航-->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" href="#home" role="tab" data-toggle="tab">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#profile" role="tab" data-toggle="tab">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#messages" role="tab" data-toggle="tab">Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#settings" role="tab" data-toggle="tab">Settings</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">...</div>
      <div role="tabpanel" class="tab-pane" id="profile">...</div>
      <div role="tabpanel" class="tab-pane" id="messages">...</div>
      <div role="tabpanel" class="tab-pane" id="settings">...</div>
    </div>

    <script src="../../js/jquery-3.1.1.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
	</body>
</html>
