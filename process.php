<?php
include 'connection/index.php';

//build the server sessionid default linkName

$sessionId = $_GET['sessionid'] ?? '';
$default = $_GET['default'] ?? '';
$linkName = $_GET['linkName'] ?? '';
$newLink = 'localhost:5500/index.html?' . $linkName;

// echo $sessionId;
// echo $linkName; 
// echo $default;

// first check if the linkName Already exit in the database

if (empty($sessionId && $default && $linkName)) {
    echo 'information are empty';
} else {
    $check = "SELECT * FROM linqData WHERE linqName='$linkName'";
    $query = mysqli_query($connection, $check);
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        while ($response = mysqli_fetch_assoc($query)) {
            if ($linkName = $response['linqName']) {
                $data = ['link' => 'The link has been used'];
                echo json_encode($data);
            }
        }
    } else {
        //send the data
        $create = $connection->prepare("INSERT INTO linqData(sessionId, linqName, linqUrl, newLinq) VALUES(?, ?, ?, ?)");
        $create->bind_param('ssss', $sessionId, $linkName, $default, $newLink);
        if ($create->execute()) {
            $data = ['message' => 'your link has been created successfully', 'link' => $newLink];
            echo json_encode($data);
        }
    }
}
