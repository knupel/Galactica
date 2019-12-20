<?php
interface Object {
	function set_name($name);
	function set_id($id);
	function set_mass($mass);
	function set_size($size);
	function set_pos($x,$y);

	function get_name():string;
	function get_id():int;
	function get_mass():int;
	function get_size():int;
	function get_pos();
}
?>