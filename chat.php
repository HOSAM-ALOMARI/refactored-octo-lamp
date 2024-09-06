<?php
include('db.php');

if (isset($con) && $con instanceof mysqli) {
    $query = "SELECT * FROM chat ORDER BY id DESC";
    $run = mysqli_query($con, $query);

    if ($run) {
        while ($row = mysqli_fetch_assoc($run)) {
            $name = htmlspecialchars($row['name']); 
            $msg = htmlspecialchars($row['msg']);    
            $date = htmlspecialchars($row['date']);  

            echo "<div id='chatdata'>";
            echo "<span style='color:white;'>$name</span>";
            echo "<span style='color:white;'> : </span>";
            echo "<span style='color:white;'>$msg</span>";
            echo "<span style='color:tomato; float:right;'>$date</span>";
            echo "</div><br>";
        }
    }
}

if (isset($_POST['submit'])) {
    $n = $_POST['name'];
    $m = $_POST['msg'];
    $insert = "INSERT INTO chat (name, msg) VALUES ('$n', '$m')";
    $run_insert = mysqli_query($con, $insert);
    
    if ($run_insert) {
   
        header('Location: index.php');
        exit(); 
    } else {
        echo "Error inserting data: " . mysqli_error($con);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>

</body>
</html>
