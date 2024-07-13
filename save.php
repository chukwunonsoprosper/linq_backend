<?php
include('connection/index.php');
$linqID = $_GET['linq'] ?? '';

//get all saved link from the database
if(empty($linqID)) {
    echo 'id is missing';
} else {
    $data = "SELECT * FROM linqData WHERE sessionId = '$linqID' ORDER BY id DESC";
    $query = $connection->query($data);
    $countdata = mysqli_num_rows($query);
    if ($countdata > 0) {
        while ($rowdata = mysqli_fetch_assoc($query)) {
            $theName = $rowdata['linqName'];
            $theLink = $rowdata['linqUrl'];

            $display = "<div class='link'>
                       <a href='{$theLink}'>{$theName} <br><small style='color:dodgerblue; font-size:10px;'>{$rowdata['newLinq']}</small></a>
                    </div>";
             echo $display;

        }
    } else {
        echo '<span style="color:red; font-family:manrope;">You have no saved link yet</span>';
    }
}
?>