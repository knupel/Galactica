<?php
include_once("Object.class.php");
include_once("Vec3.class.php");

abstract class Stuff implements Object {
	public static $verbose = false;
	public static $instance_classes = 0;

	private $name = "UFO";
	private $nickname = "ovni";
	private $type = 1; // 1 mean is something
	private $id = 0; // 1 mean is something

	private $mass = 1;
		private $size;
	private $pos;
	// private $size = new Vec3(array("xyz"=>1));
	// private $pos = new Vec3(array("xyz"=>0));
	// constructor + destructor
	function __construct($x, $y, $width, $height) {
			if(is_numeric($x) && is_numeric($y)) {
				$this->set_pos($x, $y);
			}
			if(is_numeric($width) && is_numeric($height)) {
				$this->set_size($width, $height);
			}
			$this->$size = new Vec3(array("xyz"=>1));
			$this->$pos = new Vec3(array("xyz"=>0));
			if (self::$verbose) {
				print($this->__toString()."stuff constructed".PHP_EOL);
				self::$instance_classes++;
			}
			return;
		}

		function __destruct() {
			if (self::$verbose) {
				print($this->__toString()."stuff destructed".PHP_EOL);
				self::$instance_classes--;
			}
			return;
		}
  
  // set
	function set_name($name) {
		$this->name = $name;
	}

	function set_nickname($nickname) {
		$this->nickname = $nickname;
	}

	function set_type($id) {
		$this->type = $type;
	}

	function set_id($id) {
		$this->id = $id;
	}

	function set_mass($mass) {
		$this->mass = $mass;
	}

	function set_size($w, $h) {
		if($this->size != NULL) {
			$this->size->set_x($w);
			$this->size->set_y($h);		
		} else {
			$this->size = new Vec3(array("x"=>$w, "y"=>$h, "z"=>0));
		}
		// $this->size->set_x($w);
		// $this->size->set_y($h);
	}

	function set_pos($x, $y) {
		if($this->pos != NULL) {
			$this->pos->set_x($x);
			$this->pos->set_y($y);		
		} else {
			$this->pos = new Vec3(array("x"=>$x, "y"=>$y, "z"=>0));
		}
	}
  
  // get
	function get_name():string {
		return $this->name;
	}

	function get_nickname():string {
		return $this->nickname;
	}

	function get_id():int{
		return $this->id;
	}

	function get_type():int{
		return $this->type;
	}

	function get_mass():int {
		return $this->mass;
	}

	function get_size() {
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
