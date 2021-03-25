<?php

include $_SERVER["DOCUMENT_ROOT"]."../db_connect/db.php";
if($conn){
    $postId = $_POST['id'];
    
    
    $sql = "SELECT id,name,pw FROM member WHERE id = '{$postId}'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        if($_POST['id'] ==  $_SESSION['aa']) {
            if($_POST['pw'] == $row['pw']) {
                $idvalue = $_POST['id'];
                $name = $row['name'];
                session_start();
                $_SESSION['aa'] = $idvalue;
                $_SESSION['name'] = $name;
                
                echo("<script>location.href='../test1.php';</script>");
            }else {
                echo "<script>alert('틀렸습니다');</script>";
                echo("<script>window.history.back();</script>");
                break;
            } 
        }else{
                echo ("<script>alert('틀렸습니다');</script>");
                echo("<script>window.history.back();</script>");
                break;
                
            }
}
print_r($row);


echo $sql;
}else {
    echo "<script>alert('mysqli 연결 실패');</script>";
    echo("<script>window.history.back();</script>");
}

?>
