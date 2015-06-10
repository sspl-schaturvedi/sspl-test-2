<?php
include('config.php');

		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "INSERT INTO tbl_crossTrends_1  (g_id) VALUES ('5')";
			$result = $conn->prepare($sql);
			$result->execute();
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
?>