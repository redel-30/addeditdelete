<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $create = $_POST['created_at'];
    $update = $_POST['updated_at'];
        
    // checking empty fields
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
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO posts(title,description,created_at,updated_at) VALUES('$title','$description','$create','$update')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>