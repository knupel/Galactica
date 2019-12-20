<?php
class Map {
	public static $verbose = false;
	private $canvas;
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

	// show to html page
	public function show_map($list):string {
		$html = "<table id='cells'>";
		for($y = 0 ; $y < $this->canvas->get_y() ; $y++) {
			$html .= "<tr>";
			for($x = 0 ; $x < $this->canvas->get_x() ; $x++) {
				if ($this->get_id_elem($x, $y, $list) == 0) {
					$html .= "<td class='case empty'></td>";
				} else {
					$html .= "<td class='case stuff'></td>";
				}
			}
			$html .= "</tr>";
		}
		$html .= "</table>";
		return $html;
  }

  
  // method
	public function get_stuff_list():array {
		return $this->stuff_list;
	}

	public function get_id_elem($x, $y, array $list):int {
		// print("len get_id_elem".count($list)."\n");
		foreach($list as $elem) {
			// print($elem->get_id());
			if($elem instanceof Stuff || $elem instanceof Ship) {
				if($elem->get_pos_x() == $x && $elem->get_pos_y() == $y) {
					return $elem->get_id();
				}
			}
		}
		$id = 0; // the void, le vide, le néant
		return 0;
	}


	public function get_col():int {
		return (int)$this->canvas->x();
	}

	public function get_row():int {
		return (int)$this->canvas->y();
	}
}
?>

