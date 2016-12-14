<?php
    //需要链接数据库
    require("../conn.php");

    //链接后，将教师的信息打印出来
    $sql = "select * from stu";

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
              <th>学号</th>
              <th>姓名</th>
              <th>性别</th>
              <th>班级</th>
              <th>出生日期</th>
              <th>登陆密码</th>
              <th>操作</th>
            </tr>
            </thead>
          <tbody>';
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $userid = $row["userid"];
        $pwdSql = "select * from user where Id = '$userid'";
        $user = mysqli_fetch_array(mysqli_query($conn,$pwdSql),MYSQLI_ASSOC);
        $pwd = $user["pwd"];
        $classid = $row["classid"];
        $classSql = "select * from class where Id = '$classid'";
        $class = mysqli_fetch_array(mysqli_query($conn,$classSql),MYSQLI_ASSOC);

        echo  '<tr>
                <td>'.$row["sid"].'</td>
                <td>'.$row["name"].'</td>
                <td>'.$row["sex"].'</td>
                <td>'.$class["name"].'</td>
                <td>'.$row["date"].'</td>
                <td>'.$pwd.'</td>
                <td><a style="margin-right:5px" class="btn btn-danger" href="../../controller/del_stu.php?id='.$row["Id"].'">删除</a><button class="alter_stu btn btn-info" value="'.$row["Id"].'.'.$row["sid"].'.'.$row["name"].'.'.$row["sex"].'.'.$class["Id"].'.'.$row["date"].'.'.$pwd.'">修改</button></td>
              </tr>';
    }
    echo '</tbody></table>';
    mysqli_close($conn);
 ?>

<a class="add_stu"><img class="add" src="../../images/add.png"></img></a>

<!--添加学生的模态框-->
<div class="modal fade add_stu_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">添加学生</h4>
      </div>
      <form action="../../controller/add_stu.php" method="POST">
        <div class="modal-body">
          <fieldset class="form-group">
            <label for="sid">请输入学号:</label>
            <input class="form-control"  name="sid" placeholder="请输入学生学号">
          </fieldset>
          <fieldset class="form-group">
            <label for="name">请输入姓名:</label>
            <input class="form-control" id="name" name="name" placeholder="请输入学生姓名">
          </fieldset>
          <fieldset class="form-group">
            <label for="sex">请输入性别:</label>
            <select class="form-control"  id="sex" name="sex">
              <option value="男">男</option>
              <option value="女">女</option>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="classid">请选择班级:</label>
            <select class="form-control"  id="classid" name="classid">
              <?php
                require("../conn.php");
                $sql = "select * from class";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["name"].'</option>';
                }
              ?>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="date">请输入出生日期:</label>
            <input class="form-control" id="date" type="date" name="date" placeholder="请输入出生日期">
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


<!--更改学生的模态框-->
<div class="modal fade alter_stu_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">修改学生信息</h4>
      </div>
      <form action="../../controller/alter_stu.php" method="POST">
        <div class="modal-body">

          <input style="display:none;" id="id" name="id"/>

          <fieldset class="form-group">
            <label for="sid">修改学号:</label>
            <input class="form-control" id="sid_alter" name="sid" placeholder="请输入学生学号">
          </fieldset>

          <fieldset class="form-group">
            <label for="name">修改姓名:</label>
            <input class="form-control" id="name_alter" name="name" placeholder="请输入学生姓名">
          </fieldset>

          <fieldset class="form-group">
            <label for="sex">修改性别:</label>
            <select class="form-control"  id="sex_alter" name="sex">
              <option value="男">男</option>
              <option value="女">女</option>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="classid">修改班级:</label>
            <select class="form-control"  id="classid_alter" name="classid">
              <?php
                require("../conn.php");
                $sql = "select * from class";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["name"].'</option>';
                }
              ?>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="date">修改出生日期:</label>
            <input class="form-control" id="date_alter" type="date" name="date" placeholder="请输入出生日期">
          </fieldset>

          <fieldset class="form-group">
            <label for="pwd">修改登陆密码:</label>
            <input class="form-control" id="pwd_alter" name="pwd" placeholder="请输入登陆密码">
          </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
          <button type="submit" class="btn btn-primary">修改</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--模态框结束-->
