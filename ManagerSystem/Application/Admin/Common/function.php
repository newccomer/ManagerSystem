<?php 


function generateTree($data){

	$items = array();

	foreach ($data as $v) {

		$items[$v['a_id']] = $v;

	}


	$tree = array();

	foreach ($items as $k => $item) {


		if (isset($items[$item['a_pid']])) {
			
			$items[$item['a_pid']]['son'][] = &$items[$k];

		}else{

			$tree[] = &$items[$k];

		}


	}


	return getTreeData($tree);

}


function getTreeData($tree,$level=0){

	static $arr = array();

	foreach ($tree as $t) {

		$tmp = $t;
		unset($tmp['son']);
		$tmp['level'] = $level;
		$arr[] = $tmp;

		if(isset($t['son'])){

			getTreeData($t['son'],$level+1);

		}


	}


	return $arr;

}

 ?>
