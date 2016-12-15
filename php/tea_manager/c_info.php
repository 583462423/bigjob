<?php
    //需要链接数据库
    require("../conn.php");

    //链接后，将教师的信息打印出来
    $sql = "select * from cplan";

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
              <th>课程编号</th>
              <th>课程名</th>
              <th>课程类别</th>
              <th>总学时</th>
              <th>学分</th>
              <th>开课年级</th>
              <th>操作</th>
            </tr>
            </thead>
          <tbody>';
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $ctypeid = $row["ctypeid"];
        $ctypeSql = "select * from ctype where Id = '$ctypeid'";
        $ctype = mysqli_fetch_array(mysqli_query($conn,$ctypeSql),MYSQLI_ASSOC);

        echo  '<tr>
                <td>'.$row["cid"].'</td>
                <td>'.$row["name"].'</td>
                <td>'.$ctype["name"].'</td>
                <td>'.$row["xueshi"].'</td>
                <td>'.$row["xuefen"].'</td>
                <td>'.$row["year"].'</td>
                <td><a style="margin-right:5px" class="btn btn-danger" href="../../controller/del_cplan.php?id='.$row["Id"].'">删除</a><button class="alter_cplan btn btn-info" value="'
                .$row["Id"].'.'.$row["cid"].'.'.$row["name"].'.'.$ctypeid.'.'.$row["xueshi"].'.'.$row["xuefen"].'.'.$row["year"].'">修改</button></td>
              </tr>';
    }
    echo '</tbody></table>';
    mysqli_close($conn);
 ?>

<a class="add_cplan"><img class="add" src="../../images/add.png"></img></a>

<!--添加教师的模态框-->
<div class="modal fade add_cplan_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">添加教师</h4>
      </div>
      <form action="../../controller/add_cplan.php" method="GET">
        <div class="modal-body">

          <fieldset class="form-group">
            <label>请输入课程编号:</label>
            <input class="form-control" id="cid" name="cid" placeholder="请输入课程编号">
          </fieldset>

          <fieldset class="form-group">
            <label>请输入课程名:</label>
            <input class="form-control" id="name" name="name" placeholder="请输入课程名">
          </fieldset>

          <fieldset class="form-group">
            <label for="classid">请选择课程类别:</label>
            <select class="form-control"  id="ctypeid" name="ctypeid">
              <?php
                require("../conn.php");
                $sql = "select * from ctype";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["name"].'</option>';
                }
              ?>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="pwd">请输入学时个数:</label>
            <input class="form-control" id="xueshi" name="xueshi" placeholder="请输入学时个数">
          </fieldset>

          <fieldset class="form-group">
            <label for="pwd">请输入学分个数:</label>
            <input class="form-control" id="xuefen" name="xuefen" placeholder="请输入学分个数">
          </fieldset>

          <fieldset class="form-group">
            <label for="pwd">请输入开课年级:</label>
            <input class="form-control" id="year" name="year" placeholder="请输入开课年级">
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


<!--修改教师的模态框-->
<div class="modal fade alter_cplan_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">修改教师</h4>
      </div>
      <form action="../../controller/alter_cplan.php" method="GET">
        <div class="modal-body">

          <input style="display:none" name="id" id="cplan_id"/>

          <fieldset class="form-group">
            <label>修改课程编号:</label>
            <input class="form-control" id="cid_alter" name="cid" placeholder="请输入课程编号">
          </fieldset>

          <fieldset class="form-group">
            <label>修改课程名:</label>
            <input class="form-control" id="cplan_name_alter" name="name" placeholder="请输入课程名">
          </fieldset>

          <fieldset class="form-group">
            <label for="classid">修改课程类别:</label>
            <select class="form-control"  id="cplan_ctypeid_alter" name="ctypeid">
              <?php
                require("../conn.php");
                $sql = "select * from ctype";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["name"].'</option>';
                }
              ?>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="pwd">修改学时个数:</label>
            <input class="form-control" id="xueshi_alter" name="xueshi" placeholder="请输入学时个数">
          </fieldset>

          <fieldset class="form-group">
            <label for="pwd">修改学分个数:</label>
            <input class="form-control" id="xuefen_alter" name="xuefen" placeholder="请输入学分个数">
          </fieldset>

          <fieldset class="form-group">
            <label for="pwd">修改开课年级:</label>
            <input class="form-control" id="year_alter" name="year" placeholder="请输入开课年级">
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
