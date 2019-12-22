<?php
	include_once("Map.class.php");
	include_once("Vec3.class.php");
	include_once("Stuff.class.php");
	include_once("S_Asteroid.class.php");
	include_once("Ship.class.php");
	include_once("A_manage_fleet.php");
	include_once("A_manage_party.php");

	// SETTING
	// not implemented
	loggin(); 

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

		// not implemented
		$list_leader = array();
		$num_player = 2;
		$list_leader = set_leader($num_player,$list_leader); 
		$is = true;
	}
  
	// SHOW
	$map = new Map($canvas,$list_obj);
	$check_collision = false;
	$map->set_map($list_obj,$check_collision);
	// UPDATE
  update_fleet($canvas, $map, $list_fleet);
  $round++;
  echo "ROUND: ".$round."\n";

  // print_r($_PUT);

	print($map->show_map());

	print_r($_GET);
	print_r($_POST);

	foreach($_POST as $key=>$val) {
		echo $key.": ".$val."\n";
	}

	foreach($_GET as $key=>$val) {
		echo $key.": ".$val."\n";
	}

	// not implemented
	score(); 
?>