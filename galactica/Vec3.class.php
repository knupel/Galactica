<?php
  // Vec3 class 0.0.4
	class Vec3 {
		public static $verbose = false;
		public static $instance_classes = 0;

		private $x = 0.0;
		private $y = 0.0;
		private $z = 0.0;

		function __construct(array $kwarg) {
			$this->build($kwarg);
			if (self::$verbose) {
				print($this->__toString()."constructed".PHP_EOL);
				self::$instance_classes++;
			}
			return;
		}

		function __destruct() {
			if (self::$verbose) {
				print($this->__toString()."destructed".PHP_EOL);
				self::$instance_classes--;
			}
			return;
		}

    // build
		private function build(array $kwarg) {
			if(array_key_exists('xyz', $kwarg)) {
				$this->set_x($kwarg['xyz']);
				$this->set_y($kwarg['xyz']);
				$this->set_z($kwarg['xyz']);
			}
			if(array_key_exists('x', $kwarg)) {
				$this->set_x($kwarg['x']);
			}

			if(array_key_exists('y', $kwarg)) {
				$this->set_y($kwarg['y']);
			}

			if(array_key_exists('z', $kwarg)) {
				$this->set_z($kwarg['z']);
			}
		}

		// method
		public function add(Vec3 $a):Vec3 {
			return new Vec3(array('x'=>$this->x + $a->x, 'y'=>$this->y + $a->y, 'z'=>$this->z + $a->z));
		}

		public function sub(Vec3 $s):Vec3 {
			return new Vec3(array('x'=>$this->x - $s->x, 'y'=>$this->y - $s->y, 'z'=>$this->z - $s->z));
		}

		// mult
		public function mult(Vec3 $m):Vec3 {
			return new Vec3(array('x'=>$this->x * $m->x, 'y'=>$this->y * $m->y, 'z'=>$this->z * $m->z));
		}

		public function mult_scale($m) {
			$temp = $this->copy();
			return $temp->mult(new Vec3(array('x'=>$m, 'y'=>$m, 'z'=>$m)));
		}

		public function div(Vec3 $d):Vec3 {
			return new Vec3(array('x'=>$this->x / $d->x, 'y'=>$this->y / $d->y, 'z'=>$this->z / $d->z));
		}

		public function mag():float {
			return (float)sqrt($this->x * $this->x + $this->y * $this->y + $this->z * $this->z);
		}

		public function normalize():Vec3 {
			$m = $this->magnitude();
			if ($m != 0 && $m != 1) {
				return $this->div(new Vec3(array('x'=>$m, 'y'=>$m, 'z'=>$m)));
			} else {
				return $this->copy();
			}
		}

		public function opposite():Vec3 {
			$temp = $this->copy();
			return $temp->mult(new Vec3(array('x'=>-1, 'y'=>-1, 'z'=>-1)));
		}

		public function dot(Vec3 $vec):float {
			return (float)($this->x * $vec->x + $this->y * $vec->y + $this->z * $vec->z);
		}

		public function cross(Vec3 $vec):Vec3 {
			$temp = $this->copy();
			return new Vec3(array('x'=>$temp->y * $vec->get_z() - $temp->z * $vec->get_y(),
														'y'=>$temp->z * $vec->get_x() - $temp->x * $vec->get_z(),
														'z'=>$temp->x * $vec->get_y() - $temp->y * $vec->get_x()));
		}

		public function  cos(Vec3 $vec):float {
			$mag_this = $this->mag();
			$mag_vec = (float)sqrt(($vec->x * $vec->x) + ($vec->y * $vec->y) + ($vec->z * $vec->z));
			$dot = $this->dot($vec);
			return (float)($dot / ($mag_this * $mag_vec));
		}

    // set
		public function set_x($x) {
			if(is_numeric($x))
				$this->x = $x;
		}

		public function set_y($y) {
			if(is_numeric($y))
				$this->y = $y;
		}

		public function set_z($z) {
			if(is_numeric($z))
				$this->z = $z;
		}

		public function set_xyz($x, $y, $z) {
			$this->set_x($x);
			$this->set_y($y);
			$this->set_z($z);
		}

		public function set_all($arg) {
			$this->set_x($arg);
			$this->set_y($arg);
			$this->set_z($arg);
		}

    // get
		public function get_x():float {
			return $this->x;
		}

		public function get_y():float {
			return $this->y;
		}

		public function get_z():float {
			return $this->z;
		}

		public function get_xyz():Vec3 {
			return $this;
		}


		// copy
		public function copy():Vec3 {
			return new Vec3(array('x'=>$this->x, 'y'=>$this->y, 'z'=>$this->z));
		}

		// system
		function __toString() {
			return sprintf ("[ %.2f, %.2f, %.2f ]", $this->x, $this->y, $this->z);
		}

		public static function doc() {
    	$read = fopen("Vec3.doc.txt", 'r');
    	echo PHP_EOL;
    	while ($read && !feof($read)) {
    		echo fgets($read);
    	}
    	echo PHP_EOL;
    }
	}
?>