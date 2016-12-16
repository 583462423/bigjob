
<?php
  //导入excel

if (! empty ( $_FILES ['file'] ['name'] )){
    $tmp_file = $_FILES ['file'] ['tmp_name'];
    $file_types = explode ( ".", $_FILES ['file'] ['name'] );
   $file_type = $file_types [count ( $file_types ) - 1];
    if (strtolower ( $file_type ) != "xls")
    {
     $this->error ( '不是Excel文件，重新上传' );
    }
    $savePath = './Excel/';
    $file_name = "tmp.xls";
    if (! copy ( $tmp_file, $savePath.$file_name ))
     {
         $this->error ( '上传失败' );
     }



    error_reporting(E_ALL);

    date_default_timezone_set('Asia/ShangHai');

    /** PHPExcel_IOFactory */
    require_once '../php/Classes/PHPExcel/IOFactory.php';


    // Check prerequisites
    if (!file_exists("./Excel/tmp.xls")) {
    	exit("出错了哈哈哈哈\n");
    }

    $reader = PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
    $PHPExcel = $reader->load("./Excel/tmp.xls"); // 载入excel文件
    $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
    $highestRow = $sheet->getHighestRow(); // 取得总行数
    $highestColumm = $sheet->getHighestColumn(); // 取得总列数

    /** 循环读取每个单元格的数据 */
    for ($row = 1; $row <= $highestRow; $row++){//行数是以第1行开始
        if($row == 1)continue;

        $sid = $sheet->getCell('A'.$row)->getValue();
        $cid = $sheet->getCell('B'.$row)->getValue();
        $score = $sheet->getCell('C'.$row)->getValue();
        //之后进行录入就好
        require("../php/conn.php");
        //首先要把该账号密码存到user中
        //通过sid找到stuid
        $stu = mysqli_fetch_array(mysqli_query($conn,"select * from stu where sid = '$sid'"),MYSQLI_ASSOC);
        $stuid = $stu["Id"];

        //通过cid找到cplanid
        $cplan = mysqli_fetch_array(mysqli_query($conn,"select * from cplan where cid = '$cid'"),MYSQLI_ASSOC);
        $cplanid = $cplan["Id"];
        $inScoreSql = "insert into score(stuid,cplanid,score) values('$stuid','$cplanid','$score')";
        //录入
        mysqli_query($conn,$inScoreSql);
    }
    echo '<script>alert("录入成功");location.href="../php/teacher/index.php?id=3";</script>';
 }


 ?>
