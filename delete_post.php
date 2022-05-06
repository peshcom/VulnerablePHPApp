<?php

require_once("db.php");
require_once("session.php");

if (!empty($_GET["note_id"]))
{
	$note_id = $_GET["note_id"];


	$sql = "DELETE FROM `notes` WHERE `id`=".sanitize($note_id)." AND `user_id`=".$_SESSION['user_id'];  // Только автор может удалить свою запись
		$mysqli->query($sql) or die($mysqli->error);
		$mysqli->commit();
		$mysqli->close();
	}

	header("Location: index.php");

?>
