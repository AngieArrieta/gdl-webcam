<?php 
$conn = new mysqli('localhost:3308','root','root',gdlwebcamp);
if($conn->connect_error){
    echo $error -> $conn->connect_error;
}
?>