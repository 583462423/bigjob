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

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $classid = $row["classid"];

    $classSql = "select * from class where Id = '$classid'";
    $class = mysqli_fetch_array(mysqli_query($conn,$classSql),MYSQLI_ASSOC);

    //输出个人信息
    echo '<table class="table table-bordered">
            <thead class="thead-default">
            <tr>
              <th>学号</th>
              <th>姓名</th>
              <th>性别</th>
              <th>出生日期</th>
              <th>班级</th>
            </tr>
            </thead>
          <tbody>';

        echo  '<tr>
                <td>'.$row["sid"].'</td>
                <td>'.$row["name"].'</td>
                <td>'.$row["sex"].'</td>
                <td>'.$row["date"].'</td>
                <td>'.$class["name"].'</td>
              </tr>';

    echo '</tbody></table>';
    mysqli_close($conn);
 ?>
