<?php
include_once("config.php");

if(isset($_POST['submit'])) {    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $create = $_POST['created_at'];
    $update = $_POST['updated_at'];
    
    $result = mysqli_query($mysqli, "INSERT INTO posts(title,description,created_at,updated_at) VALUES('$title','$description','$create','$update')");
    header("location: index.php?msg=successfully updates");
} else if(isset($_GET['post_id'])) {  
    //edit
    $post_id = $_GET['post_id'];
    $result = mysqli_query($mysqli, "SELECT * FROM posts WHERE id=$post_id");
    while($res = mysqli_fetch_array($result)){
         $title = $res['title'];
         $description = $res['description'];
         $create = $res['created_at'];
         $update = $res['updated_at']; 
         header("location: index.php?edit=true&title=".$title."&description=".$description);
        }
}
