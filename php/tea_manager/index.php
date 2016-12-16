<?php
  //首先进行判断是否有cookie
  if(!isset($_COOKIE["user"]) || !isset($_COOKIE["type"])){
      //未设置cookie,说明未登录，返回重新登录
      header("Location:"."../../index.php");
  }else{
    //如果设置的话，要判断type是否对应

    if($_COOKIE["type"]!=1){
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
          <a class="nav-link active nav_s_info" href="#s_info" role="tab" data-toggle="tab">学生信息维护</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_t_info" href="#t_info" role="tab" data-toggle="tab">教师信息维护</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_c_info" href="#c_info" role="tab" data-toggle="tab">开课计划维护</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_c_data" href="#c_data" role="tab" data-toggle="tab">开课数据维护</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_alter_pwd" href="#alter_pwd" role="tab" data-toggle="tab">密码修改</a>
        </li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="s_info">
          <?php require("./s_info.php"); ?>
       </div>

        <div role="tabpanel" class="tab-pane" id="t_info">
          <?php require("./t_info.php"); ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="c_info">
          <?php require("./c_info.php"); ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="c_data">
          <?php require("./c_data.php"); ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="alter_pwd">
          <div class="alter_pwd_pane container">
            <form action="../../controller/alter_tea_manager_pwd.php" method="POST">
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
    $(document).ready(function() {
      $(".add_stu").click(function(event) {
        $(".add_stu_modal").modal("show");
      });

      $(".add_cdata").click(function(){
        $(".add_cdata_modal").modal("show");
      });

      $(".add_cplan").click(function(){
        $(".add_cplan_modal").modal("show");
      });

      $(".add_tea").click(function(){
        $(".add_tea_modal").modal("show");
      });

      $(".alter_cdata").click(function(){
        var value = $(this).val();
        var arrs = value.split(".");

        var id = arrs[0];
        var cplanid = arrs[1];
        var teaid = arrs[2];
        var classid = arrs[3];
        var max = arrs[4];

        $("#cdataid").val(id);
        $("#cdata_cplanid_alter").val(cplanid);
        $("#cdata_teaid_alter").val(teaid);
        $("#cdata_classid_alter").val(classid);
        $("#cdata_max_alter").val(max);

        $(".alter_cdata_modal").modal("show");
      });

      $(".alter_cplan").click(function(){
        var value = $(this).val();
        var arrs = value.split(".");

        var id = arrs[0];
        var cid = arrs[1];
        var name = arrs[2];
        var ctypeid = arrs[3];
        var xueshi = arrs[4];
        var xuefen = arrs[5];
        var year = arrs[6];

        $("#cplan_id").val(id);
        $("#cid_alter").val(cid);
        $("#cplan_name_alter").val(name);
        $("#cplan_ctypeid_alter").val(ctypeid);
        $("#xueshi_alter").val(xueshi);
        $("#xuefen_alter").val(xuefen);
        $("#year_alter").val(year);

        $(".alter_cplan_modal").modal("show");
      });

      $(".alter_tea").click(function(){
        var value = $(this).val();
        var arrs = value.split(".");

        var id = arrs[0];
        var tid = arrs[1];
        var name = arrs[2];
        var zhuanyeid = arrs[3];
        var pwd = arrs[4];

        $("#tea_id").val(id);
        $("#tid_alter").val(tid);
        $("#tea_name_alter").val(name);
        $("#zhuanyeid_alter").val(zhuanyeid);
        $("#tea_pwd_alter").val(pwd);

        $(".alter_tea_modal").modal("show");
      });

      $(".alter_stu").click(function(){
        var value = $(this).val();
        var arrs = value.split(".");

        var id = arrs[0];
        var sid = arrs[1];
        var name = arrs[2];
        var sex = arrs[3];
        var classid = arrs[4];
        var date = arrs[5];
        var pwd = arrs[6];

        $("#id").val(id);
        $("#sid_alter").val(sid);
        $("#name_alter").val(name);
        $("#sex_alter").val(sex);
        $("#classid_alter").val(classid);
        $("#date_alter").val(date);
        $("#pwd_alter").val(pwd);

        $(".alter_stu_modal").modal("show");
      });

    });
    </script>
      <?php
        if(isset($_GET["id"])){
          $id = $_GET["id"];
          if($id==2){
            echo '<script>$(".nav_s_info").removeClass("active");
            $(".nav_t_info").addClass("active");
            $("#s_info").removeClass("active");
            $("#t_info").addClass("active");</script>';
          }else if($id == 3){
            echo '<script>$(".nav_s_info").removeClass("active");
            $(".nav_c_info").addClass("active");
            $("#s_info").removeClass("active");
            $("#c_info").addClass("active");</script>';
          }else if($id == 4){
            echo '<script>$(".nav_s_info").removeClass("active");
            $(".nav_c_data").addClass("active");
            $("#s_info").removeClass("active");
            $("#c_data").addClass("active");</script>';
          }else if($id == 5){
            echo '<script>$(".nav_s_info").removeClass("active");
            $(".nav_alter_pwd").addClass("active");
            $("#s_info").removeClass("active");
            $("#alter_pwd").addClass("active");</script>';
          }
        }
      ?>
    </body>
  </html>
