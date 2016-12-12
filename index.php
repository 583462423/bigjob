<!doctype HTML>
<html>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/index.css">
	<head>
	</head>

	<body>

		<!--模态框提示消息-->
		<div class="modal fade notice-panel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		          <span class="sr-only">Close</span>
		        </button>
		        <h4 class="modal-title">注意</h4>
		      </div>
		      <div class="modal-body">
		        <p class="notice">这里是提示消息。</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


		<div class="top-panel">
		</div>
		<div class="login">
			<form action="" method="post">
				<fieldset class="form-group">
					<label for="user">账号:</label>
					<input class="form-control" name="user" id="user" placeholder="请输入账号">
				</fieldset>
				<fieldset class="form-group">
					<label for="pwd">密码:</label>
					<input type="password" name="pwd" class="form-control" id="pwd" placeholder="请输入密码">
				</fieldset>

				<button type="submit" name="submit" class="btn btn-outline-info wid-all">登陆</button>
			</form>
		</div>

		<script src="./js/jquery-3.1.1.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<script type="text/javascript"></script>
		<?php

			if(isset($_POST["submit"])){
				$user = $_POST["user"];
				$pwd = $_POST["pwd"];

				if($user==""||$pwd == ""){
					echo '<script>
						$(".notice").text("请输入帐号或密码");
						$(".notice-panel").modal("show");
					</script>';
					return;
				}


				//连接数据库
				require("./php/conn.php");
				//拿到$conn变量后，找user的pwd
				$sql = "select * from user where user ='" .$user. "'";
				$result = mysqli_query($conn,$sql);
				if(!$result){
					echo '<script>
						$(".notice").text("无此帐号，请重新输入");
						$(".notice-panel").modal("show");
					</script>';
					return;
				}

				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

				if(!$row){
					echo '<script>
						$(".notice").text("无此帐号，请重新输入");
						$(".notice-panel").modal("show");
					</script>';
					return;
				}

				//执行到这说明有帐号，读取就行了

				if($pwd == $row["pwd"]){
					//存cookie
					setcookie("user",$user);
					setcookie("type",$row["type"]);
					switch($row["type"]){
						//根据不同的type跳转不同的页面
					case 0:
						//高级管理员
						header("Location:"."./php/manager/index.php");
						break;
					case 1:
						//教务管理员
						header("Location:"."./php/tea_manager/index.php");
						break;
					case 2:
						//老师
						header("Location:"."./php/teacher/index.php");
						break;
					case 3:
						//学生
						header("Location:"."./php/student/index.php");
						break;
					}
				}else{
					echo '<script>
						$(".notice").text("密码错误，请重新输入");
						$(".notice-panel").modal("show");
					</script>';
					return;
				}


			}
		?>

	</body>
</html>
