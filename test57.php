<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
 include $_SERVER["DOCUMENT_ROOT"]."../db_connect/db.php";
$sql = "select * from test_bbs";
$result = mysqli_query($conn, $sql);

echo "<table border=1>";
//$row = mysqli_fetch_assoc($result)
while($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>".$row['bbsNo']."</td>";
	echo "<td>".$row['id']."</td>";
	echo "<td><a href='test58.php?bbsno=".$row['bbsNo']."'>".$row['content']."</a></td>";
	echo "<td>".$row['regdate']."</td>";
	echo "</tr>";
}

?>
