<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Not_Empty extends Specification_Base {
	
	/**
	 * is_satisfied_by
	 *
	 * @access public
	 * @param  void
	 * @return boolean
	 * 
	 **/
	
	public function is_satisfied_by($candidate) 
	{
		return ($candidate === '0' OR ! empty($candidate));
	} 
}

?>