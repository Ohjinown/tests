<style>
li{
    list-style:none;
}
/* h3{
    text-align:center;
} */


</style> 

<?php
session_start();
$idvalue = $_SESSION['aa'];
$name = $_SESSION['name'];

$_SESSION['aa'] = $idvalue;
$_SESSION['name'] = $name;



if (!$idvalue){
    echo "<script>alert('잘못된 접근입니다.');</script>";
    echo("<script>location.href='test.php';</script>");
  }

include $_SERVER["DOCUMENT_ROOT"]."../db_connect/db.php";


$sql = "SELECT file FROM text";

$result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
//$rows = mysqli_fetch_array($result);


?>

<script>
function check_input(){
  if (!document.form.title.value) {
    alert("제목을 입력해 주세요");
  document.board_from.title.focus();
  return;
  }
  if (!document.form.content.value) {
    alert("내용을 입력해 주세요");
  document.form.content.focus();
  return;
  }
  document.form.submit();
}
</script>

<form method="POST" action="notice_board.php" enctype="multipart/form-data" name="form">
<section>
<h3>게시판 > 글쓰기</h3>
<ul>
<li>이름
<?php echo $name?>
</li>

<li>
제목  <input type="text" name="title">
</li>

<li>
내용 <textarea name="content"></textarea>

</li>
<li>첨부파일 <input type="file" name="file"></li>
</ul>
<input type = "button" value="작성" onclick="check_input()">
</section>

</form>