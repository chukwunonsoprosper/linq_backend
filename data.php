<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="write">
        <h2>write a new update on linq</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="text" name="serverid" placeholder="masterid">
            <textarea name="update" placeholder="new update"></textarea>

            <button name="send">Save</button>

            <?php
            include('connection/index.php');

            if (isset($_POST['send'])) {
                $serverkey = $_POST['serverid'];
                $message = $_POST['update'];

                if (empty($serverkey && $message)) {
                    echo 'data is blank';
                } else if ($serverkey != 'prosper202411') {
                    echo 'server key isn\'t correct';
                } else {
                    //send to data;
                    $send = $connection->prepare("INSERT INTO linqUpdate(lingUpdate) VALUES(?)");
                    $send->bind_param('s', $message);
                    if ($send->execute()) {
                        echo 'data has been created';
                    }
                }
            }
            ?>
        </form>
    </div>

    <style>
        * {
            box-sizing: border-box;
        }

        .write {
            width: 80%;
            height: 80%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: antiquewhite;

        }

        input {
            width: 100%;
            padding: 15px 40px;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            height: 200px;
            resize: none;
        }

        button {
            padding: 15px 40px;
            background-color: aqua;
            width: 100%;
            margin-top: 20px;

        }
    </style>


</body>

</html>