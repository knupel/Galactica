<?php
	// include_once("U_utils.php");
	function update_fleet($canvas, $map, $list_fleet) {
		// order();
		init_fleet($canvas, $list_fleet);
		show_fleet($canvas, $map, $list_fleet);
		move_fleet($map, $list_fleet);
		// shoot();
		// score();
	}

	function set_fleet($list):array {
		$ship_rebel = new Ship("Cruiser", "wrath of God", "Rebel");
		$ship_rebel->build(5,2);
		$ship_rebel->set_pos(10,10);
		array_push($list,$ship_rebel);
		$ship_empire = new Ship("Destroyer", "Blood Lust", "Empire");
		$ship_empire->build(5,2);
		$ship_rebel->set_pos(50,50);
		array_push($list,$ship_empire);
		// use point to build a fleet in between all ships available,
		// display the file where the player can choice ships.
		return $list;
	}


	function init_fleet($canvas, $list_fleet) {
		foreach($list_fleet as $sh) {
			$grp = strtolower($sh->get_group());
			$offset_x = 0 ;
			$offset_y = $sh->get_size()->get_y();
			if(strcmp($grp,"empire") == 0) {
				$offset_x = $canvas->get_x() - $sh->get_size()->get_x();
			} else if(strcmp($grp,"rebel") == 0) {
        //
			}
			$sh->set_pos($offset_x,rand(0,$canvas->get_y() - $offset_y));
			$sh->set_born_is(true);	
		}
	}

	function show_fleet($canvas, $map, $list_fleet) {
		$check_collision = true;
		$map->set_map($list_fleet,$check_collision);
	}


	function move_fleet($map, $list_fleet) {

		// print_r($map->get_grid());
		foreach($list_fleet as $sh) {

		}
		
	}



	function shoot() {
		
	}

?>