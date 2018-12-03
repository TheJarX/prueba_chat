<?php
require_once 'connection.php';

if( isset($_REQUEST['msg']) && !empty($_REQUEST['msg']) ){

	if(isset($_REQUEST['nick']) && !empty($_REQUEST['nick']) ){

	$sql=" INSERT INTO chat (nick,msg,date) VALUES(:nick,:msg,CURDATE())";
	$stm=$link->prepare($sql);
	$stm->execute(array(':nick'=>$_REQUEST['nick'],':msg'=>$_REQUEST['msg']));

	}else{

		$sql=" INSERT INTO chat (msg,date) VALUES(:msg,CURDATE())";
		$stm=$link->prepare($sql);
		$stm->execute(array(':msg'=>$_REQUEST['msg']));

	}

	if ($stm->rowCount()) {
			
			echo true;

	}else{
		echo 'error_post';
	}

}else{

	echo "empty_variables";


}