<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
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
        
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
