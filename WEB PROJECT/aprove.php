<?php
   session_start();
	if(!isset($_SESSION['Account_ID'])) {
		header("location: home-page.html");
		exit();
	}	

    DEFINE('DB_USER','root');
    DEFINE('DB_PSWD','');
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','Newspaper');

    if (!$conn = mysqli_connect(DB_HOST,DB_USER,DB_PSWD))
        die("Connection failed.");

    if(!mysqli_select_db($conn,DB_NAME))
        die("Could not open the ".DB_NAME." database.");
            
        if (isset($_GET['id'])){
            $id=$_GET['id'];
            
            $sql = "UPDATE Articles SET Approved=1, Editor='".$_SESSION['Account_ID']."' WHERE Article_ID=".$id; 
            $result = mysqli_query($conn,$sql);
            if($result)
               echo "<script>setTimeout(\"location.href = 'editor-articles.php';\");</script>";            
        }
            

?>