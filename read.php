<?php
require_once 'connection.php';

$data=array();
$sql=" SELECT nick,msg,DATE_FORMAT(date, "%d/%m/%Y") FROM chat ORDER BY date DESC LIMIT 15 ";
$stm= $link->prepare($sql);
$stm->execute();
$result=$stm->fetchAll();
if($result){

	foreach ($result as $row) {
		array_push($data,array("nick"=>$row['nick'],
			"msg"=>$row['msg'],
			"date"=>$row['date']

		));

	}

		echo json_encode($data);

}else{
	echo false;
}
