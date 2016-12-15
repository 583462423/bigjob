<?php
    //需要链接数据库
    require("../conn.php");

    //链接后，将教师的信息打印出来
    $sql = "select * from cdata";

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
              <th>任课教师</th>
              <th>开课班级</th>
              <th>选课人数上限</th>
              <th>操作</th>
            </tr>
            </thead>
          <tbody>';
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $cplanid = $row["cplanid"];
        $teaid = $row["teaid"];
        $classid = $row["classid"];

        $classids = explode(",",$classid);
        $classNames = "";
        $cnts = count($classids);

        for($i=0;$i<$cnts;$i++){
          $t = $classids[$i];
          $trow = mysqli_fetch_array(mysqli_query($conn,"select * from class where Id = '$t'"),MYSQLI_ASSOC);
          if($i == 0){
            $classNames = $classNames . $trow["name"];
          }else{
            $classNames = $classNames.",".$trow["name"];
          }
        }

        $cplan = mysqli_fetch_array(mysqli_query($conn,"select * from cplan where Id = '$cplanid'"),MYSQLI_ASSOC);
        $tea = mysqli_fetch_array(mysqli_query($conn,"select * from tea where Id = '$teaid'"),MYSQLI_ASSOC);

        $class = mysqli_fetch_array(mysqli_query($conn,"select * from class where Id = '$classid'"),MYSQLI_ASSOC);

        echo  '<tr>
                <td>'.$cplan["cid"].'</td>
                <td>'.$cplan["name"].'</td>
                <td>'.$tea["name"].'</td>
                <td>'.$classNames.'</td>
                <td>'.$row["max"].'</td>
                <td><a style="margin-right:5px" class="btn btn-danger" href="../../controller/del_cdata.php?id='.$row["Id"].'">删除</a><button class="alter_cdata btn btn-info" value="'
                .$row["Id"].'.'.$cplan["Id"].'.'.$tea["Id"].'.'.$class["Id"].'.'.$row["max"].'">修改</button></td>
              </tr>';
    }
    echo '</tbody></table>';
    mysqli_close($conn);
 ?>

<a class="add_cdata"><img class="add" src="../../images/add.png"></img></a>

<!--添加数据表的模态框-->
<div class="modal fade add_cdata_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">添加数据表</h4>
      </div>
      <form action="../../controller/add_cdata.php" method="GET">
        <div class="modal-body">

          <fieldset class="form-group">
            <label for="classid">请选择课程编号:</label>
            <select class="form-control"  id="cplanid" name="cplanid">
              <?php
                require("../conn.php");
                $sql = "select * from cplan";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["cid"].'</option>';
                }
              ?>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="classid">请选择任课教师:</label>
            <select class="form-control"  id="teaid" name="teaid">
              <?php
                require("../conn.php");
                $sql = "select * from tea";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["name"].'</option>';
                }
              ?>
            </select>
          </fieldset>


          <fieldset class="form-group">
            <label for="classid">请选择班级(可多选):</label>
            <select multiple  class="form-control selectpicker"  id="classid" name="classid[]">
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
            <label>请输入人数上限:</label>
            <input class="form-control" id="max" name="max" placeholder="请输入人数上限">
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
<div class="modal fade alter_cdata_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title title">修改数据表</h4>
      </div>
      <form action="../../controller/alter_cdata.php" method="GET">
        <div class="modal-body">

          <input style="display:none" id="cdataid" name="id"/>

          <fieldset class="form-group">
            <label for="classid">请选择课程编号:</label>
            <select class="form-control"  id="cdata_cplanid_alter" name="cplanid">
              <?php
                require("../conn.php");
                $sql = "select * from cplan";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["cid"].'</option>';
                }
              ?>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="classid">请选择任课教师:</label>
            <select class="form-control"  id="cdata_teaid_alter" name="teaid">
              <?php
                require("../conn.php");
                $sql = "select * from tea";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  echo '<option value="'.$row["Id"].'">'.$row["name"].'</option>';
                }
              ?>
            </select>
          </fieldset>


          <fieldset class="form-group">
            <label for="classid">请选择班级(多选):</label>
            <select multiple  class="form-control selectpicker" id="cdata_classid_alter" name="classid[]">
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
            <label>请输入人数上限:</label>
            <input class="form-control" id="cdata_max_alter" name="max" placeholder="请输入人数上限">
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
