<?php
    //需要链接数据库
    require("../conn.php");

    //链接后，将教师的信息打印出来
    $sql = "select * from tea";

    $result = mysqli_query($conn,$sql);
    if(!$result){
      //显示数据为空
      echo "为什么是空呢？";
      return;
    }

    //否则就开始显示table
    echo '<table class="table table-bordered">
            <thead class="thead-default">
            <tr>
              <th>账号</th>
              <th>姓名</th>
              <th>专业</th>
              <th>登陆密码</th>
              <th>操作</th>
            </tr>
            </thead>
          <tbody>';
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $zhuanyeid = $row["zhuanyeid"];
        $zhuanyeSql = "select * from zhuanye where Id = '$zhuanyeid'";
        $zhuanye = mysqli_fetch_array(mysqli_query($conn,$zhuanyeSql),MYSQLI_ASSOC);

        $userid = $row["userid"];
        $userSql = "select * from user where Id = '$userid'";
        $user = mysqli_fetch_array(mysqli_query($conn,$userSql),MYSQLI_ASSOC);
        $pwd = $user["pwd"];
        echo  '<tr>
                <td>'.$row["tid"].'</td>
                <td>'.$row["name"].'</td>
                <td>'.$zhuanye["name"].'</td>
                <td>'.$pwd.'</td>
                <td><a style="margin-right:5px" class="btn btn-danger" href="../../controller/del_tea.php?id='.$row["Id"].'">删除</a><button class="alter_tea btn btn-info" value="'.$row["Id"].'.'.$row["tid"].'.'.$row["name"].'.'.$zhuanyeid.'.'.$pwd.'">修改</button></td>
              </tr>';
    }
    echo '</tbody></table>';
    mysqli_close($conn);
 ?>

<a class="add_tea"><img class="add" src="../../images/add.png"></img></a>

<!--添加教师的模态框-->
<div class="modal fade add_tea_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">添加教师</h4>
      </div>
      <form action="../../controller/add_tea.php" method="POST">
        <div class="modal-body">

          <fieldset class="form-group">
            <label for="name">请输入教师账号:</label>
            <input class="form-control" id="tid" name="tid" placeholder="请输入教师账号">
          </fieldset>

          <fieldset class="form-group">
            <label for="name">请输入姓名:</label>
            <input class="form-control" id="name" name="name" placeholder="请输入学生姓名">
          </fieldset>

          <fieldset class="form-group">
            <label for="classid">请选择专业:</label>
            <select class="form-control"  id="zhuanyeid" name="zhuanyeid">
              <?php
                require("../conn.php");
                $sql = "select * from zhuanye";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["name"].'</option>';
                }
              ?>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="pwd">请输入登陆密码:</label>
            <input class="form-control" id="pwd" name="pwd" placeholder="请输入登陆密码">
          </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
          <button type="submit" class="btn btn-primary">添加</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--模态框结束-->


<!--添加教师的模态框-->
<div class="modal fade alter_tea_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">修改教师</h4>
      </div>
      <form action="../../controller/alter_tea.php" method="POST">
        <div class="modal-body">
          <input style="display:none" id ="tea_id" name="id"/>
          <fieldset class="form-group">
            <label for="name">修改教师账号:</label>
            <input class="form-control" id="tid_alter" name="tid" placeholder="请输入教师账号">
          </fieldset>

          <fieldset class="form-group">
            <label for="name">修改教师姓名:</label>
            <input class="form-control" id="tea_name_alter" name="name" placeholder="请输入学生姓名">
          </fieldset>

          <fieldset class="form-group">
            <label for="classid">修改教师专业:</label>
            <select class="form-control"  id="zhuanyeid_alter" name="zhuanyeid">
              <?php
                require("../conn.php");
                $sql = "select * from zhuanye";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["name"].'</option>';
                }
              ?>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="pwd">修改登陆密码:</label>
            <input class="form-control" id="tea_pwd_alter" name="pwd" placeholder="请输入登陆密码">
          </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
          <button type="submit" class="btn btn-primary">添加</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--模态框结束-->
