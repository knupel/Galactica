<?php
class Ship extends Group implements Object {
  // here we need Trait to share the thee method name, size... may be ?
	$mass; // point de coque
	$size; // Vec2 h*w
	$pos;
	$dir; // need for the weapon

	// $armor; // bouclier
	$force_field; // bouclier + need power
  $manoeuvre; // masse + size / engine->handling - engine->power
	$engine; // engine->power + engine->speed >>> PP

	$slot_weapon; // size - mass
	$weapon_list; 

	// set
	function set_id($id) {
		$this->id = $id;
	}

	function set_mass($mass) {
		$this->mass = $mass;
	}

	function set_dir($dir) {
		$this->dir = $dir;
	}

	function set_size($w, $h) {
		$this->size = new Vec3($w, $h, 0);;
	}

	function set_pos($x, $y) {
		$this->pos = new Vec3($x, $y, 0);
	}
  
  // get
	function get_id():int{
		return $this->id;
	}

	function get_mass():int {
		return $this->mass;
	}

	function get_dir():int {
		return $this->dir;
	}

	function get_size():int {
		return $this->size;
	}

	function get_pos():Vec3 {
		return $this->pos;
	}
}
?>