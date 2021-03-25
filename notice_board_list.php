<style>
.list-table{
    margin-top: 40px;
}
.list-table thead th{
	height:40px;
	border-top:2px solid #09C;
	border-bottom:1px solid #CCC;
	font-weight: bold;
	font-size: 17px;
}
.list-table tbody td{
	text-align:center;
	padding:10px 0;
	border-bottom:1px solid #CCC; height:20px;
	font-size: 14px 
}
</style>

<?php
include $_SERVER["DOCUMENT_ROOT"]."../db_connect/db.php";
session_start();
$idvalue = $_SESSION['id'];
if (!$idvalue){
    echo "<script>alert('잘못된 접근입니다.');</script>";
    echo("<script>location.href='test.php';</script>");
  }

$sqlss = "SELECT name,title, content,date, file FROM text order by date desc limit 0,5";
$result = mysqli_query($conn, $sqlss);
$row = mysqli_fetch_assoc($result);
$total = mysqli_num_rows($result);//데이터의 레코드를 불러오는거




// $sqls = "SELECT id ,name,  pw FROM member";
// $results = mysqli_query($conn, $sqls);
// $rows = mysqli_fetch_assoc($results);


?>
<div>
<?php
if (isset($_GET['page'])){
    $page = $_GET['page'];
    } else{
        $page =1;
    }
?>
<table class="list-table">
<thead>
<tr>
<th>번호</th>
<th>이름</th>
<th>제목</th>
<th>날짜</th>
<th>첨부파일</th>
</tr>
</thead>
<thead>
<?php
while($row = mysqli_fetch_assoc($result)){
    if($total ==0){
    ?> <tr>
    <?php }
    else{
    ?>
        <tr>
    <?php} ?>

<tr>
<td><?php echo $total?></td>
<td><?php echo $row['name']?></td>
<td><?php echo $row['title']?></td>
<td><?php echo $row['date']?></td>

<!-- <td><?php echo $row['file']?><a ></a></td> -->
<td><img src="<?=$path.$file;?>"/></td>
</tr>
<?php
$total--;
}}
?>
</thead>
</table>

<?php
 $sql = "SELECT * FROM text";
 $result = mysqli_query($conn, $sql);
 $total_record = mysqli_num_rows($result) or die(mysqli_error($conn));
 $list = 5;
 $block_cnt =5;
 $block_num = ceil($page / $block_cnt);
 $block_start = (($block_num - 1 ) * $block_cnt) + 1;
 $block_end = $block_start + $block_cnt -1;
 $total_page = ceil($total_record / $list);
 if($block_end > $total_page) {
     $block_end = $total_page;
 }
 $total_block = ceil($total_page / $block_cnt);
 $page_start = ($page - 1) * $list;

 $sqls = "SELECT name,title, content,date, file FROM text order by $page_start, $list";
?>
<div>
<?php
if($page <= 1) {

}else {
    echo "<a href='notice_board_list.php?page=1'>처음</a>";
}
    if($page <= 1) {

    }else {
        $pre = $page - 1;
        echo "<a href ='notice_board_list.php?page=$pre'>&quot;이전&quot;</a>";
    }
    for($i = $block_start; $i <= $block_end; $i++){
        if($page == $i){
            echo "<b> $i</b>";
        } else{
          echo "<a href ='notice_board_list.php?page=$i'> $i</a>";
        }
    }   
if($page >= $total_page){

    }else {
        $next = $page +1;
        echo "<a href='notice_board_list.php?page=$next'>&quot;다음&quot;</a>";
    }
        if($page >= $total_page){

        }else{
            echo "<a href='notice_board_list.php?page=$total_page'>&quot;마지막&quot;</a>";
        }
?>
</div>
</div>