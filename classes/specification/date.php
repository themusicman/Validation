<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Date extends Specification_Base {
	
	/**
	 * is_satisfied_by
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function is_satisfied_by($candidate) 
	{
		return (strtotime($candidate) !== FALSE);
	} 	
}

?>