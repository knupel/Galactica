<?php
include_once("Group.class.php");
include_once("SH_Engine.class.php");
include_once("SH_Weapon.class.php");

class Ship extends Group implements Object {
  // here we need Trait to share the thee method name, size... may be ?
	private $mass; // point de coque
	private $size; // Vec2 h*w
	private $pos;
	private $dir; // need for the weapon

	private $type;

	// $armor; // bouclier
	private $force_field; // bouclier + need power
  private $manoeuvre; // masse + size / engine->handling - engine->power
	private $engine; // engine->power + engine->speed >>> PP
	private $is = true;
	private $born_is = false;
	private $dead_is = false;

	private $slot_weapon; // size - mass
	private $weapon_list;

	public function build() {
		settype($is, "boolean");
		settype($born_is, "boolean");
		settype($dead_is, "boolean");
		// open csv data to check if the ship name match, if it's not use fighter
		$this->engine = new SH_Engine();

		$this->weapon_list = array();
		$weapon = new SH_Weapon();
		$weapon->set(0);
		array_push($this->weapon_list,$weapon);
	}

	// set
	public function set_name($name) {
		$this->name = $name;
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public function set_type($type) {
		$this->type = $type;
	}

	public function set_mass($mass) {
		$this->mass = $mass;
	}

	public function set_dir($dir) {
		$this->dir = $dir;
	}

	public function set_size($w, $h) {

		$this->size = new Vec3(array("x"=>$w, "y"=>$h, "z"=>0));;
	}

	public function set_pos($x, $y) {
		$this->pos = new Vec3(array("x"=>$x, "y"=>$y, "z"=>0));
	}
  
  public function set_is($is) {
		$this->$is = $is;
	}

	public function set_born_is($born_is) {
		$this->$born_is = $born_is;
	}

	public function set_dead_is($dead_is) {
		$this->$dead_is = $dead_is;
	}
	
  
  // get
	public function get_is() {
		return $this->is;
	}

	public function get_born_is() {
		return $this->born_is;
	}

	public function get_dead_is() {
		return $this->dead_is;
	}

  public function get_name():string{
		return $this->name;
	}

	public function get_id():int{
		return $this->id;
	}

	public function get_type():int{
		return $this->type;
	}

	public function get_mass():int {
		return $this->mass = 0;
	}

	public function get_dir():int {
		return $this->dir;
	}

	public function get_size() {
		return $this->size;
	}

	public function get_pos() {
		return $this->pos;
	}
}
?>