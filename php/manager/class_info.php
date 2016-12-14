<?php
    //需要链接数据库
    require("../conn.php");

    //链接后，将教师的信息打印出来
    $sql = "select * from class";

    $result = mysqli_query($conn,$sql);
    if(!$result){
      //显示数据为空
      echo "为什么是空呢？";
      return;
    }

    //取得所属于系所的id

    echo '<table class="table table-bordered">
            <thead class="thead-default">
            <tr>
              <th>班级名称</th>
              <th>所属专业</th>
              <th>入学年份</th>
              <th>操作</th>
            </tr>
            </thead>
          <tbody>';
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      //取得系所信息
      $zhuanyeid = $row["zhuanyeid"];
      $zhuanyeSql = "select * from zhuanye where Id = '$zhuanyeid'";
      $row2 = mysqli_fetch_array(mysqli_query($conn,$zhuanyeSql),MYSQLI_ASSOC);
      $zhuanyeName = $row2["name"];
        echo ' <tr>
                <th>'.$row["name"].'</th>
                <td>'.$row2["name"].'</td>
                <td>'.$row["inyear"].'</td>
                <td><a style="margin-right:5px" class="btn btn-danger" href="../../controller/del_class.php?id='.$row["Id"].'">删除</a><button class="alter_class btn btn-info" value="'.$row["Id"].'.'.$row["name"].'.'.$zhuanyeid.'.'.$row["inyear"].'">修改</button></td>
              </tr>';
    }
    echo '</tbody></table>';
    mysqli_close($conn);
 ?>

<a class="add_class"><img class="add" src="../../images/add.png"></img></a>

<!--添加班级的模态框-->
<div class="modal fade add_class_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">添加班级</h4>
      </div>
      <form action="../../controller/add_class.php" method="GET">
        <div class="modal-body">
          <fieldset class="form-group">
            <label for="user">请输入班级名称:</label>
            <input class="form-control"  name="name" placeholder="请输入专业名称">
          </fieldset>
          <fieldset class="form-group">
          <label for="xisuo">选择所属专业</label>
            <select class="form-control" id="class_zhuanye" name="zhuanyeid">
              <?php
                //获取所有系所
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
            <label for="user">请输入班级入学年份:</label>
            <input class="form-control"  name="inyear" placeholder="请输入班级入学年份">
          </fieldset>
          <fieldset class="form-group">
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



<!--修改班级的模态框-->
<div class="modal fade alter_class_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">修改班级</h4>
      </div>
      <form action="../../controller/alter_class.php" method="GET">
        <div class="modal-body">
          <input style="display:none;" name="id" id="classid" />
          <fieldset class="form-group">
            <label for="user">请输入修改的班级名称:</label>
            <input class="form-control" id="class_name_alter" name="name" placeholder="请输入专业名称">
          </fieldset>
          <fieldset class="form-group">
          <label for="xisuo">选择所属专业</label>
            <select class="form-control" id="class_zhuanye_alter" name="zhuanyeid">
              <?php
                //获取所有系所
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
            <label for="user">请输入修改班级入学年份:</label>
            <input class="form-control"  id="inyear_alter" name="inyear" placeholder="请输入班级入学年份">
          </fieldset>
          <fieldset class="form-group">
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
