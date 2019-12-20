<?php
include_once("Object.class.php");
include_once("Vec3.class.php");

abstract class Stuff implements Object {
	private $name;
	private $id;

	private $mass;
	private $size;
	private $pos;
  
  // set
	function set_name($name) {
		$this->name = $name;
	}

	function set_id($id) {
		$this->id = $id;
	}

	function set_mass($mass) {
		$this->mass = $mass;
	}

	function set_size($size) {
		$this->size = $size;
	}

	function set_pos($x, $y) {
		$this->pos = new Vec3(array("x"=>$x, "y"=>$y, "z"=>0));
	}
  
  // get
	function get_name():string {
		return $this->name;
	}

	function get_id():int{
		return $this->id;
	}

	function get_mass():int {
		return $this->mass;
	}

	function get_size():int {
		return $this->size;
	}

	function get_pos() {
		return $this->pos;
	}

	function get_pos_x():float {
		return $this->pos->get_x();
	}

	function get_pos_y():float {
		return $this->pos->get_y();
	}
}
?>
