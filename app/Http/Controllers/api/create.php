<?php


//require 'db_config.php';


$post = $_POST;


$sql = "INSERT INTO projects (title,description) 


	VALUES ('".$post['title']."','".$post['description']."')";


$result = $mysqli->query($sql);


$sql = "SELECT * FROM projects Order by id desc LIMIT 1";


$result = $mysqli->query($sql);


$data = $result->fetch_assoc();


echo json_encode($data);


?>