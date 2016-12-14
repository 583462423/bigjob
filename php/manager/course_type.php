<?php
    //需要链接数据库
    require("../conn.php");

    //链接后，将教师的信息打印出来
    $sql = "select * from ctype";

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
              <th>名称</th>
              <th>操作</th>
            </tr>
            </thead>
          <tbody>';
    $cnt = 1;
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        echo ' <tr>
                <th>'.$cnt++.'</th>
                <td>'.$row["name"].'</td>
                <td><a style="margin-right:5px" class="btn btn-danger" href="../../controller/del_ctype.php?id='.$row["Id"].'">删除</a><button class="alter_ctype btn btn-info" value="'.$row["Id"].'.'.$row["name"].'">修改</button></td>
              </tr>';
    }
    echo '</tbody></table>';
    mysqli_close($conn);
 ?>

<a class="add_ctype"><img class="add" src="../../images/add.png"></img></a>

<!--添加课程类别的模态框-->
<div class="modal fade add_ctype_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">添加班级</h4>
      </div>
      <form action="../../controller/add_ctype.php" method="GET">
        <div class="modal-body">
          <fieldset class="form-group">
            <label for="user">请输入课程类别名称:</label>
            <input class="form-control"  name="name" placeholder="请输入课程类别名称">
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



<!--修改课程类别的模态框-->
<div class="modal fade alter_ctype_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">修改班级</h4>
      </div>
      <form action="../../controller/alter_ctype.php" method="GET">
        <div class="modal-body">
          <input style="display:none;" name="id" id="ctypeid" />
          <fieldset class="form-group">
            <label for="user">请输入修改的课程类别名称:</label>
            <input class="form-control" id="ctype_name_later" name="name" placeholder="请输入课程类别名称">
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
