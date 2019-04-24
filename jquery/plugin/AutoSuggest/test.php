<?php

/*
note:
this is just a static test version using a hard-coded countries array.
normally you would be populating the array out of a database

the returned xml has the following structure
<results>
	<rs>foo</rs>
	<rs>bar</rs>
</results>
*/

	$aUsers = array(
		"Ädams, Egbert",
		"Altman, Alisha",
		"Archibald, Janna",
		"Auman, Cody",
		"Bagley, Sheree",
		"Ballou, Wilmot",
		"Bard, Cassian",
		"Bash, Latanya",
		"Beail, May",
		"Black, Lux",
		"Bloise, India",
		"Blyant, Nora",
		"Bollinger, Carter",
		"Burns, Jaycob",
		"Carden, Preston",
		"Carter, Merrilyn",
		"Christner, Addie",
		"Churchill, Mirabelle",
		"Conkle, Erin",
		"Countryman, Abner",
		"Courtney, Edgar",
		"Cowher, Antony",
		"Craig, Charlie",
		"Cram, Zacharias",
		"Cressman, Ted",
		"Crissman, Annie",
		"Davis, Palmer",
		"Downing, Casimir",
		"Earl, Missie",
		"Eckert, Janele",
		"Eisenman, Briar",
		"Fitzgerald, Love",
		"Fleming, Sidney",
		"Fuchs, Bridger",
		"Fulton, Rosalynne",
		"Fye, Webster",
		"Geyer, Rylan",
		"Greene, Charis",
		"Greif, Jem",
		"Guest, Sarahjeanne",
		"Harper, Phyllida",
		"Hildyard, Erskine",
		"Hoenshell, Eulalia",
		"Isaman, Lalo",
		"James, Diamond",
		"Jenkins, Merrill",
		"Jube, Bennett",
		"Kava, Marianne",
		"Kern, Linda",
		"Klockman, Jenifer",
		"Lacon, Quincy",
		"Laurenzi, Leland",
		"Leichter, Jeane",
		"Leslie, Kerrie",
		"Lester, Noah",
		"Llora, Roxana",
		"Lombardi, Polly",
		"Lowstetter, Louisa",
		"Mays, Emery",
		"Mccullough, Bernadine",
		"Mckinnon, Kristie",
		"Meyers, Hector",
		"Monahan, Penelope",
		"Mull, Kaelea",
		"Newbiggin, Osmond",
		"Nickolson, Alfreda",
		"Pawle, Jacki",
		"Paynter, Nerissa",
		"Pinney, Wilkie",
		"Pratt, Ricky",
		"Putnam, Stephanie",
		"Ream, Terrence",
		"Rumbaugh, Noelle",
		"Ryals, Titania",
		"Saylor, Lenora",
		"Schofield, Denice",
		"Schuck, John",
		"Scott, Clover",
		"Smith, Estella",
		"Smothers, Matthew",
		"Stainforth, Maurene",
		"Stephenson, Phillipa",
		"Stewart, Hyram",
		"Stough, Gussie",
		"Strickland, Temple",
		"Sullivan, Gertie",
		"Swink, Stefanie",
		"Tavoularis, Terance",
		"Taylor, Kizzy",
		"Thigpen, Alwyn",
		"Treeby, Jim",
		"Trevithick, Jayme",
		"Waldron, Ashley",
		"Wheeler, Bysshe",
		"Whishaw, Dodie",
		"Whitehead, Jericho",
		"Wilks, Debby",
		"Wire, Tallulah",
		"Woodworth, Alexandria",
		"Zaun, Jillie",
		"กกantinanm, Makmee"
		
	);
	
	
	$aInfo = array(
		"Bedfordshire",
		"Buckinghamshire",
		"Cambridgeshire",
		"Cheshire",
		"Cornwall",
		"Cumbria",
		"Derbyshire",
		"Devon", 
		"Dorset", 
		"Durham", 
		"East Sussex",
		"Essex",
		"Gloucestershire",
		"Hampshire",
		"Hertfordshire", 
		"Kent", 
		"Lancashire",
		"Leicestershire",
		"Lincolnshire",
		"Norfolk",
		"Northamptonshire",
		"Northumberland", 
		"North Yorkshire", 
		"Nottinghamshire",
		"Oxfordshire",
		"Shropshire",
		"Somerset",
		"Staffordshire",
		"Suffolk", 
		"Surrey",
		"Warwickshire",
		"West Sussex",
		"Wiltshire",
		"Worcestershire", 
		"Durham", 
		"East Sussex",
		"Essex",
		"Gloucestershire",
		"Hampshire",
		"Hertfordshire", 
		"Kent", 
		"Lancashire",
		"Leicestershire",
		"Lincolnshire",
		"Norfolk",
		"Northamptonshire",
		"Northumberland", 
		"North Yorkshire", 
		"Nottinghamshire",
		"Oxfordshire",
		"Shropshire",
		"Somerset",
		"Staffordshire",
		"Suffolk", 
		"Surrey",
		"Warwickshire",
		"West Sussex",
		"Wiltshire",
		"Worcestershire", 
		"Durham", 
		"East Sussex",
		"Essex",
		"Gloucestershire",
		"Hampshire",
		"Hertfordshire", 
		"Kent", 
		"Lancashire",
		"Leicestershire",
		"Lincolnshire",
		"Norfolk",
		"Northamptonshire",
		"Northumberland", 
		"North Yorkshire", 
		"Nottinghamshire",
		"Oxfordshire",
		"Shropshire",
		"Somerset",
		"Staffordshire",
		"Suffolk", 
		"Surrey",
		"Warwickshire",
		"West Sussex",
		"Wiltshire",
		"Worcestershire", 
		"Durham", 
		"East Sussex",
		"Essex",
		"Gloucestershire",
		"Hampshire",
		"Hertfordshire", 
		"Kent", 
		"Lancashire",
		"Leicestershire",
		"Lincolnshire",
		"Norfolk",
		"Northamptonshire",
		"Northumberland", 
		"North Yorkshire", 
		"Nottinghamshire",
		"Kantinanm"
	);
	
	
	//$input = strtolower( $_GET['input'] );
	$input = $_GET['input'];


	$len = strlen($input);
	$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;
	
/*	echo $len ;
	return;*/
	
	$aResults = array();
	$count = 0;
	
/*	if ($len)
	{
		for ($i=0;$i<count($aUsers);$i++)
		{
			// had to use utf_decode, here
			// not necessary if the results are coming from mysql
			//
			if (strtolower(substr(utf8_decode($aUsers[$i]),0,$len)) == $input)
			{
				$count++;
				$aResults[] = array( "id"=>($i+1) ,"value"=>htmlspecialchars($aUsers[$i]), "info"=>htmlspecialchars($aInfo[$i]) );
			}
			
			if ($limit && $count==$limit)
				break;
		}
	}*/
	
	
	    include "../../../inc/config.inc.php";
		//$q = $_GET["q"];
		//$q = "อ";
		$q =$_GET['input'] ;
		
		$pagesize = 10; // จำนวนรายการที่ต้องการแสดง
		
		$table_db="infection_detail"; // ตารางที่ต้องการค้นหา
		//$find_field="infection_type_code"; // ฟิลที่ต้องการค้นหา
		//$sql = "select * from $table_db  where ('$q', $find_field) > 0 order by ('$q', $find_field), $find_field limit $pagesize";
		$sql = "select * from $table_db  where  detail  like '%$q%'  order by detail asc limit  $pagesize";
		
		$dbquery=mysql_db_query($db,$sql);
		$total_row = mysql_num_rows($dbquery); // เก็บว่ามีทั้งหมดกี่ record


	 while($result = mysql_fetch_array($dbquery)){
	    
		$id =  $result['infection_detail_id']; // ฟิลที่ต้องการส่งค่ากลับ
		//$name = ucwords( strtolower($result->fields['spa_name']) ); // ฟิลที่ต้องการแสดงค่า
		$name =$result['detail'] ; // ฟิลที่ต้องการแสดงค่า
		// ป้องกันเครื่องหมาย '
		$name = str_replace("'", "'", $name);
		// กำหนดตัวหนาให้กับคำที่มีการพิมพ์
		//$display_name = preg_replace("/(" . $q . ")/i", "<b>$1</b>", $name).", ";
		$display_name = preg_replace("/(" . $q . ")/i", "$1", $name)." ";

		$aResults[] = array( "id"=>($id ) ,"value"=>htmlspecialchars($name), "info"=>htmlspecialchars($name ) );
		
		
		//echo "<li onselect=\"this.setText('$name').setValue('$id');\">$display_name</li>";
 		$count++;
	  }
	
	
	
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header ("Pragma: no-cache"); // HTTP/1.0
	
	
	
	if (isset($_REQUEST['json']))
	{
		header("Content-Type: application/json");
	
		echo "{\"results\": [";
		$arr = array();
		for ($i=0;$i<count($aResults);$i++)
		{
			$arr[] = "{\"id\": \"".$aResults[$i]['id']."\", \"value\": \"".$aResults[$i]['value']."\", \"info\": \"".$aResults[$i]['info']."\"}";
		}
		echo implode(", ", $arr);
		echo "]}";
	}
	else
	{
		header("Content-Type: text/xml");

		echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?><results>";
		for ($i=0;$i<count($aResults);$i++)
		{
			echo "<rs id=\"".$aResults[$i]['id']."\" info=\"".$aResults[$i]['info']."\">".$aResults[$i]['value']."</rs>";
		}
		echo "</results>";
	}
?>