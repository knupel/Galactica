<?php
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

	function map_generator($canvas, $list):array {
		$num_ufo = rand(2,10);
		$marge = 10 ;
		$index = 0;
		while($index < $num_ufo) {
			$x = (int)rand($marge, $canvas->get_x() -$marge);
			$y = (int)rand($marge, $canvas->get_y() -$marge);
			$sx = (int)rand(5,10);
			$sy = (int)rand(5,10);
			$obj = new S_Asteroid($x, $y, $sx, $sy);
			array_push($list,$obj);
			$index++;
		}
		return $list;
	}

	function loggin() {

	}

	function set_leader($num_player,$list_leader) {
		// create leader
		// create alliance / group
	}

	function score() {

	}
?>