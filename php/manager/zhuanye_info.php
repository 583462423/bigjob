<?php
    //需要链接数据库
    require("../conn.php");

    //链接后，将教师的信息打印出来
    $sql = "select * from zhuanye";

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
              <th scope="row">#</th>
              <th>专业名称</th>
              <th>所属系所</th>
              <th>操作</th>
            </tr>
            </thead>
          <tbody>';
    $cnt = 1;
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      //取得系所信息
      $xisuoid = $row["xisuoid"];
      $xisuoSql = "select * from xisuo where Id = '$xisuoid'";
      $row2 = mysqli_fetch_array(mysqli_query($conn,$xisuoSql),MYSQLI_ASSOC);
      $xisuoName = $row2["name"];
        echo ' <tr>
                <th>'.$cnt++.'</th>
                <td>'.$row["name"].'</td>
                <td>'.$xisuoName.'</td>
                <td><a style="margin-right:5px" class="btn btn-danger" href="../../controller/del_zhuanye.php?id='.$row["Id"].'">删除</a><button class="alter_zhuanye btn btn-info" value="'.$row["Id"].'.'.$row["name"].'.'.$xisuoid.'">修改</button></td>
              </tr>';
    }
    echo '</tbody></table>';
    mysqli_close($conn);
 ?>

<!--添加专业的模态框-->
<div class="modal fade add_zhuanye_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">添加专业</h4>
      </div>
      <form action="../../controller/add_zhuanye.php" method="GET">
        <div class="modal-body">
          <fieldset class="form-group">
            <label for="user">请输入专业名称:</label>
            <input class="form-control"  name="name" placeholder="请输入专业名称">
          </fieldset>
          <fieldset class="form-group">
          <label for="xisuo">选择所属系所</label>
            <select class="form-control" id="xisuo" name="xisuoid">
              <?php
                //获取所有系所
                require("../conn.php");
                $getXisuo = "select * from xisuo";
                $result = mysqli_query($conn,$getXisuo);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["name"].'</option>';
                }
              ?>
            </select>
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


<!--修改专业的模态框-->
<div class="modal fade alter_zhuanye_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">修改专业</h4>
      </div>
      <form action="../../controller/alter_zhuanye.php" method="GET">
        <div class="modal-body">
          <input style="display:none" name="id" id="zhuanye_id" />
          <fieldset class="form-group">
            <label for="user">请输入修改专业名称:</label>
            <input class="form-control"  name="name" id="zhuanye_name_alter" placeholder="请输入专业名称" />
          </fieldset>
          <fieldset class="form-group">
          <label for="xisuo">修改所属系所</label>
            <select class="form-control" id="zhuanye_xisuo_alter" name="xisuoid">
              <?php
                //获取所有系所
                require("../conn.php");
                $getXisuo = "select * from xisuo";
                $result = mysqli_query($conn,$getXisuo);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["name"].'</option>';
                }
              ?>
            </select>
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
