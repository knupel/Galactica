<?php
include_once("Group.trait.php");
include_once("SH_Engine.class.php");
include_once("SH_Weapon.class.php");

class Ship extends Stuff {
	use Group;

	private $dir; // need for the weapon
	function __construct($name, $nickname, $group) {
		$this->name = $name;
		$this->nickname = $nickname;
		$this->group = $group;
		$this->set_type_ship();
		return;
	}

	// $armor; // bouclier
	private $force_field; // bouclier + need power
  private $manoeuvre; // masse + size / engine->handling - engine->power
	private $engine; // engine->power + engine->speed >>> PP
	private $is = true;
	private $born_is = false;
	private $dead_is = false;

	private $slot_weapon; // size - mass
	private $weapon_list;

	public function set_type_ship() {
		// here need to check the data base to set the type of the ship
		$grp = strtolower($this->group);
		$n = strtolower($this->name);
		// rebel
		if(strcmp($grp,"rebel") == 0) {
			if(strcmp($n,"cruiser") == 0) {
				$this->set_type(1100);
			} else if(strcmp($n,"destroyer") == 0) {
				$this->set_type(1200);
			} else {
				$this->set_type(1000);
			}
		}
		// empire
		if(strcmp($grp,"empire") == 0) {
			if(strcmp($n,"cruiser") == 0) {
				$this->set_type(2100);
			} else if(strcmp($n,"destroyer") == 0) {
				$this->set_type(2200);
			} else {
				$this->set_type(2000);
			}
		}

	}

	public function build($width, $height) {
		$this->set_size($width, $height);
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

	public function set_dir($dir) {
		$this->dir = $dir;
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

	public function get_dir():int {
		return $this->dir;
	}
}
?>