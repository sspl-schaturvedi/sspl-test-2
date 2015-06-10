<?php
include('config.php');
if(isset($_POST['googleData'])){ // updates google data in db
	
	//print_r($_POST['url']);
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "TRUNCATE TABLE tbl_googleData";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			unset($sql);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	
	$i = 0;
	foreach($_POST['title'] as $title){
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "INSERT INTO tbl_googleData (title, description, url) VALUES ('".$_POST['title'][$i]."', '".$_POST['description'][$i]."', '".$_POST['url'][$i]."')";
			$result = $conn->prepare($sql);
			$result->execute();
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
		$i++;
	}
} // end

if(isset($_POST['youtubeData'])){ // updates youtube data in db
	
	//print_r($_POST['url']);
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "TRUNCATE TABLE tbl_youtubeData";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			unset($sql);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	
	$i = 0;
	foreach($_POST['title'] as $title){
		if($i>11){
			break;
		}
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "INSERT INTO tbl_youtubeData (title, description) VALUES ('".htmlspecialchars($_POST['title'][$i],ENT_QUOTES)."', '".htmlspecialchars($_POST['description'][$i],ENT_QUOTES)."')";
			//$sql = "INSERT INTO tbl_youtubeData (description) VALUES ('".htmlentities($_POST['description'][$i])."')";
			$result = $conn->prepare($sql);
			$result->execute();
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
		$i++;
	}
} // end


if(isset($_POST['twitterData'])){ // updates twitter data in db
	$i = 0;
	print_r($_POST['url']);
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "TRUNCATE TABLE tbl_twitterData";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			unset($sql);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	foreach($_POST['title'] as $title){	
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "INSERT INTO tbl_twitterData (title, url) VALUES ('".$_POST['title'][$i]."', '".$_POST['url'][$i]."')";
			$result = $conn->prepare($sql);
			$result->execute();
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
		$i++;
	}
} // end

if(isset($_POST['findCrossTrendsTG'])){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT MAX(id) FROM `tbl_twitterData` WHERE 1";
			$result = $conn->prepare($sql);
			$result->execute();
   			if ($result->rowCount() > 0) {
   				$twitterRowCount = $result->fetchColumn();
			}
			//echo $twitterRowCount;
			unset($sql);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	$twitterCrossTrend = array();
	$j = 0;
	for($i=1;$i<=$twitterRowCount;$i++){
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT title,id AS data3, (SELECT title FROM stepouts_hulSocialTrends.tbl_twitterData WHERE id=".$i.") AS data1, (SELECT id FROM stepouts_hulSocialTrends.tbl_twitterData WHERE id=".$i.") AS data2 FROM tbl_googleData WHERE title LIKE CONCAT('%', REPLACE(REPLACE((SELECT title FROM stepouts_hulSocialTrends.tbl_twitterData WHERE id=".$i."),' ',''), '#', ''), '%') OR description LIKE CONCAT('%', REPLACE(REPLACE((SELECT title FROM stepouts_hulSocialTrends.tbl_twitterData WHERE id=".$i."),' ',''), '#', ''), '%')";
			$result = $conn->prepare($sql);
			$result->execute();
   			/*if ($result->rowCount() > 0) {
   				$twitterCrossTrend[] = $result->fetchColumn();
			}*/
			//$j = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   				//if(isset($row['0'])){
					$twitterCrossTrend[$j]['title'] = $row['data1'];
					$twitterCrossTrend[$j]['t_id'] = $row['data2'];
					$twitterCrossTrend[$j]['g_id'] = $row['data3'];
					
					$j++;
				//}
			}
			//echo $twitterRowCount;
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
	}
	echo json_encode($twitterCrossTrend);
} //end

if(isset($_POST['findCrossTrendsTY'])){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT MAX(id) FROM `tbl_twitterData` WHERE 1";
			$result = $conn->prepare($sql);
			$result->execute();
   			if ($result->rowCount() > 0) {
   				$twitterRowCount = $result->fetchColumn();
			}
			//echo $twitterRowCount;
			unset($sql);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	$twitterCrossTrend = array();
	$j = 0;
	for($i=1;$i<=$twitterRowCount;$i++){
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT title, id AS data3, (SELECT title FROM stepouts_hulSocialTrends.tbl_twitterData WHERE id=".$i.") AS data1, (SELECT id FROM stepouts_hulSocialTrends.tbl_twitterData WHERE id=".$i.") AS data2 FROM tbl_youtubeData WHERE title LIKE CONCAT('%', REPLACE(REPLACE((SELECT title FROM stepouts_hulSocialTrends.tbl_twitterData WHERE id=".$i."),' ',''), '#', ''), '%') OR description LIKE CONCAT('%', REPLACE(REPLACE((SELECT title FROM stepouts_hulSocialTrends.tbl_twitterData WHERE id=".$i."),' ',''), '#', ''), '%')";
			$result = $conn->prepare($sql);
			$result->execute();
   			/*if ($result->rowCount() > 0) {
   				$twitterCrossTrend[] = $result->fetchColumn();
			}*/
			//$j = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   				//if(isset($row['0'])){
					$twitterCrossTrend[$j]['title'] = $row['data1'];
					$twitterCrossTrend[$j]['t_id'] = $row['data2'];
					$twitterCrossTrend[$j]['y_id'] = $row['data3'];
					$j++;
				//}
			}
			//echo $twitterRowCount;
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
	}
	echo json_encode($twitterCrossTrend);
}

if(isset($_POST['findCrossTrendsGY'])){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT MAX(id) FROM `tbl_googleData` WHERE 1";
			$result = $conn->prepare($sql);
			$result->execute();
   			if ($result->rowCount() > 0) {
   				$twitterRowCount = $result->fetchColumn();
			}
			//echo $twitterRowCount;
			unset($sql);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	$twitterCrossTrend = array();
	$j = 0;
	for($i=1;$i<=$twitterRowCount;$i++){
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT title, id AS data3, (SELECT title FROM stepouts_hulSocialTrends.tbl_googleData WHERE id=".$i.") AS data1, (SELECT id FROM stepouts_hulSocialTrends.tbl_googleData WHERE id=".$i.") AS data2 FROM tbl_youtubeData WHERE title LIKE CONCAT('%', (SELECT title FROM stepouts_hulSocialTrends.tbl_googleData WHERE id=".$i."), '%') OR description LIKE CONCAT('%', (SELECT title FROM stepouts_hulSocialTrends.tbl_googleData WHERE id=".$i."), '%') LIMIT 12";
			$result = $conn->prepare($sql);
			$result->execute();
   			/*if ($result->rowCount() > 0) {
   				$twitterCrossTrend[] = $result->fetchColumn();
			}*/
			//$j = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   				//if(isset($row['0'])){
					$twitterCrossTrend[$j]['title'] = $row['data1'];
					$twitterCrossTrend[$j]['g_id'] = $row['data2'];
					$twitterCrossTrend[$j]['y_id'] = $row['data3'];
					$j++;
				//}
			}
			//echo $twitterRowCount;
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
	}
	echo json_encode($twitterCrossTrend);
}
?>