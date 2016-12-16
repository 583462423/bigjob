<?php
    //需要链接数据库
    require("../conn.php");
    //拿到user
    $sid = $_COOKIE["user"];

    //链接后，将教师的信息打印出来
    $sql = "select * from stu where sid = '$sid'";
    $result = mysqli_query($conn,$sql);
    if(!$result){
      //显示数据为空
      echo "为什么是空呢？";
      return;
    }

    $stu = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $stuid = $stu["Id"];


    $scoreSql = "select * from score where stuid = '$stuid'";
    $result = mysqli_query($conn,$scoreSql);

    //输出个人信息
    echo '<table class="table table-bordered">
            <thead class="thead-default">
            <tr>
              <th>课程编号</th>
              <th>课程名</th>
              <th>最终成绩</th>
            </tr>
            </thead>
          <tbody>';

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $cplanid =  $row["cplanid"];
      $cplanSql = "select * from cplan where Id = '$cplanid'";
      $cplan = mysqli_fetch_array(mysqli_query($conn,$cplanSql),MYSQLI_ASSOC);
      echo  '<tr>
              <td>'.$cplan["cid"].'</td>
              <td>'.$cplan["name"].'</td>
              <td>'.$row["score"].'</td>
            </tr>';
    }

    echo '</tbody></table>';
    mysqli_close($conn);
 ?>
