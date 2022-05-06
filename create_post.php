<?php

require_once("db.php");
require_once("session.php");

if (!empty($_POST["text"]))
{
	$text = $_POST["text"];

	$uploadfile = '';
	if (!empty($_FILES['file']['tmp_name']))
	{
		// надо не забыть дать права на запись в эту дирректорию
		$uploadfile = 'uploads/' . basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
	}

	$sql = "INSERT INTO `notes` (`user_id`, `text`, `filepath`, `date`) VALUES ('".$_SESSION['user_id']."', '".$text."', '".$uploadfile."', now())";
		$mysqli->query($sql) or die($mysqli->error);
		$mysqli->commit();
		$mysqli->close();
	}




	header("Location: index.php");

?>
