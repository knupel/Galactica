<?php
	include_once("Map.class.php");
	include_once("Vec3.class.php");
	include_once("Stuff.class.php");
	include_once("S_Asteroid.class.php");
	$list_obj;
	$canvas = new Vec3(array("x"=>150, "y"=>100, "z"=>0));
	$is = false;
	if(!$is) {
		$list_obj = array();
		$list_obj = stuff_generator($canvas, $list_obj);
		$is = true;
	}
	$map = new Map($canvas,$list_obj);
  
	print($map->show_map($list_obj));

	function stuff_generator($canvas, $list_obj) {
		$num = rand(100,1000);
		$index = 0;
		while($index < $num) {
			$obj = new S_Asteroid();
			$obj->set_id(1);
			$x = (int)rand(0, $canvas->get_x());
			$y = (int)rand(0, $canvas->get_y());
			$obj->set_pos($x, $y);
			array_push($list_obj,$obj);
			$index++;
		}
		return $list_obj;
	}
?>