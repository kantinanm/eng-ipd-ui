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
	
	
	    include "../../inc/config.inc.php";
		//$q = $_GET["q"];
		//$q = "2";
		$q =$_GET['input'] ;
		
		$pagesize = 100; // จำนวนรายการที่ต้องการแสดง
		
		//$table_db="item"; // ตารางที่ต้องการค้นหา
		//$find_field="infection_type_code"; // ฟิลที่ต้องการค้นหา
		//$sql = "select * from $table_db  where ('$q', $find_field) > 0 order by ('$q', $find_field), $find_field limit $pagesize";
		//$sql = "select * from $table_db  where  item_name  like '%$q%'  order by detail asc limit  $pagesize";
		$sql =" SELECT mainTb.* from(  ";
		$sql .="  SELECT   ";
		$sql .="   department_asset.department_asset_id,  ";
		$sql .="   department_asset.item_id,  ";
		$sql .="   department_asset.asset_number,  ";
		$sql .="   department_asset.asset_sub_number,  ";
		$sql .="   case when asset_sub_number <> '' then   ";
		$sql .="   CONCAT(CONCAT(asset_number,' (',asset_sub_number),')')  ";
		$sql .="    else asset_number end as full_assetnumber,  ";
		$sql .="   item.item_name,  ";
		$sql .="   brand.brand_name_en,  ";
		$sql .="   department_asset.budget_year,  ";
		$sql .="   CONCAT(item.item_name,'  ยี่ห้อ  ' ,brand.brand_name_en) as detail  ";
		$sql .="  FROM   ";
		$sql .="   department_asset  ";
		$sql .="   LEFT JOIN item ON item.item_id = department_asset.item_id  ";
		$sql .="   LEFT JOIN brand ON brand.brand_id = department_asset.brand_id  ";
		$sql .="  )as mainTb   ";
		$sql .="     ";
		$sql .="  Where  mainTb.full_assetnumber  like '%$q%'  ";
		//$sql .="   AND item.has_child=1 ";
		$sql .="  order by mainTb.full_assetnumber asc limit  $pagesize ";
		
		$dbquery=mysql_db_query($db,$sql);
		$total_row = mysql_num_rows($dbquery); // เก็บว่ามีทั้งหมดกี่ record


	 while($result = mysql_fetch_array($dbquery)){
	    
		$id =  $result['department_asset_id']; // ฟิลที่ต้องการส่งค่ากลับ
		$item_id = $result['item_id'];
		//$name = ucwords( strtolower($result->fields['spa_name']) ); // ฟิลที่ต้องการแสดงค่า
		$name =$result['full_assetnumber'] ; // ฟิลที่ต้องการแสดงค่า
		$info =$result['detail'] ; // ฟิลที่ต้องการแสดงค่า info
		//$asset_number = $result['asset_number'];
		// ป้องกันเครื่องหมาย '
		$name = str_replace("'", "'", $name);
		//$name = str_replace("'", "'", $name." หมายเลข ".$asset_number);
		// กำหนดตัวหนาให้กับคำที่มีการพิมพ์
		//$display_name = preg_replace("/(" . $q . ")/i", "<b>$1</b>", $name).", ";
		$display_name = preg_replace("/(" . $q . ")/i", "$1", $name)." ";

		$aResults[] = array( "id"=>($id.'|'.$item_id ) ,"value"=>htmlspecialchars($name), "info"=>htmlspecialchars($info ) );
		
		
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