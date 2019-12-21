<?php
class Map {
	// version 0.1.0
	public static $verbose = false;
	private $canvas;
	private $grid = array();
	// constructor
	function __construct($canvas, array $list) {
		if($canvas instanceof Vec3) {
			$this->canvas = $canvas->copy();
		}

		if (self::$verbose) {
			print($this->__toString()."constructed".PHP_EOL);
			self::$instance_classes++;
		}
		return;
	}

	// set map with stuff position
	public function set_map($list) {
		$width = $this->canvas->get_x();
		$height = $this->canvas->get_y();
		$len = $width * $height;
		// init grid
		for($i = 0 ; $i < $len ; $i++) {
			array_push($this->grid,0);
		}
		for($y = 0 ; $y < $this->canvas->get_y() ; $y++) {
			for($x = 0 ; $x < $this->canvas->get_x() ; $x++) {
				$type = $this->get_type($x, $y, $list);
				$target = $width * $y + $x;
				if ($type != 0) {
					$this->set_cell($this->get_elem($x, $y, $list));
				}
			}
		}
	}

	private function set_cell($elem) {
		$el_x = $elem->get_pos_x();
		$el_y = $elem->get_pos_y();
		$el_width = $elem->get_size()->get_x();
		$el_height = $elem->get_size()->get_y();
		for($x = 0 ; $x < $el_width ; $x++) {
			for($y = 0 ; $y < $el_height ; $y++) {
				$temp_x = $x + $el_x;
				$temp_y = $y + $el_y;
				if($temp_x < $this->canvas->get_x() && $temp_y < $this->canvas->get_y()) {
					$target = $this->canvas->get_x() * $temp_y + $temp_x;
					$this->grid[$target] = $elem->get_type();
				}
			}
		}
	}

	// show to html page
	public function show_map():string {
		$width = $this->canvas->get_x();
		$html = "<table id='cells'>";
		for($y = 0 ; $y < $this->canvas->get_y() ; $y++) {
			$html .= "<tr>";
			for($x = 0 ; $x < $this->canvas->get_x() ; $x++) {
				$target = $width * $y + $x;
				if ($this->grid[$target] == 0) {
					$html .= "<td class='case empty'></td>";
				} else {
					$html .= "<td class='case stuff'></td>";
				}
			}
			$html .= "</tr>";
		}
		$html .= "</table>";
		// must be faster because there is only one line but there is bug on the modulo :(
		/*
		$len = count($this->grid);
		for ($index = 0 ; $index < $len ; $index++) {
			$mod = $index%$width;
			if($mod == 0 &&) {
				echo ", mod: ".$mod." \n";
				$html .= "<tr>";
			}
			if ($this->grid[$index] == 0) {
				$html .= "<td class='case empty'></td>";
			} else {
				$html .= "<td class='case stuff'></td>";
			}
			if($mod == 0 &&) {
				$html .= "</tr>";
			}
		}
		*/
		return $html;
  }

  
  // get
  public function get_grid():array {
  	return $this->grid;
  }
	public function get_stuff_list():array {
		return $this->stuff_list;
	}

	private function get_id($x, $y, array $list):int {
		foreach($list as $elem) {
			if($elem instanceof Stuff || $elem instanceof Ship) {
				if($elem->get_pos_x() == $x && $elem->get_pos_y() == $y) {
					return $elem->get_id();
				}
			}
		}
		return 0;
	}

	private function get_elem($x, $y, array $list) {
		foreach($list as $elem) {
			if($elem instanceof Stuff || $elem instanceof Ship) {
				if($elem->get_pos_x() == $x && $elem->get_pos_y() == $y) {
					return $elem;
				}
			}
		}
		return 0;
	}

	private function get_pos($x, $y, array $list) {
		foreach($list as $elem) {
			if($elem instanceof Stuff || $elem instanceof Ship) {
				if($elem->get_pos_x() == $x && $elem->get_pos_y() == $y) {
					return $elem->get_pos();
				}
			}
		}
		return 0;
	}

	private function get_type($x, $y, array $list):int {
		foreach($list as $elem) {
			if($elem instanceof Stuff || $elem instanceof Ship) {
				if($elem->get_pos_x() == $x && $elem->get_pos_y() == $y) {
					return $elem->get_type();
				}
			}
		}
		return 0;
	}
}
?>

