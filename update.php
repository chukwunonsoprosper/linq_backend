<?php 
include('connection/index.php');

$fetch = "SELECT * FROM linqUpdate ORDER BY id DESC  LIMIT 1 ";
$query = $connection->query($fetch);
$count = mysqli_num_rows($query);
if($count > 0) {
    while($row = mysqli_fetch_assoc($query)) {
        echo $row['lingUpdate'];
    }
}
?>