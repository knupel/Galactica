<?php
trait Group {
	private $group;
	// set
	public function set_group($group) {
		$this->group = $group;
	}
  // get
	public function get_group():string {
		return (string)$this->group;
	}
}
?>






















