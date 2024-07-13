<?php
include('connection/index.php');
$count = "SELECT * FROM linqData";
$query = $connection->query($count);
$count = mysqli_num_rows($query);
echo "<span>{$count} links created on linq</span>";
