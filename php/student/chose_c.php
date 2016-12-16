<?php
    //需要链接数据库
    require("../conn.php");
    //拿到user
    $sid = $_COOKIE["user"];
    $stuSql = "select * from stu where sid = '$sid'";
    $stu = mysqli_fetch_array(mysqli_query($conn,$stuSql),MYSQLI_ASSOC);

    //首先要获取开课计划的课程

    //链接后，将教师的信息打印出来
    $sql = "select * from cdata";
    $result = mysqli_query($conn,$sql);
    if(!$result){
      //显示数据为空
      echo "为什么是空呢？";
      return;
    }


    //输出个人信息
    echo '<table class="table table-bordered">
            <thead class="thead-default">
            <tr>
              <th>可选选课编号</th>
              <th>可选选课名称</th>
              <th>选课状态</th>
              <th>操作</th>
            </tr>
            </thead>
          <tbody>';
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $classid = $row["classid"];
        if($classid == null){
            //说明该课可选
            $cplanid = $row["cplanid"];
            $cplanSql = "select * from cplan where Id = '$cplanid'";
            $cplan = mysqli_fetch_array(mysqli_query($conn,$cplanSql),MYSQLI_ASSOC); //可选的计划课程表
            //接着进行判断，本人是否选过
            $stuId = $stu["Id"];
            $scSql = "select * from sc where stuid = '$stuId' and cplanid = '$cplanid'";
            $sc = mysqli_fetch_array(mysqli_query($conn,$scSql),MYSQLI_ASSOC);
            if($sc==null){
              echo  '<tr>
                      <td>'.$cplan["cid"].'</td>
                      <td>'.$cplan["name"].'</td>
                      <td>未选</td>
                      <td><a href="../../controller/chose_sc.php?stuid='.$stuId.'&cplanid='.$cplanid.'">选课</a></td>
                    </tr>';
            }else{
              $scid = $sc["Id"];
              echo  '<tr>
                      <td>'.$cplan["cid"].'</td>
                      <td>'.$cplan["name"].'</td>
                      <td>已选</td>
                      <td><a href="../../controller/del_sc.php?id='.$scid.'">退选</a></td>
                    </tr>';
            }

        }
      }

    echo '</tbody></table>';
    mysqli_close($conn);
 ?>
