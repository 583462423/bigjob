<?php
  //首先进行判断是否有cookie
  if(!isset($_COOKIE["user"]) || !isset($_COOKIE["type"])){
      //未设置cookie,说明未登录，返回重新登录
      header("Location:"."../../index.php");
  }else{
    //如果设置的话，要判断type是否对应

    if($_COOKIE["type"]!=2){
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
	<link rel="stylesheet" href="../../css/tea_manager.css">
  <link rel="stylesheet" href="../../css/bootstrap-select.min.css">
	<head>
	</head>

	<body>

    <div class="top-panel">
      <div class="info">
        您好,<?php echo $_COOKIE["user"];?>
        <a href="../../controller/quit.php">退出</a>
      </div>
    </div>

    <div class="container main_panel">
      <!-- 头部导航-->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active nav_myinfo" href="#myinfo" role="tab" data-toggle="tab">个人信息</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_haschose" href="#haschose" role="tab" data-toggle="tab">已选课程</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_myscore" href="#myscore" role="tab" data-toggle="tab">成绩查询</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_chose_c" href="#chose_c" role="tab" data-toggle="tab">选课</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_alter_pwd" href="#alter_pwd" role="tab" data-toggle="tab">密码修改</a>
        </li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="myinfo">
          <?php require("./myinfo.php"); ?>
       </div>

        <div role="tabpanel" class="tab-pane" id="haschose">
          <?php require("./haschose.php"); ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="myscore">
            <?php require("./myscore.php"); ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="chose_c">
            <?php require("./chose_c.php"); ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="alter_pwd">
          <div class="alter_pwd_pane container">
            <form action="../../controller/alter_student_pwd.php" method="POST">
              <fieldset class="form-group">
                <label for="user">请输旧密码:</label>
                <input class="form-control" type="password" name="oldPwd" placeholder="请输入旧密码">
              </fieldset>
              <fieldset class="form-group">
                <label for="user">请输入新密码:</label>
                <input class="form-control" type="password" name="newPwd" placeholder="请输入新密码">
              </fieldset>
              <button class="btn btn-outline-danger" style="width:100%;margin-top:5px;" type="submit">修改</button>
            </form>
          </div>
        </div>

      </div>
    </div>
    <script src="../../js/jquery-3.1.1.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap-select.js"></script>
    <script src="../../js/i18n/defaults-zh_CN.js"></script>
    <script text="text/javascript">
    </script>
      <?php
        if(isset($_GET["id"])){
          $id = $_GET["id"];
          if($id==2){
            echo '<script>$(".nav_myinfo").removeClass("active");
            $(".nav_haschose").addClass("active");
            $("#myinfo").removeClass("active");
            $("#haschose").addClass("active");</script>';
          }else if($id == 3){
            echo '<script>$(".nav_myinfo").removeClass("active");
            $(".nav_myscore").addClass("active");
            $("#myinfo").removeClass("active");
            $("#myscore").addClass("active");</script>';
          }else if($id == 4){
            echo '<script>$(".nav_myinfo").removeClass("active");
            $(".nav_chose_c").addClass("active");
            $("#myinfo").removeClass("active");
            $("#chose_c").addClass("active");</script>';
          }else if($id == 5){
            echo '<script>$(".nav_myinfo").removeClass("active");
            $(".nav_alter_pwd").addClass("active");
            $("#myinfo").removeClass("active");
            $("#alter_pwd").addClass("active");</script>';
          }
        }
      ?>
    </body>
  </html>
