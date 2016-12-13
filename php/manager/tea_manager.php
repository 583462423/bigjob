<?php
    //需要链接数据库
    require("../conn.php");

    //链接后，将教师的信息打印出来
    $sql = "select * from tea_manager,user where user.Id = tea_manager.userId";

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
              <th>姓名</th>
              <th>用户名</th>
              <th>性别</th>
              <th>年龄</th>
              <th>操作</th>
            </tr>
            </thead>
          <tbody>';
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        echo ' <tr>
                <th>'.$row["name"].'</th>
                <td>'.$row["user"].'</td>
                <td>'.$row["sex"].'</td>
                <td>'.$row["age"].'</td>
                <td><button class="del btn btn-danger" value="'.$row["Id"].'">删除</button><button class="alter btn btn-info" value="'.$row["Id"].'">修改</button></td>
              </tr>';
    }
    echo '</tbody></table>';

    mysqli_close($conn);
 ?>
