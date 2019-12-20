<?php
class Group {
	private $name;
	private $group;
	function __construct($name, $group) {
		$this->name = $name;;
		$this->group = $group;
		return;
	}

	// set
	function set_group($group) {
		$this->group = $group;
	}
  
  // get
	function get_name():string {
		return $this->name;
	}

	function get_group():string {
		return $this->group;
	}
}
?>






















