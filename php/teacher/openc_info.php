<?php
    //需要链接数据库
    require("../conn.php");
    //拿到user
    $tid = $_COOKIE["user"];

    //链接后，将教师的信息打印出来
    $sql = "select * from tea where tid = '$tid'";
    $result = mysqli_query($conn,$sql);
    if(!$result){
      //显示数据为空
      echo "为什么是空呢？";
      return;
    }

    $tea = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $teaid = $tea["Id"];

    $cdataSql = "select * from cdata where teaid = '$teaid'";
    $result = mysqli_query($conn,$cdataSql);

    //输出个人信息
    echo '<table class="table table-bordered">
            <thead class="thead-default">
            <tr>
              <th>课程编号</th>
              <th>课程名称</th>
              <th>课程学时</th>
              <th>课程学分</th>
              <th>开课班级</th>
              <th>人数上限</th>
            </tr>
            </thead>
          <tbody>';

    while($cdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $cplanid =  $cdata["cplanid"];
      $cplanSql = "select * from cplan where Id = '$cplanid'";
      $cplan = mysqli_fetch_array(mysqli_query($conn,$cplanSql),MYSQLI_ASSOC);

      $classid = $cdata["classid"];
      $classNames = "";
      if($classid != null){
        $classids = explode(",",$classid);

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
      }else{
        $classNames = "公共课";
      }


      echo  '<tr>
              <td>'.$cplan["cid"].'</td>
              <td>'.$cplan["name"].'</td>
              <td>'.$cplan["xueshi"].'</td>
              <td>'.$cplan["xuefen"].'</td>
              <td>'.$classNames.'</td>
              <td>'.$cdata["max"].'</td>
            </tr>';
    }

    echo '</tbody></table>';
    mysqli_close($conn);
 ?>
