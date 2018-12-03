<?php
require_once 'connection.php';

$data=array();
$sql=" SELECT nick,msg,date FROM chat ORDER BY date DESC LIMIT 15 ";
$stm= $link->prepare($sql);
$stm->execute();
$result=$stm->fetchAll();
if($result){

	foreach ($result as $row) {
		$date = explode('-',$row['date']);
		$date=array_reverse($date);
		array_push($data,array("nick"=>$row['nick'],
			"msg"=>$row['msg'],
			"date"=>(
				
				join('/',$date)
			)

		));

	}

		echo json_encode($data);

}else{
	echo false;
}