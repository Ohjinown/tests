<?php
 include $_SERVER["DOCUMENT_ROOT"]."../db_connect/db.php";
 session_start();
 $idvalue = $_SESSION['aa'];
 $name = $_SESSION['name'];
 
 
 if (!$idvalue){
     echo "<script>alert('잘못된 접근입니다.');</script>";
     echo("<script>location.href='test.php';</script>");
   }

   $sqls = "SELECT id,name,pw FROM member WHERE id = '{$idvalue}'";
   $result = mysqli_query($conn, $sqls);

$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');


// $path ="/im/";
// $filename = date("im").".jpg";
//move_uploaded_file($_FILES['file']['tmp_name'], $filename);

// $query = "INSERT INTO file (path,filename) VALUES ($path,$filename)";
// $results = mysqli_query($conn, $query) or die(mysqli_error($conn));
// $upload_dir = './data/';

// $file = $_POST['file'];
// echo $file;
// exit;

$filename =  $_FILES['file']['name'];//$_FILES['name의 값 입력']['로컬이름을 서버에 저장']
$tmp_filename =  $_FILES['file']['tmp_name'];
$path = "../im/".$file_name;

move_uploaded_file($tmp_filename, $path);

$sql = "INSERT INTO text ( name ,title, content, date,path,file) VALUES( '$name','$title','$content','$date','$path','$filename')";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
//$row = mysqli_fetch_assoc($result);


?><br/>
<?php

 if($result){
?>     <script>
     alert('<?php echo "글이 등록됨 업로드됨" ?>');
    location.href='notice_board_list.php';
     </script>
     <?php
 }
 else{
    echo("<script>window.history.back();</script>");
 }
 
?>

   