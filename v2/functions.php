<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	$_SESSION['username'] = 'admin';
}

include('config.php');
if(isset($_POST['insertGoogleData'])){ // updates google data in db
//function insertGoogleData(){
	try {
    	$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
		$conn->exec("set names utf8");
		$sql = "TRUNCATE TABLE tbl_googleData_1";
		$result = $conn->prepare($sql); unset($sql);
		$result->execute();
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
			$sql = "INSERT INTO tbl_googleData_1 (title, titleString, description, descriptionString, url) VALUES ('".$title."','".str_replace(' ', '', trim($title, '#'))."','".$_POST['description'][$i]."', '".str_replace(' ', '', trim($_POST['description'][$i], '#'))."', '".$_POST['url'][$i]."')";
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

if(isset($_POST['insertYoutubeData'])){ // updates youtube data in db
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "TRUNCATE TABLE tbl_youtubeData_1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	
	$i = 0;
	foreach($_POST['title'] as $title){
		/*if($i>15){
			break;
		}*/
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = 'INSERT INTO tbl_youtubeData_1 (title, titleString, description, descriptionString, thumbnail, author, views, url) VALUES ("'.$title.'", "'.str_replace(' ', '', trim($title, '#')).'", "'.$_POST['description'][$i].'", "'.str_replace(' ', '', trim($_POST['description'][$i], '#')).'", "'.$_POST['thumbnail'][$i].'", "'.$_POST['author'][$i].'", "'.$_POST['views'][$i].'", "'.$_POST['url'][$i].'")';
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


if(isset($_POST['insertTwitterData'])){ // updates twitter data in db
	$i = 0;
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "TRUNCATE TABLE tbl_twitterData_1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	foreach($_POST['title'] as $title){	
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = 'INSERT INTO tbl_twitterData_1 (title, titleString, url) VALUES ("'.$_POST['title'][$i].'", "'.str_replace(" ", "", trim($_POST["title"][$i], "#")).'", "'.$_POST['url'][$i].'")';
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
			$sql = "TRUNCATE TABLE tbl_crossTrendsTG_1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "TRUNCATE TABLE tbl_crossTrends_1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	
	try { // get twitter row count
    	$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
		$conn->exec("set names utf8");
		$sql = "SELECT MAX(id) FROM `tbl_twitterData_1` WHERE 1";
		$result = $conn->prepare($sql);
		$result->execute();
   		if ($result->rowCount() > 0) {
   			$twitterRowCount = $result->fetchColumn();
		}
		unset($sql);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	
	try { // get google row count
    	$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
		$conn->exec("set names utf8");
		$sql = "SELECT MAX(id) FROM `tbl_googleData_1` WHERE 1";
		$result = $conn->prepare($sql);
		$result->execute();
   		if ($result->rowCount() > 0) {
   			$googleRowCount = $result->fetchColumn();
		}
		unset($sql);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	
	$data = array();
	$j = 0;
	for($i=1;$i<=$twitterRowCount;$i++){
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT id AS g_id, title AS g_title, (SELECT id FROM tbl_twitterData_1 WHERE id=".$i.") AS t_id, (SELECT title FROM tbl_twitterData_1 WHERE id=".$i.") AS t_title FROM tbl_googleData_1 WHERE titleString LIKE CONCAT('%', (SELECT titleString FROM tbl_twitterData_1 WHERE id=".$i."), '%') OR descriptionString LIKE CONCAT('%', (SELECT titleString FROM tbl_twitterData_1 WHERE id=".$i."), '%')";
			$result = $conn->prepare($sql); 
			$result->execute();
			$temp = $result->fetch(PDO::FETCH_ASSOC);
			if (empty($temp)){
				continue;
			}
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				//$data[$j]['g_id'] = $row['g_id'];
//				$data[$j]['g_title'] = $row['g_title'];
//				$data[$j]['t_id'] = $row['t_id'];
//				$data[$j]['t_title'] = $row['t_title'];
//				$j++;
				try {
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "INSERT INTO tbl_crossTrendsTG_1 (g_id, g_title, t_id, t_title) VALUES ('".$row['g_id']."', '".$row['g_title']."', '".$row['t_id']."', '".$row['t_title']."')";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update same if exists already
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET t_id='".$row['t_id']."',  g_id='".$row['g_id']."', title='".$row['t_title']."' WHERE t_id='".$row['t_id']."' AND g_id='".$row['g_id']."'";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update if g_id exists but y_id is null
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET t_id='".$row['t_id']."',  g_id='".$row['g_id']."', title='".$row['t_title']."' WHERE t_id='".$row['t_id']."' AND  g_id IS NULL";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update if y_id exists but g_id is null
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET t_id='".$row['t_id']."',  g_id='".$row['g_id']."', title='".$row['t_title']."' WHERE g_id='".$row['g_id']."' AND  t_id IS NULL";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // Inserts new row if not exists
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "INSERT INTO tbl_crossTrends_1 (t_id, g_id, title) SELECT * FROM (SELECT '".$row['t_id']."', '".$row['g_id']."', '".$row['t_title']."') AS tmp WHERE NOT EXISTS (SELECT id FROM tbl_crossTrends_1 WHERE t_id= '".$row['t_id']."' AND  g_id= '".$row['g_id']."') LIMIT 1";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
			}
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
	}
	
	for($i=1;$i<=$googleRowCount;$i++){
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT id AS t_id, title AS t_title, (SELECT id FROM tbl_googleData_1 WHERE id=".$i.") AS g_id, (SELECT title FROM tbl_googleData_1 WHERE id=".$i.") AS g_title FROM tbl_twitterData_1 WHERE titleString LIKE CONCAT('%', (SELECT titleString FROM tbl_googleData_1 WHERE id=".$i."), '%')";
			$result = $conn->prepare($sql);
			$result->execute();
			if (empty($result->fetch(PDO::FETCH_ASSOC))){
				continue;
			}
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				echo json_encode($row);
				/*$data[$j]['g_id'] = $row['g_id'];
				$data[$j]['g_title'] = $row['g_title'];
				$data[$j]['t_id'] = $row['t_id'];
				$data[$j]['t_title'] = $row['t_title'];
				$j++;*/
				try {
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "INSERT INTO tbl_crossTrendsTG_1 (g_id, g_title, t_id, t_title) VALUES ('".$row['g_id']."', '".$row['g_title']."', '".$row['t_id']."', '".$row['t_title']."')";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update same if exists already
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET t_id='".$row['t_id']."',  g_id='".$row['g_id']."', title='".$row['g_title']."' WHERE t_id='".$row['t_id']."' AND g_id='".$row['g_id']."'";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update if g_id exists but y_id is null
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET t_id='".$row['t_id']."',  g_id='".$row['g_id']."', title='".$row['g_title']."' WHERE t_id='".$row['t_id']."' AND  g_id IS NULL";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update if y_id exists but g_id is null
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET t_id='".$row['t_id']."',  g_id='".$row['g_id']."', title='".$row['g_title']."' WHERE g_id='".$row['g_id']."' AND  t_id IS NULL";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // Inserts new row if not exists
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "INSERT INTO tbl_crossTrends_1 (t_id, g_id, title) SELECT * FROM (SELECT '".$row['t_id']."', '".$row['g_id']."', '".$row['g_title']."') AS tmp WHERE NOT EXISTS (SELECT id FROM tbl_crossTrends_1 WHERE t_id= '".$row['t_id']."' AND  g_id= '".$row['g_id']."') LIMIT 1";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
			}
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
	}
	//echo json_encode($data);
} //end

if(isset($_POST['findCrossTrendsTY'])){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "TRUNCATE TABLE tbl_crossTrendsTY_1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	
	try {
    	$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
		$conn->exec("set names utf8");
		$sql = "SELECT MAX(id) FROM `tbl_twitterData_1` WHERE 1";
		$result = $conn->prepare($sql);
		$result->execute();
   		if ($result->rowCount() > 0) {
   			$twitterRowCount = $result->fetchColumn();
		}
		unset($sql);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	$data = array();
	$j = 0;
	for($i=1;$i<=$twitterRowCount;$i++){
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT id AS y_id, title AS y_title, (SELECT id FROM tbl_twitterData_1 WHERE id=".$i.") AS t_id, (SELECT title FROM tbl_twitterData_1 WHERE id=".$i.") AS t_title FROM tbl_youtubeData_1 WHERE titleString LIKE CONCAT('%', (SELECT titleString FROM tbl_twitterData_1 WHERE id=".$i."), '%') OR descriptionString LIKE CONCAT('%', (SELECT titleString FROM tbl_twitterData_1 WHERE id=".$i."), '%')";
			$result = $conn->prepare($sql);
			$result->execute();
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				try {
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "INSERT INTO tbl_crossTrendsTY_1 (y_id, y_title, t_id, t_title) VALUES ('".$row['y_id']."', '".$row['y_title']."', '".$row['t_id']."', '".$row['t_title']."')";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update same if exists already
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET t_id='".$row['t_id']."',  y_id='".$row['y_id']."', title='".$row['t_title']."' WHERE t_id='".$row['t_id']."' AND y_id='".$row['y_id']."'";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update if g_id exists but y_id is null
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET t_id='".$row['t_id']."',  y_id='".$row['y_id']."', title='".$row['t_title']."' WHERE t_id='".$row['t_id']."' AND  y_id IS NULL";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update if y_id exists but g_id is null
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET t_id='".$row['t_id']."',  y_id='".$row['y_id']."', title='".$row['t_title']."' WHERE y_id='".$row['y_id']."' AND  t_id IS NULL";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // Inserts new row if not exists
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "INSERT INTO tbl_crossTrends_1 (t_id, y_id, title) SELECT * FROM (SELECT '".$row['t_id']."', '".$row['y_id']."', '".$row['t_title']."') AS tmp WHERE NOT EXISTS (SELECT id FROM tbl_crossTrends_1 WHERE t_id= '".$row['t_id']."' AND  y_id= '".$row['y_id']."') LIMIT 1";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
			}
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
	}
	echo json_encode($data);
} //end

if(isset($_POST['findCrossTrendsGY'])){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "TRUNCATE TABLE tbl_crossTrendsGY_1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	
	try {
    	$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
		$conn->exec("set names utf8");
		$sql = "SELECT MAX(id) FROM `tbl_googleData_1` WHERE 1";
		$result = $conn->prepare($sql);
		$result->execute();
   		if ($result->rowCount() > 0) {
   			$googleRowCount = $result->fetchColumn();
		}
		unset($sql);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	$data = array();
	//$j = 0;
	for($i=1;$i<=$googleRowCount;$i++){
		try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT id AS y_id, title AS y_title, (SELECT id FROM tbl_googleData_1 WHERE id=".$i.") AS g_id, (SELECT title FROM tbl_googleData_1 WHERE id=".$i.") AS g_title FROM tbl_youtubeData_1 WHERE titleString LIKE CONCAT('%', (SELECT titleString FROM tbl_googleData_1 WHERE id=".$i."), '%') OR descriptionString LIKE CONCAT('%', (SELECT titleString FROM tbl_googleData_1 WHERE id=".$i."), '%')";
			$result = $conn->prepare($sql);
			$result->execute();
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				try { // Inserts new row if not exists
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "INSERT INTO tbl_crossTrendsGY_1 (g_id, g_title, y_id, y_title) VALUES ('".$row['g_id']."', '".$row['g_title']."', '".$row['y_id']."', '".$row['y_title']."')";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update same if exists already
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET g_id='".$row['g_id']."',  y_id='".$row['y_id']."', title='".$row['g_title']."' WHERE g_id='".$row['g_id']."' AND y_id='".$row['y_id']."'";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update if g_id exists but y_id is null
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET g_id='".$row['g_id']."',  y_id='".$row['y_id']."', title='".$row['g_title']."' WHERE g_id='".$row['g_id']."' AND  y_id IS NULL";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // update if y_id exists but g_id is null
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "UPDATE tbl_crossTrends_1 SET g_id='".$row['g_id']."',  y_id='".$row['y_id']."', title='".$row['g_title']."' WHERE y_id='".$row['y_id']."' AND  g_id IS NULL";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
				try { // Inserts new row if not exists
    				$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
					$conn->exec("set names utf8");
					$sql = "INSERT INTO tbl_crossTrends_1 (g_id, y_id, title) SELECT * FROM (SELECT '".$row['g_id']."', '".$row['y_id']."', '".$row['g_title']."') AS tmp WHERE NOT EXISTS (SELECT id FROM tbl_crossTrends_1 WHERE g_id= '".$row['g_id']."' AND  y_id= '".$row['y_id']."') LIMIT 1";
					$result = $conn->prepare($sql);
					$result->execute();
					unset($sql);
				}
				catch (PDOException $e) {
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
			}
			unset($sql);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
	}
	echo json_encode($data);
} //end

if(isset($_POST['setAnnounce'])){
	try {
    	$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
		$conn->exec("set names utf8");
		$sql = 'INSERT INTO tbl_announcement_1 (announcement, author) VALUES ("'.$_POST['announce'].'", "'.$_SESSION['username'].'")';
		$result = $conn->prepare($sql);
		$result->execute();
		unset($sql);
		echo 'Announcement saved!';
	}
	catch (PDOException $e) {
    	print "Error!: " . $e->getMessage() . "<br/>";
    	die();
	}
} //end

if(isset($_POST['updateAnnounceStatus'])){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "TRUNCATE TABLE tbl_announceStatus_1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
	try {
    	$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
		$conn->exec("set names utf8");
		$sql = 'INSERT INTO tbl_announceStatus_1 (status) VALUES ("'.$_POST['status'].'")';
		$result = $conn->prepare($sql);
		$result->execute();
		unset($sql);
	}
	catch (PDOException $e) {
    	print "Error!: " . $e->getMessage() . "<br/>";
    	die();
	}
} //end

function getLatestAnnounce(){ // gets latest announcement
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT announcement FROM tbl_announcement_1 WHERE id = (SELECT MAX(id) FROM tbl_announcement_1)";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			if ($result->rowCount() > 0) {
   				$data = $result->fetchColumn();
			}
			return $data;
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
} //end

function getAnnounceStatus(){ // gets latest announcement
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT status FROM tbl_announceStatus_1 WHERE id = '1'";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			if ($result->rowCount() > 0) {
   				$data = $result->fetchColumn();
			}
			return $data;
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
} //end

function getRestAnnounce(){ // gets announcement except the last one
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT announcement FROM tbl_announcement_1 WHERE id BETWEEN 1 and (SELECT MAX(id)-1 FROM tbl_announcement_1) ORDER BY id DESC";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   				$data[] = $row['announcement'];
			}
			return $data;
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
} //end

if(isset($_POST['getGoogleData'])){ // gets google data from database
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT title, url FROM tbl_googleData_1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			$i = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   				$data[$i]['title'] = $row['title'];
   				$data[$i]['url'] = $row['url'];
				$i++;
			}
			echo json_encode($data);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
} // end

if(isset($_POST['getYoutubeData'])){ // gets youtube data from database
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT title, thumbnail, author, views, url FROM tbl_youtubeData_1 WHERE 1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			$i = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   				$data[$i]['title'] = $row['title'];
   				$data[$i]['thumbnail'] = $row['thumbnail'];
   				$data[$i]['author'] = $row['author'];
   				$data[$i]['views'] = $row['views'];
   				$data[$i]['url'] = $row['url'];
				$i++;
			}
			echo json_encode($data);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
} // end

if(isset($_POST['getTwitterData'])){ // gets twitter data from database
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT title, url FROM tbl_twitterData_1 WHERE 1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			$i = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   				$data[$i]['title'] = $row['title'];
   				$data[$i]['url'] = $row['url'];
				$i++;
			}
			echo json_encode($data);
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
}

function crossTrendsStatus(){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT COUNT(*) FROM tbl_crossTrends_1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			$data = $result->fetchColumn();
			return $data;
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
}

if(isset($_POST['setSessionAnnounce'])){ // set widget display status in session (announcement)
	if($_POST['status'] == 1){
		$_SESSION['displayAnnounce'] = '1';
	}
	if($_POST['status'] == 0){
		$_SESSION['displayAnnounce'] = '0';
	}
} // end

if(isset($_POST['setSessionCrossTrend'])){ // set widget display status in session (cross-trend)
	if($_POST['status'] == 1){
		$_SESSION['displayCrossTrends'] = '1';
	}
	if($_POST['status'] == 0){
		$_SESSION['displayCrossTrends'] = '0';
	}
} // end

if(isset($_POST['setSessionAssets'])){ // set widget display status in session (owned assets)
	if($_POST['status'] == 1){
		$_SESSION['displayAssets'] = '1';
	}
	if($_POST['status'] == 0){
		$_SESSION['displayAssets'] = '0';
	}
} // end

function displayCrossTrends(){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT g_id, t_id, y_id, title FROM tbl_crossTrends_1";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   				echo '<li class="list-group-item all-trend-font">';
				echo $row['title'];
				if($row['g_id'] != ''){
					echo '<i class="cross-trend-icon google fa fa-google"></i><input type="hidden" id="g-id" value="g-id-'.$row['g_id'].'" /> ';
				}
				if($row['t_id'] != ''){
					echo '<i class="cross-trend-icon twitter fa fa-twitter"></i><input type="hidden" id="t-id" value="t-id-'.$row['t_id'].'" /> ';
				}
				if($row['y_id'] != ''){
					echo '<i class="cross-trend-icon youtube fa fa-youtube-play"></i><input type="hidden" id="y-id" value="y-id-'.$row['y_id'].'" /> ';
				}
				echo ' </li>';
			}
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
}

function get_logo($brand){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT `path` FROM `tbl_topBrandsLogo_1` WHERE brand = '".$brand."' ";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			$data = $result->fetchColumn();
			return $data;
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
}

function getBrandsFbData($week){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT `brandName` AS brand, SUM(`dailyOrganicImpressions`) AS doi FROM `tbl_topBrandsData_1` WHERE WEEKOFYEAR(date) = WEEKOFYEAR(CURDATE()) - ".$week." GROUP BY `brandName`, `platform` ORDER BY SUM(`dailyOrganicImpressions`) DESC LIMIT 0,7";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			$i = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$data[$i]['brand'] = $row['brand'];
				$data[$i]['doi'] = intval($row['doi']/1000);
				$i++;
			}
			return $data;
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
}

function getBrandsTwData($week){
	try {
    		$conn = new PDO('mysql:host='.$_SESSION['db_server'].';dbname='.$_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_pass']);
			$conn->exec("set names utf8");
			$sql = "SELECT `brandName` AS brand, ((SUM(`engagements`) / SUM(`impressions`)) * 100) AS doi FROM `tbl_topBrandsData_1` WHERE WEEKOFYEAR(date) = WEEKOFYEAR(CURDATE()) - ".$week." GROUP BY `brandName`, `platform` ORDER BY doi DESC LIMIT 0,7";
			$result = $conn->prepare($sql); unset($sql);
			$result->execute();
			$i = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$data[$i]['brand'] = $row['brand'];
				$data[$i]['doi'] = $row['doi'];
				$i++;
			}
			return $data;
	}
	catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}
}
?>