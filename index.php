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
                        <td><input type="text" name="title" value="<?php if (isset($_GET['title'])){ echo $_GET['title']; } ?>"></td>
                        </tr>
                        <tr> 
                        <td>Description </td>
                        <td><input type="text" name="description" value="<?php if (isset($_GET['description'])){ echo $_GET['description']; }?>"></td>
                        </tr> 
                        <td> </td>
                        <td> </td>
                        <td> <input type="submit" name="add" value="Add"></td>
                        <td><input type="hidden" name="id" value="<?php echo $_GET['post_id'];?>"></td>
                        <td><input type="submit" name="update" value="Update"></td>
                    </tr>
            </table>
        </form>
        
        <title>Homepage</title>
    </head>
    </body>
       




       
        <table width='80%' border=0>
            <tr bgcolor='#CCCCCC'>
                <td>Title</td>
                <td>Description</td>
                <td>Option</td>
            </tr>
            <?php 
            include_once("config.php");
            $result = mysqli_query($mysqli, "SELECT * FROM posts ORDER BY id DESC");
            while($res = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$res['title']."</td>";
                echo "<td>".$res['description']."</td>";  
                echo "<td><a href=\"posts.php?post_id=$res[id]\">Edit</a> 
                |<a href=\"posts.php?delete_posts=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";   
            }    
            ?>
        </table>
    </body>
    </html>    