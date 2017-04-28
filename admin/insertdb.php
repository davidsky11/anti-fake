<?php
    session_start();
    header("Content-type:text/html;charset:utf-8");

    require("../data/head.php");

    require_once 'PHPExcel.php';
    require_once 'PHPExcel/IOFactory.php';
    require_once 'PHPExcel/Reader/Excel5.php';

    // Global Varilable
    $succ_result =0;
    $error_result=0;
    $file=$_FILES['filename'];
    $max_size="2000000"; // byte
    $fname=$file['name'];
    // $ftype=strtolower(substr(strrchr($fname,'.'),1));
    $ftype=strtolower(pathinfo($fname, PATHINFO_EXTENSION));

    // file format
    $uploadfile=$file['tmp_name'];
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (is_uploaded_file($uploadfile)) {
            if ($file['size']>$max_size) {
                echo "Import file is too large";
                exit;
            }
            if ($ftype!='xls' && $ftype!='xlsx' && $ftype!='csv') {
                echo "The file type is error";
                exit;
            }
        } else {
            echo "The file is no empty";
            exit;
        }
    }

    $objReader = PHPExcel_IOFactory::createReader('Excel2007');  // use excel2003 and excel2007 format
    $objPHPExcel = PHPExcel_IOFactory::load($uploadfile);
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();  // 总行数
    $highestColumn = $sheet->getHighestColumn();  // 总列数
    $resultStr = "";
    $strs = array();
    $time=date("Y-m-d H:i:s");

    for ($j=2; $j<=$highestRow; $j++) {
        unset($arr_result);
        unset($strs);
        $resultStr = "";
        $sql="";
        for ($k='A'; $k<=$highestColumn;$k++){
            // 读取单元格
            $resultStr.=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'\\';  // 读取单元格
        }
        $strs=explode("\\", $resultStr);
        $sql = "insert into tgs_code(product, bianhao, hits, riqi) values ('".$strs[0]."','".$strs[1]."',0,'".$time."')";
        //echo $sql."<br/>";
        mysql_query("set names utf8");
        $result = mysql_query($sql) or die("执行错误");

        $insert_num = mysql_affected_rows();
        if ($insert_num>0){
            $succ_result+=1;
        } else {
            $error_result+=1;
        }
    }

    unlink($uploadfile);  // 删除上传的excel文件

    //echo
   // "<div class='headbox'>"
   // ."<div id='topnavbar' style='display: block;'>"
   // ."<div class='headmenu'><a href='?act=add2' target='rightFrame' class='btn2'><i class='fa fa-plus'></i>新增防伪码</a>"
	//."<a href='?act=import' target='rightFrame' class='btn2'><i class='fa fa-line-chart'></i> 导入防伪码</a>"
	//."<a href='?act=query_record' target='rightFrame' class='btn2'><i class='fa fa-search'></i> 查询记录</a>"
	//."<a href='/index.php' target='_blank' class='btn2'><i class='fa fa-tv'></i> 查询前端</a></div></div></div>";
   // echo "插入成功".$succ_result."条数据！！！<br>";
    //echo "插入失败".$error_result."条数据！！！";

    echo "<script>alert('批量插入".$succ_result."条数据');location.href='admin.php'</script>";

?>