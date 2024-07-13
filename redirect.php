<?php 
include('connection/index.php');
$link = $_GET['link'] ?? '';

if(empty($link)) {
    echo 'link is blank';
} else {
    //check database for the link name then return the newlink
    $queryDatabase = "SELECT * FROM linqData WHERE linqName = '$link'";
    $querySql = $connection->query($queryDatabase);
    $countData = mysqli_num_rows($querySql);
    if($countData > 0) {
        while($rowData = mysqli_fetch_assoc($querySql)) {
            echo $rowData['linqUrl'];
        }
    } else {
        echo 'null';
    }
}
?>