<?php
include('db.php');


if (isset($_POST['submit'])) {
    $n = $_POST['name'];
    $m = $_POST['msg'];
    $stmt = $con->prepare("INSERT INTO chat (name, msg) VALUES (?, ?)");
    $stmt->bind_param("ss", $n, $m);
    $stmt->execute();
    $stmt->close();
    
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function aj() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState === 4 && req.status === 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            };
            req.open('GET', 'chat.php', true);
            req.send();
        }
        
        setInterval(aj, 1000);
    </script>
</head>
<body onload="aj();">
    <div id="container"> 
        <div id="chatbox">
            <div id="chat"></div>
        </div>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Username" required>
            <textarea placeholder="Messages" name="msg" required></textarea>
            <input type="submit" name="submit" value="Send">
        </form>
    </div>
</body>
</html>
