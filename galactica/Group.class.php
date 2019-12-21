<?php
class Group {
	private $name;
	private $nickname;
	private $group;
	function __construct($name, $nickname, $group) {
		$this->name = $name;
		$this->nickname = $nickname;
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

	function get_nickname():string {
		return $this->nickname;
	}

	function get_group():string {
		return $this->group;
	}
}
?>






















