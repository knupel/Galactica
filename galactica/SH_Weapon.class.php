<?php
class SH_Weapon {
	private $name = "Lance";
  
  private $slot = 1; // place need to install this weapon on the ship.
	private $power = 10; // definit les dégats mais aussi l'énergie nécessaire pour l'utiliser.
	private $distance; // 
	private $zone = 0; // ligne / tromblon / special
	private $cadence = 1; // temps de rechargement, si zero le vaisseau a besoin d'être immobile, puis le nombre de tir par tour.
	public function set($type) {
		if(is_numeric($type)) {
			if($type == 0) {
				$distance = array(array("short"=>10, "medium"=>20, "long"=>40));
			} else {
				$distance = array(array("short"=>10, "medium"=>20, "long"=>40));
			}
		}
	}

	public function get_name() {
		return $this->name;
	}
}
/*
Lance navaleCharges :0Portée courte :1 à 30 casesPortée intermédiaire :31 à 60 casesPortée longue :61 à 90 casesZone d’effet :Une 
*/
?>


