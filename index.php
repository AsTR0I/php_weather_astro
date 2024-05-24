<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>astro todo</title>
</head>
<body>
    <p>hello</p>
    <p>All tasks:</p>
    <?php 
        include 'connect.php';
        $data = "SELECT * FROM `tasks`";
        
        if($tasks = mysqli_query($conn, $data)){
            if(mysqli_num_rows($tasks) > 0){
                while($task = mysqli_fetch_array($users)) {
                    echo "<tr>
                    <td>" . $task['id'] . "</td>
                    <td>" . $task['title'] . "</td>
                    </tr>";
                }
            }
        }
    ?>
</body>
</html>