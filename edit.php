<?php

include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $title=$_POST['title'];
    $description=$_POST['description'];
    $create=$_POST['created_at'];    
    $update=$_POST['updated_at'];

    if(empty($title) || empty($description) || empty($create) || empty($update)) {            
        if(empty($title)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }
        
        if(empty($description)) {
            echo "<font color='red'>Description field is empty.</font><br/>";
        }
        
        if(empty($create)) {
            echo "<font color='red'>Created at field is empty.</font><br/>";
        }  
        if(empty($update)) {
            echo "<font color='red'>Updated at field is empty.</font><br/>";
        }       
    } else {    

        $result = mysqli_query($mysqli, "UPDATE posts SET title='$title',description='$description',created_at='$create',updated_at='$update' WHERE id=$id");
        

        header("Location: index.php");
    }
}
?>
<?php

$id = $_GET['id'];
 

$result = mysqli_query($mysqli, "SELECT * FROM posts WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $title = $res['title'];
    $description = $res['description'];
    $create = $res['created_at'];
    $update = $res['updated_at'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Title</td>
                <td><input type="text" name="title" value="<?php echo $title;?>"></td>
            </tr>
            <tr> 
                <td>Description</td>
                <td><input type="text" name="description" value="<?php echo $description;?>"></td>
            </tr>
            <tr> 
                <td>Create at</td>
                <td><input type="text" name="created_at" value="<?php echo $create;?>"></td>
            </tr>
            <tr>
                <td>Update at</td>
                <td><input type="text" name="updated_at" value="<?php echo $update;?>"></td>
            </tr>
            <tr>                
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>