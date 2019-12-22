1<?php
include_once("Object.class.php");
include_once("Vec3.class.php");

abstract class Stuff implements Object {
	public static $verbose = false;
	public static $instance_classes = 0;

	protected $name = "UFO";
	protected $nickname = "ovni";
	protected $type = 1; // 1 mean is something
	protected $id = 0; // 1 mean is something

	protected $mass = 1;
	protected $size;
	protected $pos;

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
	public function set_name($name) {
		$this->name = $name;
	}

	public function set_nickname($nickname) {
		$this->nickname = $nickname;
	}

	public function set_type($type) {
		$this->type = $type;
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public function set_mass($mass) {
		$this->mass = $mass;
	}

	public function set_size($w, $h) {
		if($this->size != NULL) {
			$this->size->set_x($w);
			$this->size->set_y($h);		
		} else {
			$this->size = new Vec3(array("x"=>$w, "y"=>$h, "z"=>0));
		}
	}

	public function set_pos($x, $y) {
		if($this->pos != NULL) {
			$this->pos->set_x($x);
			$this->pos->set_y($y);		
		} else {
			$this->pos = new Vec3(array("x"=>$x, "y"=>$y, "z"=>0));
		}
	}
  
  // get
	public function get_name():string {
		return (string)$this->name;
	}

	public function get_nickname():string {
		return (string)$this->nickname;
	}

	public function get_id():int{
		return (int)$this->id;
	}

	public function get_type():int{
		return (int)$this->type;
	}

	public function get_mass():int {
		return (int)$this->mass;
	}

	public function get_size() {
		return $this->size;
	}

	public function get_pos() {
		return $this->pos;
	}

	public function get_pos_x():float {
		return (float)$this->pos->get_x();
	}

	public function get_pos_y():float {
		return (float)$this->pos->get_y();
	}
}
?>
