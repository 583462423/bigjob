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





    <!--添加教务管理员的模态框-->
    <div class="modal fade add_modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title title">添加教务管理员</h4>
          </div>
          <div class="modal-body">
            <fieldset class="form-group">
    					<label for="user">账号:</label>
    					<input class="form-control" id="user" placeholder="请输入账号">
    				</fieldset>
            <fieldset class="form-group">
    					<label for="pwd">密码:</label>
    					<input class="form-control"  id="pwd" placeholder="请输入密码">
    				</fieldset>
            <fieldset class="form-group">
    					<label for="name">姓名:</label>
    					<input class="form-control"  id="name" placeholder="请输入姓名">
    				</fieldset>
            <fieldset class="form-group">
    					<label for="sex">性别:</label>
    					<input class="form-control"  id="sex" placeholder="请输入性别">
    				</fieldset>
            <fieldset class="form-group">
    					<label for="age">年龄:</label>
    					<input class="form-control" id="age" placeholder="请输入年龄">
            </fieldset>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
            <button type="button" class="btn btn-primary add_submit">添加</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--模态框结束-->


    <!--修改教务管理员的模态框-->
    <div class="modal fade alter_modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title title">修改教务管理员</h4>
          </div>
          <div class="modal-body">
            <fieldset class="form-group">
    					<label for="user">修改账号:</label>
    					<input class="form-control" id="user_alter" placeholder="输输入账号">
    				</fieldset>
            <fieldset class="form-group">
    					<label for="pwd">修改密码:</label>
    					<input class="form-control"  id="pwd_alter" placeholder="请输入密码">
    				</fieldset>
            <fieldset class="form-group">
    					<label for="name">修改姓名:</label>
    					<input class="form-control"  id="name_alter" placeholder="请输入姓名">
    				</fieldset>
            <fieldset class="form-group">
    					<label for="sex">修改性别:</label>
    					<input class="form-control"  id="sex_alter" placeholder="请输入性别">
    				</fieldset>
            <fieldset class="form-group">
    					<label for="age">修改年龄:</label>
    					<input class="form-control" id="age_alter" placeholder="请输入年龄">
            </fieldset>
              <input style="display:none" id="userid"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
            <button type="button" class="btn btn-primary alter_submit">修改</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--模态框结束-->



    <div class="top-panel">
    </div>

    <div class="container main_panel">
      <!-- 头部导航-->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active nav_tea_manager" href="#tea_manager" role="tab" data-toggle="tab">教务管理员</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_sys_info" href="#sys_info" role="tab" data-toggle="tab">系所信息</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_profession" href="#profession" role="tab" data-toggle="tab">专业信息</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_class_info" href="#class_info" role="tab" data-toggle="tab">班级信息</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_course_type" href="#course_type" role="tab" data-toggle="tab">课程类别</a>
        </li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="tea_manager"><?php
          require("./tea_manager.php");
         ?>
         <a class="add_btn"><img class="add" src="../../images/add.png"></img></a>
       </div>

        <div role="tabpanel" class="tab-pane" id="sys_info">
          <?php require("./xisuo_info.php"); ?>
          <a class="add_xisuo"><img class="add" src="../../images/add.png"></img></a>
        </div>

        <div role="tabpanel" class="tab-pane" id="profession">
          <?php require("./zhuanye_info.php"); ?>
          <a class="add_zhuanye"><img class="add" src="../../images/add.png"></img></a>
        </div>

        <div role="tabpanel" class="tab-pane" id="class_info">
          <?php require("./class_info.php"); ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="course_type">课程类别</div>
      </div>
    </div>
    <script src="../../js/jquery-3.1.1.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
    <script text="text/javascript">
      $(document).ready(function() {

        $(".add_class").click(function(){
          $(".add_class_modal").modal("show");
        });

        $(".alter_class").click(function(){
          var value = $(this).val();

          var arrs = value.split(".");
          var id = arrs[0];
          var name = arrs[1];
          var zhuanyeid = arrs[2];
          var inyear = arrs[3];

          $("#classid").val(id);
          $("#class_name_alter").val(name);
          $("#class_zhuanye_alter").val(zhuanyeid);
          $("#inyear_alter").val(inyear);

          $(".alter_class_modal").modal("show");
        });

        $(".alter_zhuanye").click(function(){
          var value = $(this).val();
          var arrs = value.split(".");
          var id = arrs[0];
          var name = arrs[1];
          var xisuoid = arrs[2];
          $("#zhuanye_id").val(id);
          $("#zhuanye_name_alter").val(name);
          $("#zhuanye_xisuo_alter").val(xisuoid);

          $(".alter_zhuanye_modal").modal("show");
        });

        $(".add_zhuanye").click(function(){
          $(".add_zhuanye_modal").modal("show");
        });

        $(".add_xisuo").click(function(){
          $(".add_xisuo_modal").modal("show");
        });

        $(".add_btn").click(function(){
          $(".add_modal").modal("show");
        });

        $(".alter_submit").click(function(){

          var user = $("#user_alter").val();
          var pwd = $("#pwd_alter").val();
          var name = $("#name_alter").val();
          var age = $("#age_alter").val();
          var sex = $("#sex_alter").val();
          var userid = $("#userid").val();

          var data = {
            user:user,
            pwd:pwd,
            name:name,
            age:age,
            sex:sex,
            userid:userid
          }


          var url = "../../controller/alter_tea_manager.php";

          $.ajax({
            url:url,
            data:data,
            type:'POST',
            success:function(data){
              //成功后会返回数据
              if(data == 1){
                //刷新操作
                alert("修改成功");
                //刷新
                location.href=".";
              }else{
                alert("插入失败，请重新输入");
              }
            },
            error:function(){
              alert(arguments[1]);
            }
          });

        });

        $(".add_submit").click(function(){
          //使用ajax进行操作
          var user = $("#user").val();
          var pwd = $("#pwd").val();
          var name = $("#name").val();
          var age = $("#age").val();
          var sex = $("#sex").val();

          var data = {
            'user':user,
            'pwd':pwd,
            'name':name,
            'age':age,
            'sex':sex
          };

          var url = "../../controller/add_tea_manager.php";
          $.ajax({
            url:url,
            data:data,
            type:'POST',
            success:function(data){
              //成功后会返回数据
              if(data == 1){
                //刷新操作
                alert("插入成功");
                //刷新
                location.href=".";
              }else{
                alert("插入失败，请重新输入");
              }
            },
            error:function(){
              alert(arguments[1]);
            }
          });
        });


        $(".del").click(function(){
          //点击删除按钮后，进行删除，首先要获取按钮的id之

          var id = $(this).val();
          //进行删除
          var url = "../../controller/del_tea_manager.php?id=" + id;
          $.ajax({
            url:url,
            type:'GET',
            success:function(data){
              //成功后会返回数据
              if(data == 1){
                //刷新操作
                alert("删除成功");
                //刷新
                location.href=".";
              }else{
                alert("删除失败");
              }
            },
            error:function(){
              alert(arguments[1]);
            }
          });
        });

        $(".alter").click(function(){
          var id = $(this).val();
          var url = "../../controller/get_tea_manager_info.php?id=" + id;
          $.ajax({
            url:url,
            type:'GET',
            success:function(data){
              //var result = $.parseJson(data);
              var result =  eval("(" + data + ")");
              //得到结果后，将来模态框的值改了

              $("#user_alter").val(result["user"]);
              $("#pwd_alter").val(result["pwd"]);
              $("#name_alter").val(result["name"]);
              $("#age_alter").val(result["age"]);
              $("#sex_alter").val(result["sex"]);
              $("#userid").val(result["userid"]);

              $(".alter_modal").modal("show");
            },
            error:function(){
              alert(arguments[1]);
            }
          });
        });

        $(".alter_xisuo").click(function(){
          var name = $(this).val();
          arrs = name.split(".");

          name = arrs[1];
          var id = arrs[0];

          $("#xisuo_name_alter").val(name);
          $("#xisuo_id").val(id);
          $(".alter_xisuo_modal").modal("show");
        });


      });
    </script>
    <?php
      if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($id==2){
          echo '<script>$(".nav_tea_manager").removeClass("active");
          $(".nav_sys_info").addClass("active");
          $("#tea_manager").removeClass("active");
          $("#sys_info").addClass("active");</script>';
        }else if($id == 3){
          echo '<script>$(".nav_tea_manager").removeClass("active");
          $(".nav_profession").addClass("active");
          $("#tea_manager").removeClass("active");
          $("#profession").addClass("active");</script>';
        }else if($id == 4){
          echo '<script>$(".nav_tea_manager").removeClass("active");
          $(".nav_class_info").addClass("active");
          $("#tea_manager").removeClass("active");
          $("#class_info").addClass("active");</script>';
        }else if($id == 5){
          echo '<script>$(".nav_tea_manager").removeClass("active");
          $(".nav_course_type").addClass("active");
          $("#tea_manager").removeClass("active");
          $("#course_type").addClass("active");</script>';
        }
      }
    ?>
	</body>
</html>
