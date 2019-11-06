<?php

include_once("config.php");
 

$result = mysqli_query($mysqli, "SELECT * FROM posts ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
    <a href="add.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Title</td>
            <td>Description</td>
            <td>Created at</td>
            <td>Updated at</td>
        </tr>
        <?php 

        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['title']."</td>";
            echo "<td>".$res['description']."</td>";
            echo "<td>".$res['created_at']."</td>"; 
            echo "<td>".$res['updated_at']."</td>";    
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
</body>
</html>