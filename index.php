
<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
    <br/><br/>
 
    <form action="posts.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Title</td>         
                <td>   
            <?php (isset($_GET['title'])){ ?>     
            <input type="text" name="title" value="<?php echo $_GET['title']; ?>">
                <?php }
                { ?>
                <input type="text" name="title" value="">'
            <?php} ?>
                    
                </td>
            </tr>
            <tr> 
                <td>Description
                <td>   
            <?php if(isset($_GET['description'])){ ?>     
            <input type="text" name="description" value="<?php echo $_GET['description']; ?>">
                <?php }else{ ?>
                <input type="text" name="description" value="">'
            <?php} ?>
                    
                </td>
            </tr>
            <tr> 
                <td>Created at</td>
                <td><input type="text" name="created_at"></td>
            </tr>
            <tr> 
                 <td>Updated at</td>
                <td><input type="text" name="updated_at"></td>
            </tr>
            <tr>               
                <td>
                <?php if isset($_GET["edit"]){?>
                 <input type="submit" name="update" value="Update">
                 <?php }else{ ?>
                 <input type="submit" name="add" value="Add">
                 <?php } ?>
                </td>   
            </tr>
        </table>
    </form>

<?php

include_once("config.php");
 
$result = mysqli_query($mysqli, "SELECT * FROM posts ORDER BY id DESC");
?>
    
    <title>Homepage</title>
</head>
 
<body>
 
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
            echo "<td><a href=\"posts.php?post_id=$res[id]\">Edit</a> 
            |<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";   
}    
} 
}

        ?>
    </table>
</body>
</html>
