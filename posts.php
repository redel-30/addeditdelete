<?php
include_once("config.php");

if(isset($_POST['add'])) {    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $create = $_POST['created_at'];
    $update = $_POST['updated_at'];

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
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 

        $result = mysqli_query($mysqli, "INSERT INTO posts(title,description,created_at,updated_at) VALUES('$title','$description','$create','$update')");
        
        
        header("location: index.php");
        
    }
}
?>
<?php
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



     header("location: index.php?edit=true&title=".$title."&description=".$description);
    }
}
?>
