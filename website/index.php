<!-- INFO!!!!
     It is a pseudo code created to test microservice in the docker internal network.
     For professional web development please check out:
     http://getbootstrap.com
     https://reactjs.org/
     -->

<html>
<head>
    <title>My todo list</title>
</head>
<body>
<h1>Todo list:</h1>
<table>
    <tr>
        <td></td>
        <td>Task</td>
        <td>Complete</td>
    </tr>
    <?php
    $json = file_get_contents('http://spring-rest-service:8080/todo');
    $json_decoded = json_decode($json);
    foreach ($json_decoded as $todo) {
        echo '<tr>';
        echo '<td><form action="put.php" method="post">';
        echo '<input type="hidden" name="id" value="' . $todo->id . '"></td>';
        echo '<td><input type="text" name="description" value="' . $todo->description . '"></td>';
        echo '<td>';
        if ($todo->complete != 1) {
            echo '<input type="checkbox" name="completed"/>';
        } else {
            echo '<input type="checkbox" name="completed" checked/>';
        }
        echo '<td><input type="submit" value="Update">';
        echo '</td></form>';
        echo '<td><form action="delete.php" method="post"></td>';
        echo '<input type="hidden" name="id" value="' . $todo->id . '"></td>';
        echo '<td><input type="submit" value="Delete" ></td></form>';
        echo '</tr>';
    }
    ?>
    <tr>
        <td>
            <form action="post.php" method="post">
        </td>
        <td><input type="text" name="description"></td>
        <td><input type="checkbox" name="completed"/></td>
        <td><input type="submit" value="Add"></td>
    </tr>
</table>
</body>
</html>
