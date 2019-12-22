<?php
include_once("Group.trait.php");
class Leader {
	use Group;
	private $name;
	private $nickname;
	private $rank = 0;
	private $party = 0;
	private $victory = 0;
	private $destroy = 0;
  // set 
  function set_name() {
		$this->name = $name;
	}

	function set_nickname() {
		$this->nickname = $nickname;
	}

  // add
	function add_destroy($destroy) {
		$this->destroy += $destroy;
	}

	function add_victory($victory) {
		$this->victory += $victory;
	}
  
  // set
	function set_destroy($destroy) {
		$this->destroy = $destroy;
	}

	function set_victory($victory) {
		$this->victory = $victory;
	}

	// get
	function get_name():string {
		return $this->name;
	}

	function get_nickname():string {
		return $this->nickname;
	}


	function get_victory():int {
		return $this->victory;
	}

	function get_destroy():int {
		return $this->destroy;
	}

	function get_rank():int {
		return round(($this->$destroy * $this->victory) / $this->party);
	}
}
?>