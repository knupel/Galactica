<?php
	include_once("Map.class.php");
	include_once("Vec3.class.php");
	include_once("Stuff.class.php");
	include_once("S_Asteroid.class.php");
	include_once("Ship.class.php");

	
	// SETTING
	$list_obj;
	$list_fleet;
	$list_leader;
	$round = 0;
	$canvas = new Vec3(array("x"=>150, "y"=>100, "z"=>0));
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
	// print_r($map->get_grid());

	// UPDATE
  // update_game($canvas, $map, $list_fleet);
  $round++;

	print($map->show_map());


	function map_generator($canvas, $list):array {
		$num_ufo = rand(1,10);
		$index = 0;
		while($index < $num_ufo) {
			$x = (int)rand(0, $canvas->get_x());
			$y = (int)rand(0, $canvas->get_y());
			$sx = (int)rand(1,20);
			$sy = (int)rand(1,20);
			$obj = new S_Asteroid($x, $y, $sx, $sy);
			array_push($list,$obj);
			$index++;
		}
		return $list;
	}

	
  
  // METHOD
  function loggin() {

	}

	function set_leader($num_leader, $list):array {
		// create leader
		// create alliance / group
		return $list;
	}

	// SET FLEET
	function set_fleet($list):array {
		$ship_rebel = new Ship("Cruiser", "wrath of God", "Rebel");
		$ship_rebel->build();
		$ship_rebel->set_pos(10,10);
		array_push($list,$ship_rebel);
		$ship_empire = new Ship("Destroyer", "Blood Lust", "Empire");
		$ship_empire->build();
		$ship_rebel->set_pos(50,50);
		array_push($list,$ship_empire);
		// use point to build a fleet in between all ships available,
		// display the file where the player can choice ships.
		return $list;
	}

  

  // GAME
	function update_game($canvas, $map, $list_fleet) {
		// order();
		show_fleet($canvas, $list_fleet);
		move($map, $list_fleet);
		shoot();
		score();
	}


	function show_fleet($canvas, $list_fleet) {
		foreach($list_fleet as $sh) {
			if(!$sh->get_born_is()) {
				$sh->set_pos(0,rand(0,$canvas->get_y()));
				$sh->set_born_is(true);
			}
		}
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