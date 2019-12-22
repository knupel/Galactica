<?php
	include_once("Map.class.php");
	include_once("Vec3.class.php");
	include_once("Stuff.class.php");
	include_once("S_Asteroid.class.php");
	include_once("Ship.class.php");
	include_once("A_manage_fleet.php");

	
	// SETTING
	$list_obj;
	$list_fleet;
	$list_leader;
	$round = 0;
	$canvas = new Vec3(array("x"=>50, "y"=>50, "z"=>0));
	$is = false;
	if(!$is) {
		$list_fleet = array();
		$list_fleet = set_fleet($list_fleet);

		$list_obj = array();
		$list_obj = map_generator($canvas, $list_obj);

		$list_leader = array();
		$num_player = 2;
		$list_leader = set_leader($num_player,$list_leader);
		$is = true;
	}
  
	// SHOW
	$map = new Map($canvas,$list_obj);
	$map->set_map($list_obj);
	// UPDATE
  update_game($canvas, $map, $list_fleet);
  $round++;

	print($map->show_map());


	

	
  
  // METHOD
  function loggin() {

	}

	function set_leader($num_leader, $list):array {
		// create leader
		// create alliance / group
		return $list;
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

  // GAME
	function update_game($canvas, $map, $list_fleet) {
		// order();
		init_fleet($canvas, $list_fleet);
		show_fleet($canvas, $map, $list_fleet);
		// move($map, $list_fleet);
		// shoot();
		// score();
	}

	function move($map, $list_fleet) {
		
		// print_r($map->get_grid());
		foreach($list_fleet as $sh) {
			for($i = 0 ; $i < $map->get_grid() ; $i++) {
				// basic colission system
				//if()

			}
		}
		
	}

	function shoot() {
		
	}

	function score() {

	}
?>