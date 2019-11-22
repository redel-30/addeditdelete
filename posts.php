<?php
include_once("config.php");

if(isset($_POST['add'])) {    
    $title = $_POST['title'];
    $description = $_POST['description'];

    $result = mysqli_query($mysqli, "INSERT INTO posts(title,description) VALUES('$title','$description')");


    header("location: index.php?msg=successfully updates");

}

// edit

if(isset($_GET['post_id'])) {  
    $post_id = $_GET['post_id'];


    $result = mysqli_query($mysqli, "SELECT * FROM posts WHERE id=$post_id");
    while($res = mysqli_fetch_array($result))

    {
     $title = $res['title'];
     $description = $res['description'];
     $create = $res['created_at'];
     $update = $res['updated_at']; 
     $id = $res['id'];


     header("location: index.php?edit=1&post_id=".$id."&title=".$title."&description=".$description);
 }
}
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $title=$_POST['title'];
    $description=$_POST['description'];

    $id = $_POST['id'];
    
    $title=$_POST['title'];
    $description=$_POST['description'];

    $result = mysqli_query($mysqli, "UPDATE posts SET title='$title',description='$description'WHERE id=$id");

    header("Location: index.php");
}
$result = mysqli_query($mysqli, "SELECT * FROM posts WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $title = $res['title'];
    $description = $res['description'];
}


if (isset($_GET['delete_posts']))
{
    $delete_posts = $_GET['delete_posts'];
    
    $result = mysqli_query($mysqli, "DELETE FROM posts WHERE id=$delete_posts");
    
    header("Location:index.php");

}



?>

